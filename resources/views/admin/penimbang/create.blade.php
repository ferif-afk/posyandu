@extends('layouts.admin-sidebar')
@section('title')
<title>Penimbang | Create</title>
@endsection

@section('content')

    <h3>Create Page | Penimbang</h1>
    <form action="{{ route('admin.penimbang.store') }}" class="d-flex flex-column" method="POST">
        @csrf
        <label for="nama_balita">Nama Balita</label>
        <input type="text" class="col-6 rounded border-info" name="nama_balita" required>

        <label for="tgl_lahir">Tanggal Lahir</label>
        <input type="date" class="col-6 rounded border-info" name="tgl_lahir" required>

        <label for="hasil_timbang">Hasil Timbang</label>
        <input type="text" class="col-6 rounded border-info" name="hasil_timbang" required>
    
        <label for="tinggi_badan">Tinggi Badan</label>
        <input type="text" class="col-6 rounded border-info" name="tinggi_badan" required>
    
        <label for="status">Status</label>
        <select name="status" class="col-6 rounded border-info" required>
            <option value="Sehat">Sehat</option>
            <option value="Sakit">Sakit</option> 
        </select>
    
        <div class="d-flex justify-content-center mt-4">
            <button class="col-4 bg-success text-white font-weight-bold rounded border-0">Simpan Data</button>
        </div>
    </form>

@endsection