@extends('dashboard.layouts.main')

    @section('container')
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Kelola transaksi</h1>
      </div>

      @if(session()->has('success'))
        <div class="alert alert-success" role="alert">
          {{ session('success') }}
        </div>
      @endif

      <div class="table-responsive">
        <a href="/dashboard/transaksi/create" class="btn btn-success mb-3">Tambah transaksi</a>
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Tanggal</th>
              <th scope="col">Order ID</th>
              <th scope="col">Jumlah</th>
              <th scope="col">Tipe Pembayaran</th>
              <th scope="col">Bank</th>
              <th scope="col">Virtual Account</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <tr>
                <td>1</td>
                <td>ali</td>
                <td>harkid</td>
                <td>L</td>
                <td>
                    
                </td>
            </tr>
          </tbody>
        </table>
      </div>
    @endsection
