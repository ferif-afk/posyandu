@extends('layouts.sidebar')
@section('title')
<title>Ibu Hamil</title>
@endsection
@section('content')

<div class="d-flex align-items-center justify-content-between">
  <form method="get" action="/ibuhamil" role="search" class="app-search hidden-xs">
    @csrf
    <input type="text" name="search" placeholder="Search..." style="border-color: #99c1ff; padding: 8px; padding-left: 20px; margin-right: 10px; border-radius: 20px;" title="Tekan Enter untuk mencari"> 
    <a class="material-icons p-2 bg-info text-white rounded" href="/ibuhamil/create">post_add</a>
  </form>

  <a href="/ibuhamil/export_excel" class="btn btn-success my-3" target="_blank">EXPORT EXCEL</a>
</div>

<table class="table ">
  <thead>
    <tr>
      <th>No</th>
      <th>NIK</th>
      <th>Nama Bumil</th>
      <th>tgl Lahir</th>
      <th>Gol Darah</th>
      <th>Kehamilan Ke</th>
      <th>Pekerjaan</th>
      <th>Alamat</th>
      <th>No Telp</th>
      <th>Nama Suami</th>
      <th>AKSI</th>
    </tr>
  </thead>
  <tbody>
    @foreach($ibu_hamil as $bumil)
    <tr>
        <td>{{ $bumil->id_bumil}}</td>
        <td>
          @if($bumil->nik == '')
            <span class="text-danger">No NIK<span>
          @endif
          {{ $bumil->nik }}
        </td>
        <td>{{ $bumil->nama_bumil }}</td>
        <td>{{ $bumil->tgl_lahir }}</td>
        <td>{{ $bumil->gol_darah }}</td>
        <td>{{ $bumil->urutan_kehamilan }}</td>
        <td>{{ $bumil->pekerjaan }}</td>
        <td>{{ $bumil->alamat }}</td>
        <td>{{ $bumil->no_telp }}</td>
        <td>{{ $bumil->nama_suami }}</td>
        <td><a class="material-icons text-white bg-primary rounded p-1" href="{{ route('edit-bumil', $bumil->id_bumil) }}">mode</a></td>
    </tr>
    @endforeach
  </tbody>
</table>
<span class="text-center">{{ $ibu_hamil->links() }}</span>

@endsection
