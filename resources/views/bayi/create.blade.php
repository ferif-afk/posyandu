@extends('layouts.sidebar')
@section('title')
<title>Balita | Create</title>
@endsection

@section('content')

    <h3>Create Page | Balita</h1>
    <form action="{{ route('store-bayi') }}" class="d-flex flex-column" method="POST">
        @csrf
        <label for="nama_bayi">Nama</label>
        <input type="text" class="col-6 rounded border-info" name="nama_bayi">

        <label for="tgl_lahir">Tanggal Lahir</label>
        <input type="date" class="col-6 rounded border-info" name="tgl_lahir">

        <label for="jenis_kelamin">Jenis Kelamin</label>
        <select name="jenis_kelamin" class="col-6 rounded border-info" required>
            <option value="Laki-laki">Laki - Laki</option>
            <option value="Perempuan">Perempuan</option>
        </select>

        <label for="berat_lahir">Berat Lahir</label>
        <input type="text" class="col-6 rounded border-info" name="berat_lahir">

        <label for="panjang_lahir">Panjang Lahir</label>
        <input type="text" class="col-6 rounded border-info" name="panjang_lahir">

        <label for="lingkar_kepala">Lingkar Kepala</label>
        <input type="text" class="col-6 rounded border-info" name="lingkar_kepala" required>

        <label for="anak_ke">Anak Ke</label>
        <input type="text" class="col-6 rounded border-info" name="anak_ke">

        <div class="d-flex justify-content-center mt-4">
            <button class="col-4 bg-success text-white font-weight-bold rounded border-0">Simpan Data</button>
        </div>
    </form>

@endsection