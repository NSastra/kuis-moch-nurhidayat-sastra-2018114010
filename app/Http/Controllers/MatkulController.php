<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Matkul;

class MatkulController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Matkul = Matkul::orderBy('id', 'desc')->get();
        return view('/matkul/index', compact('Matkul'));
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
        $Matkul = new Matkul;
        $Matkul->nama_matakuliah = $request->nama_matakuliah;
        $Matkul->sks = $request->sks;

        $Matkul->save();

        return redirect('/matkul');
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
        $Matkul = Matkul::where('id', $id)->first();
        return view('matkul.edit', ['Matkul' => $Matkul]);
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
            'nama_matakuliah' => 'required',
            'sks' => 'required'
        ]);

        Matkul::find($id)->update([
            'nama_matakuliah' => $request->nama_matakuliah,
            'sks' => $request->sks
        ]);

        return redirect('/matkul');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Matkul::find($id)->delete();
        return redirect('/matkul');
    }
}
