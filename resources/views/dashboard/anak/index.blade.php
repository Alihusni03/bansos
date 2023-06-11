@extends('dashboard.layouts.main')

    @section('container')
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Kelola anak</h1>
      </div>

      @if(session()->has('success'))
        <div class="alert alert-success" role="alert">
          {{ session('success') }}
        </div>
      @endif

      <div class="table-responsive">
        <a href="/dashboard/anak/create" class="btn btn-success mb-3">Tambah anak</a>
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Nama</th>
              <th scope="col">Alamat</th>
              <th scope="col">Jenis Kelamin</th>
              <th scope="col">Sekolah</th>
              <th scope="col">Status</th>
              <th scope="col">Lokasi</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($anaks as $anak)
            <tr>
              <td>{{ $loop->iteration }}</td> 
              <td>{{ $anak->name }}</td>
              <td>{{ $anak->alamat }}</td>
              <td>{{ $anak->jenis_kelamin->name }}</td>
              <td>{{ $anak->sekolah }}</td>
              <td>{{ $anak->status->name }}</td>
              <td>{{ $anak->lokasi->name }}</td>
              <td>
                <!-- <a href="/dashboard/anak/{{$anak->id}}" class="badge bg-info"><span data-feather="eye"></span></a> -->
                <!-- <a href="/dashboard/anak/{{$anak->id}}/edit" class="badge bg-warning"><span data-feather="edit"></span></a> -->
                <form action="/dashboard/anak/{{$anak->id}}" method="post" class="d-inline">
                  @method('delete')
                  @csrf
                  <button class="badge bg-danger border-0" onclick="return confirm('Apakah kamu yakin?')"><span data-feather="trash"></button>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    @endsection
