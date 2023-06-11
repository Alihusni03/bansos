@extends('dashboard.layouts.main')

    @section('container')
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Kelola kegiatan</h1>
      </div>

      @if(session()->has('success'))
        <div class="alert alert-success" role="alert">
          {{ session('success') }}
        </div>
      @endif

      <div class="table-responsive">
        <a href="/dashboard/kegiatan/create" class="btn btn-success mb-3">Tambah kegiatan</a>
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Nama Kegiatan</th>
              <th scope="col">Gambar Kegiatan</th>
              <th scope="col">Penjalasan Kegiatan</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
          @foreach ($kegiatans as $kegiatan)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $kegiatan->nama }}</td>
              <td><img src="{{ asset('storage/'. $kegiatan->foto) }}" height="100" width="150"></td>
              <td>{{ $kegiatan->penjelasan }}</td>
              <td>
                <!-- <a href="/dashboard/kegiatan/{{$kegiatan->id}}" class="badge bg-info"><span data-feather="eye"></span></a> -->
                <a href="/dashboard/kegiatan/{{$kegiatan->id}}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
                <form action="/dashboard/kegiatan/{{$kegiatan->id}}" method="post" class="d-inline">
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
