<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Imunisasi;
use RealRashid\SweetAlert\Facades\Alert;
use App\Exports\ImunisasiExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Auth;

class ImunisasiController extends Controller
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
        $imunisasi = Imunisasi::when($request->search, function ($query) use ($request) {
            $query->where('id_imunisasi', 'LIKE', "%{$request->search}%")
                    ->orWhere('tgl_imunisasi', 'LIKE', "%{$request->search}%")
                    ->orWhere('umur_skr', 'LIKE', "%{$request->search}%")
                    ->orWhere('ket', 'LIKE', "%{$request->search}%")
                    ->orWhere('jenis_id', 'LIKE', "%{$request->search}%");
                    
        })->simplePaginate(5);

        return view('admin.imunisasi.index', compact('imunisasi'));
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
        return view('admin.imunisasi.create');
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
        $imunisasi = new Imunisasi;
        $imunisasi->tgl_imunisasi = $request->tgl_imunisasi;
        $imunisasi->umur_skr = $request->umur_skr;
        $imunisasi->ket = $request->keterangan;
        $imunisasi->jenis_id = $request->jenis_id;

        $imunisasi->save();

        return redirect('/admin/imunisasi');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if ($user = Auth::user()->role !== 'admin') {
            return redirect('/');
        }
        $imunisasi = Imunisasi::findOrFail($id);

        return view('admin.imunisasi.edit', compact('imunisasi'));
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
        $imunisasi = Imunisasi::findOrFail($id);

        return view('admin.imunisasi.edit', compact('imunisasi'));
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
        $imunisasi = Imunisasi::findOrFail($id);
        $imunisasi->tgl_imunisasi = $request['tgl_imunisasi'];
        $imunisasi->umur_skr = $request['umur_skr'];
        $imunisasi->ket = $request['keterangan'];
        $imunisasi->jenis_id = $request['jenis_id'];

        $imunisasi->update();

        Alert::success('Update Data Imunisasi', 'Berhasil Update Data');
        return redirect('/admin/imunisasi');
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
        Imunisasi::destroy($id);

        Alert::success('Hapus Data Imunisasi', 'Berhasil Hapus Data');
        return back();
    }

    public function export_excel()
    {
        if ($user = Auth::user()->role !== 'admin') {
            return redirect('/');
        }
        return Excel::download(new ImunisasiExport, 'imunisasi.xlsx');
    }
}
