<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penimbangan;
use App\Models\Bayi;
use RealRashid\SweetAlert\Facades\Alert;
use App\Exports\PenimbanganExport;
use Maatwebsite\Excel\Facades\Excel;

class PenimbangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $penimbangan = Penimbangan::when($request->search, function ($query) use ($request) {
            $query->where('id_timbang', 'LIKE', "%{$request->search}%")
                    ->orWhere('nama_balita', 'LIKE', "%{$request->search}%")
                    ->orWhere('tgl_lahir', 'LIKE', "%{$request->search}%")
                    ->orWhere('hasil_timbang', 'LIKE', "%{$request->search}%")
                    ->orWhere('tinggi_badan', 'LIKE', "%{$request->search}%")
                    ->orWhere('status', 'LIKE', "%{$request->search}%");;
        })->simplePaginate(5);

        return view('penimbang.index', compact('penimbangan'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $getIdTimbang = Penimbangan::latest('id_timbang')->first();

        return view('penimbang.create', compact('getIdTimbang'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // cek apakah bayi yg di timbang ada pada database
        $status = Bayi::where('nama_bayi', $request->nama_balita)->first();
        $getIdTimbang = Penimbangan::latest('id_timbang')->first();

        if(!$status) {
            Alert::warning('Buat Data Penimbangan', 'Nama Bayi tidak Terdaftar');
            return view('penimbang.create');
        }
        else {
            // -- Simpan data timbang bayi
            $penimbang = new Penimbangan;
            $id = (int)$status->id_bayi;

            $penimbang->nama_balita = $request->nama_balita;
            $penimbang->tgl_lahir = $request->tgl_lahir;
            $penimbang->hasil_timbang = $request->hasil_timbang;
            $penimbang->tinggi_badan = $request->tinggi_badan;
            $penimbang->status = $request->status;

            $penimbang->save();

            // -- Update tb_bayi timbang id --
            Bayi::where('id_bayi', $id)->update(['timbang_id' => $penimbang->id_timbangan]);

            Alert::success('Buat Data Penimbangan', 'Berhasil Tambah Data');
            return redirect('/penimbang');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Penimbang  $penimbang
     * @return \Illuminate\Http\Response
     */
    public function show(Penimbangan $penimbang)
    {
        return view('penimbang.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Penimbang  $penimbang
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $penimbang = Penimbangan::findOrFail($id);
        
        return view('penimbang.edit', compact('penimbang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Penimbang  $penimbang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $penimbang = Penimbangan::where('id_timbang', $bayi->timbang_id)->first();
        $penimbang = Penimbangan::findOrFail($id);
        $penimbang->nama_balita = $request['nama_balita'];
        $penimbang->tgl_lahir = $request['tgl_lahir'];
        $penimbang->hasil_timbang = $request['hasil_timbang'];
        $penimbang->tinggi_badan = $request['tinggi_badan'];
        $penimbang->status = $request['status'];
        
        $penimbang->update();

        Alert::success('Update Data Penimbangan', 'Berhasil Ubah Data');
        return redirect('/penimbang');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Penimbang  $penimbang
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Bayi::destroy($penimbang->id);
        // return redirect('/');
        // $ibu_hamil = Penimbangan::findOrFail($id);
        // $ibu_hamil->delete();
        return back();
    }

    public function export_excel()
    {
        return Excel::download(new PenimbanganExport, 'penimbang.xlsx');
    }
}
