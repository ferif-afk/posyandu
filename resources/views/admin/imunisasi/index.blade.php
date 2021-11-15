@extends('layouts.admin-sidebar')
@section('title')
<title>Admin Imunisasi</title>
@endsection
@section('content')

<div class="d-flex align-items-center justify-content-between">
  <form method="get" action="/admin/imunisasi" role="search" class="app-search hidden-xs">
    @csrf
    <input type="text" name="search" placeholder="Search..." style="border-color: #99c1ff; padding: 8px; padding-left: 20px; border-radius: 20px;" title="Tekan Enter untuk mencari"> 
    <a class="material-icons p-2 bg-info text-white rounded" href="{{ route('admin.imunisasi.create') }}">post_add</a>
  </form>

  <a href="{{ route('admin.imunisasi.export_excel') }}" class="btn btn-success my-3" target="_blank">EXPORT EXCEL</a>
</div>

<table class="table">
    <thead>
        <tr>
            <th>No</th>
            <th>Tgl imunisasi</th>
            <th>Umur sekarang</th>
            <th>Keterangan</th>
            <th>Jenis</th>
            <th colspan="2" class="text-center">AKSI</th>
        </tr>
        @foreach($imunisasi as $imu)
        <tr>
          <td>{{ $imu->id_imunisasi}}</td>
          <td>{{ $imu->tgl_imunisasi }}</td>
          <td>{{ $imu->umur_skr }}</td>
          <td>{{ $imu->ket }}</td>
          <td>{{ $imu->jenis_id }}</td>
          <td class="text-center"><a class="material-icons text-white bg-primary rounded p-1" href="{{ route('admin.imunisasi.edit', $imu->id_imunisasi) }}">mode</a></td>
          <td class="text-center">
            <form action="{{ route('admin.imunisasi.destroy', $imu->id_imunisasi) }}" method="POST" onsubmit="return confirm('Yakin hapus data ?');">
              <input type="hidden" name="_method" value="DELETE">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <button class="material-icons text-white bg-danger rounded p-1 border-0">delete</button>
            </form>
          </td>
        </tr>
        @endforeach
    </thead>
</table>
<span class="text-center">{{ $imunisasi->links() }}</span>

@endsection
