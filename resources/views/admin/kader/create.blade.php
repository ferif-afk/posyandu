@extends('layouts.admin-sidebar')
@section('title')
<title>Kader | Create</title>
@endsection
@section('content')

<h3>Admin Create Page | Kader</h3>
<form action="{{ route('admin.kader.store') }}" class="d-flex flex-column" method="POST">
    @csrf
    <label for="nama_kader">Nama</label>
    <input type="text" class="col-6 rounded border-info" name="nama_kader" required>

    <label for="jabatan">Jabatan</label>
    <select name="jabatan" class="col-6 rounded border-info" required>
        <option value="Ketua Kader">Ketua Kader</option>
        <option value="Kader">Kader</option>
    </select>

    <label for="jenis_kelamin">Jenis Kelamin</label>
    <select name="jenis_kelamin" class="col-6 rounded border-info" required>
        <option value="Laki-laki">Laki - Laki</option>
        <option value="Perempuan">Perempuan</option>
    </select>

    <label for="tgl_lahir">Tanggal Lahir</label>
    <input type="date" class="col-6 rounded border-info" name="tgl_lahir" required>

    <label for="alamat">Alamat</label>
    <input type="text" class="col-6 rounded border-info" name="alamat" required>

    <label for="no_telp">No. Telephone</label>
    <input type="text" class="col-6 rounded border-info" name="no_telp" required>

    <div class="d-flex justify-content-center mt-4">
        <button class="col-4 bg-success text-white font-weight-bold rounded border-0">Simpan Data</button>
    </div>
</form>

@endsection