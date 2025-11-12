@extends('layouts.app')

@section('title', 'Edit Rumah Sakit')

@section('content')
<div class="container">
  <div class="card shadow-sm">
    <div class="card-header bg-warning text-white">
      <h5 class="m-0">Edit Rumah Sakit</h5>
    </div>

    <div class="card-body">
      <form action="/rumahsakit/{{ $rumahsakit->id }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
          <label for="nama" class="form-label">Nama Rumah Sakit <span class="text-danger">*</span></label>
          <input type="text" name="nama_rumah_sakit" id="nama_rumah_sakit" class="form-control" value="{{ old('nama_rumah_sakit', $rumahsakit->nama_rumah_sakit) }}" required>

        </div>

        <div class="mb-3">
          <label for="alamat" class="form-label">Alamat</label>
          <textarea name="alamat" id="alamat" class="form-control @error('alamat') is-invalid @enderror"
                    rows="3">{{ old('alamat', $rumahsakit->alamat) }}</textarea>
          @error('alamat')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email"
                   class="form-control @error('email') is-invalid @enderror"
                   value="{{ old('email', $rumahsakit->email) }}">
            @error('email')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="col-md-6 mb-3">
            <label for="telepon" class="form-label">Telepon</label>
            <input type="text" name="telepon" id="telepon"
                   class="form-control @error('telepon') is-invalid @enderror"
                   value="{{ old('telepon', $rumahsakit->telepon) }}">
            @error('telepon')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
        </div>

        <div class="d-flex justify-content-between">
          <a href="{{ route('rumahsakit.index') }}" class="btn btn-secondary">Kembali</a>
          <button type="submit" class="btn btn-warning text-white">Perbarui</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
