@extends('dashboard.layouts.main')

    @section('container')
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Riwayat</h1>
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
              <th scope="col">Email</th>
              <th scope="col">No Wa</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            
          </tbody>
        </table>
      </div>
    @endsection
