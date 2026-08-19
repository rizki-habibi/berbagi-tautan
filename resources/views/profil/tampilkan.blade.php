<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BerbagiTautan — Link Saya</title>
    <link href="https://fonts.googleapis.com/css2?family=Bangers&family=Nunito:wght@400;700;800;900&display=swap" rel="stylesheet">
    <style>
        /* ══════════════════════════════════════════
           LOADING SCREEN
        ══════════════════════════════════════════ */
        #layar-muat {
            position: fixed;
            inset: 0;
            background: #1A1A2E;
            z-index: 9999;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 20px;
            transition: opacity 0.6s ease, visibility 0.6s ease;
        }
        #layar-muat.hilang {
            opacity: 0;
            visibility: hidden;
        }
        .muat-teks {
            font-family: 'Bangers', cursive;
            font-size: 3rem;
            letter-spacing: 4px;
            color: #FFE600;
            text-shadow: 4px 4px 0 #FF3B30;
            animation: kedip 0.8s infinite alternate;
        }
        @keyframes kedip {
            from { opacity: 1; transform: scale(1); }
            to   { opacity: 0.6; transform: scale(0.95); }
        }
        .muat-bar-wrap {
            width: 220px;
            height: 18px;
            background: #333;
            border: 3px solid #FFE600;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 4px 4px 0 #FFE600;
        }
        .muat-bar {
            height: 100%;
            background: linear-gradient(90deg, #FF3B30, #FFE600, #2ECC40);
            border-radius: 20px;
            width: 0%;
            animation: isiBar 1.2s ease-out forwards;
        }
        @keyframes isiBar {
            0%   { width: 0%; }
            60%  { width: 80%; }
            100% { width: 100%; }
        }
        .muat-sub {
            font-family: 'Nunito', sans-serif;
            color: #aaa;
            font-weight: 700;
            font-size: 0.9rem;
            letter-spacing: 1px;
            animation: fadeInUp 0.5s ease 0.3s both;
        }

        /* ══════════════════════════════════════════
           BODY & BACKGROUND
        ══════════════════════════════════════════ */
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            min-height: 100vh;
            font-family: 'Nunito', sans-serif;
            background-color: #FFF176;
            background-image: radial-gradient(circle, rgba(0,0,0,0.1) 1.5px, transparent 1.5px);
            background-size: 18px 18px;
            display: flex;
            align-items: flex-start;
            justify-content: center;
            padding: 40px 16px 80px;
            overflow-x: hidden;
        }

        /* ══════════════════════════════════════════
           MASUK HALAMAN — FADE + SLIDE UP
        ══════════════════════════════════════════ */
        .profil-wrap {
            width: 100%;
            max-width: 500px;
            position: relative;
            opacity: 0;
            transform: translateY(40px);
            transition: opacity 0.7s ease, transform 0.7s ease;
        }
        .profil-wrap.tampil {
            opacity: 1;
            transform: translateY(0);
        }

        /* ══════════════════════════════════════════
           HEADER PROFIL
        ══════════════════════════════════════════ */
        .profil-header {
            text-align: center;
            margin-bottom: 28px;
            animation: bounceIn 0.8s cubic-bezier(.36,.07,.19,.97) 0.3s both;
        }
        @keyframes bounceIn {
            0%   { opacity: 0; transform: scale(0.3) rotate(-10deg); }
            50%  { opacity: 1; transform: scale(1.1) rotate(3deg); }
            70%  { transform: scale(0.95) rotate(-1deg); }
            100% { transform: scale(1) rotate(0deg); }
        }

        .avatar-wrap {
            position: relative;
            display: inline-block;
            margin-bottom: 14px;
        }
        .avatar-img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            border: 5px solid #1A1A2E;
            box-shadow: 6px 6px 0 #1A1A2E;
            font-size: 4rem;
            background: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            animation: putar-slow 8s linear infinite;
        }
        @keyframes putar-slow {
            0%   { box-shadow: 6px 6px 0 #FF3B30; }
            25%  { box-shadow: 6px 6px 0 #FFE600; }
            50%  { box-shadow: 6px 6px 0 #2ECC40; }
            75%  { box-shadow: 6px 6px 0 #0057FF; }
            100% { box-shadow: 6px 6px 0 #FF3B30; }
        }

        .avatar-badge {
            position: absolute;
            bottom: 4px; right: -10px;
            background: #FF3B30;
            color: #fff;
            font-family: 'Bangers', cursive;
            font-size: 0.75rem;
            padding: 2px 9px;
            border: 2px solid #1A1A2E;
            border-radius: 20px;
            box-shadow: 2px 2px 0 #1A1A2E;
            letter-spacing: 1px;
            animation: wobble 2s ease-in-out infinite;
        }
        @keyframes wobble {
            0%, 100% { transform: rotate(-5deg); }
            50%       { transform: rotate(5deg); }
        }

        .profil-nama {
            font-family: 'Bangers', cursive;
            font-size: 2.6rem;
            letter-spacing: 3px;
            color: #1A1A2E;
            text-shadow: 3px 3px 0 #FF3B30, 5px 5px 0 rgba(0,0,0,0.1);
            line-height: 1.1;
        }
        .profil-bio {
            font-size: 0.95rem;
            color: #333;
            font-weight: 700;
            margin-top: 8px;
            background: #fff;
            border: 3px solid #1A1A2E;
            border-radius: 12px;
            padding: 6px 18px;
            display: inline-block;
            box-shadow: 3px 3px 0 #1A1A2E;
        }

        /* ══════════════════════════════════════════
           KATEGORI LABEL
        ══════════════════════════════════════════ */
        .kategori-label {
            font-family: 'Bangers', cursive;
            letter-spacing: 2px;
            font-size: 0.85rem;
            color: #888;
            text-transform: uppercase;
            padding: 8px 4px 4px;
            margin-top: 8px;
        }

        /* ══════════════════════════════════════════
           KOTAK KOMIK
        ══════════════════════════════════════════ */
        .komik-box {
            background: #fff;
            border: 4px solid #1A1A2E;
            border-radius: 18px;
            box-shadow: 7px 7px 0 #1A1A2E;
            padding: 22px;
            margin-bottom: 20px;
            position: relative;
        }
        .komik-box-judul {
            font-family: 'Bangers', cursive;
            font-size: 1rem;
            letter-spacing: 2px;
            background: #1A1A2E;
            color: #FFE600;
            display: inline-block;
            padding: 3px 14px;
            border-radius: 20px;
            margin-bottom: 14px;
            box-shadow: 2px 2px 0 rgba(0,0,0,0.3);
        }

        /* ══════════════════════════════════════════
           TOMBOL LINK — ANIMASI MASUK & KLIK
        ══════════════════════════════════════════ */
        .link-item {
            opacity: 0;
            transform: translateX(-30px);
            animation: slideInLink 0.4s ease forwards;
        }
        /* delay stagger tiap item */
        @keyframes slideInLink {
            to { opacity: 1; transform: translateX(0); }
        }

        .link-btn {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 14px 20px;
            border-radius: 14px;
            border: 4px solid #1A1A2E;
            box-shadow: 5px 5px 0 #1A1A2E;
            font-family: 'Nunito', sans-serif;
            font-weight: 900;
            font-size: 1rem;
            text-decoration: none;
            transition: transform 0.12s cubic-bezier(.36,.07,.19,.97),
                        box-shadow 0.12s cubic-bezier(.36,.07,.19,.97);
            position: relative;
            overflow: hidden;
            cursor: pointer;
            width: 100%;
        }

        /* Shimmer saat hover */
        .link-btn::after {
            content: '';
            position: absolute;
            top: 0; left: -100%;
            width: 60%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
            transition: left 0.4s ease;
        }
        .link-btn:hover::after { left: 140%; }

        .link-btn:hover {
            transform: translate(-4px, -4px);
            box-shadow: 9px 9px 0 #1A1A2E;
        }

        /* Animasi klik KENCANG */
        .link-btn:active,
        .link-btn.diklik {
            transform: translate(4px, 4px) scale(0.96) !important;
            box-shadow: 1px 1px 0 #1A1A2E !important;
        }

        .link-ikon {
            font-size: 1.6rem;
            line-height: 1;
            min-width: 32px;
            text-align: center;
            transition: transform 0.3s ease;
        }
        .link-btn:hover .link-ikon {
            transform: scale(1.3) rotate(-5deg);
        }

        .link-teks { flex: 1; }
        .link-teks-utama { display: block; font-size: 1rem; font-weight: 900; }
        .link-teks-sub {
            display: block;
            font-size: 0.75rem;
            opacity: 0.75;
            font-weight: 700;
            margin-top: 1px;
        }

        /* Badge klik count kecil */
        .link-klik-badge {
            font-size: 0.7rem;
            font-weight: 800;
            background: rgba(0,0,0,0.2);
            border-radius: 20px;
            padding: 2px 8px;
            white-space: nowrap;
        }

        /* ══════════════════════════════════════════
           EFEK PARTIKEL KLIK
        ══════════════════════════════════════════ */
        .partikel {
            position: fixed;
            pointer-events: none;
            z-index: 99999;
            font-family: 'Bangers', cursive;
            font-size: 1.4rem;
            font-weight: 900;
            letter-spacing: 1px;
            animation: partikelTerbang 0.8s ease-out forwards;
        }
        @keyframes partikelTerbang {
            0%   { opacity: 1; transform: translate(0,0) scale(1) rotate(0deg); }
            100% { opacity: 0; transform: translate(var(--dx), var(--dy)) scale(0.3) rotate(var(--dr)); }
        }

        /* ══════════════════════════════════════════
           DEKORASI KOMIK
        ══════════════════════════════════════════ */
        .dekor {
            font-family: 'Bangers', cursive;
            position: fixed;
            pointer-events: none;
            letter-spacing: 4px;
        }
        .dekor-1 {
            top: 5%; right: 3%;
            font-size: 5rem;
            color: rgba(255,59,48,0.12);
            transform: rotate(15deg);
            animation: dekorFloat 4s ease-in-out infinite;
        }
        .dekor-2 {
            bottom: 10%; left: 2%;
            font-size: 3.5rem;
            color: rgba(0,87,255,0.1);
            transform: rotate(-12deg);
            animation: dekorFloat 5s ease-in-out 1s infinite;
        }
        .dekor-3 {
            top: 45%; left: 1%;
            font-size: 2.5rem;
            color: rgba(46,204,64,0.1);
            transform: rotate(8deg);
            animation: dekorFloat 6s ease-in-out 2s infinite;
        }
        @keyframes dekorFloat {
            0%, 100% { transform: rotate(var(--r, 15deg)) translateY(0); }
            50%       { transform: rotate(var(--r, 15deg)) translateY(-12px); }
        }

        /* ══════════════════════════════════════════
           FOOTER
        ══════════════════════════════════════════ */
        .profil-footer {
            text-align: center;
            margin-top: 8px;
            padding-bottom: 20px;
        }
        .btn-admin {
            font-family: 'Bangers', cursive;
            letter-spacing: 2px;
            color: #1A1A2E;
            font-size: 0.95rem;
            text-decoration: none;
            background: #fff;
            border: 3px solid #1A1A2E;
            border-radius: 20px;
            padding: 5px 20px;
            box-shadow: 3px 3px 0 #1A1A2E;
            transition: all 0.15s;
            display: inline-block;
        }
        .btn-admin:hover {
            background: #1A1A2E;
            color: #FFE600;
            transform: translate(-2px, -2px);
            box-shadow: 5px 5px 0 #1A1A2E;
        }

        /* ══════════════════════════════════════════
           ANIMASI UMUM
        ══════════════════════════════════════════ */
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(20px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        /* Scroll reveal */
        .reveal {
            opacity: 0;
            transform: translateY(30px);
            transition: opacity 0.5s ease, transform 0.5s ease;
        }
        .reveal.tampil { opacity: 1; transform: translateY(0); }

        /* Pulse pada avatar */
        .pulse-ring {
            position: absolute;
            inset: -8px;
            border-radius: 50%;
            border: 3px solid #FF3B30;
            animation: pulseRing 2s ease-out infinite;
            opacity: 0;
        }
        @keyframes pulseRing {
            0%   { transform: scale(0.9); opacity: 0.7; }
            100% { transform: scale(1.3); opacity: 0; }
        }
    </style>
</head>
<body>

<!-- ══ LOADING SCREEN ══ -->
<div id="layar-muat">
    <div class="muat-teks">💥 BERBAGI<br>TAUTAN</div>
    <div class="muat-bar-wrap">
        <div class="muat-bar"></div>
    </div>
    <div class="muat-sub">Memuat link keren...</div>
</div>

<!-- ══ DEKORASI KOMIK ══ -->
<span class="dekor dekor-1" style="--r:15deg">POW!</span>
<span class="dekor dekor-2" style="--r:-12deg">ZAP!</span>
<span class="dekor dekor-3" style="--r:8deg">BAM!</span>

<!-- ══ KONTEN UTAMA ══ -->
<div class="profil-wrap" id="kontenUtama">

    <!-- Header -->
    <div class="profil-header">
        <div class="avatar-wrap">
            <div class="pulse-ring"></div>
            <div class="avatar-img">💥</div>
            <span class="avatar-badge">KEREN!</span>
        </div>
        <h1 class="profil-nama">BerbagiTautan</h1>
        <p class="profil-bio">✨ Semua linkku ada di sini, bro!</p>
    </div>

    @if($links->isEmpty())
        <div class="komik-box" style="text-align:center; padding:48px 20px;">
            <div style="font-family:'Bangers',cursive; font-size:2rem; color:#ccc; letter-spacing:2px;">
                😴 Belum ada link nih...
            </div>
        </div>
    @else

        {{-- Kelompokkan per kategori berdasarkan urutan --}}
        @php
            $kategori = [
                'Sosial Media'          => $links->whereBetween('urutan', [1, 5]),
                'Komunitas & Chat'      => $links->whereBetween('urutan', [6, 8]),
                'Marketplace'           => $links->whereBetween('urutan', [9, 11]),
                'Profesional'           => $links->whereBetween('urutan', [12, 14]),
                'Donasi & Support'      => $links->whereBetween('urutan', [15, 16]),
                'Konten & Lainnya'      => $links->whereBetween('urutan', [17, 99]),
            ];
            $delay = 0;
        @endphp

        @foreach($kategori as $namaKat => $itemKat)
            @if($itemKat->isNotEmpty())
                <div class="reveal">
                    <div class="komik-box">
                        <div class="komik-box-judul">{{ $namaKat }}</div>
                        <div style="display:flex; flex-direction:column; gap:12px;">
                            @foreach($itemKat as $link)
                                @php
                                    $delay += 80;
                                    // Sub-label per link
                                    $sublabel = match(true) {
                                        str_contains($link->url, 'instagram')  => 'instagram.com',
                                        str_contains($link->url, 'tiktok')     => 'tiktok.com',
                                        str_contains($link->url, 'youtube')    => 'youtube.com',
                                        str_contains($link->url, 'twitter')    => 'twitter.com',
                                        str_contains($link->url, 'facebook')   => 'facebook.com',
                                        str_contains($link->url, 'discord')    => 'discord.gg',
                                        str_contains($link->url, 'wa.me')      => 'WhatsApp Chat',
                                        str_contains($link->url, 't.me')       => 'Telegram',
                                        str_contains($link->url, 'shopee')     => 'shopee.co.id',
                                        str_contains($link->url, 'tokopedia')  => 'tokopedia.com',
                                        str_contains($link->url, 'lazada')     => 'lazada.co.id',
                                        str_contains($link->url, 'linkedin')   => 'linkedin.com',
                                        str_contains($link->url, 'github')     => 'github.com',
                                        str_contains($link->url, 'saweria')    => 'saweria.co',
                                        str_contains($link->url, 'trakteer')   => 'trakteer.id',
                                        str_contains($link->url, 'medium')     => 'medium.com',
                                        str_contains($link->url, 'spotify')    => 'open.spotify.com',
                                        str_contains($link->url, 'mailto')     => 'Kirim Email',
                                        default                                 => parse_url($link->url, PHP_URL_HOST) ?? $link->url,
                                    };
                                @endphp
                                <div class="link-item" style="animation-delay: {{ $delay }}ms;">
                                    <a href="{{ route('link.klik', $link) }}"
                                       class="link-btn"
                                       style="background:{{ $link->warna_bg }}; color:{{ $link->warna_teks }};"
                                       data-id="{{ $link->id }}">

                                        <span class="link-ikon">{{ $link->ikon }}</span>

                                        <span class="link-teks">
                                            <span class="link-teks-utama">{{ $link->judul }}</span>
                                            <span class="link-teks-sub">{{ $sublabel }}</span>
                                        </span>

                                        <span class="link-klik-badge">→</span>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif
        @endforeach

    @endif

    <!-- Footer -->
    <div class="profil-footer">
        <a href="{{ route('login') }}" class="btn-admin">⚙️ ADMIN</a>
        <p style="margin-top:12px; font-weight:700; font-size:0.8rem; color:#888;">
            Dibuat dengan 💥 <strong>BerbagiTautan</strong>
        </p>
    </div>
</div>

<script>
/* ══════════════════════════════════════
   LOADING SCREEN
══════════════════════════════════════ */
window.addEventListener('load', function () {
    setTimeout(function () {
        const layar = document.getElementById('layar-muat');
        const konten = document.getElementById('kontenUtama');
        layar.classList.add('hilang');
        konten.classList.add('tampil');
        initScrollReveal();
    }, 1400);
});

/* ══════════════════════════════════════
   SCROLL REVEAL
══════════════════════════════════════ */
function initScrollReveal() {
    const elemen = document.querySelectorAll('.reveal');
    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(function(entry) {
            if (entry.isIntersecting) {
                entry.target.classList.add('tampil');
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.1 });
    elemen.forEach(function(el) { observer.observe(el); });
}

/* ══════════════════════════════════════
   ANIMASI KLIK + PARTIKEL
══════════════════════════════════════ */
const partikelTeks = ['POW!','ZAP!','BAM!','KLIK!','WOW!','YES!','GO!','🔥','💥','⚡','✨','🎉'];
const partikelWarna = ['#FF3B30','#FFE600','#2ECC40','#0057FF','#FF851B','#FF69B4'];

document.querySelectorAll('.link-btn').forEach(function(btn) {
    btn.addEventListener('click', function(e) {
        // Animasi tombol getar
        btn.classList.add('diklik');
        setTimeout(function() { btn.classList.remove('diklik'); }, 300);

        // Buat 8 partikel
        for (let i = 0; i < 8; i++) {
            buatPartikel(e.clientX, e.clientY);
        }
    });
});

function buatPartikel(x, y) {
    const el = document.createElement('div');
    el.className = 'partikel';
    el.textContent = partikelTeks[Math.floor(Math.random() * partikelTeks.length)];
    el.style.color = partikelWarna[Math.floor(Math.random() * partikelWarna.length)];
    el.style.left = x + 'px';
    el.style.top  = y + 'px';

    const sudut = (Math.random() * 360) * (Math.PI / 180);
    const jarak = 60 + Math.random() * 80;
    el.style.setProperty('--dx', Math.cos(sudut) * jarak + 'px');
    el.style.setProperty('--dy', Math.sin(sudut) * jarak + 'px');
    el.style.setProperty('--dr', (Math.random() * 60 - 30) + 'deg');
    el.style.fontSize = (0.8 + Math.random() * 0.8) + 'rem';

    document.body.appendChild(el);
    setTimeout(function() { el.remove(); }, 900);
}
</script>
</body>
</html>
