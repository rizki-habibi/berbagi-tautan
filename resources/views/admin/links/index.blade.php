@extends('layouts.admin')
@section('judul', 'Kelola Link')

@section('konten')

<div class="d-flex align-items-center justify-content-between mb-4">
    <div>
        <p class="mb-0 text-muted fw-bold">Total: <strong>{{ $links->count() }}</strong> link</p>
    </div>
    <a href="{{ route('admin.links.create') }}"
       class="btn btn-komik px-4 py-2"
       style="background:#2ECC40; color:#fff; border-color:#1A1A2E;">
        <i class="bi bi-plus-lg"></i> TAMBAH LINK
    </a>
</div>

<div class="komik-card">
    <div class="table-responsive">
        <table class="table table-komik mb-0">
            <thead>
                <tr>
                    <th style="width:50px">#</th>
                    <th>LINK</th>
                    <th style="width:80px">IKON</th>
                    <th style="width:110px">WARNA</th>
                    <th style="width:80px">KLIK</th>
                    <th style="width:90px">STATUS</th>
                    <th style="width:160px">AKSI</th>
                </tr>
            </thead>
            <tbody>
                @forelse($links as $link)
                    <tr>
                        <td class="text-muted fw-bold">{{ $link->urutan }}</td>
                        <td>
                            <div class="fw-bold" style="font-size:0.95rem;">{{ $link->judul }}</div>
                            <div class="text-muted small text-truncate" style="max-width:240px;">
                                {{ $link->url }}
                            </div>
                        </td>
                        <td class="text-center" style="font-size:1.6rem;">{{ $link->ikon }}</td>
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                <div style="
                                    width:32px; height:32px;
                                    background:{{$link->warna_bg}};
                                    border:3px solid #1A1A2E;
                                    border-radius:6px;
                                "></div>
                                <small class="fw-bold">{{ $link->warna_bg }}</small>
                            </div>
                        </td>
                        <td>
                            <span class="badge px-2 py-1"
                                  style="background:#0057FF; color:#fff; border:2px solid #1A1A2E; font-size:0.85rem; font-weight:800;">
                                {{ $link->klik_count }}
                            </span>
                        </td>
                        <td>
                            <div class="form-check form-switch">
                                <input class="form-check-input toggle-aktif"
                                    type="checkbox"
                                    style="width:40px; height:22px; cursor:pointer;"
                                    data-id="{{ $link->id }}"
                                    {{ $link->aktif ? 'checked' : '' }}>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex gap-1">
                                <a href="{{ route('admin.links.show', $link) }}"
                                   class="btn btn-sm btn-komik px-2 py-1"
                                   style="background:#FFE600; color:#1A1A2E;"
                                   title="Statistik Klik">
                                    <i class="bi bi-bar-chart-fill"></i>
                                </a>
                                <a href="{{ route('admin.links.edit', $link) }}"
                                   class="btn btn-sm btn-komik px-2 py-1"
                                   style="background:#0057FF; color:#fff;"
                                   title="Edit">
                                    <i class="bi bi-pencil-fill"></i>
                                </a>
                                <form action="{{ route('admin.links.destroy', $link) }}" method="POST"
                                      onsubmit="return confirm('Yakin hapus link ini?')">
                                    @csrf @method('DELETE')
                                    <button type="submit"
                                            class="btn btn-sm btn-komik px-2 py-1"
                                            style="background:#FF3B30; color:#fff;"
                                            title="Hapus">
                                        <i class="bi bi-trash-fill"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center py-5">
                            <div style="font-family:'Bangers',cursive; font-size:2rem; color:#ccc; letter-spacing:2px;">
                                😴 BELUM ADA LINK
                            </div>
                            <a href="{{ route('admin.links.create') }}" class="btn btn-komik mt-3"
                               style="background:#2ECC40; color:#fff;">
                                Tambah Sekarang!
                            </a>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection

@push('scripts')
<script>
document.querySelectorAll('.toggle-aktif').forEach(function(el) {
    el.addEventListener('change', function() {
        const id = this.dataset.id;
        fetch(`/admin/links/${id}/toggle`, {
            method: 'PATCH',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                'Accept': 'application/json',
            }
        })
        .then(r => r.json())
        .then(data => {
            if (!data.sukses) this.checked = !this.checked;
        });
    });
});
</script>
@endpush
