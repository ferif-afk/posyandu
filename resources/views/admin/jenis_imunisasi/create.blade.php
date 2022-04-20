@extends('layouts.admin-sidebar')
@section('title')
<title>Jenis Imunisasi | Create</title>
@endsection

@section('content')

<h3>Create Page | Jenis Imunisasi</h3>
<form action="{{ route('admin.jenisimunisasi.store') }}" class="d-flex flex-column" method="POST">
    @csrf
    <label for="nama_balita">Nama Balita</label>
    <input type="text" name="nama_balita" class="col-6 rounded border-info" required>

    <label for="nama_imunisasi">Nama Imunisasi</label>
    <select name="nama_imunisasi" class="col-6 rounded border-info" required>
        <option value="hepatitis">Hepatitis</option>
        <option value="polio tetes 1">Polio Tetes 1</option>
        <option value="polio tetes 2">Polio Tetes 2</option>
        <option value="polio tetes 3">Polio Tetes 3</option>
        <option value="polio suntik">Polio Suntik</option>
        <option value="campak rubella">Campak Rubella</option>
    </select>

    <label for="keterangan">Keterangan</label>
    <select name="keterangan" class="col-6 rounded border-info" required>
        <option value="Imunisasi">Imunisasi</option>
        <option value="Belum">Belum</option>
    </select>

    <div class="d-flex justify-content-center mt-4">
        <button class="col-4 bg-success text-white font-weight-bold rounded border-0">Simpan Data</button>
    </div>
</form>

@endsection