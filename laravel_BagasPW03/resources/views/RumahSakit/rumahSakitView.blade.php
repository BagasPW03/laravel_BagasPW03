@extends('layouts.app')

@section('title', 'Data Rumah Sakit')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="m-0">Data Rumah Sakit</h4>
        <a href="/rumahsakit/create" class="btn btn-primary">Tambah Rumah Sakit</a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Nama Rumah Sakit</th>
                            <th>Alamat</th>
                            <th>Email</th>
                            <th>Telepon</th>
                            <th style="width:190px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($rumahsakit as $rs )
                            <tr id="row-{{ $rs->id }}">
                                <td>{{ $rs->nama_rumah_sakit}}</td>
                                <td style="max-width:320px; white-space:pre-wrap;">{{ $rs->alamat ?? '-' }}</td>
                                <td>{{ $rs->email ?? '-' }}</td>
                                <td>{{ $rs->telepon ?? ($rs->phone ?? '-') }}</td>
                                <td>
                                    <a href="/rumahsakit/{{ $rs->id }}/edit"
                                        class="btn btn-sm btn-warning text-white">Edit</a>

                                    <button class="btn btn-sm btn-danger"
                                        onclick="deleteRs({{ $rs->id }})">Delete</button>

                                    <form action="/rumahsakit/{{ $rs->id }}" method="POST" class="d-none"
                                        id="form-delete-{{ $rs->id }}">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-4">Tidak ada data.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        const csrf = document.querySelector('meta[name="csrf-token"]').content;

        async function deleteRs(id) {
            if (!confirm('Hapus data?')) return;

            const res = await fetch(`/rumahsakit/${id}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': csrf,
                    'Accept': 'application/json'
                }
            });

            if (res.ok) {
                document.getElementById('row-' + id)?.remove();
                // optional: simple toast
                alert('Terhapus');
            } else {
                alert('Gagal menghapus');
            }
        }
    </script>
@endpush
