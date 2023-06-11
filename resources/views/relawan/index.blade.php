@extends('dashboard.layouts.main')

    @section('container')
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Daftar Panti</h1>
      </div>

      @if(session()->has('success'))
        <div class="alert alert-success" role="alert">
          {{ session('success') }}
        </div>
      @endif

      <div class="table-responsive">
        <a href="/relawan/create" class="btn btn-success mb-3">Tambah daftar_panti</a>
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Nama Panti Asuhan</th>
              <th scope="col">Nama Pengurus</th>
              <th scope="col">Nomor WhatsApp</th>
              <th scope="col">Lokasi</th>
              <!-- <th scope="col">Action</th> -->
            </tr>
          </thead>
          <tbody>
            
          </tbody>
        </table>
      </div>
    @endsection
