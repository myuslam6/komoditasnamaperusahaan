<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\ProdukPerusahaan;
use Session;

class ProdukPerusahaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produk_perusahaan=DB::table('produk_perusahaan')->leftjoin('produk', 'produk.id_produk', '=', 'produk_perusahaan.id_produk')->leftjoin('perusahaan', 'perusahaan.id_perusahaan','=', 'produk_perusahaan.id_perusahaan')->get();
        $perusahaan=DB::table('perusahaan')->get();
        $produk=DB::table('produk')->get();
        return view('ProdukPerusahaan.index', ['produk_perusahaan'=>$produk_perusahaan, 'perusahaan'=>$perusahaan, 'produk'=>$produk]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Cek apakah ada produk yang sama pada perusahan tersebut
        $check = DB::table('produk_perusahaan')->where('id_perusahaan', $request->id_perusahaan)->get();
        foreach($check as $c){
            if ($c->id_produk == $request->id_produk){
              Session::flash('message', 'Nama Perusahaan dan Produk Sudah Ada!');
              return redirect('produk-perusahaan/index');
            }
        }

        $data = DB::table('produk_perusahaan')->insert([
            'id_perusahaan' => $request->id_perusahaan,
            'id_produk' => $request->id_produk,
        ]);
        return redirect('produk-perusahaan/index')->with('message', 'Nama Perusahaan dan Produk Berhasil Di Input!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['produk_perusahaan'] = DB::table('produk_perusahaan')->where('id', $id)->first();
        $data['perusahaan'] = DB::table('perusahaan')->get();
        $data['produk'] = DB::table('produk')->get();
       
        return view('ProdukPerusahaan.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       $check = DB::table('produk_perusahaan')->where('id_perusahaan', $request->id_perusahaan_hidden)
       ->where('id_produk', '!=', $request->id_produk_hidden)
       ->get();
       
       foreach($check as $c){
            if ($c->id_produk == $request->id_produk){
              Session::flash('message', 'Nama Perusahaan dan Produk Sudah Ada!');
              return redirect('produk-perusahaan/edit/'. $id);
            }
        }
        $data = DB::table('produk_perusahaan')
        ->where('id', $id)
        ->update([
            'id_produk' => $request->id_produk,
        ]);
        return redirect('produk-perusahaan/index')->with('message', 'Nama Perusahaan dan Produk Berhasil Di Input!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('produk_perusahaan')->where('id', $id)->delete();
        return redirect('/produk-perusahaan/index');
    }
}
