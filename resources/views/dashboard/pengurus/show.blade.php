@extends('dashboard.layouts.main')

    @section('container')
        <div class="d-flex flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <a href="/dashboard/pengurus" class="btn btn-success me-3"><span data-feather="arrow-left"></span></a>
            <h1 class="h2">Data {{ $pengurus->nama }}</h1>
        </div>
        <div class="container">
        <div class="d-flex border rounded-1 p-5">
            <div class="row col-lg-4">
                <div class="text-center">
                    @if ($pengurus->foto)
                        <img src="{{ asset('storage/'. $pengurus->foto) }}" class="rounded-2" height="450" width="310">
                    @else
                    -
                    @endif
                </div>
            </div>
            <div class="d-flex row col-lg-9 p-2 mt-2 ms-1">
                <div class="col-md-2">
                    <p>Nama Lengkap</p>
                    <p>Jabatan</p>
                </div>
                <div class="col-md-1 text-end">
                    <p>:</p>
                    <p>:</p>
                </div>
                <div class="col-lg-9">
                    <p>{{$pengurus->nama}}</p>
                    <p>{{$pengurus->jabatan}}</p>
                </div>
            </div>
        </div>
    @endsection
