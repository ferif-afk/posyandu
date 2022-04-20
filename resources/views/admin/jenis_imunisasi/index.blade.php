@extends('layouts.admin-sidebar')
@section('title')
<title>Jenis Imunisasi</title>
@endsection
@section('content')

<div class="d-flex align-items-center justify-content-between">
    <form method="get" action="/admin/jenisimunisasi" role="search" class="app-search hidden-xs" >
        @csrf
        <input type="text" name="search" placeholder="Search..." style="border-color: #99c1ff; padding: 8px; padding-left: 20px; border-radius: 20px;" title="Tekan Enter untuk mencari"> 
        <a class="material-icons p-2 bg-info text-white rounded" href="{{ route('admin.jenisimunisasi.create') }}">post_add</a>
    </form>

    <a href="{{ route('admin.jenisimunisasi.export_excel') }}" class="btn btn-success my-3" target="_blank">EXPORT EXCEL</a>
</div>

<table class="table ">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Balita</th>
            <th>Nama Imunisasi</th>
            <th>Keterangan</th>
            <th colspan="2" class="text-center">AKSI</th>
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
            <td class="text-center"><a class="material-icons text-white bg-primary rounded p-1" href="{{ route('admin.jenisimunisasi.edit', $ji->id_jenis) }}">mode</a></td>
            <td class="text-center">
              <form action="{{ route('admin.jenisimunisasi.destroy', $ji->id_jenis) }}" method="POST" onsubmit="return confirm('Yakin hapus data ?');">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <button class="material-icons text-white bg-danger rounded p-1 border-0">delete</button>
              </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<span class="text-center">{{ $jenisimunisasi->links() }}</span>

@endsection
