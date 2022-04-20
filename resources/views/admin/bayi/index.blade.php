@extends('layouts.admin-sidebar')
@section('title')
<title>Admin Balita</title>
@endsection
@section('content')

  <div class="d-flex align-items-center justify-content-between">
    <form method="get" action="/admin/bayi" role="search" class="app-search hidden-xs" >
      @csrf
      <input type="text" name="search" placeholder="Search..." style="border-color: #99c1ff; padding: 8px; padding-left: 20px; border-radius: 20px;" title="Tekan Enter untuk mencari"> 
      <a class="material-icons p-2 bg-info text-white rounded" href="{{ route('admin.bayi.create') }}">post_add</a>
    </form>

    <a href="{{ route('admin.bayi.export_excel') }}" class="btn btn-success my-3" target="_blank">EXPORT EXCEL</a>
  </div>

  <table class="table">
      <thead>
          <tr>
              <th>No</th>
              <th>Nama Bayi</th>
              <th>tgl Lahir</th>
              <th>Jenis kelamin</th>
              <th>Berat lajir</th>
              <th>Panjang lahir</th>
              <th>Lingkar Kepala</th>
              <th>Anak ke</th>
              <th colspan="2" class="text-center">AKSI</th>
          </tr>
          @foreach($bayi as $by)
          <tr>
              <td>{{ $by->id_bayi}}</td>
              <td>{{ $by->nama_bayi }}</td>
              <td>{{ $by->tgl_lahir }}</td>
              <td>{{ $by->jenis_kelamin }}</td>
              <td>{{ $by->berat_lahir }}</td>
              <td>{{ $by->panjang_lahir }}</td>
              <td>{{ $by->lingkar_kepala }}</td>
              <td>{{ $by->anak_ke }}</td>
              <td><a class="material-icons text-white bg-primary rounded p-1" href="{{ route('admin.bayi.edit', $by->id_bayi) }}">mode</a></td>
              <td>
                <form action="{{ route('admin.bayi.destroy', $by->id_bayi) }}" method="POST" onsubmit="return confirm('Yakin hapus data ?');">
                  <input type="hidden" name="_method" value="DELETE">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <button class="material-icons text-white bg-danger rounded p-1 border-0">delete</button>
                </form>
              </td>
          </tr>
          @endforeach
      </thead>
  </table>
  <span class="text-center">{{ $bayi->links() }}</span>

@endsection
