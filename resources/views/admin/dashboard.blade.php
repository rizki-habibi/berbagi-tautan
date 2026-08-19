@extends('layouts.admin')
@section('judul', 'Dashboard')

@section('konten')

<!-- Stat Cards -->
<div class="row g-3 mb-4">
    <div class="col-6 col-lg-3">
        <div class="stat-card" style="background: linear-gradient(135deg,#FF3B30,#FF6B6B);">
            <div class="stat-number" data-target="{{ $totalLink }}">0</div>
            <div class="stat-label">🔗 Total Link</div>
        </div>
    </div>
    <div class="col-6 col-lg-3">
        <div class="stat-card" style="background: linear-gradient(135deg,#2ECC40,#54D873);">
            <div class="stat-number" data-target="{{ $linkAktif }}">0</div>
            <div class="stat-label">✅ Link Aktif</div>
        </div>
    </div>
    <div class="col-6 col-lg-3">
        <div class="stat-card" style="background: linear-gradient(135deg,#0057FF,#3D8BFF);">
            <div class="stat-number" data-target="{{ $totalKlik }}">0</div>
            <div class="stat-label">👆 Total Klik</div>
        </div>
    </div>
    <div class="col-6 col-lg-3">
        <div class="stat-card" style="background: linear-gradient(135deg,#FF851B,#FFB347);">
            <div class="stat-number" data-target="{{ $klikHariIni }}">0</div>
            <div class="stat-label">📅 Klik Hari Ini</div>
        </div>
    </div>
</div>

<!-- Chart Klik 7 Hari + Top Links -->
<div class="row g-3 mb-4">
    <div class="col-lg-8">
        <div class="komik-card p-4 h-100">
            <h5 style="font-family:'Bangers',cursive; letter-spacing:1px; font-size:1.3rem;">
                📈 Klik 7 Hari Terakhir
            </h5>
            <canvas id="chartKlikHarian" height="120"></canvas>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="komik-card p-4 h-100">
            <h5 style="font-family:'Bangers',cursive; letter-spacing:1px; font-size:1.3rem;">
                📱 Perangkat
            </h5>
            <canvas id="chartPerangkat" height="180"></canvas>
        </div>
    </div>
</div>

<!-- Top Links + Aktivitas Terbaru -->
<div class="row g-3">
    <div class="col-lg-6">
        <div class="komik-card p-4">
            <h5 style="font-family:'Bangers',cursive; letter-spacing:1px; font-size:1.3rem; margin-bottom:16px;">
                🏆 Link Terpopuler
            </h5>
            @if($topLinks->isEmpty())
                <p class="text-muted fw-bold text-center py-3">Belum ada data</p>
            @else
                <div class="d-flex flex-column gap-2">
                    @foreach($topLinks as $i => $link)
                        <div class="d-flex align-items-center gap-2 p-2 rounded"
                             style="border:2px solid #eee; background:#fafafa;">
                            <span style="font-family:'Bangers',cursive; font-size:1.4rem; width:32px; text-align:center; color:#888;">
                                {{ $i+1 }}
                            </span>
                            <span class="flex-grow-1 fw-bold" style="font-size:0.9rem;">
                                {{ $link->ikon }} {{ $link->judul }}
                            </span>
                            <span class="badge rounded-pill px-3 py-1"
                                  style="background:{{$link->warna_bg}}; color:{{$link->warna_teks}}; border:2px solid #1A1A2E; font-size:0.85rem; font-weight:800;">
                                {{ $link->klik_count }} klik
                            </span>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>

    <div class="col-lg-6">
        <div class="komik-card p-4">
            <h5 style="font-family:'Bangers',cursive; letter-spacing:1px; font-size:1.3rem; margin-bottom:16px;">
                🕐 Aktivitas Klik Terbaru
            </h5>
            @if($klikTerbaru->isEmpty())
                <p class="text-muted fw-bold text-center py-3">Belum ada klik</p>
            @else
                <div class="table-responsive">
                    <table class="table table-sm table-komik" style="font-size:0.82rem;">
                        <thead>
                            <tr>
                                <th>Link</th>
                                <th>Perangkat</th>
                                <th>IP</th>
                                <th>Waktu</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($klikTerbaru as $klik)
                                <tr>
                                    <td class="fw-bold">{{ $klik->link?->ikon }} {{ Str::limit($klik->link?->judul, 18) }}</td>
                                    <td>
                                        @if($klik->perangkat === 'Mobile')
                                            📱
                                        @elseif($klik->perangkat === 'Tablet')
                                            📟
                                        @else
                                            🖥️
                                        @endif
                                        {{ $klik->perangkat }}
                                    </td>
                                    <td><code>{{ $klik->ip_address }}</code></td>
                                    <td>{{ $klik->created_at->diffForHumans() }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
// Data dari PHP
const labelHari = @json($klikPerHari->pluck('tanggal'));
const dataHari  = @json($klikPerHari->pluck('jumlah'));
const labelPerangkat = @json($distribusiPerangkat->pluck('perangkat'));
const dataPerangkat  = @json($distribusiPerangkat->pluck('jumlah'));

// Chart Klik Harian
new Chart(document.getElementById('chartKlikHarian'), {
    type: 'bar',
    data: {
        labels: labelHari,
        datasets: [{
            label: 'Jumlah Klik',
            data: dataHari,
            backgroundColor: '#0057FF',
            borderColor: '#1A1A2E',
            borderWidth: 3,
            borderRadius: 8,
        }]
    },
    options: {
        responsive: true,
        plugins: { legend: { display: false } },
        scales: {
            y: { beginAtZero: true, ticks: { stepSize: 1 } }
        }
    }
});

// Chart Perangkat (Doughnut)
new Chart(document.getElementById('chartPerangkat'), {
    type: 'doughnut',
    data: {
        labels: labelPerangkat.length ? labelPerangkat : ['Belum ada data'],
        datasets: [{
            data: dataPerangkat.length ? dataPerangkat : [1],
            backgroundColor: ['#0057FF','#FF3B30','#FFE600','#2ECC40'],
            borderColor: '#1A1A2E',
            borderWidth: 3,
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: { position: 'bottom', labels: { font: { weight: 'bold' } } }
        }
    }
});
</script>
@endpush
