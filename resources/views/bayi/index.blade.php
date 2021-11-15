@extends('layouts.sidebar')
@section('title')
<title>Balita</title>
@endsection
@section('content')

  <div class="d-flex align-items-center justify-content-between">
    <form method="get" action="/bayi" role="search" class="app-search hidden-xs" >
      @csrf
      <input type="text" name="search" placeholder="Search..." style="border-color: #99c1ff; padding: 8px; padding-left: 20px; border-radius: 20px;" title="Tekan Enter untuk mencari"> 
      <a class="material-icons p-2 bg-info text-white rounded" href="/bayi/create">post_add</a>
    </form>

    <a href="/bayi/export_excel" class="btn btn-success my-3" target="_blank">EXPORT EXCEL</a>
  </div>

  <table class="table ">
      <thead>
          <tr>
              <th>No</th>
              <th>Nama Bayi</th>
              <th>tgl Lahir</th>
              <th>Jenis kelamin</th>
              <th>Berat lajir</th>
              <th>Panjang lahir</th>
              <th>Anak ke</th>
              <th>AKSI</th>
          </tr>
          @foreach($bayi as $by)
          <tr>
              <td>{{ $by->id_bayi}}</td>
              <td>{{ $by->nama_bayi }}</td>
              <td>{{ $by->tgl_lahir }}</td>
              <td>{{ $by->jenis_kelamin }}</td>
              <td>{{ $by->berat_lahir }}</td>
              <td>{{ $by->panjang_lahir }}</td>
              <td>{{ $by->anak_ke }}</td>
              <td><a class="material-icons text-white bg-primary rounded p-1" href="{{ route('edit-bayi', $by->id_bayi) }}">mode</a></td>
          </tr>
          @endforeach
      </thead>
  </table>
  <span class="text-center">{{ $bayi->links() }}</span>

@endsection
