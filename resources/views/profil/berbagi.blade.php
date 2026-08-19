<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $link->judul }} — BerbagiTautan</title>

    {{-- Open Graph / WhatsApp / Twitter Card --}}
    <meta property="og:type"        content="website">
    <meta property="og:title"       content="{{ $link->judul }} — BerbagiTautan">
    <meta property="og:description" content="{{ $link->deskripsi ?? 'Klik untuk membuka ' . $link->judul . ' — dikurasi oleh Rizki Habibi' }}">
    <meta property="og:url"         content="{{ url()->current() }}">
    <meta property="og:image"       content="https://rizki-habibi-portofolio.vercel.app/og-image.png">
    <meta name="twitter:card"       content="summary_large_image">
    <meta name="twitter:title"      content="{{ $link->judul }} — BerbagiTautan">
    <meta name="twitter:description" content="{{ $link->deskripsi ?? 'Klik untuk membuka ' . $link->judul }}">

    <link href="https://fonts.googleapis.com/css2?family=Bangers&family=Nunito:wght@400;700;800;900&display=swap" rel="stylesheet">

    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            min-height: 100vh;
            font-family: 'Nunito', sans-serif;
            background-color: #FFF176;
            background-image: radial-gradient(circle, rgba(0,0,0,0.1) 1.5px, transparent 1.5px);
            background-size: 18px 18px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 40px 16px 80px;
            overflow-x: hidden;
        }

        /* ══ DEKORASI ══ */
        .dekor {
            font-family: 'Bangers', cursive;
            position: fixed;
            pointer-events: none;
            letter-spacing: 4px;
        }
        .dekor-1 { top: 5%; right: 3%; font-size: 5rem; color: rgba(255,59,48,0.12); transform: rotate(15deg); animation: dekorFloat 4s ease-in-out infinite; }
        .dekor-2 { bottom: 10%; left: 2%; font-size: 3.5rem; color: rgba(0,87,255,0.1); transform: rotate(-12deg); animation: dekorFloat 5s ease-in-out 1s infinite; }
        .dekor-3 { top: 45%; left: 1%; font-size: 2.5rem; color: rgba(46,204,64,0.1); transform: rotate(8deg); animation: dekorFloat 6s ease-in-out 2s infinite; }
        @keyframes dekorFloat {
            0%, 100% { transform: rotate(var(--r, 15deg)) translateY(0); }
            50%       { transform: rotate(var(--r, 15deg)) translateY(-12px); }
        }

        /* ══ WRAPPER ══ */
        .berbagi-wrap {
            width: 100%;
            max-width: 480px;
            opacity: 0;
            transform: translateY(30px);
            transition: opacity 0.6s ease, transform 0.6s ease;
        }
        .berbagi-wrap.tampil { opacity: 1; transform: translateY(0); }

        /* ══ BACK LINK ══ */
        .tombol-kembali {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-family: 'Bangers', cursive;
            letter-spacing: 2px;
            color: #1A1A2E;
            font-size: 0.95rem;
            text-decoration: none;
            background: #fff;
            border: 3px solid #1A1A2E;
            border-radius: 20px;
            padding: 5px 18px;
            box-shadow: 3px 3px 0 #1A1A2E;
            transition: all 0.15s;
            margin-bottom: 24px;
        }
        .tombol-kembali:hover {
            background: #1A1A2E; color: #FFE600;
            transform: translate(-2px, -2px);
            box-shadow: 5px 5px 0 #1A1A2E;
        }

        /* ══ KARTU UTAMA ══ */
        .kartu-utama {
            background: #fff;
            border: 5px solid #1A1A2E;
            border-radius: 24px;
            box-shadow: 10px 10px 0 #1A1A2E;
            padding: 36px 28px 28px;
            margin-bottom: 20px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        /* Warna aksen atas kartu dari warna link */
        .kartu-strip {
            position: absolute;
            top: 0; left: 0; right: 0;
            height: 8px;
            background: {{ $link->warna_bg }};
            border-radius: 18px 18px 0 0;
        }

        .kartu-ikon {
            font-size: 4.5rem;
            margin-bottom: 16px;
            display: block;
            animation: ikonBounce 1.2s cubic-bezier(.36,.07,.19,.97) 0.4s both;
            filter: drop-shadow(3px 3px 0 rgba(0,0,0,0.15));
        }
        @keyframes ikonBounce {
            0%   { opacity: 0; transform: scale(0.4) rotate(-15deg); }
            60%  { opacity: 1; transform: scale(1.15) rotate(5deg); }
            80%  { transform: scale(0.95) rotate(-2deg); }
            100% { transform: scale(1) rotate(0deg); }
        }

        .kartu-judul {
            font-family: 'Bangers', cursive;
            font-size: 2.4rem;
            letter-spacing: 3px;
            color: #1A1A2E;
            text-shadow: 3px 3px 0 {{ $link->warna_bg }};
            line-height: 1.1;
            margin-bottom: 10px;
        }

        .kartu-deskripsi {
            font-size: 0.95rem;
            color: #555;
            font-weight: 700;
            background: #FFF9C4;
            border: 2px solid #1A1A2E;
            border-radius: 12px;
            padding: 8px 16px;
            margin: 0 auto 20px;
            display: inline-block;
            box-shadow: 2px 2px 0 #1A1A2E;
            max-width: 100%;
        }

        .kartu-domain {
            font-size: 0.78rem;
            color: #999;
            font-weight: 700;
            letter-spacing: 1px;
            margin-bottom: 24px;
            display: block;
        }

        /* ══ TOMBOL KUNJUNGI ══ */
        .tombol-kunjungi {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            width: 100%;
            padding: 18px 28px;
            border-radius: 16px;
            border: 4px solid #1A1A2E;
            box-shadow: 6px 6px 0 #1A1A2E;
            font-family: 'Bangers', cursive;
            font-size: 1.4rem;
            letter-spacing: 3px;
            text-decoration: none;
            cursor: pointer;
            transition: transform 0.12s cubic-bezier(.36,.07,.19,.97),
                        box-shadow 0.12s cubic-bezier(.36,.07,.19,.97);
            position: relative;
            overflow: hidden;
            background: {{ $link->warna_bg }};
            color: {{ $link->warna_teks }};
            animation: masukTombol 0.5s ease 0.6s both;
        }
        @keyframes masukTombol {
            from { opacity: 0; transform: translateY(20px); }
            to   { opacity: 1; transform: translateY(0); }
        }
        .tombol-kunjungi::after {
            content: '';
            position: absolute;
            top: 0; left: -100%;
            width: 60%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.35), transparent);
            transition: left 0.4s ease;
        }
        .tombol-kunjungi:hover::after { left: 140%; }
        .tombol-kunjungi:hover {
            transform: translate(-4px, -4px);
            box-shadow: 10px 10px 0 #1A1A2E;
        }
        .tombol-kunjungi:active {
            transform: translate(4px, 4px);
            box-shadow: 2px 2px 0 #1A1A2E;
        }

        /* ══ SEKSI BERBAGI ══ */
        .kotak-berbagi {
            background: #fff;
            border: 4px solid #1A1A2E;
            border-radius: 18px;
            box-shadow: 7px 7px 0 #1A1A2E;
            padding: 20px 24px;
            margin-bottom: 20px;
        }
        .berbagi-judul {
            font-family: 'Bangers', cursive;
            font-size: 1rem;
            letter-spacing: 2px;
            background: #1A1A2E;
            color: #FFE600;
            display: inline-block;
            padding: 3px 14px;
            border-radius: 20px;
            margin-bottom: 16px;
            box-shadow: 2px 2px 0 rgba(0,0,0,0.3);
        }

        .grid-sosmed {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 10px;
        }
        .btn-sosmed {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 10px 14px;
            border-radius: 12px;
            border: 3px solid #1A1A2E;
            box-shadow: 4px 4px 0 #1A1A2E;
            font-family: 'Nunito', sans-serif;
            font-weight: 900;
            font-size: 0.85rem;
            text-decoration: none;
            cursor: pointer;
            transition: transform 0.12s ease, box-shadow 0.12s ease;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .btn-sosmed:hover {
            transform: translate(-2px, -2px);
            box-shadow: 6px 6px 0 #1A1A2E;
        }
        .btn-sosmed:active {
            transform: translate(2px, 2px);
            box-shadow: 2px 2px 0 #1A1A2E;
        }

        /* tombol salin URL */
        .btn-salin {
            display: flex;
            align-items: center;
            gap: 8px;
            width: 100%;
            margin-top: 10px;
            padding: 10px 16px;
            border-radius: 12px;
            border: 3px solid #1A1A2E;
            box-shadow: 4px 4px 0 #1A1A2E;
            font-family: 'Nunito', sans-serif;
            font-weight: 900;
            font-size: 0.9rem;
            background: #FFF9C4;
            color: #1A1A2E;
            cursor: pointer;
            transition: all 0.15s;
        }
        .btn-salin:hover {
            background: #FFE600;
            transform: translate(-2px, -2px);
            box-shadow: 6px 6px 0 #1A1A2E;
        }
        .url-preview {
            font-size: 0.72rem;
            color: #aaa;
            font-weight: 700;
            margin-top: 8px;
            word-break: break-all;
            text-align: center;
            letter-spacing: 0.5px;
        }

        /* ══ SEKSI LINK LAIN ══ */
        .kotak-lainnya {
            background: #fff;
            border: 4px solid #1A1A2E;
            border-radius: 18px;
            box-shadow: 7px 7px 0 #1A1A2E;
            padding: 20px 24px;
            margin-bottom: 20px;
        }
        .link-kecil {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 10px 14px;
            border-radius: 12px;
            border: 3px solid #1A1A2E;
            box-shadow: 4px 4px 0 #1A1A2E;
            font-family: 'Nunito', sans-serif;
            font-weight: 900;
            font-size: 0.9rem;
            text-decoration: none;
            transition: transform 0.12s ease, box-shadow 0.12s ease;
            margin-bottom: 8px;
        }
        .link-kecil:last-child { margin-bottom: 0; }
        .link-kecil:hover {
            transform: translate(-2px, -2px);
            box-shadow: 6px 6px 0 #1A1A2E;
        }
        .link-kecil:active {
            transform: translate(2px, 2px);
            box-shadow: 2px 2px 0 #1A1A2E;
        }
        .link-kecil-ikon { font-size: 1.3rem; min-width: 24px; text-align: center; }
        .link-kecil-teks { flex: 1; }
        .lihat-semua {
            display: block;
            text-align: center;
            margin-top: 12px;
            font-family: 'Bangers', cursive;
            letter-spacing: 2px;
            color: #1A1A2E;
            font-size: 0.9rem;
            text-decoration: none;
            background: #1A1A2E;
            color: #FFE600;
            border-radius: 20px;
            padding: 6px 22px;
            box-shadow: 3px 3px 0 rgba(0,0,0,0.4);
            transition: all 0.15s;
        }
        .lihat-semua:hover { opacity: 0.85; transform: translate(-1px, -1px); }

        /* ══ FOOTER ══ */
        .berbagi-footer {
            text-align: center;
            padding-bottom: 20px;
        }

        /* ══ PARTIKEL ══ */
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

        /* ══ PORTOFOLIO BANNER ══ */
        .banner-porto {
            background: linear-gradient(135deg, #1A1A2E, #16213E);
            border: 4px solid #FFE600;
            border-radius: 18px;
            box-shadow: 7px 7px 0 #FFE600;
            padding: 20px 24px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 16px;
            text-decoration: none;
            transition: transform 0.15s ease, box-shadow 0.15s ease;
        }
        .banner-porto:hover {
            transform: translate(-3px, -3px);
            box-shadow: 10px 10px 0 #FFE600;
        }
        .banner-porto-ikon {
            font-size: 2.8rem;
            filter: drop-shadow(2px 2px 0 rgba(255,230,0,0.5));
        }
        .banner-porto-teks-utama {
            font-family: 'Bangers', cursive;
            font-size: 1.2rem;
            letter-spacing: 2px;
            color: #FFE600;
        }
        .banner-porto-teks-sub {
            font-size: 0.78rem;
            color: rgba(255,255,255,0.65);
            font-weight: 700;
            display: block;
            margin-top: 2px;
        }
        .banner-porto-badge {
            margin-left: auto;
            background: #FFE600;
            color: #1A1A2E;
            font-family: 'Bangers', cursive;
            font-size: 0.75rem;
            letter-spacing: 1px;
            padding: 3px 12px;
            border-radius: 20px;
            border: 2px solid #1A1A2E;
            white-space: nowrap;
            animation: wobble 2s ease-in-out infinite;
        }
        @keyframes wobble {
            0%, 100% { transform: rotate(-4deg); }
            50%       { transform: rotate(4deg); }
        }
    </style>
</head>
<body>

<!-- ══ DEKORASI ══ -->
<span class="dekor dekor-1" style="--r:15deg">POW!</span>
<span class="dekor dekor-2" style="--r:-12deg">ZAP!</span>
<span class="dekor dekor-3" style="--r:8deg">BAM!</span>

<!-- ══ KONTEN ══ -->
<div class="berbagi-wrap" id="berbagiWrap">

    {{-- Tombol kembali --}}
    <a href="{{ route('profil') }}" class="tombol-kembali">← SEMUA LINK</a>

    {{-- Kartu Utama --}}
    <div class="kartu-utama">
        <div class="kartu-strip"></div>

        <span class="kartu-ikon">{{ $link->ikon ?? '🔗' }}</span>

        <h1 class="kartu-judul">{{ $link->judul }}</h1>

        @if($link->deskripsi)
            <p class="kartu-deskripsi">{{ $link->deskripsi }}</p>
        @endif

        <span class="kartu-domain">
            🌐 {{ parse_url($link->url, PHP_URL_HOST) ?? $link->url }}
        </span>

        <a href="{{ route('link.klik', $link) }}"
           class="tombol-kunjungi"
           id="tombolKunjungi">
            <span>🚀</span>
            <span>KUNJUNGI SEKARANG</span>
        </a>
    </div>

    {{-- Portofolio Banner --}}
    <a href="https://rizki-habibi-portofolio.vercel.app" target="_blank" rel="noopener" class="banner-porto">
        <span class="banner-porto-ikon">👨‍💻</span>
        <div>
            <div class="banner-porto-teks-utama">RIZKI HABIBI</div>
            <span class="banner-porto-teks-sub">rizki-habibi-portofolio.vercel.app</span>
        </div>
        <span class="banner-porto-badge">PORTO →</span>
    </a>

    {{-- Seksi Berbagi --}}
    <div class="kotak-berbagi">
        <div class="berbagi-judul">📢 BAGIKAN KE</div>

        @php
            $urlBerbagi = urlencode(url()->current());
            $teks       = urlencode('Cek link ini: ' . $link->judul . ' — ' . url()->current());
        @endphp

        <div class="grid-sosmed">
            {{-- WhatsApp --}}
            <a href="https://wa.me/?text={{ $teks }}"
               target="_blank" rel="noopener"
               class="btn-sosmed"
               style="background:#25D366; color:#fff;">
                <span>💬</span> WhatsApp
            </a>

            {{-- Twitter / X --}}
            <a href="https://twitter.com/intent/tweet?text={{ $teks }}"
               target="_blank" rel="noopener"
               class="btn-sosmed"
               style="background:#000; color:#fff;">
                <span>𝕏</span> Twitter/X
            </a>

            {{-- Telegram --}}
            <a href="https://t.me/share/url?url={{ $urlBerbagi }}&text={{ urlencode($link->judul) }}"
               target="_blank" rel="noopener"
               class="btn-sosmed"
               style="background:#0088cc; color:#fff;">
                <span>✈️</span> Telegram
            </a>

            {{-- Facebook --}}
            <a href="https://www.facebook.com/sharer/sharer.php?u={{ $urlBerbagi }}"
               target="_blank" rel="noopener"
               class="btn-sosmed"
               style="background:#1877F2; color:#fff;">
                <span>👍</span> Facebook
            </a>
        </div>

        {{-- Tombol salin URL --}}
        <button class="btn-salin" id="btnSalin" onclick="salinURL()">
            <span id="salinIkon">📋</span>
            <span id="salinTeks">SALIN LINK HALAMAN INI</span>
        </button>
        <p class="url-preview">{{ url()->current() }}</p>
    </div>

    {{-- Link Lainnya --}}
    @if($linkLain->isNotEmpty())
    <div class="kotak-lainnya">
        <div class="berbagi-judul">🔗 LINK LAINNYA</div>
        @foreach($linkLain as $item)
            <a href="{{ route('link.berbagi', $item->slug) }}"
               class="link-kecil"
               style="background:{{ $item->warna_bg }}; color:{{ $item->warna_teks }};">
                <span class="link-kecil-ikon">{{ $item->ikon ?? '🔗' }}</span>
                <span class="link-kecil-teks">{{ $item->judul }}</span>
                <span>›</span>
            </a>
        @endforeach
        <a href="{{ route('profil') }}" class="lihat-semua">🔍 LIHAT SEMUA LINK</a>
    </div>
    @endif

    {{-- Footer --}}
    <div class="berbagi-footer">
        <a href="{{ route('login') }}"
           style="font-family:'Bangers',cursive; letter-spacing:2px; color:#1A1A2E; font-size:0.9rem; text-decoration:none;
                  background:#fff; border:3px solid #1A1A2E; border-radius:20px; padding:5px 18px;
                  box-shadow:3px 3px 0 #1A1A2E; display:inline-block; transition:all 0.15s;"
           onmouseover="this.style.background='#1A1A2E'; this.style.color='#FFE600';"
           onmouseout="this.style.background='#fff'; this.style.color='#1A1A2E';">
            ⚙️ ADMIN
        </a>
        <p style="margin-top:12px; font-weight:700; font-size:0.8rem; color:#888;">
            Dibuat dengan 💥 <strong>BerbagiTautan</strong>
        </p>
    </div>

</div>

<script>
// ══ Tampil saat load ══
window.addEventListener('load', function () {
    document.getElementById('berbagiWrap').classList.add('tampil');
});

// ══ Salin URL ══
function salinURL() {
    const url = '{{ url()->current() }}';
    if (navigator.clipboard) {
        navigator.clipboard.writeText(url).then(suksesKopi, gagalKopi);
    } else {
        const el = document.createElement('textarea');
        el.value = url;
        document.body.appendChild(el);
        el.select();
        document.execCommand('copy');
        el.remove();
        suksesKopi();
    }
}
function suksesKopi() {
    const ikon = document.getElementById('salinIkon');
    const teks = document.getElementById('salinTeks');
    ikon.textContent = '✅';
    teks.textContent = 'LINK TERSALIN!';
    setTimeout(function() {
        ikon.textContent = '📋';
        teks.textContent = 'SALIN LINK HALAMAN INI';
    }, 2500);
}
function gagalKopi() {
    alert('Salin manual: {{ url()->current() }}');
}

// ══ Partikel klik ══
const partikelTeks  = ['POW!','ZAP!','BAM!','KLIK!','WOW!','🔥','💥','⚡','✨','🎉'];
const partikelWarna = ['#FF3B30','#FFE600','#2ECC40','#0057FF','#FF851B','#FF69B4'];

document.getElementById('tombolKunjungi').addEventListener('click', function(e) {
    for (let i = 0; i < 10; i++) buatPartikel(e.clientX, e.clientY);
});

function buatPartikel(x, y) {
    const el = document.createElement('div');
    el.className = 'partikel';
    el.textContent = partikelTeks[Math.floor(Math.random() * partikelTeks.length)];
    el.style.color  = partikelWarna[Math.floor(Math.random() * partikelWarna.length)];
    el.style.left   = x + 'px';
    el.style.top    = y + 'px';
    const sudut = (Math.random() * 360) * (Math.PI / 180);
    const jarak = 60 + Math.random() * 80;
    el.style.setProperty('--dx', Math.cos(sudut) * jarak + 'px');
    el.style.setProperty('--dy', Math.sin(sudut) * jarak + 'px');
    el.style.setProperty('--dr', (Math.random() * 60 - 30) + 'deg');
    el.style.fontSize = (0.8 + Math.random() * 0.9) + 'rem';
    document.body.appendChild(el);
    setTimeout(function() { el.remove(); }, 900);
}
</script>
</body>
</html>
