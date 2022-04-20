<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Imunisasi;
use RealRashid\SweetAlert\Facades\Alert;
use App\Exports\ImunisasiExport;
use Maatwebsite\Excel\Facades\Excel;

class ImunisasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $imunisasi = Imunisasi::when($request->search, function ($query) use ($request) {
            $query->where('id_imunisasi', 'LIKE', "%{$request->search}%")
                    ->orWhere('nama_balita', 'LIKE', "%{$request->search}%")
                    ->orWhere('tgl_imunisasi', 'LIKE', "%{$request->search}%")
                    ->orWhere('umur_skr', 'LIKE', "%{$request->search}%")
                    ->orWhere('ket', 'LIKE', "%{$request->search}%")
                    ->orWhere('jenis_id', 'LIKE', "%{$request->search}%");
                    
        })->simplePaginate(5);

        return view('imunisasi.index',compact('imunisasi'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('imunisasi.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $imunisasi = new Imunisasi;
        // $imunisasi->id_imunisasi = $request->id_imunisasi;
        $imunisasi->nama_balita = $request->nama_balita;
        $imunisasi->tgl_imunisasi = $request->tgl_imunisasi;
        $imunisasi->umur_skr = $request->umur_skr;
        $imunisasi->ket = $request->keterangan;
        $imunisasi->jenis_id = $request->jenis_id;

        $imunisasi->save();

        return redirect('/imunisasi');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Imunisasi  $imunisasi
     * @return \Illuminate\Http\Response
     */
    public function show(Imunisasi $imunisasi)
    {
        return view('imunisasi.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Imunisasi  $imunisasi
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $imunisasi = Imunisasi::findOrFail($id);

        return view('imunisasi.edit', compact('imunisasi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Imunisasi  $imunisasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $imunisasi = Imunisasi::findOrFail($id);
        $imunisasi->tgl_imunisasi = $request['tgl_imunisasi'];
        $imunisasi->nama_balita = $request['nama_balita'];
        $imunisasi->umur_skr = $request['umur_skr'];
        $imunisasi->ket = $request['keterangan'];
        // $imunisasi->jenis_id = $request['jenis_id'];
        
        $imunisasi->update();

        Alert::success('Update Data Imunisasi', 'Berhasil Update Data');
        return redirect('/imunisasi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Imunisasi  $imunisasi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Imunisasi::destroy($imunisasi->id);
        // return redirect('/');
        // $imunisasi = Imunisasi::findOrFail($id);
        // $imunisasi->delete();
        return back();
    }

    public function export_excel()
    {
        return Excel::download(new ImunisasiExport, 'imunisasi.xlsx');
    }
}
