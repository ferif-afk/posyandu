@extends('layouts.admin-sidebar')
@section('title')
<title>Timbangan</title>
@endsection
@section('content')

<div class="d-flex align-items-center justify-content-between">
    <form method="get" action="/admin/penimbang" role="search" class="app-search hidden-xs">
        @csrf
        <input type="text" name="search" placeholder="Search..." style="border-color: #99c1ff; padding: 8px; padding-left: 20px; border-radius: 20px;" title="Tekan Enter untuk mencari"> 
        <a class="material-icons p-2 bg-info text-white rounded" href="{{ route('admin.penimbang.create') }}">post_add</a>
    </form>

    <a href="{{ route('admin.penimbang.export_excel') }}" class="btn btn-success my-3" target="_blank">EXPORT EXCEL</a>
</div>

<table class="table ">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Balita</th>
            <th>Tgl lahir</th>
            <th>Hasil timbang</th>
            <th>Tinggi badan</th>
            <th>Status</th>
            <th colspan="2" class="text-center">AKSI</th>
        </tr>
        @foreach($penimbangan as $pb)
        <tr>
            <td>{{ $pb->id_timbang}}</td>
            <td>
                @if($pb->nama_balita == '')
                    No Name
                @endif
                {{ $pb->nama_balita }}
            </td>
            <td>{{ $pb->tgl_lahir }}</td>
            <td>{{ $pb->hasil_timbang }}</td>
            <td>{{ $pb->tinggi_badan }}</td>
            <td>{{ $pb->status }}</td>
            <td class="text-center"><a class="material-icons text-white bg-primary rounded p-1" href="{{ route('admin.penimbang.edit', $pb->id_timbang) }}">mode</a></td>
            <td class="text-center">
                <form action="{{ route('admin.penimbang.destroy', $pb->id_timbang) }}" method="POST" onsubmit="return confirm('Yakin hapus data ?');">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <button class="material-icons text-white bg-danger rounded p-1 border-0">delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </thead>
</table>
<span class="text-center">{{ $penimbangan->links() }}</span>

@endsection
