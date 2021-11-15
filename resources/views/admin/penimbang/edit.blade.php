@extends('layouts.admin-sidebar')
@section('title')
<title>Penimbang | Details</title>
@endsection

@section('content')

    <h3>Details Page | Penimbang</h3>
    <form action="{{ route('admin.penimbang.update', $penimbang->id_timbang) }}" class="d-flex flex-column" method="POST">
        @csrf
        @method('PUT')
        <label for="tgl_lahir">Tanggal Lahir</label>
        <input type="date" class="col-6 rounded border-info" name="tgl_lahir" value="{{ $penimbang->tgl_lahir }}">
    
        <label for="hasil_timbang">Hasil Timbang</label>
        <input type="text" class="col-6 rounded border-info" name="hasil_timbang" value="{{ $penimbang->hasil_timbang }}">
    
        <label for="tinggi_badan">Tinggi Badan</label>
        <input type="text" class="col-6 rounded border-info" name="tinggi_badan" value="{{ $penimbang->tinggi_badan }}">
    
        <label for="status">Status</label>
        <select name="status" class="col-6 rounded border-info">
            <option value="{{ $penimbang->status }}">{{ $penimbang->status }}</option>
            @if($penimbang->status == 'Sehat')
                <option value="Sakit">Sakit</option>
            @endif
            @if($penimbang->status == 'Sakit')
                <option value="Sehat">Sehat</option>
            @endif
        </select>
    
        <div class="d-flex justify-content-center mt-4">
            <button class="col-4 bg-primary text-white font-weight-bold rounded border-0">Simpan Perubahan</button>
        </div>
    </form>

@endsection