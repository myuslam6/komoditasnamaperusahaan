<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\JenisKomoditas;

class JenisKomoditasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jenis_komoditas=DB::table('jenis_komoditas')->get();
        return view('JenisKomoditas.index', ['jenis_komoditas'=>$jenis_komoditas]);
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
        DB::table('jenis_komoditas')->insert([
            'nama_jenis' => $request->nama_jenis,
        ]);
        return redirect('/jenis-komoditas/index');
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
        $jenis_komoditas = DB::table('jenis_komoditas')->where('id_jenis', $id)->get();
        return view('JenisKomoditas.edit',['jenis_komoditas' => $jenis_komoditas]);
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
        $update = JenisKomoditas::where('id_jenis', $id)->update(['nama_jenis' => $request->nama_jenis]);
        return redirect('/jenis-komoditas/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('jenis_komoditas')->where('id_jenis', $id)->delete();
        return redirect('/jenis-komoditas/index');
    }
}
