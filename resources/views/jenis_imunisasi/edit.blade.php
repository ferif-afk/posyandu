@extends('layouts.sidebar')
@section('title')
<title>Jenis Imunisasi | Edit</title>
@endsection

@section('content')

<h3>Edit Page | Jenis Imunisasi</h3>
<form action="{{ route('update-jenisimunisasi', $jenisimunisasi->id_jenis) }}" method="POST" class="d-flex flex-column">
    @csrf
    @method('PUT')
    <label for="id_jenis">ID : {{ $jenisimunisasi->id_jenis }}</label>

    <label for="nama_balita">Nama Balita</label>
    <input type="text" name="nama_balita" value="{{ $jenisimunisasi->nama_balita }}" class="col-6 rounded border-info" required>

    <label for="nama_imunisasi">Nama Imunisasi</label>
    <select name="nama_imunisasi" class="col-6 rounded border-info" required>
        <option value="{{ $jenisimunisasi->nama_imunisasi }}">
            @switch($jenisimunisasi->nama_imunisasi)
                @case('polio tetes 1')
                    Polio Tetes 1
                    @break
                @case('polio tetes 2')
                    Polio Tetes 2
                    @break
                @case('polio tetes 3')
                    Polio Tetes 3
                    @break
                @case('hepatitis')
                    Hepatitis
                    @break
                @case('polio suntik')
                    Polio Suntik
                    @break
                @default
                    Campak Rubella
            @endswitch
        </option>
        @switch($jenisimunisasi->nama_imunisasi)
            @case('hepatitis')
                <option value="polio tetes 1">Polio Tetes 1</option>
                <option value="polio tetes 2">Polio Tetes 2</option>
                <option value="polio tetes 3">Polio Tetes 3</option>
                <option value="polio suntik">Polio Suntik</option>
                <option value="campak rubella">Campak Rubella</option>
                @break
            @case('campak rubella')
                <option value="hepatitis">Hepatitis</option>
                <option value="polio tetes 1">Polio Tetes 1</option>
                <option value="polio tetes 2">Polio Tetes 2</option>
                <option value="polio tetes 3">Polio Tetes 3</option>
                <option value="polio suntik">Polio Suntik</option>
                @break
            @case('polio tetes 1')
                <option value="hepatitis">Hepatitis</option>
                <option value="polio tetes 2">Polio Tetes 2</option>
                <option value="polio tetes 3">Polio Tetes 3</option>
                <option value="polio suntik">Polio Suntik</option>
                <option value="campak rubella">Campak Rubella</option>
                @break
            @case('polio tetes 2')
                <option value="hepatitis">Hepatitis</option>
                <option value="polio tetes 1">Polio Tetes 1</option>
                <option value="polio tetes 3">Polio Tetes 3</option>
                <option value="polio suntik">Polio Suntik</option>
                <option value="campak rubella">Campak Rubella</option>
                @break
            @case('polio tetes 3')
                <option value="hepatitis">Hepatitis</option>
                <option value="polio tetes 1">Polio Tetes 1</option>
                <option value="polio tetes 2">Polio Tetes 2</option>
                <option value="polio suntik">Polio Suntik</option>
                <option value="campak rubella">Campak Rubella</option>
                @break
            @case('polio suntik')
                <option value="hepatitis">Hepatitis</option>
                <option value="polio tetes 1">Polio Tetes 1</option>
                <option value="polio tetes 2">Polio Tetes 2</option>
                <option value="polio tetes 3">Polio Tetes 3</option>
                <option value="campak rubella">Campak Rubella</option>
                @break
            @default
                <option value="hepatitis">Hepatitis</option>
                <option value="polio tetes 1">Polio Tetes 1</option>
                <option value="polio tetes 2">Polio Tetes 2</option>
                <option value="polio tetes 3">Polio Tetes 3</option>
                <option value="polio suntik">Polio Suntik</option>
                <option value="campak rubella">Campak Rubella</option>
        @endswitch
    </select>

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