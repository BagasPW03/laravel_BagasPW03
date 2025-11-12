{{-- resources/views/pasien/index.blade.php --}}
@extends('layouts.app')

@section('title', 'Data Pasien')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="m-0">Data Pasien</h4>
        <a href="{{ route('pasien.create') }}" class="btn btn-primary">Tambah Pasien</a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Nama Pasien</th>
                            <th>Alamat</th>
                            <th>No Telpon</th>
                            <th>Rumah Sakit</th>
                            <th style="width:190px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($pasiens as  $p)
                            <tr id="row-{{ $p->id }}">

                                <td>{{ $p->nama_pasien }}</td>
                                <td style="max-width:320px; white-space:pre-wrap;">{{ $p->alamat }}</td>
                                <td>{{ $p->no_telpon }}</td>
                                <td>{{ $p->rumahSakit->nama_rumah_sakit  }}
                                </td>
                                <td>
                                    <a href="{{ route('pasien.edit', $p->id) }}"
                                        class="btn btn-sm btn-warning text-white">Edit</a>

                                    <button class="btn btn-sm btn-danger"
                                        onclick="deletePasien({{ $p->id }})">Delete</button>

                                    <form action="{{ route('pasien.destroy', $p->id) }}" method="POST" class="d-none"
                                        id="form-delete-{{ $p->id }}">
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
        const tokenMeta = document.querySelector('meta[name="csrf-token"]');
        const csrf = tokenMeta ? tokenMeta.content : '{{ csrf_token() }}';
        const baseUrl = "{{ url('pasien') }}";

        async function deletePasien(id) {
            if (!confirm('Hapus data pasien ini?')) return;

            try {
                const res = await fetch(`${baseUrl}/${id}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': csrf,
                        'Accept': 'application/json'
                    }
                });

                if (res.ok) {
                    document.getElementById('row-' + id)?.remove();
                    alert('Pasien berhasil dihapus');
                    return;
                }

                let msg = 'Gagal menghapus';
                try {
                    const json = await res.json();
                    if (json && json.message) msg = json.message;
                } catch (e) {
                    /* ignore parse error */ }

                alert(msg);
            } catch (err) {
                console.error(err);
                alert('Terjadi kesalahan jaringan. Cek konsol.');
            }
        }
    </script>
@endpush
