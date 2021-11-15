<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Penimbangan;
use App\Models\Bayi;
use RealRashid\SweetAlert\Facades\Alert;
use App\Exports\PenimbanganExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Auth;

class PenimbangController extends Controller
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
        $penimbangan = Penimbangan::when($request->search, function ($query) use ($request) {
            $query->where('id_timbang', 'LIKE', "%{$request->search}%")
                    ->orWhere('tgl_lahir', 'LIKE', "%{$request->search}%")
                    ->orWhere('hasil_timbang', 'LIKE', "%{$request->search}%")
                    ->orWhere('tinggi_badan', 'LIKE', "%{$request->search}%")
                    ->orWhere('status', 'LIKE', "%{$request->search}%");;
        })->simplePaginate(5);

        return view('admin.penimbang.index', compact('penimbangan'));
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
        $getIdTimbang = Penimbangan::latest('id_timbang')->first();

        return view('admin.penimbang.create', compact('getIdTimbang'));
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
        // cek apakah bayi yg di timbang ada pada database
        $status = Bayi::where('nama_bayi', $request->nama_bayi)->first();
        $getIdTimbang = Penimbangan::latest('id_timbang')->first();

        if(!$status) {
            Alert::warning('Buat Data Penimbangan', 'Nama Bayi tidak Terdaftar');
            return view('admin.penimbang.create', compact('getIdTimbang'));
        }
        else {
            // -- Simpan data timbang bayi
            $penimbang = new Penimbangan;
            $id = (int)$status->id_bayi;
            $id_timbang = $request->id_timbang;

            $penimbang->id_timbang = $id_timbang;
            $penimbang->tgl_lahir = $request->tgl_lahir;
            $penimbang->hasil_timbang = $request->hasil_timbang;
            $penimbang->tinggi_badan = $request->tinggi_badan;
            $penimbang->status = $request->status;

            if (Penimbangan::where('id_timbang', '=', $id_timbang)->exists()) {
                Alert::warning('Buat Data Penimbangan', 'ID sudah terdaftar');
                return view('admin.penimbang.create', compact('getIdTimbang'));
            }

            $penimbang->save();

            // -- Update tb_bayi timbang id --
            Bayi::where('id_bayi', $id)->update(['timbang_id' => $id_timbang]);

            Alert::success('Buat Data Penimbangan', 'Berhasil Tambah Data');
            return redirect('/admin/penimbang');
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
        $penimbang = Penimbangan::findOrFail($id);

        return view('admin.penimbang.edit', compact('penimbang'));
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
        $penimbang = Penimbangan::findOrFail($id);
        $penimbang->tgl_lahir = $request->tgl_lahir;
        $penimbang->hasil_timbang = $request->hasil_timbang;
        $penimbang->tinggi_badan = $request->tinggi_badan;
        $penimbang->status = $request->status;
        
        $penimbang->update();

        Alert::success('Update Data Penimbangan', 'Berhasil Ubah Data');
        return redirect('/admin/penimbang');
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
        Penimbangan::destroy($id);

        Alert::success('Hapus Data Timbang', 'Berhasil Hapus Data');
        return back();
    }

    public function export_excel()
    {
        if ($user = Auth::user()->role !== 'admin') {
            return redirect('/');
        }
        return Excel::download(new PenimbanganExport, 'penimbang.xlsx');
    }
}
