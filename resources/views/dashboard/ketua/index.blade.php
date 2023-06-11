@extends('dashboard.layouts.main')

    @section('container')
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Kelola ketua</h1>
      </div>

      @if(session()->has('success'))
        <div class="alert alert-success" role="alert">
          {{ session('success') }}
        </div>
      @endif

      <div class="table-responsive">
        @if ($ketuas->isEmpty())
        <a href="/dashboard/ketua/create" class="btn btn-success mb-3">Tambah ketua</a>
        @endif
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Nama</th>
              <th scope="col">Umur</th>
              <th scope="col">Telephone</th>
              <th scope="col">Alamat</th>
              <th scope="col">Foto</th>
              <th scope="col">Bahasa</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
          @foreach ($ketuas as $ketua)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $ketua->nama }}</td>
              <td>{{ $ketua->umur }}</td>
              <td>{{ $ketua->telephone }}</td>
              <td>{{ $ketua->alamat }}</td>
              <td><img src="{{ asset('storage/'. $ketua->foto) }}" height="100" width="150"></td>
              <td>{{ $ketua->bahasa }}</td>
              <td>
                <!-- <a href="/dashboard/ketua/{{$ketua->id}}" class="badge bg-info"><span data-feather="eye"></span></a> -->
                <a href="/dashboard/ketua/{{$ketua->id}}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
                <form action="/dashboard/ketua/{{$ketua->id}}" method="post" class="d-inline">
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
