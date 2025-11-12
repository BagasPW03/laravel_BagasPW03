@extends('layouts.app')

@section('title', 'Tambah Pasien')

@section('content')
    <div class="container">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h5 class="m-0">Tambah Pasien</h5>
            </div>

            <div class="card-body">
                <form action="{{ route('pasien.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="nama_pasien" class="form-label">Nama Pasien <span class="text-danger">*</span></label>
                        <input type="text" name="nama_pasien" id="nama_pasien"
                            class="form-control @error('nama_pasien') is-invalid @enderror" value="{{ old('nama_pasien') }}"
                            required>
                        @error('nama_pasien')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea name="alamat" id="alamat" class="form-control @error('alamat') is-invalid @enderror" rows="3">{{ old('alamat') }}</textarea>
                        @error('alamat')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="no_telpon" class="form-label">No Telpon</label>
                            <input type="text" name="no_telpon" id="no_telpon"
                                class="form-control @error('no_telpon') is-invalid @enderror"
                                value="{{ old('no_telpon') }}">
                            @error('no_telpon')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="id_rumah_sakit" class="form-label">Rumah Sakit <span
                                    class="text-danger">*</span></label>
                            <select name="id_rumah_sakit" id="id_rumah_sakit"
                                class="form-select @error('id_rumah_sakit') is-invalid @enderror" required>
                                <option value="">-- Pilih Rumah Sakit --</option>
                                @foreach ($rumahsakits as $rs)
                                    <option value="{{ $rs->id }}"
                                        {{ old('id_rumah_sakit') == $rs->id ? 'selected' : '' }}>
                                        {{ $rs->nama_rumah_sakit ?? $rs->nama }}
                                    </option>
                                @endforeach
                            </select>
                            @error('id_rumah_sakit')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('pasien.index') }}" class="btn btn-secondary">Kembali</a>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
