@extends('layouts.sidebar')
@section('title')
<title>Imunisasi | Edit</title>
@endsection

@section('content')

    <h3>Edit Page | Imunisasi</h3>
    <form action="#" class="d-flex flex-column">   
        <label for="tgl_imunisasi">Tanggal Imunisasi</label>
        <input type="date" class="col-6 rounded border-info" name="nama_bumil" value="{{ $imunisasi['tgl_imunisasi'] }}">
    
        <label for="umur_skr">Umur Saat Ini</label>
        <input type="text" class="col-6 rounded border-info" name="umur_skr" value="{{ $imunisasi['umur_skr'] }}">
    
        <label for="keterangan">Keterangan</label>
        <select name="keterangan" class="col-6 rounded border-info">
            <option value="{{ $imunisasi['ket'] }}">{{ $imunisasi['ket'] }}</option>
            @if($imunisasi['ket'] == 'Sehat')
                <option value="Sakit">Sakit</option>
            @endif
            @if($imunisasi['ket'] == 'Sakit')
                <option value="Sehat">Sehat</option>
            @endif
        </select>
    
        <div class="d-flex justify-content-center mt-4">
            <button class="col-4 bg-primary text-white font-weight-bold rounded border-0">Simpan Perubahan</button>
        </div>
    </form>

@endsection