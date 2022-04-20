@extends('layouts.sidebar')
@section('title')
<title>Jenis Imunisasi</title>
@endsection
@section('content')

<div class="d-flex align-items-center justify-content-between">
    <form method="get" action="/jenisimunisasi" role="search" class="app-search hidden-xs" >
        @csrf
        <input type="text" name="search" placeholder="Search..." style="border-color: #99c1ff; padding: 8px; padding-left: 20px; border-radius: 20px;" title="Tekan Enter untuk mencari"> 
        <a class="material-icons p-2 bg-info text-white rounded" href="/jenisimunisasi/create">post_add</a>
    </form>

    <a href="/jenisimunisasi/export_excel" class="btn btn-success my-3" target="_blank">EXPORT EXCEL</a>
</div>

<table class="table ">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Balita</th>
            <th>Nama Imunisasi</th>
            <th>Keterangan</th>
            <th>AKSI</th>
        </tr>
    </thead>
    <tbody>
        @foreach($jenisimunisasi as $ji)
        <tr>
            <td>{{ $ji->id_jenis}}</td>
            <td>
                @if($ji->nama_balita == '')
                    No Name
                @endif
                {{ $ji->nama_balita }}
            </td>
            <td>
            @switch($ji->nama_imunisasi)
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
            </td>
            <td>{{ $ji->ket }}</td>
            <td><a class="material-icons text-white bg-primary rounded p-1" href="{{ route('edit-jenisimunisasi', $ji->id_jenis) }}">mode</a></td>
        </tr>
        @endforeach
    </tbody>
</table>
<span class="text-center">{{ $jenisimunisasi->links() }}</span>

@endsection
