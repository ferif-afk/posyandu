<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JenisImunisasi;
use App\Models\Bayi;
use RealRashid\SweetAlert\Facades\Alert;
use App\Exports\JenisImunisasiExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Auth;

class JenisImunisasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($user = Auth::user()->role !== 'admin') {
            return redirect('/');
        }
        $jenisimunisasi = JenisImunisasi::when($request->search, function ($query) use ($request) {
            $query->where('id_jenis', 'LIKE', "%{$request->search}%")
                    ->orWhere('nama_balita', 'LIKE', "%{$request->search}%")
                    ->orWhere('nama_imunisasi', 'LIKE', "%{$request->search}%")
                    ->orWhere('ket', 'LIKE', "%{$request->search}%");
        })->simplePaginate(5);

        return view('admin.jenis_imunisasi.index', compact('jenisimunisasi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if ($user = Auth::user()->role !== 'admin') {
            return redirect('/');
        }
        return view('admin.jenis_imunisasi.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($user = Auth::user()->role !== 'admin') {
            return redirect('/');
        }
        $jenisimunisasi = new JenisImunisasi;
        $jenisimunisasi->nama_balita = $request->nama_balita;
        $jenisimunisasi->Nama_Imunisasi = $request->nama_imunisasi;
        $jenisimunisasi->Ket = $request->keterangan;

        $jenisimunisasi->save();

        Alert::success('Tambah Data Jenis Imunisasi', 'Berhasil Tambah Data');
        return redirect('/admin/jenisimunisasi');
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
        if ($user = Auth::user()->role !== 'admin') {
            return redirect('/');
        }
        $jenisimunisasi = JenisImunisasi::findOrFail($id);

        return view('admin.jenis_imunisasi.edit', compact('jenisimunisasi'));
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
        if ($user = Auth::user()->role !== 'admin') {
            return redirect('/');
        }
        $jenisimunisasi = JenisImunisasi::findOrFail($id);
        $jenisimunisasi->nama_balita = $request->nama_balita;
        $jenisimunisasi->nama_imunisasi = $request->nama_imunisasi;
        $jenisimunisasi->ket = $request->keterangan;

        $jenisimunisasi->update();

        Alert::success('Update Data Jenis Imunisasi', 'Berhasil Update Data');
        return redirect('/admin/jenisimunisasi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($user = Auth::user()->role !== 'admin') {
            return redirect('/');
        }
        JenisImunisasi::destroy($id);

        Alert::success('Hapus Data Jenis Imunisasi', 'Berhasil Hapus Data');
        return back();
    }

    public function export_excel()
    {
        if ($user = Auth::user()->role !== 'admin') {
            return redirect('/');
        }
        return Excel::download(new JenisImunisasiExport, 'jenisimunisasi.xlsx');
    }
}
