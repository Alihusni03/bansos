@extends('dashboard.layouts.main')

    @section('container')
      <div class="d-flex flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <a href="/dashboard/donatur" class="btn btn-success me-3"><span data-feather="arrow-left"></span></a>
        <h1 class="h2">Tambah Data Donatur</h1>
      </div>
      <div class="col-lg-12">
          <form method="post" action="/dashboard/donatur" enctype="multipart/form-data">
            @csrf
            <div class="d-flex">
                <div class="col-md-6 p-2">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror " id="nama" name="nama" required autofocus value="{{ old('nama')}}">
                        @error('nama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    
                    <div class="mb-3 d-flex">
                        <div class="col-md-5 me-5 ms-3">
                            <label for="bansos" class="form-label">Jenis Bansos</label>
                            <select class="form-select" name="bansos_id" required>
                                @foreach ($bansos as $bansos)
                                    @if(old('bansos_id') == $bansos->id)
                                        <option value="{{ $bansos->id }}" selected>{{ $bansos->name }}</option>
                                    @else
                                        <option value="{{ $bansos->id }}">{{ $bansos->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('bansos')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="ms-3 col-md-5">
                            <label for="tanggal" class="form-label">Tanggal</label>
                            <input type="date" class="form-control @error('tanggal') is-invalid @enderror " id="tanggal" name="tanggal" value="{{ old('tanggal') }}" required>
                            @error('tanggal')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-md-6 p-2">
                    <div class="mb-5">
                        <label for="bentuk" class="form-label">Bentuk / Nominal</label>
                        <input type="text" class="form-control @error('bentuk') is-invalid @enderror " id="bentuk" name="bentuk" required autofocus value="{{ old('bentuk') }}">
                        @error('bentuk')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-success col-md-12">Save</button>
                </div>
            </div>
        </form>
      </div>

      

    @endsection