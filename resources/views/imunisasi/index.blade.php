@extends('layouts.sidebar')
@section('title')
<title>Imunisasi</title>
@endsection
@section('content')

  <div class="d-flex align-items-center justify-content-between">
    <form method="get" action="/imunisasi" role="search" class="app-search hidden-xs">
      @csrf
      <input type="text" name="search" placeholder="Search..." style="border-color: #99c1ff; padding: 8px; padding-left: 20px; border-radius: 20px;" title="Tekan Enter untuk mencari"> 
      <a class="material-icons p-2 bg-info text-white rounded" href="/imunisasi/create">post_add</a>
    </form>

    <a href="/imunisasi/export_excel" class="btn btn-success my-3" target="_blank">EXPORT EXCEL</a>
  </div>

  <table class="table">
      <thead>
          <tr>
              <th>No</th>
              <th>Nama Balita</th>
              <th>Tgl imunisasi</th>
              <th>Umur sekarang</th>
              <th>Keterangan</th>
              <th>AKSI</th>
          </tr>
          @foreach($imunisasi as $imu)
          <tr>
            <td>{{ $imu->id_imunisasi}}</td>
            <td>
              @if($imu->nama_balita == '')
                No Name
              @endif
              {{ $imu->nama_balita}}
            </td>
            <td>{{ $imu->tgl_imunisasi }}</td>
            <td>{{ $imu->umur_skr }}</td>
            <td>{{ $imu->ket }}</td>
            <td><a class="material-icons text-white bg-primary rounded p-1" href="{{ route('edit-imunisasi', $imu->id_imunisasi) }}">mode</a></td>
          </tr>
          @endforeach
      </thead>
  </table>
  <span class="text-center">{{ $imunisasi->links() }}</span>

@endsection
