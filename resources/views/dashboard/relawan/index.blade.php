@extends('dashboard.layouts.main')

    @section('container')
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Kelola Relawan</h1>
      </div>

      @if(session()->has('success'))
        <div class="alert alert-success" role="alert">
          {{ session('success') }}
        </div>
      @endif

      <div class="table-responsive">
        <a href="/dashboard/relawan/create" class="btn btn-success mb-3">Tambah Relawan</a>
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Nama</th>
              <th scope="col">Jenis Kelamin</th>
              <th scope="col">Agama</th>
              <th scope="col">No Wa</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($relawans as $relawan)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $relawan->nama }}</td>
              <td>{{ $relawan->jenis_kelamin->name }}</td>
              <td>{{ $relawan->agama->name }}</td>
              <td>{{ $relawan->nowa }}</td>
              <td>
                <a href="/dashboard/relawan/{{$relawan->id}}" class="badge bg-info"><span data-feather="eye"></span></a>
                <a href="/dashboard/relawan/{{$relawan->id}}/edit" class="badge bg-warning"><span data-feather="edit"></span></a> 
                <form action="/dashboard/relawan/{{$relawan->id}}" method="post" class="d-inline"> 
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
