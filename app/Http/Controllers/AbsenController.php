<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Absen;

class AbsenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Absen = Absen::orderBy('id', 'desc')->get();
        return view('/absen/index', compact('Absen'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Absen = new Absen;
        $Absen->waktu_absen = $request->waktu_absen;
        $Absen->mahasiswa_id = $request->mahasiswa_id;
        $Absen->matkul_id = $request->matkul_id;
        $Absen->keterangan = $request->keterangan;

        $Absen->save();

        return redirect('/absen');
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
        $Absen = Absen::where('id', $id)->first();
        return view('absen.edit', ['Absen' => $Absen]);
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
        $request->validate([
            'waktu_absen' => 'required',
            'mahasiswa_id' => 'required',
            'matkul_id' => 'required',
            'keterangan' => 'required'
        ]);

        Absen::find($id)->update([
            'waktu_absen' => $request->waktu_absen,
            'mahasiswa_id' => $request->mahasiswa_id,
            'matkul_id' => $request->matkul_id,
            'keterangan' => $request->keterangan
        ]);

        return redirect('/absen');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Absen::find($id)->delete();
        return redirect('/absen');
    }
}
