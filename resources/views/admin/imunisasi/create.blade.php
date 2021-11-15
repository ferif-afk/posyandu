@extends('layouts.admin-sidebar')
@section('title')
<title>Admin Imunisasi | Create</title>
@endsection

@section('content')

    <h3>Create Page | Imunisasi</h3>
    <form action="{{ route('admin.imunisasi.store') }}" class="d-flex flex-column" method="POST">
        @csrf
        <label for="tgl_imunisasi">Tanggal Imunisasi</label>
        <input type="date" class="col-6 rounded border-info" name="tgl_imunisasi">
    
        <label for="umur_skr">Umur Saat Ini</label>
        <input type="text" class="col-6 rounded border-info" name="umur_skr">
    
        <label for="keterangan">Keterangan</label>
        <select name="keterangan" class="col-6 rounded border-info" required>
            <option value="Sehat">Sehat</option>
            <option value="Sakit">Sakit</option>
        </select>

        <label for="jenis_id">ID Jenis Imunisasi</label>
        <input type="text" class="col-6 rounded border-info" name="jenis_id" required>
    
        <div class="d-flex justify-content-center mt-4">
            <button class="col-4 bg-primary text-white font-weight-bold rounded border-0">Simpan Perubahan</button>
        </div>
    </form>

@endsection