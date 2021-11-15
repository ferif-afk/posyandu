@extends('layouts.sidebar')
@section('title')
<title>Balita | Edit</title>
@endsection

@section('content')

<h3>Edit Page | Balita</h3>
<form action="{{ route('update-bayi', $babies->id_bayi) }}" class="d-flex flex-column" method="POST">
    @csrf
    @method('PUT')
    <label for="nama_bayi">Nama</label>
    <input type="text" class="col-6 rounded border-info" name="nama_bayi" value="{{ $babies->nama_bayi}}">

    <label for="tgl_lahir">Tanggal Lahir</label>
    <input type="date" class="col-6 rounded border-info" name="tgl_lahir" value="{{ $babies->tgl_lahir}}">

    <label for="jenis_kelamin">Jenis Kelamin</label>
    <select name="jenis_kelamin" class="col-6 rounded border-info" required>
        <option value="{{ $babies->jenis_kelamin }}">{{ $babies->jenis_kelamin }}</option>
        @if($babies->jenis_kelamin == 'Laki-laki')
            <option value="Perempuan">Perempuan</option>
        @endif
        @if($babies->jenis_kelamin == 'Perempuan')
            <option value="Laki-laki">Laki - Laki</option>
        @endif
    </select>

    <label for="berat_lahir">Berat Lahir</label>
    <input type="text" class="col-6 rounded border-info" name="berat_lahir" value="{{ $babies->berat_lahir }}">

    <label for="panjang_lahir">Panjang Lahir</label>
    <input type="text" class="col-6 rounded border-info" name="panjang_lahir" value="{{ $babies->panjang_lahir }}">

    <label for="anak_ke">Anak Ke</label>
    <input type="text" class="col-6 rounded border-info" name="anak_ke" value="{{ $babies->anak_ke }}">

    <div class="d-flex justify-content-center mt-4">
        <button class="col-4 bg-success text-white font-weight-bold rounded border-0">Simpan Data</button>
    </div>
</form>

@endsection