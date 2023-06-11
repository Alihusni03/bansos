@extends('dashboard.layouts.main')

    @section('container')
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Kelola kebutuhan</h1>
      </div>

      @if(session()->has('success'))
        <div class="alert alert-success" role="alert">
          {{ session('success') }}
        </div>
      @endif

      <div class="table-responsive">
        <a href="/dashboard/kebutuhan/create" class="btn btn-success mb-3">Tambah kebutuhan</a>
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Nama Program</th>
              <th scope="col">Perbulan</th>
              <th scope="col">Pertahun</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
          @foreach ($kebutuhans as $kebutuhan)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $kebutuhan->program }}</td>
              <td>{{ $kebutuhan->perbulan }}</td>
              <td>{{ $kebutuhan->pertahun }}</td>
              <td>
                <!-- <a href="/dashboard/kebutuhan/{{$kebutuhan->id}}" class="badge bg-info"><span data-feather="eye"></span></a> -->
                <!-- <a href="/dashboard/kebutuhan/{{$kebutuhan->id}}/edit" class="badge bg-warning"><span data-feather="edit"></span></a> -->
                <form action="/dashboard/kebutuhan/{{$kebutuhan->id}}" method="post" class="d-inline">
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
