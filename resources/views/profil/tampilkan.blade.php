<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rizki Habibi — BerbagiTautan</title>
    <meta name="description" content="Semua link Rizki Habibi ada di sini — portofolio, sosial media, marketplace, dan lainnya.">
    <meta property="og:title"       content="Rizki Habibi — BerbagiTautan">
    <meta property="og:description" content="Semua link Rizki Habibi ada di sini.">
    <meta property="og:image"       content="https://rizki-habibi-portofolio.vercel.app/og-image.png">
    <meta property="og:url"         content="{{ url('/') }}">
    <link href="https://fonts.googleapis.com/css2?family=Bangers&family=Nunito:wght@400;700;800;900&display=swap" rel="stylesheet">
    <style>
        /* ══ RESET & BASE ══ */
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        /* ══ LOADING SCREEN ══ */
        #layar-muat {
            position: fixed; inset: 0;
            background: #1A1A2E;
            z-index: 9999;
            display: flex; flex-direction: column;
            align-items: center; justify-content: center; gap: 20px;
            transition: opacity 0.6s ease, visibility 0.6s ease;
        }
        #layar-muat.hilang { opacity: 0; visibility: hidden; }
        .muat-teks {
            font-family: 'Bangers', cursive;
            font-size: 3rem; letter-spacing: 4px;
            color: #FFE600; text-shadow: 4px 4px 0 #FF3B30;
            animation: kedip 0.8s infinite alternate;
        }
        @keyframes kedip {
            from { opacity: 1; transform: scale(1); }
            to   { opacity: 0.6; transform: scale(0.95); }
        }
        .muat-bar-wrap {
            width: 220px; height: 18px;
            background: #333; border: 3px solid #FFE600;
            border-radius: 20px; overflow: hidden;
            box-shadow: 4px 4px 0 #FFE600;
        }
        .muat-bar {
            height: 100%;
            background: linear-gradient(90deg, #FF3B30, #FFE600, #2ECC40);
            border-radius: 20px; width: 0%;
            animation: isiBar 1.2s ease-out forwards;
        }
        @keyframes isiBar { 0%{width:0%} 60%{width:80%} 100%{width:100%} }
        .muat-sub {
            font-family: 'Nunito', sans-serif;
            color: #aaa; font-weight: 700; font-size: 0.9rem; letter-spacing: 1px;
        }

        /* ══ BODY ══ */
        body {
            min-height: 100vh;
            font-family: 'Nunito', sans-serif;
            background-color: #FFF9E3;
            background-image:
                radial-gradient(circle, rgba(0,0,0,0.07) 1.5px, transparent 1.5px);
            background-size: 20px 20px;
            display: flex; align-items: flex-start; justify-content: center;
            padding: 40px 16px 100px;
            overflow-x: hidden;
        }

        /* ══ WRAPPER ══ */
        .profil-wrap {
            width: 100%; max-width: 520px;
            opacity: 0; transform: translateY(40px);
            transition: opacity 0.7s ease, transform 0.7s ease;
        }
        .profil-wrap.tampil { opacity: 1; transform: translateY(0); }

        /* ══ DEKORASI ══ */
        .dekor {
            font-family: 'Bangers', cursive; position: fixed;
            pointer-events: none; letter-spacing: 4px;
        }
        .dekor-1 { top:5%; right:3%; font-size:5rem; color:rgba(255,59,48,0.1); animation:dekorFloat 4s ease-in-out infinite; }
        .dekor-2 { bottom:10%; left:2%; font-size:3.5rem; color:rgba(0,87,255,0.08); animation:dekorFloat 5s ease-in-out 1s infinite; }
        .dekor-3 { top:45%; left:1%; font-size:2.5rem; color:rgba(46,204,64,0.08); animation:dekorFloat 6s ease-in-out 2s infinite; }
        @keyframes dekorFloat {
            0%, 100% { transform: rotate(var(--r,15deg)) translateY(0); }
            50%       { transform: rotate(var(--r,15deg)) translateY(-14px); }
        }

        /* ══ KARAKTER VTUBER ══ */
        .karakter-wrap {
            position: fixed; bottom: 0;
            width: 170px; z-index: 5;
            pointer-events: none;
        }
        .karakter-wrap.kiri  { left: 0; }
        .karakter-wrap.kanan { right: 0; }
        .karakter-wrap img {
            width: 100%; height: auto;
            display: block;
            filter: drop-shadow(0 8px 24px rgba(0,0,0,0.22));
            animation: vtuberNafas 3.8s ease-in-out infinite;
        }
        .karakter-wrap.kanan img { animation-delay: 0.7s; animation-duration: 4.2s; }
        @keyframes vtuberNafas {
            0%, 100% { transform: translateY(0) scale(1); }
            50%       { transform: translateY(-16px) scale(1.01); }
        }
        .karakter-nama-tag {
            position: absolute; top: -36px; left: 50%;
            transform: translateX(-50%);
            background: #fff;
            border: 3px solid #1A1A2E;
            border-radius: 20px;
            padding: 3px 14px;
            font-family: 'Bangers', cursive;
            font-size: 0.8rem; letter-spacing: 2px;
            box-shadow: 3px 3px 0 #1A1A2E;
            white-space: nowrap;
            animation: vtuberNafas 3.8s ease-in-out infinite;
        }
        @media (max-width: 960px) {
            .karakter-wrap { display: none; }
        }

        /* ══ HEADER ══ */
        .profil-header {
            text-align: center; margin-bottom: 24px;
            animation: bounceIn 0.8s cubic-bezier(.36,.07,.19,.97) 0.3s both;
        }
        @keyframes bounceIn {
            0%   { opacity:0; transform:scale(0.3) rotate(-10deg); }
            50%  { opacity:1; transform:scale(1.1) rotate(3deg); }
            70%  { transform:scale(0.95) rotate(-1deg); }
            100% { transform:scale(1) rotate(0deg); }
        }
        .avatar-wrap { position:relative; display:inline-block; margin-bottom:12px; }
        .avatar-img {
            width:110px; height:110px;
            border-radius: 50%;
            border: 5px solid #1A1A2E;
            font-size: 3.8rem;
            background: #fff;
            display: flex; align-items:center; justify-content:center;
            animation: putar-slow 8s linear infinite;
            overflow: hidden;
        }
        .avatar-img img { width: 100%; height: 100%; object-fit: cover; }
        @keyframes putar-slow {
            0%   { box-shadow: 6px 6px 0 #FF3B30; }
            25%  { box-shadow: 6px 6px 0 #FFE600; }
            50%  { box-shadow: 6px 6px 0 #2ECC40; }
            75%  { box-shadow: 6px 6px 0 #0057FF; }
            100% { box-shadow: 6px 6px 0 #FF3B30; }
        }
        .avatar-badge {
            position:absolute; bottom:4px; right:-10px;
            background:#FF3B30; color:#fff;
            font-family:'Bangers',cursive; font-size:0.75rem;
            padding:2px 9px; border:2px solid #1A1A2E;
            border-radius:20px; box-shadow:2px 2px 0 #1A1A2E;
            letter-spacing:1px; animation:wobble 2s ease-in-out infinite;
        }
        .pulse-ring {
            position:absolute; inset:-8px; border-radius:50%;
            border:3px solid #FF3B30;
            animation:pulseRing 2s ease-out infinite; opacity:0;
        }
        @keyframes pulseRing {
            0%   { transform:scale(0.9); opacity:0.7; }
            100% { transform:scale(1.3); opacity:0; }
        }
        @keyframes wobble {
            0%,100% { transform:rotate(-5deg); }
            50%     { transform:rotate(5deg); }
        }
        .profil-nama {
            font-family:'Bangers',cursive; font-size:2.6rem;
            letter-spacing:3px; color:#1A1A2E;
            text-shadow: 3px 3px 0 #FF3B30, 5px 5px 0 rgba(0,0,0,0.08);
            line-height:1.1;
        }
        .profil-bio {
            font-size:0.92rem; color:#333; font-weight:700;
            margin-top:8px; background:#fff;
            border:3px solid #1A1A2E; border-radius:12px;
            padding:5px 16px; display:inline-block;
            box-shadow:3px 3px 0 #1A1A2E;
        }

        /* ══ SOSMED BARIS ══ */
        .sosmed-baris {
            display:flex; gap:8px; justify-content:center;
            flex-wrap:wrap; margin-top:12px;
        }
        .sosmed-btn {
            display:inline-flex; align-items:center; gap:5px;
            padding:5px 13px; border-radius:20px;
            border:3px solid #1A1A2E; box-shadow:3px 3px 0 #1A1A2E;
            font-family:'Nunito',sans-serif; font-weight:900; font-size:0.76rem;
            text-decoration:none;
            transition:transform 0.12s ease, box-shadow 0.12s ease;
        }
        .sosmed-btn:hover { transform:translate(-2px,-2px); box-shadow:5px 5px 0 #1A1A2E; }

        /* ══ SEARCH MENGAMBANG ══ */
        #cari-wrap {
            position: fixed;
            top: 16px; left: 50%;
            transform: translateX(-50%);
            z-index: 800;
            width: min(460px, calc(100vw - 32px));
            transition: all 0.3s ease;
        }
        #cari-input {
            width: 100%;
            padding: 12px 20px 12px 46px;
            border-radius: 50px;
            border: 4px solid #1A1A2E;
            box-shadow: 5px 5px 0 #1A1A2E;
            font-family: 'Nunito', sans-serif;
            font-weight: 800; font-size: 0.95rem;
            outline: none;
            background: rgba(255,255,255,0.95);
            backdrop-filter: blur(8px);
            transition: box-shadow 0.2s ease, border-color 0.2s ease;
        }
        #cari-input:focus {
            border-color: #0057FF;
            box-shadow: 5px 5px 0 #0057FF;
        }
        .cari-ikon {
            position: absolute; left: 16px; top: 50%;
            transform: translateY(-50%);
            font-size: 1.1rem; pointer-events: none;
        }
        /* Sembunyikan search saat scroll naik */
        #cari-wrap.tersembunyi { transform: translateX(-50%) translateY(-80px); opacity: 0; }

        /* ══ BANNER PORTO ══ */
        .banner-porto {
            background: linear-gradient(135deg, #1A1A2E, #0D2137);
            border: 4px solid #FFE600;
            border-radius: 18px;
            box-shadow: 7px 7px 0 #FFE600;
            padding: 16px 20px;
            margin-bottom: 18px;
            display: flex; align-items: center; gap: 14px;
            text-decoration: none;
            transition: transform 0.15s ease, box-shadow 0.15s ease;
        }
        .banner-porto:hover { transform:translate(-3px,-3px); box-shadow:10px 10px 0 #FFE600; }
        .banner-porto-ikon { font-size:2.4rem; }
        .banner-porto-nama { font-family:'Bangers',cursive; font-size:1.1rem; letter-spacing:2px; color:#FFE600; }
        .banner-porto-sub  { font-size:0.72rem; color:rgba(255,255,255,0.55); font-weight:700; display:block; margin-top:1px; }
        .banner-porto-badge {
            margin-left:auto;
            background:#FFE600; color:#1A1A2E;
            font-family:'Bangers',cursive; font-size:0.7rem; letter-spacing:1px;
            padding:3px 12px; border-radius:20px; border:2px solid #1A1A2E;
            white-space:nowrap; animation:wobble 2s ease-in-out infinite;
        }

        /* ══ KOTAK KATEGORI ══ */
        .komik-box {
            background:#fff;
            border:4px solid #1A1A2E;
            border-radius:18px;
            box-shadow:7px 7px 0 #1A1A2E;
            padding:20px; margin-bottom:18px;
        }
        .komik-box-judul {
            font-family:'Bangers',cursive; font-size:0.95rem;
            letter-spacing:2px; background:#1A1A2E; color:#FFE600;
            display:inline-block; padding:3px 14px;
            border-radius:20px; margin-bottom:14px;
            box-shadow:2px 2px 0 rgba(0,0,0,0.3);
        }

        /* ══ LINK BUTTON ══ */
        .link-item { opacity:0; transform:translateX(-24px); animation:slideInLink 0.4s ease forwards; }
        @keyframes slideInLink { to { opacity:1; transform:translateX(0); } }
        .link-item-wrap { position:relative; }
        .link-btn {
            display:flex; align-items:center; gap:13px;
            padding:13px 18px; border-radius:14px;
            border:4px solid #1A1A2E; box-shadow:5px 5px 0 #1A1A2E;
            font-family:'Nunito',sans-serif; font-weight:900; font-size:0.97rem;
            text-decoration:none;
            transition:transform 0.12s cubic-bezier(.36,.07,.19,.97),
                        box-shadow 0.12s cubic-bezier(.36,.07,.19,.97);
            position:relative; overflow:hidden; cursor:pointer; width:100%;
        }
        .link-btn::after {
            content:''; position:absolute;
            top:0; left:-100%; width:60%; height:100%;
            background:linear-gradient(90deg,transparent,rgba(255,255,255,0.3),transparent);
            transition:left 0.4s ease;
        }
        .link-btn:hover::after { left:140%; }
        .link-btn:hover { transform:translate(-4px,-4px); box-shadow:9px 9px 0 #1A1A2E; }
        .link-btn:active, .link-btn.diklik {
            transform:translate(4px,4px) scale(0.96) !important;
            box-shadow:1px 1px 0 #1A1A2E !important;
        }
        .link-ikon { font-size:1.5rem; line-height:1; min-width:30px; text-align:center; transition:transform 0.3s ease; }
        .link-btn:hover .link-ikon { transform:scale(1.3) rotate(-5deg); }
        .link-teks { flex:1; }
        .link-teks-utama { display:block; font-size:0.97rem; font-weight:900; }
        .link-teks-sub   { display:block; font-size:0.73rem; opacity:0.7; font-weight:700; margin-top:1px; }
        .link-klik-badge { font-size:0.68rem; font-weight:800; background:rgba(0,0,0,0.18); border-radius:20px; padding:2px 8px; }

        /* Tombol share per card */
        .tombol-share {
            position:absolute; right:-2px; top:50%;
            transform:translateY(-50%);
            opacity:0; background:#FFE600;
            border:3px solid #1A1A2E; border-radius:50%;
            width:32px; height:32px;
            display:flex; align-items:center; justify-content:center;
            font-size:0.8rem; box-shadow:3px 3px 0 #1A1A2E;
            text-decoration:none;
            transition:opacity 0.2s ease, transform 0.2s ease; z-index:10;
        }
        .link-item-wrap:hover .tombol-share, .tombol-share:focus {
            opacity:1; transform:translateY(-50%) translateX(6px);
        }
        .tombol-share:hover { background:#1A1A2E; color:#FFE600; }

        /* Sembunyikan saat pencarian tidak cocok */
        .link-item-wrap.tersembunyi-cari { display:none; }
        .komik-box.kosong-cari { display:none; }

        /* ══ SCROLL REVEAL ══ */
        .reveal { opacity:0; transform:translateY(24px); transition:opacity 0.5s ease, transform 0.5s ease; }
        .reveal.tampil { opacity:1; transform:translateY(0); }

        /* ══ PARTIKEL ══ */
        .partikel {
            position:fixed; pointer-events:none; z-index:99999;
            font-family:'Bangers',cursive; font-size:1.4rem;
            font-weight:900; letter-spacing:1px;
            animation:partikelTerbang 0.8s ease-out forwards;
        }
        @keyframes partikelTerbang {
            0%   { opacity:1; transform:translate(0,0) scale(1) rotate(0deg); }
            100% { opacity:0; transform:translate(var(--dx),var(--dy)) scale(0.3) rotate(var(--dr)); }
        }

        /* ══ FOOTER ══ */
        .profil-footer { text-align:center; margin-top:8px; padding-bottom:20px; }
        .btn-admin {
            font-family:'Bangers',cursive; letter-spacing:2px;
            color:#1A1A2E; font-size:0.92rem; text-decoration:none;
            background:#fff; border:3px solid #1A1A2E; border-radius:20px;
            padding:5px 20px; box-shadow:3px 3px 0 #1A1A2E;
            transition:all 0.15s; display:inline-block;
        }
        .btn-admin:hover { background:#1A1A2E; color:#FFE600; transform:translate(-2px,-2px); box-shadow:5px 5px 0 #1A1A2E; }

        /* ══ POPUP AI CHATBOT ══ */
        #tombol-ai {
            position:fixed; bottom:28px; right:28px;
            width:60px; height:60px; border-radius:50%;
            background:linear-gradient(135deg,#1A1A2E,#0057FF);
            border:4px solid #FFE600;
            box-shadow:5px 5px 0 #1A1A2E, 0 0 20px rgba(0,87,255,0.4);
            cursor:pointer; z-index:1000;
            display:flex; align-items:center; justify-content:center;
            font-size:1.7rem;
            transition:transform 0.2s ease, box-shadow 0.2s ease;
            animation:tombolPulse 2.5s ease-in-out infinite;
        }
        @keyframes tombolPulse {
            0%,100% { box-shadow:5px 5px 0 #1A1A2E, 0 0 0 0 rgba(0,87,255,0.5); }
            50%     { box-shadow:5px 5px 0 #1A1A2E, 0 0 0 10px rgba(0,87,255,0); }
        }
        #tombol-ai:hover { transform:scale(1.1) rotate(-5deg); }
        #tombol-ai-badge {
            position:absolute; top:-4px; right:-4px;
            background:#FF3B30; color:#fff;
            font-family:'Bangers',cursive; font-size:0.62rem;
            padding:1px 6px; border-radius:10px; border:2px solid #1A1A2E;
            animation:wobble 2s ease-in-out infinite;
        }
        #panel-ai {
            position:fixed; bottom:100px; right:28px;
            width:310px; max-height:470px;
            background:#fff; border:4px solid #1A1A2E;
            border-radius:20px; box-shadow:8px 8px 0 #1A1A2E;
            z-index:999; display:flex; flex-direction:column; overflow:hidden;
            transform:scale(0.85) translateY(20px); transform-origin:bottom right;
            opacity:0; pointer-events:none;
            transition:transform 0.25s cubic-bezier(.36,.07,.19,.97), opacity 0.25s ease;
        }
        #panel-ai.terbuka { transform:scale(1) translateY(0); opacity:1; pointer-events:all; }
        .ai-header {
            background:linear-gradient(135deg,#1A1A2E,#0057FF);
            padding:12px 15px; display:flex; align-items:center; gap:10px;
            border-bottom:3px solid #1A1A2E;
        }
        .ai-header-ikon { width:34px; height:34px; background:#FFE600; border-radius:50%; border:3px solid #fff; display:flex; align-items:center; justify-content:center; font-size:1rem; flex-shrink:0; }
        .ai-header-nama { font-family:'Bangers',cursive; font-size:0.95rem; letter-spacing:2px; color:#FFE600; }
        .ai-header-status { font-size:0.68rem; color:rgba(255,255,255,0.7); font-weight:700; }
        .ai-tutup { margin-left:auto; background:rgba(255,255,255,0.15); border:none; color:#fff; width:26px; height:26px; border-radius:50%; cursor:pointer; font-size:0.95rem; display:flex; align-items:center; justify-content:center; transition:background 0.15s; }
        .ai-tutup:hover { background:rgba(255,59,48,0.6); }
        #ai-pesan { flex:1; overflow-y:auto; padding:12px; display:flex; flex-direction:column; gap:9px; background:#FAFAFA; min-height:180px; max-height:260px; }
        #ai-pesan::-webkit-scrollbar { width:4px; }
        #ai-pesan::-webkit-scrollbar-thumb { background:#ddd; border-radius:4px; }
        .bubble { max-width:82%; padding:8px 12px; border-radius:14px; font-family:'Nunito',sans-serif; font-weight:700; font-size:0.83rem; line-height:1.45; border:2px solid #1A1A2E; animation:bubbleMuncul 0.25s ease; }
        @keyframes bubbleMuncul { from{opacity:0;transform:translateY(8px) scale(0.95)} to{opacity:1;transform:translateY(0) scale(1)} }
        .bubble-ai  { background:#fff; color:#1A1A2E; box-shadow:3px 3px 0 #1A1A2E; align-self:flex-start; border-radius:4px 14px 14px 14px; }
        .bubble-user{ background:#1A1A2E; color:#FFE600; box-shadow:3px 3px 0 rgba(0,0,0,0.3); align-self:flex-end; border-radius:14px 14px 4px 14px; border-color:#1A1A2E; }
        .typing-dots { display:flex; gap:4px; align-items:center; padding:4px 2px; }
        .typing-dots span { width:7px; height:7px; background:#999; border-radius:50%; animation:typingBounce 1s ease-in-out infinite; }
        .typing-dots span:nth-child(2){animation-delay:0.15s} .typing-dots span:nth-child(3){animation-delay:0.3s}
        @keyframes typingBounce { 0%,100%{transform:translateY(0);opacity:0.5} 50%{transform:translateY(-5px);opacity:1} }
        .ai-quick { padding:9px 12px; border-top:2px solid #eee; display:flex; gap:6px; flex-wrap:wrap; background:#fff; }
        .quick-btn { padding:4px 11px; border-radius:20px; border:2px solid #1A1A2E; background:#FFF9C4; font-family:'Nunito',sans-serif; font-weight:800; font-size:0.7rem; cursor:pointer; transition:all 0.12s ease; box-shadow:2px 2px 0 #1A1A2E; }
        .quick-btn:hover { background:#FFE600; transform:translate(-1px,-1px); box-shadow:3px 3px 0 #1A1A2E; }
        .ai-input-area { padding:9px 11px; border-top:3px solid #1A1A2E; display:flex; gap:7px; background:#fff; }
        #ai-input { flex:1; border:2px solid #1A1A2E; border-radius:10px; padding:7px 11px; font-family:'Nunito',sans-serif; font-weight:700; font-size:0.83rem; outline:none; background:#FAFAFA; }
        #ai-input:focus { border-color:#0057FF; background:#fff; }
        #ai-kirim { background:#0057FF; color:#fff; border:3px solid #1A1A2E; border-radius:10px; padding:0 13px; font-family:'Bangers',cursive; font-size:0.88rem; letter-spacing:1px; cursor:pointer; box-shadow:3px 3px 0 #1A1A2E; transition:all 0.12s ease; }
        #ai-kirim:hover { background:#FFE600; color:#1A1A2E; transform:translate(-1px,-1px); }
        @media(max-width:400px) { #panel-ai{width:calc(100vw - 32px);right:16px;} #tombol-ai{right:16px;bottom:16px;} }

        @keyframes fadeInUp { from{opacity:0;transform:translateY(20px)} to{opacity:1;transform:translateY(0)} }
    </style>
</head>
<body>

<!-- ══ LOADING SCREEN ══ -->
<div id="layar-muat">
    <div class="muat-teks">💥 BERBAGI<br>TAUTAN</div>
    <div class="muat-bar-wrap"><div class="muat-bar"></div></div>
    <div class="muat-sub">Memuat semua link Rizki...</div>
</div>

<!-- ══ DEKORASI ══ -->
<span class="dekor dekor-1" style="--r:15deg">POW!</span>
<span class="dekor dekor-2" style="--r:-12deg">ZAP!</span>
<span class="dekor dekor-3" style="--r:8deg">BAM!</span>

<!-- ══ KARAKTER VTUBER KIRI: Kobo Kanaeru (Hololive ID) ══ -->
<div class="karakter-wrap kiri">
    <div class="karakter-nama-tag">🌊 KOBO</div>
    <img src="https://static.wikia.nocookie.net/virtualyoutuber/images/9/93/Kobo_Kanaeru_-_Full_Illustration_01.png/revision/latest/scale-to-width-down/180?cb=20220327132648"
         alt="Kobo Kanaeru - Hololive ID"
         onerror="this.src='https://upload.wikimedia.org/wikipedia/commons/thumb/a/ad/YouTube_loading_symbol_1_(wobbly).gif/20px-YouTube_loading_symbol_1_(wobbly).gif'; this.style.opacity='0.3'">
</div>

<!-- ══ KARAKTER VTUBER KANAN: Kaela Kovalskia (Hololive ID) ══ -->
<div class="karakter-wrap kanan">
    <div class="karakter-nama-tag">🔨 KAELA</div>
    <img src="https://static.wikia.nocookie.net/virtualyoutuber/images/5/5a/Kaela_Kovalskia_-_Full_Illustration_01.png/revision/latest/scale-to-width-down/180?cb=20220327133018"
         alt="Kaela Kovalskia - Hololive ID"
         onerror="this.style.opacity='0.3'">
</div>

<!-- ══ SEARCH MENGAMBANG ══ -->
<div id="cari-wrap">
    <span class="cari-ikon">🔍</span>
    <input type="text" id="cari-input" placeholder="Cari link... (Lazada, YouTube, GitHub...)"
           autocomplete="off" spellcheck="false">
</div>

<!-- ══ POPUP AI CHATBOT ══ -->
<div id="tombol-ai" onclick="toggleAI()" title="Tanya AI Asisten">
    <span id="tombol-ai-ikon">🤖</span>
    <span id="tombol-ai-badge" style="display:none;">AI</span>
</div>
<div id="panel-ai">
    <div class="ai-header">
        <div class="ai-header-ikon">🤖</div>
        <div>
            <div class="ai-header-nama">RIZKI-AI</div>
            <div class="ai-header-status">● Online sekarang</div>
        </div>
        <button class="ai-tutup" onclick="toggleAI()">✕</button>
    </div>
    <div id="ai-pesan"></div>
    <div class="ai-quick" id="ai-quick">
        <button class="quick-btn" onclick="kirimQuick(this)">👋 Halo!</button>
        <button class="quick-btn" onclick="kirimQuick(this)">💼 Tentang Rizki</button>
        <button class="quick-btn" onclick="kirimQuick(this)">🔗 Link populer</button>
        <button class="quick-btn" onclick="kirimQuick(this)">🛒 Marketplace</button>
    </div>
    <div class="ai-input-area">
        <input id="ai-input" type="text" placeholder="Tanya sesuatu..." maxlength="200"
               onkeydown="if(event.key==='Enter') kirimPesan()">
        <button id="ai-kirim" onclick="kirimPesan()">KIRIM</button>
    </div>
</div>

<!-- ══ KONTEN UTAMA ══ -->
<div class="profil-wrap" id="kontenUtama">

    <!-- Header -->
    <div class="profil-header">
        <div class="avatar-wrap">
            <div class="pulse-ring"></div>
            <div class="avatar-img">
                <img src="https://avatars.githubusercontent.com/u/150777189?v=4"
                     alt="Rizki Habibi"
                     onerror="this.parentElement.innerHTML='👨‍💻'">
            </div>
            <span class="avatar-badge">OPEN!</span>
        </div>
        <h1 class="profil-nama">Rizki Habibi</h1>
        <p class="profil-bio">💻 Developer · Creator · Maker</p>

        <div class="sosmed-baris">
            <a href="https://github.com/rizki-habibi" target="_blank" rel="noopener"
               class="sosmed-btn" style="background:#1A1A2E;color:#fff;">🐙 GitHub</a>
            <a href="https://www.youtube.com/@26_rizkihabibi73" target="_blank" rel="noopener"
               class="sosmed-btn" style="background:#FF0000;color:#fff;">▶ YouTube</a>
            <a href="https://rizki-habibi-portofolio.vercel.app" target="_blank" rel="noopener"
               class="sosmed-btn" style="background:#FFE600;color:#1A1A2E;">🌐 Porto</a>
        </div>
    </div>

    {{-- Banner Portofolio --}}
    <div class="reveal">
        <a href="https://rizki-habibi-portofolio.vercel.app" target="_blank" rel="noopener" class="banner-porto">
            <span class="banner-porto-ikon">🚀</span>
            <div>
                <div class="banner-porto-nama">PORTOFOLIO RIZKI</div>
                <span class="banner-porto-sub">rizki-habibi-portofolio.vercel.app</span>
            </div>
            <span class="banner-porto-badge">LIHAT →</span>
        </a>
    </div>

    @if($links->isEmpty())
        <div class="komik-box" style="text-align:center;padding:48px 20px;">
            <div style="font-family:'Bangers',cursive;font-size:2rem;color:#ccc;letter-spacing:2px;">
                😴 Belum ada link nih...
            </div>
        </div>
    @else
        @php
            $kategori = [
                '📱 Sosial Media'       => $links->whereBetween('urutan', [1,  5]),
                '💬 Komunitas & Chat'   => $links->whereBetween('urutan', [6,  8]),
                '🛒 Marketplace'        => $links->whereBetween('urutan', [9, 11]),
                '💼 Profesional'        => $links->whereBetween('urutan', [12,14]),
                '☕ Donasi & Support'   => $links->whereBetween('urutan', [15,16]),
                '🎨 Konten & Lainnya'   => $links->whereBetween('urutan', [17,25]),
                '💻 Project & Repo'     => $links->whereBetween('urutan', [26,99]),
            ];
            $delay = 0;
        @endphp

        @foreach($kategori as $namaKat => $itemKat)
            @if($itemKat->isNotEmpty())
                <div class="reveal">
                    <div class="komik-box" data-kategori="{{ Str::slug($namaKat) }}">
                        <div class="komik-box-judul">{{ $namaKat }}</div>
                        <div style="display:flex;flex-direction:column;gap:10px;">
                            @foreach($itemKat as $link)
                                @php
                                    $delay += 70;
                                    $sublabel = match(true) {
                                        str_contains($link->url, 'instagram') => 'instagram.com',
                                        str_contains($link->url, 'tiktok')    => 'tiktok.com',
                                        str_contains($link->url, 'youtube')   => 'youtube.com',
                                        str_contains($link->url, 'twitter')   => 'twitter.com',
                                        str_contains($link->url, 'wa.me')     => 'WhatsApp Chat',
                                        str_contains($link->url, 't.me')      => 'Telegram',
                                        str_contains($link->url, 'shopee')    => 'shopee.co.id',
                                        str_contains($link->url, 'tokopedia') => 'tokopedia.com',
                                        str_contains($link->url, 'lazada')    => 'lazada.co.id',
                                        str_contains($link->url, 'linkedin')  => 'linkedin.com',
                                        str_contains($link->url, 'github')    => 'github.com',
                                        str_contains($link->url, 'saweria')   => 'saweria.co',
                                        str_contains($link->url, 'trakteer')  => 'trakteer.id',
                                        str_contains($link->url, 'medium')    => 'medium.com',
                                        str_contains($link->url, 'spotify')   => 'open.spotify.com',
                                        str_contains($link->url, 'mailto')    => 'Kirim Email',
                                        str_contains($link->url, 'vercel.app')=> parse_url($link->url, PHP_URL_HOST) ?? 'vercel.app',
                                        default => parse_url($link->url, PHP_URL_HOST) ?? $link->url,
                                    };
                                @endphp
                                <div class="link-item link-item-wrap"
                                     style="animation-delay:{{ $delay }}ms;"
                                     data-judul="{{ strtolower($link->judul) }}"
                                     data-sub="{{ strtolower($sublabel) }}">

                                    <a href="{{ route('link.klik', $link) }}"
                                       class="link-btn"
                                       style="background:{{ $link->warna_bg }};color:{{ $link->warna_teks }};"
                                       data-id="{{ $link->id }}">
                                        <span class="link-ikon">{{ $link->ikon }}</span>
                                        <span class="link-teks">
                                            <span class="link-teks-utama">{{ $link->judul }}</span>
                                            <span class="link-teks-sub">{{ $sublabel }}</span>
                                        </span>
                                        <span class="link-klik-badge">→</span>
                                    </a>

                                    @if($link->slug)
                                    <a href="{{ route('link.berbagi', $link->slug) }}"
                                       class="tombol-share" title="Bagikan {{ $link->judul }}">📤</a>
                                    @endif
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
        <p style="margin-top:10px;font-weight:700;font-size:0.78rem;color:#999;">
            Dibuat dengan 💥 <strong>BerbagiTautan</strong>
            &nbsp;·&nbsp; <a href="https://github.com/rizki-habibi/berbagi-tautan" target="_blank" rel="noopener" style="color:#999;">Source</a>
        </p>
    </div>
</div>

<script>
/* ══ LOADING ══ */
window.addEventListener('load', function() {
    setTimeout(function() {
        document.getElementById('layar-muat').classList.add('hilang');
        var k = document.getElementById('kontenUtama');
        k.classList.add('tampil');
        initScrollReveal();
        // Tampilkan search setelah loading
        document.getElementById('cari-wrap').style.display = 'flex';
    }, 1200);
});

/* ══ SCROLL REVEAL ══ */
function initScrollReveal() {
    var obs = new IntersectionObserver(function(entries) {
        entries.forEach(function(e) {
            if (e.isIntersecting) { e.target.classList.add('tampil'); obs.unobserve(e.target); }
        });
    }, { threshold: 0.08 });
    document.querySelectorAll('.reveal').forEach(function(el) { obs.observe(el); });
}

/* ══ SEARCH MENGAMBANG ══ */
var cariInput = document.getElementById('cari-input');
cariInput.addEventListener('input', function() {
    var q = this.value.toLowerCase().trim();
    var semuaKotak = document.querySelectorAll('.komik-box');

    semuaKotak.forEach(function(kotak) {
        var items = kotak.querySelectorAll('.link-item-wrap');
        var adaYangCocok = false;

        items.forEach(function(item) {
            var judul = item.dataset.judul || '';
            var sub   = item.dataset.sub   || '';
            var cocok = !q || judul.includes(q) || sub.includes(q);
            item.classList.toggle('tersembunyi-cari', !cocok);
            if (cocok) adaYangCocok = true;
        });

        kotak.classList.toggle('kosong-cari', !adaYangCocok && q !== '');
    });

    // Reveal semua kotak saat ada pencarian
    if (q) {
        document.querySelectorAll('.reveal').forEach(function(r) { r.classList.add('tampil'); });
    }
});

// Sembunyikan search bar saat scroll ke bawah, tampilkan saat ke atas
var lastScroll = 0;
window.addEventListener('scroll', function() {
    var cur = window.scrollY;
    document.getElementById('cari-wrap').classList.toggle('tersembunyi', cur > lastScroll && cur > 120);
    lastScroll = cur;
}, { passive: true });

/* ══ PARTIKEL KLIK ══ */
var partikelTeks  = ['POW!','ZAP!','BAM!','KLIK!','WOW!','🔥','💥','⚡','✨','🎉'];
var partikelWarna = ['#FF3B30','#FFE600','#2ECC40','#0057FF','#FF851B','#FF69B4'];

document.querySelectorAll('.link-btn').forEach(function(btn) {
    btn.addEventListener('click', function(e) {
        btn.classList.add('diklik');
        setTimeout(function() { btn.classList.remove('diklik'); }, 300);
        for (var i = 0; i < 8; i++) buatPartikel(e.clientX, e.clientY);
    });
});

function buatPartikel(x, y) {
    var el = document.createElement('div');
    el.className = 'partikel';
    el.textContent = partikelTeks[Math.floor(Math.random() * partikelTeks.length)];
    el.style.color = partikelWarna[Math.floor(Math.random() * partikelWarna.length)];
    el.style.left  = x + 'px';
    el.style.top   = y + 'px';
    var sudut = Math.random() * 360 * (Math.PI / 180);
    var jarak = 60 + Math.random() * 80;
    el.style.setProperty('--dx', Math.cos(sudut) * jarak + 'px');
    el.style.setProperty('--dy', Math.sin(sudut) * jarak + 'px');
    el.style.setProperty('--dr', (Math.random() * 60 - 30) + 'deg');
    el.style.fontSize = (0.8 + Math.random() * 0.8) + 'rem';
    document.body.appendChild(el);
    setTimeout(function() { el.remove(); }, 900);
}

/* ══ AI CHATBOT ══ */
var aiTerbuka = false, aiSudahSapa = false;
var aiData = {
    sapa     : 'Halo! 👋 Aku <strong>Rizki-AI</strong>. Ada yang bisa aku bantu tentang Rizki Habibi?',
    tentang  : 'Rizki Habibi adalah <strong>Developer · Creator · Maker</strong> 💻 asal Indonesia. Aktif di YouTube <a href="https://www.youtube.com/@26_rizkihabibi73" target="_blank" style="color:#0057FF;">@26_rizkihabibi73</a>, GitHub <a href="https://github.com/rizki-habibi" target="_blank" style="color:#0057FF;">rizki-habibi</a>, dan punya portofolio di <a href="https://rizki-habibi-portofolio.vercel.app" target="_blank" style="color:#0057FF;">vercel.app</a> 🚀',
    porto    : 'Portofolio Rizki ada di <a href="https://rizki-habibi-portofolio.vercel.app" target="_blank" style="color:#0057FF;">rizki-habibi-portofolio.vercel.app</a> — project, skill, pengalaman, dan kontak lengkap!',
    github   : 'GitHub Rizki: <a href="https://github.com/rizki-habibi" target="_blank" style="color:#0057FF;">github.com/rizki-habibi</a> — ada 20+ repo termasuk BerbagiTautan ini, VirtualKarakter, KVT Project Hub, dan banyak lagi! 💻',
    youtube  : 'Channel YouTube: <a href="https://www.youtube.com/@26_rizkihabibi73" target="_blank" style="color:#FF0000;">@26_rizkihabibi73</a> — subscribe untuk tutorial coding dan konten teknologi! ▶️',
    market   : 'Rizki punya toko di:<br>🛍️ <strong>Shopee</strong> — flash sale & promo<br>🟢 <strong>Tokopedia</strong> — belanja aman<br>🛒 <strong>Lazada</strong> — harga murah!<br><br>Klik langsung dari daftar di atas 👆',
    populer  : 'Link terpopuler:<br>🚀 <strong>Portofolio</strong> — wajib dikunjungi!<br>💻 <strong>GitHub</strong> — 20+ open-source repo<br>▶️ <strong>YouTube</strong> — tutorial coding<br>🛒 <strong>Marketplace</strong> — promo terbaik',
    default  : ['Hmm, belum paham 🤔 Coba tanya: <em>Tentang Rizki, Portofolio, GitHub, YouTube, atau Marketplace</em>!', 'Menarik! 😄 Aku spesialis info Rizki Habibi. Tanya soal <em>project, link populer, atau kontak</em> ya!']
};

function toggleAI() {
    var panel = document.getElementById('panel-ai');
    var ikon  = document.getElementById('tombol-ai-ikon');
    var badge = document.getElementById('tombol-ai-badge');
    aiTerbuka = !aiTerbuka;
    panel.classList.toggle('terbuka', aiTerbuka);
    ikon.textContent = aiTerbuka ? '✕' : '🤖';
    if (aiTerbuka) {
        badge.style.display = 'none';
        if (!aiSudahSapa) { aiSudahSapa = true; setTimeout(function() { tampilkanTyping(function() { tambahBubble('ai', aiData.sapa); }); }, 400); }
        setTimeout(function() { document.getElementById('ai-input').focus(); }, 300);
    }
}

function tambahBubble(tipe, teks) {
    var area = document.getElementById('ai-pesan');
    var div = document.createElement('div');
    div.className = 'bubble bubble-' + tipe;
    div.innerHTML = teks;
    area.appendChild(div);
    area.scrollTop = area.scrollHeight;
}

function tampilkanTyping(cb) {
    var area = document.getElementById('ai-pesan');
    var t = document.createElement('div');
    t.className = 'bubble bubble-ai'; t.id = 'typing-indicator';
    t.innerHTML = '<div class="typing-dots"><span></span><span></span><span></span></div>';
    area.appendChild(t); area.scrollTop = area.scrollHeight;
    setTimeout(function() { t.remove(); cb(); }, 800 + Math.random() * 500);
}

function kirimPesan() {
    var input = document.getElementById('ai-input');
    var teks = input.value.trim();
    if (!teks) return;
    tambahBubble('user', teks);
    input.value = '';
    document.getElementById('ai-quick').style.display = 'none';
    var q = teks.toLowerCase();
    var jawaban;
    if      (q.match(/halo|hai|hi|hello/))             jawaban = 'Halo! 👋 Senang bertemu kamu!';
    else if (q.match(/rizki|tentang|siapa|profil/))    jawaban = aiData.tentang;
    else if (q.match(/porto|portfolio|website/))       jawaban = aiData.porto;
    else if (q.match(/github|repo|code|project/))      jawaban = aiData.github;
    else if (q.match(/youtube|video|channel/))         jawaban = aiData.youtube;
    else if (q.match(/shopee|tokopedia|lazada|belanja/)) jawaban = aiData.market;
    else if (q.match(/populer|terbaik|top|favorit/))   jawaban = aiData.populer;
    else if (q.match(/terima kasih|makasih|thanks/))   jawaban = 'Sama-sama! 😊 Jangan lupa kunjungi porto Rizki ya! 🚀';
    else    jawaban = aiData.default[Math.floor(Math.random() * aiData.default.length)];
    tampilkanTyping(function() { tambahBubble('ai', jawaban); });
}

function kirimQuick(btn) { document.getElementById('ai-input').value = btn.textContent.trim(); kirimPesan(); }

setTimeout(function() {
    if (!aiTerbuka) {
        var b = document.getElementById('tombol-ai-badge');
        b.style.display = 'block'; b.textContent = '1';
    }
}, 3500);
</script>
</body>
</html>
