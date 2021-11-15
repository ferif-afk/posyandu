<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IbuHamil;
use RealRashid\SweetAlert\Facades\Alert;
use App\Exports\IbuHamilExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
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
        if ($user = Auth::user()->role === 'admin') {
            return redirect('/admin/ibuhamil');
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

        return view('ibu_hamil.index', compact('ibu_hamil'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ibu_hamil.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, IbuHamil $ibu_hamil)
    {
        $ibu_hamil->nama_bumil = $request->nama_bumil;
        $ibu_hamil->tgl_lahir = $request->tgl_lahir;
        $ibu_hamil->gol_darah = $request->gol_darah;
        $ibu_hamil->pekerjaan = $request->pekerjaan;
        $ibu_hamil->alamat = $request->alamat;
        $ibu_hamil->no_telp = $request->no_telp;
        $ibu_hamil->nama_suami = $request->nama_suami;

        $ibu_hamil->save();

        Alert::success('Buat Data Ibu Hamil', 'Berhasil Tambah Data');
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\IbuHamil  $ibu_hamil
     * @return \Illuminate\Http\Response
     */
    public function show(IbuHamil $ibu_hamil)
    {
        return view('ibu_hamil.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\IbuHamil  $ibu_hamil
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // return view('edit', compact('ibu_hamil'));
        $ibu_hamil = IbuHamil::findOrFail($id);

        return view('ibu_hamil.edit', compact('ibu_hamil'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\IbuHamil  $ibu_hamil
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $ibu_hamil = IbuHamil::where('id', $ibu_hamil->id)->first();
        $ibu_hamil = IbuHamil::findOrFail($id);
        $ibu_hamil->nama_bumil = $request['nama_bumil'];
        $ibu_hamil->tgl_lahir = $request['tgl_lahir'];
        $ibu_hamil->gol_darah = $request['gol_darah'];
        $ibu_hamil->pekerjaan = $request['pekerjaan'];
        $ibu_hamil->alamat = $request['alamat'];
        $ibu_hamil->no_telp = $request['no_telp'];
        $ibu_hamil->nama_suami = $request['nama_suami'];
        
        $ibu_hamil->update();

        Alert::success('Update Data Penimbangan', 'Berhasil Update Data');
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\IbuHamil  $ibu_hamil
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $ibu_hamil = IbuHamil::findOrFail($id);
        // $ibu_hamil->delete();
        return back();
    }

    public function export_excel()
    {
        return Excel::download(new IbuHamilExport, 'ibu_hamil.xlsx');
    }
}
