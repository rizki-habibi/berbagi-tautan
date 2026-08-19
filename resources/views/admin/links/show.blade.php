@extends('layouts.admin')
@section('judul', 'Statistik: ' . $link->judul)

@section('konten')

<div class="mb-4">
    <a href="{{ route('admin.links.index') }}" class="btn btn-sm btn-komik" style="background:#fff;">
        ← Kembali ke Daftar Link
    </a>
</div>

<!-- Info Link -->
<div class="komik-card p-4 mb-4">
    <div class="d-flex align-items-center gap-3">
        <span style="font-size:3rem;">{{ $link->ikon }}</span>
        <div>
            <h3 style="font-family:'Bangers',cursive; letter-spacing:1px; margin:0; font-size:1.8rem;">
                {{ $link->judul }}
            </h3>
            <a href="{{ $link->url }}" target="_blank" class="text-muted small fw-bold">
                {{ $link->url }}
            </a>
        </div>
        <div class="ms-auto text-end">
            <div style="font-family:'Bangers',cursive; font-size:3rem; color:#0057FF; line-height:1;">
                {{ $totalKlik }}
            </div>
            <div class="fw-bold text-muted small text-uppercase">Total Klik</div>
        </div>
    </div>
</div>

<!-- Distribusi Perangkat -->
<div class="row g-3 mb-4">
    @foreach($distribusiPerangkat as $d)
        <div class="col-auto">
            <div class="komik-card px-4 py-3 text-center">
                <div style="font-size:2rem;">
                    @if($d->perangkat === 'Mobile') 📱
                    @elseif($d->perangkat === 'Tablet') 📟
                    @else 🖥️
                    @endif
                </div>
                <div style="font-family:'Bangers',cursive; font-size:1.6rem; color:#0057FF;">
                    {{ $d->jumlah }}
                </div>
                <div class="fw-bold small text-muted">{{ $d->perangkat }}</div>
            </div>
        </div>
    @endforeach
</div>

<!-- Tabel Pengunjung Klik -->
<div class="komik-card">
    <div class="p-3" style="border-bottom:3px solid #1A1A2E;">
        <h5 style="font-family:'Bangers',cursive; letter-spacing:1px; margin:0; font-size:1.2rem;">
            👥 Siapa yang Klik?
        </h5>
    </div>
    <div class="table-responsive">
        <table class="table table-komik mb-0">
            <thead>
                <tr>
                    <th>#</th>
                    <th>IP ADDRESS</th>
                    <th>PERANGKAT</th>
                    <th>BROWSER</th>
                    <th>OS</th>
                    <th>WAKTU</th>
                </tr>
            </thead>
            <tbody>
                @forelse($klik as $i => $k)
                    <tr>
                        <td class="text-muted fw-bold">{{ $klik->firstItem() + $i }}</td>
                        <td><code class="fw-bold">{{ $k->ip_address ?? '-' }}</code></td>
                        <td>
                            @if($k->perangkat === 'Mobile') 📱
                            @elseif($k->perangkat === 'Tablet') 📟
                            @else 🖥️
                            @endif
                            {{ $k->perangkat ?? '-' }}
                        </td>
                        <td>{{ $k->browser ?? '-' }}</td>
                        <td>{{ $k->sistem_operasi ?? '-' }}</td>
                        <td>
                            <span title="{{ $k->created_at }}">
                                {{ $k->created_at->format('d M Y H:i') }}
                            </span>
                            <br>
                            <small class="text-muted">{{ $k->created_at->diffForHumans() }}</small>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center py-5">
                            <div style="font-family:'Bangers',cursive; font-size:1.8rem; color:#ccc; letter-spacing:2px;">
                                😴 BELUM ADA YANG KLIK
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if($klik->hasPages())
        <div class="p-3">
            {{ $klik->links() }}
        </div>
    @endif
</div>

@endsection
