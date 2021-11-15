<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bayi;
use RealRashid\SweetAlert\Facades\Alert;
use App\Exports\BayiExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Auth;

class BayiController extends Controller
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
        $bayi = Bayi::when($request->search, function ($query) use ($request) {
            $query->where('id_bayi', 'LIKE', "%{$request->search}%")
                    ->orWhere('nama_bayi', 'LIKE', "%{$request->search}%")
                    ->orWhere('tgl_lahir', 'LIKE', "%{$request->search}%")
                    ->orWhere('jenis_kelamin', 'LIKE', "%{$request->search}%")
                    ->orWhere('berat_lahir', 'LIKE', "%{$request->search}%")
                    ->orWhere('panjang_lahir', 'LIKE', "%{$request->search}%")
                    ->orWhere('anak_ke', 'LIKE', "%{$request->search}%");;
        })->simplePaginate(5);

        return view('admin.bayi.index',compact('bayi'));
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
        return view('admin.bayi.create');
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
        $bayi = new Bayi;
        $bayi->nama_bayi = $request->nama_bayi;
        $bayi->tgl_lahir = $request->tgl_lahir;
        $bayi->jenis_kelamin = $request->jenis_kelamin;
        $bayi->berat_lahir = $request->berat_lahir;
        $bayi->panjang_lahir = $request->panjang_lahir;
        $bayi->anak_ke = $request->anak_ke;

        $bayi->save();

        Alert::success('Tambah Data Bayi', 'Berhasil Tambah Data');
        return redirect('/admin/bayi');
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
        $babies = Bayi::findOrFail($id);

        return view('admin.bayi.edit', compact('babies'));
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
        $bayi = Bayi::findOrFail($id);
        $bayi->nama_bayi = $request->nama_bayi;
        $bayi->tgl_lahir = $request->tgl_lahir;
        $bayi->jenis_kelamin = $request->jenis_kelamin;
        $bayi->berat_lahir = $request->berat_lahir;
        $bayi->panjang_lahir = $request->panjang_lahir;
        $bayi->anak_ke = $request->anak_ke;

        $bayi->update();

        Alert::success('Update Data Bayi', 'Berhasil Update Data');
        return redirect('/admin/bayi');
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
        Bayi::destroy($id);

        Alert::success('Delete Data Bayi', 'Berhasil Delete Data');
        return back();
    }

    public function export_excel()
    {
        if ($user = Auth::user()->role !== 'admin') {
            return redirect('/');
        }
         return Excel::download(new BayiExport, 'bayi.xlsx');
    }
}
