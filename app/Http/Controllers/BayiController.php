<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bayi;
use RealRashid\SweetAlert\Facades\Alert;
use App\Exports\BayiExport;
use Maatwebsite\Excel\Facades\Excel;

class BayiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $bayi = Bayi::when($request->search, function ($query) use ($request) {
            $query->where('id_bayi', 'LIKE', "%{$request->search}%")
                    ->orWhere('nama_bayi', 'LIKE', "%{$request->search}%")
                    ->orWhere('tgl_lahir', 'LIKE', "%{$request->search}%")
                    ->orWhere('jenis_kelamin', 'LIKE', "%{$request->search}%")
                    ->orWhere('berat_lahir', 'LIKE', "%{$request->search}%")
                    ->orWhere('panjang_lahir', 'LIKE', "%{$request->search}%")
                    ->orWhere('anak_ke', 'LIKE', "%{$request->search}%");;
        })->simplePaginate(5);

        return view('bayi.index',compact('bayi'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bayi.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $bayi = new Bayi;
        $bayi->Nama_Bayi = $request->nama_bayi;
        $bayi->Tgl_lahir = $request->tgl_lahir;
        $bayi->Jenis_kelamin = $request->jenis_kelamin;
        $bayi->Berat_lahir = $request->berat_lahir;
        $bayi->Panjang_lahir = $request->panjang_lahir;
        $bayi->lingkar_kepala = $request->lingkar_kepala;
        $bayi->Anak_ke = $request->anak_ke;

        $bayi->save();

        Alert::success('Tambah Data Bayi', 'Berhasil Tambah Data');
        return redirect('/bayi');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Bayi  $bayi
     * @return \Illuminate\Http\Response
     */
    public function show(Bayi $bayi)
    {
        return view('bayi.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bayi  $bayi
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $babies = Bayi::findOrFail($id);

        return view('bayi.edit', compact('babies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bayi  $bayi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $bayi = Bayi::where('id', $bayi->id)->first();
        $bayi = Bayi::findOrFail($id);
        $bayi->Nama_Bayi = $request['nama_bayi'];
        $bayi->Tgl_lahir = $request['tgl_lahir'];
        $bayi->Jenis_kelamin = $request['jenis_kelamin'];
        $bayi->Berat_lahir = $request['berat_lahir'];
        $bayi->Panjang_lahir = $request['panjang_lahir'];
        $bayi->lingkar_kepala = $request['lingkar_kepala'];
        $bayi->Anak_ke = $request['anak_ke'];
        
        $bayi->update();

        Alert::success('Update Data Bayi', 'Berhasil Update Data');
        return redirect('/bayi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bayi  $bayi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Bayi::destroy($bayi->id);
        // return redirect('/');
        // $ibu_hamil = Bayi::findOrFail($id);
        // $ibu_hamil->delete();
        return back();
    }

    public function export_excel()
    {
        return Excel::download(new BayiExport, 'bayi.xlsx');
    }
}
