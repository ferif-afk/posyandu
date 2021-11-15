@extends('layouts.admin-sidebar')
@section('title')
<title>Kader | Edit</title>
@endsection
@section('content')

<h3>Admin Edit Page | Kader</h3>
<form action="{{ route('admin.kader.update', $kader->id_kader) }}" class="d-flex flex-column" method="POST">
    @csrf
    @method('PUT')
    <label for="nama_kader">Nama</label>
    <input type="text" class="col-6 rounded border-info" name="nama_kader" value="{{ $kader->nama_kader }}">

    <label for="jabatan">Jabatan</label>
    <select name="jabatan" class="col-6 rounded border-info" required>
        <option value="{{ $kader->jabatan }}">{{ $kader->jabatan }}</option>
        @if($kader->jabatan == 'Ketua Kader')
            <option value="Kader">Kader</option>
        @endif
        @if($kader->jabatan == 'Ketua')
            <option value="Ketua Kader">Ketua Kader</option>
        @endif
    </select>

    <label for="jenis_kelamin">Jenis Kelamin</label>
    <select name="jenis_kelamin" class="col-6 rounded border-info" required>
        <option value="{{ $kader->jenis_kelamin }}">{{ $kader->jenis_kelamin }}</option>
        @if($kader->jenis_kelamin == 'Laki-laki')
            <option value="Perempuan">Perempuan</option>
        @endif
        @if($kader->jenis_kelamin == 'Perempuan')
            <option value="Laki-laki">Laki - Laki</option>
        @endif
    </select>

    <label for="tgl_lahir">Tanggal Lahir</label>
    <input type="date" class="col-6 rounded border-info" name="tgl_lahir" value="{{ $kader->tgl_lahir }}">

    <label for="alamat">Alamat</label>
    <input type="text" class="col-6 rounded border-info" name="alamat" value="{{ $kader->alamat }}">

    <label for="no_telp">No. Telephone</label>
    <input type="text" class="col-6 rounded border-info" name="no_telp" value="{{ $kader->no_telp }}">

    <div class="d-flex justify-content-center mt-4">
        <button class="col-4 bg-primary text-white font-weight-bold rounded border-0">Simpan Perubahan</button>
    </div>
</form>

@endsection