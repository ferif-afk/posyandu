<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kader;
use RealRashid\SweetAlert\Facades\Alert;
use App\Exports\KaderExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Auth;

class KaderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($user = Auth::user()->role !== 'admin') {
            return abort(403);
        }
        $kader = Kader::when($request->search, function ($query) use ($request) {
            $query->where('id_kader', 'LIKE', "%{$request->search}%")
                    ->orWhere('nama_kader', 'LIKE', "%{$request->search}%")
                    ->orWhere('jabatan', 'LIKE', "%{$request->search}%")
                    ->orWhere('jenis_kelamin', 'LIKE', "%{$request->search}%")
                    ->orWhere('tgl_lahir', 'LIKE', "%{$request->search}%")
                    ->orWhere('alamat', 'LIKE', "%{$request->search}%")
                    ->orWhere('no_telp', 'LIKE', "%{$request->search}%");;
        })->simplePaginate(5);

        return view('admin.kader.index',compact('kader'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.kader.create');
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
        $kader = new Kader;
        $kader->nama_kader = $request->nama_kader;
        $kader->jabatan = $request->jabatan;
        $kader->jenis_kelamin = $request->jenis_kelamin;
        $kader->tgl_lahir = $request->tgl_lahir;
        $kader->alamat = $request->alamat;
        $kader->no_telp = $request->no_telp;

        $kader->save();

        Alert::success('Buat Data Kader', 'Berhasil Tambah Data');
        return redirect('/admin/kader');
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
        $kader = Kader::findOrFail($id);

        return view('admin.kader.edit', compact('kader'));
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
        $kader = Kader::findOrFail($id);
        $kader->nama_kader = $request->nama_kader;
        $kader->jabatan = $request->jabatan;
        $kader->jenis_kelamin = $request->jenis_kelamin;
        $kader->tgl_lahir = $request->tgl_lahir;
        $kader->alamat = $request->alamat;
        $kader->no_telp = $request->no_telp;

        $kader->update();

        Alert::success('Update Data Kader', 'Berhasil Update Data');
        return redirect('/admin/kader');
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
        Kader::destroy($id);

        Alert::success('Hapus Data Kader', 'Berhasil Hapus Data');
        return back();
    }

    public function export_excel()
    {
        if ($user = Auth::user()->role !== 'admin') {
            return redirect('/');
        }
        return Excel::download(new KaderExport, 'kader.xlsx');
    }
}
