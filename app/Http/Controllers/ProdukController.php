<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Produk;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produk = DB::select("
            select p.id_produk, p.nama_produk, jk.nama_jenis, k.nama_komoditas
            from produk p, jenis_komoditas jk, komoditas k
            where p.id_komoditas = k.id_komoditas and jk.id_jenis = k.id_jenis 
        ");
        // $produk=DB::table('produk')
        // ->join('komoditas', 'komoditas.id_jenis', '=', 'komoditas.id_jenis')
        // ->join('jenis_komoditas', 'jenis_komoditas.id_jenis', '=', 'komoditas.id_jenis')
        // ->get();
        $komoditas=DB::table('komoditas')->get();
        $jenis_komoditas=DB::table('jenis_komoditas')->get();
        return view('Produk.index', ['jenis_komoditas'=>$jenis_komoditas, 'komoditas'=>$komoditas, 'produk'=>$produk]);
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
        DB::table('produk')->insert([
            'id_komoditas' => $request->id_komoditas,
            'nama_produk' => $request->nama_produk,
        ]);
        return redirect('/produk/index');
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
        $produk = DB::table('produk')->where('id_produk', $id)->get();
        $komoditas = DB::table('komoditas')->get();
        $jenis_komoditas = DB::table('jenis_komoditas')->where('id_jenis', $id)->get();
        return view('Produk.edit',['produk' => $produk, 'komoditas' => $komoditas, 'jenis_komoditas'=>$jenis_komoditas]);
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
        $update = Produk::where('id_produk', $id)->update(['nama_produk' => $request->nama_produk, 'id_komoditas' => $request->id_komoditas]);
        return redirect('/produk/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('produk')->where('id_produk', $id)->delete();
        return redirect('/produk/index');
    }
}
