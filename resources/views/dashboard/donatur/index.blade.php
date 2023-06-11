@extends('dashboard.layouts.main')

    @section('container')
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Data Riwayat Donatur</h1>
      </div>

      @if(session()->has('success'))
        <div class="alert alert-success" role="alert">
          {{ session('success') }}
        </div>
      @endif

      <div class="table-responsive">
        <!-- <a href="/dashboard/donatur/create" class="btn btn-success mb-3">Tambah donatur</a> -->
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Nama</th>
              <th scope="col">Jenis Bansos</th>
              <th scope="col">Dalam Bentuk/Nominal</th>
              <th scope="col">Tanggal</th>
              <!-- <th scope="col">Action</th> -->
            </tr>
          </thead>
          <tbody>
          @foreach ($donaturs as $donatur)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $donatur->nama }}</td>
              <td>{{ $donatur->bansos->name }}</td>
              <td>{{ $donatur->bentuk }}</td>
              <td>{{ $donatur->created_at }}</td>
              <!-- <td>
                <a href="/dashboard/donatur/{{$donatur->id}}" class="badge bg-info"><span data-feather="eye"></span></a>
              </td> -->
            </tr>
          @endforeach
          </tbody>
        </table>
      </div>
    @endsection
