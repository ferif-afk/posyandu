@extends('layouts.admin-sidebar')
@section('title')
<title>Admin Kader</title>
@endsection
@section('content')

<div class="d-flex align-items-center justify-content-between">
  <form method="get" action="/admin/kader" role="search" class="app-search hidden-xs" >
    @csrf
    <input type="text" name="search" placeholder="Search..." style="border-color: #99c1ff; padding: 8px; padding-left: 20px; border-radius: 20px;" title="Tekan Enter untuk mencari"> 
    <a class="material-icons p-2 bg-info text-white rounded" href="{{ route('admin.kader.create') }}">post_add</a>
  </form>

  <a href="{{ route('admin.kader.export_excel') }}" class="btn btn-success my-3" target="_blank">EXPORT EXCEL</a>
</div>

<table class="table ">
  <thead>
    <tr>
      <th>No</th>
      <th>Nama Kader</th>
      <th>Jabatan</th>
      <th>Jenis kelamin</th>
      <th>Tgl lahir</th>
      <th>Alamat</th>
      <th>No telp</th>
      <th colspan="2" class="text-center">AKSI</th>
    </tr>
  </thead>
  <tbody>
    @foreach($kader as $kd)
    <tr>
      <td>{{ $kd->id_kader}}</td>
      <td>{{ $kd->nama_kader }}</td>
      <td>{{ $kd->jabatan }}</td>
      <td>{{ $kd->jenis_kelamin }}</td>
      <td>{{ $kd->tgl_lahir }}</td>
      <td>{{ $kd->alamat }}</td>
      <td>{{ $kd->no_telp }}</td>
      <td><a class="material-icons text-white bg-primary rounded p-1" href="{{ route('admin.kader.edit', $kd->id_kader) }}">mode</a></td>
      <td>
        <form action="{{ route('admin.kader.destroy', $kd->id_kader) }}" method="POST" onsubmit="return confirm('Yakin hapus data ?');">
          <input type="hidden" name="_method" value="DELETE">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <button class="material-icons text-white bg-danger rounded p-1 border-0">delete</button>
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
<span class="text-center">{{ $kader->links() }}</span>


@endsection
