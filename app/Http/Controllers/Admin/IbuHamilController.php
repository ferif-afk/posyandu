<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\IbuHamil;
use RealRashid\SweetAlert\Facades\Alert;
use App\Exports\IbuHamilExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Auth;

class IbuHamilController extends Controller
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
        $ibu_hamil = IbuHamil::when($request->search, function ($query) use ($request) {
            $query->where('id_bumil', 'LIKE', "%{$request->search}%")
                    ->orWhere('nama_bumil', 'LIKE', "%{$request->search}%")
                    ->orWhere('tgl_lahir', 'LIKE', "%{$request->search}%")
                    ->orWhere('gol_darah', 'LIKE', "%{$request->search}%")
                    ->orWhere('pekerjaan', 'LIKE', "%{$request->search}%")
                    ->orWhere('alamat', 'LIKE', "%{$request->search}%")
                    ->orWhere('no_telp', 'LIKE', "%{$request->search}%")
                    ->orWhere('nama_suami', 'LIKE', "%{$request->search}%");;
        })->simplePaginate(5);

        return view('admin.ibu_hamil.index', compact('ibu_hamil'));
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
        return view('admin.ibu_hamil.create');
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
        $ibu_hamil = new IbuHamil;
        $ibu_hamil->nik = $request->nik;
        $ibu_hamil->nama_bumil = $request->nama_bumil;
        $ibu_hamil->tgl_lahir = $request->tgl_lahir;
        $ibu_hamil->gol_darah = $request->gol_darah;
        $ibu_hamil->urutan_kehamilan = $request->urutan_kehamilan;
        $ibu_hamil->pekerjaan = $request->pekerjaan;
        $ibu_hamil->alamat = $request->alamat;
        $ibu_hamil->no_telp = $request->no_telp;
        $ibu_hamil->nama_suami = $request->nama_suami;

        $ibu_hamil->save();
        
        Alert::success('Buat Data Ibu Hamil', 'Berhasil Tambah Data');
        return redirect('/admin/ibuhamil');
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
        $ibu_hamil = IbuHamil::findOrFail($id);

        return view('admin.ibu_hamil.edit', compact('ibu_hamil'));
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
        $ibu_hamil = IbuHamil::findOrFail($id);
        $ibu_hamil->nik = $request->nik;
        $ibu_hamil->nama_bumil = $request->nama_bumil;
        $ibu_hamil->tgl_lahir = $request->tgl_lahir;
        $ibu_hamil->gol_darah = $request->gol_darah;
        $ibu_hamil->urutan_kehamilan = $request->urutan_kehamilan;
        $ibu_hamil->pekerjaan = $request->pekerjaan;
        $ibu_hamil->alamat = $request->alamat;
        $ibu_hamil->no_telp = $request->no_telp;
        $ibu_hamil->nama_suami = $request->nama_suami;

        $ibu_hamil->update();

        Alert::success('Updata Data Ibu Hamil', 'Berhasil Update Data');
        return redirect('/admin/ibuhamil');
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
        IbuHamil::destroy($id);

        Alert::success('Hapus Data Ibu Hamil', 'Berhasil Hapus Data');
        return back();
    }

    public function export_excel()
    {
        if ($user = Auth::user()->role !== 'admin') {
            return redirect('/');
        }
        return Excel::download(new IbuHamilExport, 'ibu_hamil.xlsx');
    }
}
