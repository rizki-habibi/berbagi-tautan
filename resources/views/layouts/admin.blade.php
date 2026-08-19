<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('judul', 'Admin') — BerbagiTautan</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bangers&family=Nunito:wght@400;600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.2/dist/chart.umd.min.js"></script>

    <style>
        :root {
            --komik-kuning: #FFE600;
            --komik-merah:  #FF3B30;
            --komik-biru:   #0057FF;
            --komik-hitam:  #1A1A2E;
            --sidebar-w:    260px;
        }

        *, *::before, *::after { box-sizing: border-box; }

        /* ══ PAGE LOADING BAR (slim top bar) ══ */
        #loading-bar {
            position: fixed;
            top: 0; left: 0;
            height: 4px;
            width: 0%;
            background: linear-gradient(90deg, #FF3B30, #FFE600, #2ECC40);
            z-index: 99999;
            transition: width 0.4s ease;
            box-shadow: 0 0 8px rgba(255,230,0,0.8);
        }

        /* ══ BODY ══ */
        body {
            font-family: 'Nunito', sans-serif;
            background: #FFFFF0;
            background-image: radial-gradient(circle, #e0e0e0 1px, transparent 1px);
            background-size: 20px 20px;
            min-height: 100vh;
            opacity: 0;
            animation: halamanMasuk 0.5s ease 0.2s forwards;
        }
        @keyframes halamanMasuk {
            to { opacity: 1; }
        }

        /* ══ SIDEBAR ══ */
        .sidebar {
            width: var(--sidebar-w);
            min-height: 100vh;
            background: var(--komik-hitam);
            border-right: 4px solid var(--komik-kuning);
            position: fixed;
            top: 0; left: 0;
            z-index: 1000;
            display: flex;
            flex-direction: column;
            transform: translateX(-100%);
            animation: sidebarMasuk 0.45s cubic-bezier(.22,.68,0,1.2) 0.3s forwards;
        }
        @keyframes sidebarMasuk {
            to { transform: translateX(0); }
        }

        .sidebar-brand {
            font-family: 'Bangers', cursive;
            font-size: 1.8rem;
            letter-spacing: 2px;
            color: var(--komik-kuning);
            text-decoration: none;
            padding: 24px 20px 16px;
            border-bottom: 3px solid #333;
            text-shadow: 2px 2px 0 #FF3B30;
            display: block;
            transition: letter-spacing 0.3s;
        }
        .sidebar-brand:hover { letter-spacing: 4px; }

        /* Logo bounce */
        .sidebar-logo {
            display: inline-block;
            animation: logoBounce 2s ease-in-out infinite;
        }
        @keyframes logoBounce {
            0%, 100% { transform: translateY(0) rotate(0deg); }
            30%       { transform: translateY(-4px) rotate(-5deg); }
            60%       { transform: translateY(-2px) rotate(3deg); }
        }

        .sidebar .nav-link {
            color: #ccc;
            font-weight: 700;
            padding: 12px 20px;
            border-left: 4px solid transparent;
            font-size: 0.95rem;
            transition: all 0.25s ease;
            position: relative;
            overflow: hidden;
        }
        .sidebar .nav-link::after {
            content: '';
            position: absolute;
            left: 0; top: 0;
            width: 0; height: 100%;
            background: rgba(255,230,0,0.06);
            transition: width 0.3s ease;
        }
        .sidebar .nav-link:hover::after,
        .sidebar .nav-link.active::after { width: 100%; }

        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            color: var(--komik-kuning);
            border-left-color: var(--komik-kuning);
            padding-left: 26px;
        }
        .sidebar .nav-link i {
            margin-right: 8px;
            font-size: 1.1rem;
            transition: transform 0.3s;
        }
        .sidebar .nav-link:hover i { transform: scale(1.3) rotate(-5deg); }

        /* Nav items stagger masuk */
        .sidebar .nav-item { opacity: 0; transform: translateX(-20px); }
        .sidebar .nav-item:nth-child(1) { animation: navMasuk 0.35s ease 0.5s forwards; }
        .sidebar .nav-item:nth-child(2) { animation: navMasuk 0.35s ease 0.6s forwards; }
        .sidebar .nav-item:nth-child(3) { animation: navMasuk 0.35s ease 0.7s forwards; }
        @keyframes navMasuk {
            to { opacity: 1; transform: translateX(0); }
        }

        .sidebar-footer {
            margin-top: auto;
            padding: 16px 20px;
            border-top: 3px solid #333;
        }

        /* ══ MAIN CONTENT ══ */
        .main-content {
            margin-left: var(--sidebar-w);
            min-height: 100vh;
        }

        /* ══ TOPBAR ══ */
        .topbar {
            background: var(--komik-kuning);
            border-bottom: 4px solid var(--komik-hitam);
            padding: 12px 28px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: sticky; top: 0; z-index: 900;
            box-shadow: 0 4px 0 var(--komik-hitam);
        }
        .topbar h1 {
            font-family: 'Bangers', cursive;
            font-size: 1.6rem;
            letter-spacing: 1px;
            color: var(--komik-hitam);
            margin: 0;
            text-shadow: 1px 1px 0 rgba(255,255,255,0.5);
            animation: judulMasuk 0.5s ease 0.4s both;
        }
        @keyframes judulMasuk {
            from { opacity: 0; transform: translateY(-10px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        /* ══ CARDS ══ */
        .komik-card {
            background: #fff;
            border: 3px solid var(--komik-hitam);
            border-radius: 12px;
            box-shadow: 5px 5px 0 var(--komik-hitam);
            transition: transform 0.2s cubic-bezier(.22,.68,0,1.2),
                        box-shadow 0.2s ease;
        }
        .komik-card:hover {
            transform: translate(-3px, -3px);
            box-shadow: 8px 8px 0 var(--komik-hitam);
        }

        /* ══ STAT CARDS ══ */
        .stat-card {
            border: 3px solid var(--komik-hitam);
            border-radius: 12px;
            box-shadow: 5px 5px 0 var(--komik-hitam);
            color: #fff;
            padding: 20px;
            opacity: 0;
            transform: translateY(20px) scale(0.95);
            animation: statMasuk 0.4s ease forwards;
        }
        .stat-card:nth-child(1) { animation-delay: 0.1s; }
        .stat-card:nth-child(2) { animation-delay: 0.2s; }
        .stat-card:nth-child(3) { animation-delay: 0.3s; }
        .stat-card:nth-child(4) { animation-delay: 0.4s; }
        @keyframes statMasuk {
            to { opacity: 1; transform: translateY(0) scale(1); }
        }
        .stat-card:hover {
            transform: translate(-3px, -3px) scale(1.02);
            box-shadow: 8px 8px 0 var(--komik-hitam);
            transition: all 0.2s;
        }
        .stat-card .stat-number {
            font-family: 'Bangers', cursive;
            font-size: 2.8rem;
            letter-spacing: 2px;
            line-height: 1;
        }
        .stat-card .stat-label {
            font-weight: 800;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            opacity: 0.9;
        }

        /* Angka hitung naik */
        .stat-number[data-target] { cursor: default; }

        /* ══ BUTTONS ══ */
        .btn-komik {
            font-family: 'Bangers', cursive;
            letter-spacing: 1px;
            font-size: 1rem;
            border: 3px solid var(--komik-hitam);
            box-shadow: 3px 3px 0 var(--komik-hitam);
            transition: all 0.15s cubic-bezier(.36,.07,.19,.97);
            border-radius: 8px;
        }
        .btn-komik:hover {
            transform: translate(-2px, -2px);
            box-shadow: 5px 5px 0 var(--komik-hitam);
        }
        .btn-komik:active {
            transform: translate(3px, 3px);
            box-shadow: 0px 0px 0 var(--komik-hitam);
        }

        /* ══ TABEL ══ */
        .table-komik th {
            font-family: 'Bangers', cursive;
            letter-spacing: 1px;
            font-size: 0.95rem;
            background: var(--komik-hitam);
            color: var(--komik-kuning);
        }
        .table-komik td { vertical-align: middle; }

        /* Row tabel masuk stagger */
        .table-komik tbody tr {
            opacity: 0;
            transform: translateX(-10px);
            animation: rowMasuk 0.3s ease forwards;
        }
        @keyframes rowMasuk {
            to { opacity: 1; transform: translateX(0); }
        }

        /* ══ ALERT ══ */
        .alert-komik {
            border: 3px solid var(--komik-hitam);
            border-radius: 8px;
            box-shadow: 4px 4px 0 var(--komik-hitam);
            font-weight: 700;
            animation: alertBounce 0.5s cubic-bezier(.36,.07,.19,.97);
        }
        @keyframes alertBounce {
            0%   { transform: translateY(-20px); opacity: 0; }
            60%  { transform: translateY(4px); }
            100% { transform: translateY(0); opacity: 1; }
        }

        /* ══ FORM INPUT FOKUS ══ */
        .form-control:focus, .form-select:focus {
            transform: scale(1.01);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        /* ══ RIPPLE EFFECT BUTTON ══ */
        .btn-komik { position: relative; overflow: hidden; }
        .ripple {
            position: absolute;
            border-radius: 50%;
            background: rgba(255,255,255,0.4);
            transform: scale(0);
            animation: rippleAnim 0.5s linear;
            pointer-events: none;
        }
        @keyframes rippleAnim {
            to { transform: scale(4); opacity: 0; }
        }

        /* ══ TOOLTIP HOVER TABEL ══ */
        .table-komik tbody tr:hover {
            background: #fffde7 !important;
            transition: background 0.2s;
        }

        @media (max-width: 768px) {
            .sidebar { transform: translateX(-100%); animation: none; }
            .main-content { margin-left: 0; }
        }
    </style>

    @stack('styles')
</head>
<body>

<!-- Loading bar tipis di atas -->
<div id="loading-bar"></div>

<!-- Sidebar -->
<nav class="sidebar">
    <a href="{{ route('admin.dashboard') }}" class="sidebar-brand">
        <span class="sidebar-logo">💥</span> BerbagiTautan
    </a>
    <ul class="nav flex-column mt-2">
        <li class="nav-item">
            <a href="{{ route('admin.dashboard') }}"
               class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="bi bi-speedometer2"></i> Dashboard
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.links.index') }}"
               class="nav-link {{ request()->routeIs('admin.links.*') ? 'active' : '' }}">
                <i class="bi bi-link-45deg"></i> Kelola Link
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('profil') }}" target="_blank" class="nav-link">
                <i class="bi bi-eye"></i> Halaman Publik
            </a>
        </li>
    </ul>

    <div class="sidebar-footer">
        <div class="mb-2" style="color:#aaa; font-size:0.85rem; font-weight:700;">
            <i class="bi bi-person-circle me-1"></i>{{ Auth::user()->name }}
        </div>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-sm btn-komik w-100"
                style="background:var(--komik-merah); color:#fff; border-color:#fff;">
                <i class="bi bi-box-arrow-right"></i> Keluar
            </button>
        </form>
    </div>
</nav>

<!-- Main -->
<div class="main-content">
    <div class="topbar">
        <h1>@yield('judul', 'Dashboard')</h1>
        <div class="d-flex gap-2 align-items-center">
            <span style="font-weight:800; font-size:0.8rem; color:#666;">
                {{ now()->format('d M Y') }}
            </span>
            <a href="{{ route('profil') }}" target="_blank"
               class="btn btn-komik btn-sm"
               style="background:#fff; color:var(--komik-hitam);">
                <i class="bi bi-box-arrow-up-right"></i> Lihat Publik
            </a>
        </div>
    </div>

    <div class="p-4">
        @if(session('sukses'))
            <div class="alert alert-success alert-komik alert-dismissible fade show mb-4">
                <i class="bi bi-check-circle-fill me-2"></i>{{ session('sukses') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger alert-komik alert-dismissible fade show mb-4">
                <i class="bi bi-exclamation-triangle-fill me-2"></i>{{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @yield('konten')
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
/* ── Loading bar ── */
(function() {
    const bar = document.getElementById('loading-bar');
    let w = 0;
    const iv = setInterval(function() {
        w += Math.random() * 15;
        if (w >= 90) { clearInterval(iv); w = 90; }
        bar.style.width = w + '%';
    }, 80);
    window.addEventListener('load', function() {
        clearInterval(iv);
        bar.style.width = '100%';
        setTimeout(function() { bar.style.opacity = '0'; }, 400);
    });
})();

/* ── Ripple effect semua .btn-komik ── */
document.querySelectorAll('.btn-komik').forEach(function(btn) {
    btn.addEventListener('click', function(e) {
        const rect = btn.getBoundingClientRect();
        const ripple = document.createElement('span');
        ripple.className = 'ripple';
        const size = Math.max(rect.width, rect.height);
        ripple.style.width  = ripple.style.height = size + 'px';
        ripple.style.left   = (e.clientX - rect.left - size/2) + 'px';
        ripple.style.top    = (e.clientY - rect.top  - size/2) + 'px';
        btn.appendChild(ripple);
        setTimeout(function() { ripple.remove(); }, 600);
    });
});

/* ── Counter angka naik untuk stat-number ── */
document.querySelectorAll('.stat-number[data-target]').forEach(function(el) {
    const target = parseInt(el.dataset.target, 10);
    const dur    = 1200;
    const step   = 16;
    const inc    = target / (dur / step);
    let cur = 0;
    const iv = setInterval(function() {
        cur += inc;
        if (cur >= target) { cur = target; clearInterval(iv); }
        el.textContent = Math.floor(cur).toLocaleString('id-ID');
    }, step);
});

/* ── Tabel row stagger delay ── */
document.querySelectorAll('.table-komik tbody tr').forEach(function(row, i) {
    row.style.animationDelay = (i * 50) + 'ms';
});
</script>
@stack('scripts')
</body>
</html>
