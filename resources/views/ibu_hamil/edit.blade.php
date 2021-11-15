@extends('layouts.sidebar')
@section('title')
<title>Ibu Hamil | Edit</title>
@endsection

@section('content')

    <h3>Edit Page | Ibu Hamil</h3>
    <form action="{{ route('update-bumil', $ibu_hamil->id_bumil) }}" class="d-flex flex-column" method="POST">
        @csrf
        @method('PUT')
        <label for="nama_bumil">Nama</label>
        <input type="text" class="col-6 rounded border-info" name="nama_bumil" value="{{ $ibu_hamil->nama_bumil }}">
    
        <label for="tgl_lahir">Tanggal Lahir</label>
        <input type="date" class="col-6 rounded border-info" name="tgl_lahir" value="{{ $ibu_hamil->tgl_lahir }}">
    
        <label for="gol_darah">Golongan Darah</label>
        <input type="text" class="col-6 rounded border-info" name="gol_darah" value="{{ $ibu_hamil->gol_darah }}">
    
        <label for="pekerjaan">Pekerjaan</label>
        <input type="text" class="col-6 rounded border-info" name="pekerjaan" value="{{ $ibu_hamil->pekerjaan }}">
    
        <label for="alamat">Alamat</label>
        <input type="text" class="col-6 rounded border-info" name="alamat" value="{{ $ibu_hamil->alamat }}">
    
        <label for="no_telp">No. Telephone</label>
        <input type="text" class="col-6 rounded border-info" name="no_telp" value="{{ $ibu_hamil->no_telp }}">
    
        <label for="nama_suami">Nama Suami</label>
        <input type="text" class="col-6 rounded border-info" name="nama_suami" value="{{ $ibu_hamil->nama_suami }}">

        <div class="d-flex justify-content-center mt-4">
            <button class="col-4 bg-primary text-white font-weight-bold rounded border-0">Simpan Perubahan</button>
        </div>
    </form>

@endsection