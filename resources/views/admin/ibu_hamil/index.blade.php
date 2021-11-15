@extends('layouts.admin-sidebar')
@section('title')
<title>Ibu Hamil</title>
@endsection
@section('content')

<div class="d-flex align-items-center justify-content-between">
  <form method="get" action="/admin/ibuhamil" role="search" class="app-search hidden-xs">
    @csrf
    <input type="text" name="search" placeholder="Search..." style="border-color: #99c1ff; padding: 8px; padding-left: 20px; margin-right: 10px; border-radius: 20px;" title="Tekan Enter untuk mencari"> 
    <a class="material-icons p-2 bg-info text-white rounded" href="{{ route('admin.ibuhamil.create') }}">post_add</a>
  </form>
  
  <a href="{{ route('admin.ibuhamil.export_excel') }}" class="btn btn-success my-3" target="_blank">EXPORT EXCEL</a>
</div>

<table class="table ">
  <thead>
    <tr>
      <th>No</th>
      <th>Nama Bumil</th>
      <th>tgl Lahir</th>
      <th>Gol Darah</th>
      <th>Pekerjaan</th>
      <th>Alamat</th>
      <th>No Telp</th>
      <th>Nama Suami</th>
      <th colspan="2" class="text-center">AKSI</th>
    </tr>
  </thead>
  <tbody>
    @foreach($ibu_hamil as $bumil)
    <tr>
        <td>{{ $bumil->id_bumil}}</td>
        <td>{{ $bumil->nama_bumil }}</td>
        <td>{{ $bumil->tgl_lahir }}</td>
        <td>{{ $bumil->gol_darah }}</td>
        <td>{{ $bumil->pekerjaan }}</td>
        <td>{{ $bumil->alamat }}</td>
        <td>{{ $bumil->no_telp }}</td>
        <td>{{ $bumil->nama_suami }}</td>
        <td><a class="material-icons text-white bg-primary rounded p-1" href="{{ route('admin.ibuhamil.edit', $bumil->id_bumil) }}">mode</a></td>
        <td>
          <form action="{{ route('admin.ibuhamil.destroy', $bumil->id_bumil) }}" method="POST" onsubmit="return confirm('Yakin hapus data ?');">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <button class="material-icons text-white bg-danger rounded p-1 border-0">delete</button>
  
          </form>
          
        </td>
    </tr>
    @endforeach
  </tbody>
</table>
<span class="text-center">{{ $ibu_hamil->links() }}</span>

@endsection
