@extends('layouts.admin-sidebar')
@section('title')
<title>Ibu Hamil | Create</title>
@endsection

@section('content')

    <h3>Create Page | Ibu Hamil</h1>
    <form action="{{ route('admin.ibuhamil.store') }}" class="d-flex flex-column" method="POST">
        @csrf
        <label for="nik">NIK</label>
        <input type="text" name="nik" class="col-6 rounded border-info" required>

        <label for="nama_bumil">Nama</label>
        <input type="text" class="col-6 rounded border-info" name="nama_bumil" required>
    
        <label for="tgl_lahir">Tanggal Lahir</label>
        <input type="date" class="col-6 rounded border-info" name="tgl_lahir" required>
    
        <label for="gol_darah">Golongan Darah</label>
        <input type="text" class="col-6 rounded border-info" name="gol_darah" required>

        <label for="urutan_kehamilan">Kehamilan Ke</label>
        <input type="text" name="urutan_kehamilan" class="col-6 rounded border-info" required>
    
        <label for="pekerjaan">Pekerjaan</label>
        <input type="text" class="col-6 rounded border-info" name="pekerjaan">
    
        <label for="alamat">Alamat</label>
        <input type="text" class="col-6 rounded border-info" name="alamat" required>
    
        <label for="no_telp">No. Telephone</label>
        <input type="text" class="col-6 rounded border-info" name="no_telp" required>
    
        <label for="nama_suami">Nama Suami</label>
        <input type="text" class="col-6 rounded border-info" name="nama_suami">

        <div class="d-flex justify-content-center mt-4">
            <button class="col-4 bg-success text-white font-weight-bold rounded border-0">Simpan Data</button>
        </div>
    </form>

@endsection