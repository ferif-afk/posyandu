@extends('layouts.sidebar')
@section('title')
<title>Jenis Imunisasi | Edit</title>
@endsection

@section('content')

<h3>Edit Page | Jenis Imunisasi</h3>
<form action="#" class="d-flex flex-column">
    <label for="id_jenis">ID : {{ $jenisimunisasi->id_jenis }}</label>

    <label for="nama_imunisasi">Nama Imunisasi</label>
    <input type="text" class="col-6 rounded border-info" name="nama_imunisasi" value="{{ $jenisimunisasi->nama_imunisasi }}">

    <label for="keterangan">Keterangan</label>
    <select name="keterangan" class="col-6 rounded border-info" required>
        <option value="{{ $jenisimunisasi->ket }}">{{ $jenisimunisasi->ket }}</option>
        @if($jenisimunisasi->ket == 'Belum')
            <option value="Imunisasi">Imunisasi</option>
        @endif
        @if($jenisimunisasi->ket == 'Imunisasi')
            <option value="Belum">Belum</option>
        @endif
    </select>

    <div class="d-flex justify-content-center mt-4">
        <button class="col-4 bg-primary text-white font-weight-bold rounded border-0">Simpan Perubahan</button>
    </div>
</form>

@endsection