<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JenisImunisasi;
use App\Models\Bayi;
use RealRashid\SweetAlert\Facades\Alert;

class JenisImunisasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $jenisimunisasi = JenisImunisasi::when($request->search, function ($query) use ($request) {
            $query->where('id_jenis', 'LIKE', "%{$request->search}%")
                    ->orWhere('nama_imunisasi', 'LIKE', "%{$request->search}%")
                    ->orWhere('ket', 'LIKE', "%{$request->search}%");;
        })->simplePaginate(5);

        return view('jenis_imunisasi.index',compact('jenisimunisasi'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jenis_imunisasi.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $jenisimunisasi = new JenisImunisasi;
        $jenisimunisasi->id = $request->id_jenis;
        $jenisimunisasi->nama_imunisasi = $request->nama_imunisasi;
        $jenisimunisasi->ket = $request->keterangan;

        $jenisimunisasi->save();

        return redirect('/jenisimunisasi');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\JenisImunisasi  $jenisimunisasi
     * @return \Illuminate\Http\Response
     */
    public function show(JenisImunisasi $jenisimunisasi)
    {
        return view('jenis_imunisasi.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\JenisImunisasi  $jenisimunisasi
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jenisimunisasi = JenisImunisasi::findOrFail($id);

        return view('jenis_imunisasi.edit', compact('jenisimunisasi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Jenisimunisasi  $jenisimunisasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JenisImunisasi $jenisimunisasi)
    {
        $jenisimunisasi = JenisImunisasi::where('id', $jenisimunisasi->id)->first();
        $jenisimunisasi->Nama_Imunisasi = $request['nama_imusasi'];
        $jenisimunisasi->ket = $request['keterangan'];

        
        $jenisimunisasi->update();

        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\JenisImunisasi  $jenisimunisasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(JenisImunisasi $jenisimunisasi)
    {
        // Bayi::destroy($jenisimunisasi->id);
        // return redirect('/jenisimunisasi');
        return back();
    }

    public function export_excel()
    {
        // return Excel::download(new JenisImunisasiExport, 'jenisimunisasi.xlsx');
    }
}
