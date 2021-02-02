<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
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
        $Absen = Absen::orderBy('id', 'desc')->paginate(2);

        return response()->json([
            'success'   => true,
            'message'   => 'Data Absensi',
            'data'      => $Absen
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'waktu_absen' => 'required',
            'mahasiswa_id' => 'required',
            'matkul_id' => 'required',
            'keterangan' => 'required',
        ]);

        $Absen = Absen::create([
            'waktu_absen'  => $request->waktu_absen,
            'mahasiswa_id' => $request->mahasiswa_id,
            'matkul_id' => $request->matkul_id,
            'keterangan' => $request->keterangan,
        ]);

        if($Absen){
            return response()->json([
                'success'   => true,
                'message'   => 'Berhasil',
                'data'      => $Absen
            ], 200);
            
        } else {
            return response()->json([
                'success'   => false,
                'message'   => 'Gagal',
                'data'      => $Absen
            ], 409);
    }
}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Absen = Absen::where('id', $id)->first();

        return response()->json([
            'success' => true,
            'message' => 'Detail Absensi',
            'data' => \$Absen
        ], 200);
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
        \$request->validate([
            'waktu_absen' => 'required',
            'mahasiswa_id' => 'required|numeric',
            'matkul_id' => 'required',
            'keterangan' => 'required'
        ]);

        \$f = Friends::find(\$id)->update([
            'waktu_absen' => \$request->waktu_absen,
            'mahasiswa_id' => \$request->mahasiswa_id,
            'matkul_id' => \$request->matkul_id,
            'keterangan' => \$request->keterangan
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        \$cek = Absen::find(\$id)->delete();
        return response()->json([
            'success' => true,
            'message' => 'Post Updated',
            'data' => \$cek
        ], 200);
    }
    }
}
