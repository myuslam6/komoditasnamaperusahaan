<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Komoditas;

class KomoditasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $komoditas=DB::table('komoditas')->leftjoin('jenis_komoditas', 'jenis_komoditas.id_jenis', '=', 'komoditas.id_jenis')->get();
        $jenis_komoditas=DB::table('jenis_komoditas')->get();
        return view('Komoditas.index', ['komoditas'=>$komoditas, 'jenis_komoditas'=>$jenis_komoditas]);
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
        DB::table('komoditas')->insert([
            'nama_komoditas' => $request->nama_komoditas,
            'id_jenis' => $request->id_jenis,
        ]);
        return redirect('/komoditas/index');
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
        $jenis_komoditas = DB::table('jenis_komoditas')->get();
        $komoditas = DB::table('komoditas')->where('id_komoditas', $id)->get();
        return view('Komoditas.edit',['jenis_komoditas' => $jenis_komoditas, 'komoditas' => $komoditas]);
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
        $update = Komoditas::where('id_komoditas', $id)->update(['nama_komoditas' => $request->nama_komoditas, 'id_jenis' => $request->id_jenis]);
        return redirect('/komoditas/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('komoditas')->where('id_komoditas', $id)->delete();
        return redirect('/komoditas/index');
    }
}
