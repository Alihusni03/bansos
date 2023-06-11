@extends('dashboard.layouts.main')

@section('container')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Kelola profile</h1>
  </div>

  @if(session()->has('success'))
    <div class="alert alert-success" role="alert">
      {{ session('success') }}
    </div>
  @endif

  <div class="table-responsive">
    @if ($profiles->isEmpty())
      <a href="/dashboard/profile/create" class="btn btn-success mb-3">Tambah profile</a>
    @endif
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Nama</th>
          <th scope="col">Tentang</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($profiles as $profile)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $profile->nama }}</td>
            <td>{{ $profile->tentang }}</td>
            <td>
              <!-- <a href="/dashboard/profile/{{$profile->id}}" class="badge bg-info"><span data-feather="eye"></span></a> -->
              <a href="/dashboard/profile/{{$profile->id}}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
              <form action="/dashboard/profile/{{$profile->id}}" method="post" class="d-inline">
                @method('delete')
                @csrf
                <button class="badge bg-danger border-0" onclick="return confirm('Apakah kamu yakin?')"><span data-feather="trash"></span></button>
              </form>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection
