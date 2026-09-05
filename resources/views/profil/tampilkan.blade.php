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
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        /* ══ LOADING ══ */
        #layar-muat {
            position: fixed; inset: 0; background: #1A1A2E; z-index: 9999;
            display: flex; flex-direction: column; align-items: center; justify-content: center; gap: 20px;
            transition: opacity 0.6s ease, visibility 0.6s ease;
        }
        #layar-muat.hilang { opacity: 0; visibility: hidden; }
        .muat-teks { font-family:'Bangers',cursive; font-size:3rem; letter-spacing:4px; color:#FFE600; text-shadow:4px 4px 0 #FF3B30; animation:kedip 0.8s infinite alternate; }
        @keyframes kedip { from{opacity:1;transform:scale(1)} to{opacity:0.6;transform:scale(0.95)} }
        .muat-bar-wrap { width:220px; height:18px; background:#333; border:3px solid #FFE600; border-radius:20px; overflow:hidden; box-shadow:4px 4px 0 #FFE600; }
        .muat-bar { height:100%; background:linear-gradient(90deg,#FF3B30,#FFE600,#2ECC40); border-radius:20px; width:0%; animation:isiBar 1.2s ease-out forwards; }
        @keyframes isiBar { 0%{width:0%} 60%{width:80%} 100%{width:100%} }
        .muat-sub { font-family:'Nunito',sans-serif; color:#aaa; font-weight:700; font-size:0.9rem; letter-spacing:1px; }

        /* ══ BODY ══ */
        body {
            min-height: 100vh; font-family: 'Nunito', sans-serif;
            background-color: #FFF9E3;
            background-image: radial-gradient(circle, rgba(0,0,0,0.07) 1.5px, transparent 1.5px);
            background-size: 20px 20px;
            display: flex; align-items: flex-start; justify-content: center;
            padding: 40px 16px 100px; overflow-x: hidden;
        }

        /* ══ WRAPPER ══ */
        .profil-wrap { width:100%; max-width:520px; opacity:0; transform:translateY(40px); transition:opacity 0.7s ease,transform 0.7s ease; }
        .profil-wrap.tampil { opacity:1; transform:translateY(0); }

        /* ══ DEKORASI ══ */
        .dekor { font-family:'Bangers',cursive; position:fixed; pointer-events:none; letter-spacing:4px; }
        .dekor-1 { top:5%;right:3%;font-size:5rem;color:rgba(255,59,48,0.1);animation:dekorFloat 4s ease-in-out infinite; }
        .dekor-2 { bottom:10%;left:2%;font-size:3.5rem;color:rgba(0,87,255,0.08);animation:dekorFloat 5s ease-in-out 1s infinite; }
        .dekor-3 { top:45%;left:1%;font-size:2.5rem;color:rgba(46,204,64,0.08);animation:dekorFloat 6s ease-in-out 2s infinite; }
        @keyframes dekorFloat { 0%,100%{transform:rotate(var(--r,15deg)) translateY(0)} 50%{transform:rotate(var(--r,15deg)) translateY(-14px)} }

        /* ══ KARAKTER FOTO — saling hadap ══ */
        .karakter-wrap {
            position: fixed; bottom: 0; width: 180px; z-index: 5; pointer-events: none;
        }
        .karakter-wrap.kiri  { left: 0; }
        .karakter-wrap.kanan { right: 0; }
        .karakter-wrap img {
            width: 100%; height: auto; display: block;
            filter: drop-shadow(0 8px 28px rgba(0,0,0,0.28));
            animation: karakterNafas 3.8s ease-in-out infinite;
            object-fit: contain;
        }
        /* Foto kiri menghadap ke kanan (flip horizontal) */
        .karakter-wrap.kiri img  { transform-origin: bottom center; }
        /* Foto kanan menghadap ke kiri (flip horizontal) */
        .karakter-wrap.kanan img { transform: scaleX(-1); transform-origin: bottom center; animation-delay: 0.6s; animation-duration: 4.2s; }
        @keyframes karakterNafas {
            0%,100% { filter:drop-shadow(0 8px 28px rgba(0,0,0,0.28)); margin-bottom: 0; }
            50%      { filter:drop-shadow(0 14px 32px rgba(0,0,0,0.22)); margin-bottom: 14px; }
        }
        /* Kanan: gabungkan flip + naik-turun */
        .karakter-wrap.kanan img {
            animation-name: karakterNafasKanan;
        }
        @keyframes karakterNafasKanan {
            0%,100% { transform: scaleX(-1) translateY(0); }
            50%      { transform: scaleX(-1) translateY(-14px); }
        }
        @media (max-width: 960px) { .karakter-wrap { display: none; } }

        /* ══ HEADER ══ */
        .profil-header { text-align:center; margin-bottom:20px; animation:bounceIn 0.8s cubic-bezier(.36,.07,.19,.97) 0.3s both; }
        @keyframes bounceIn { 0%{opacity:0;transform:scale(0.3) rotate(-10deg)} 50%{opacity:1;transform:scale(1.1) rotate(3deg)} 70%{transform:scale(0.95) rotate(-1deg)} 100%{transform:scale(1) rotate(0deg)} }
        .avatar-wrap { position:relative; display:inline-block; margin-bottom:10px; }
        .avatar-img { width:100px;height:100px;border-radius:50%;border:5px solid #1A1A2E;font-size:3.5rem;background:#fff;display:flex;align-items:center;justify-content:center;animation:putar-slow 8s linear infinite;overflow:hidden; }
        .avatar-img img { width:100%;height:100%;object-fit:cover; }
        @keyframes putar-slow { 0%{box-shadow:6px 6px 0 #FF3B30} 25%{box-shadow:6px 6px 0 #FFE600} 50%{box-shadow:6px 6px 0 #2ECC40} 75%{box-shadow:6px 6px 0 #0057FF} 100%{box-shadow:6px 6px 0 #FF3B30} }
        .avatar-badge { position:absolute;bottom:4px;right:-10px;background:#FF3B30;color:#fff;font-family:'Bangers',cursive;font-size:0.75rem;padding:2px 9px;border:2px solid #1A1A2E;border-radius:20px;box-shadow:2px 2px 0 #1A1A2E;letter-spacing:1px;animation:wobble 2s ease-in-out infinite; }
        .pulse-ring { position:absolute;inset:-8px;border-radius:50%;border:3px solid #FF3B30;animation:pulseRing 2s ease-out infinite;opacity:0; }
        @keyframes pulseRing { 0%{transform:scale(0.9);opacity:0.7} 100%{transform:scale(1.3);opacity:0} }
        @keyframes wobble { 0%,100%{transform:rotate(-5deg)} 50%{transform:rotate(5deg)} }
        .profil-nama { font-family:'Bangers',cursive;font-size:2.6rem;letter-spacing:3px;color:#1A1A2E;text-shadow:3px 3px 0 #FF3B30,5px 5px 0 rgba(0,0,0,0.08);line-height:1.1; }
        .profil-bio { font-size:0.92rem;color:#333;font-weight:700;margin-top:6px;background:#fff;border:3px solid #1A1A2E;border-radius:12px;padding:5px 16px;display:inline-block;box-shadow:3px 3px 0 #1A1A2E; }

        /* ══ SEARCH INLINE (di bawah bio) ══ */
        .cari-inline-wrap {
            position: relative;
            margin: 12px auto 0;
            max-width: 360px;
        }
        .cari-inline-ikon {
            position: absolute; left: 14px; top: 50%;
            transform: translateY(-50%);
            font-size: 1rem; pointer-events: none;
        }
        #cari-input {
            width: 100%;
            padding: 10px 18px 10px 40px;
            border-radius: 50px;
            border: 3px solid #1A1A2E;
            box-shadow: 4px 4px 0 #1A1A2E;
            font-family: 'Nunito', sans-serif;
            font-weight: 800; font-size: 0.88rem;
            outline: none;
            background: rgba(255,255,255,0.95);
            transition: border-color 0.2s ease, box-shadow 0.2s ease;
        }
        #cari-input:focus { border-color: #0057FF; box-shadow: 4px 4px 0 #0057FF; }

        /* ══ SOSMED BARIS ══ */
        .sosmed-baris { display:flex;gap:8px;justify-content:center;flex-wrap:wrap;margin-top:10px; }
        .sosmed-btn { display:inline-flex;align-items:center;gap:5px;padding:5px 13px;border-radius:20px;border:3px solid #1A1A2E;box-shadow:3px 3px 0 #1A1A2E;font-family:'Nunito',sans-serif;font-weight:900;font-size:0.76rem;text-decoration:none;transition:transform 0.12s ease,box-shadow 0.12s ease; }
        .sosmed-btn:hover { transform:translate(-2px,-2px);box-shadow:5px 5px 0 #1A1A2E; }

        /* ══ BANNER PORTO ══ */
        .banner-porto { background:linear-gradient(135deg,#1A1A2E,#0D2137);border:4px solid #FFE600;border-radius:18px;box-shadow:7px 7px 0 #FFE600;padding:16px 20px;margin-bottom:18px;display:flex;align-items:center;gap:14px;text-decoration:none;transition:transform 0.15s ease,box-shadow 0.15s ease; }
        .banner-porto:hover { transform:translate(-3px,-3px);box-shadow:10px 10px 0 #FFE600; }
        .banner-porto-ikon { font-size:2.4rem; }
        .banner-porto-nama { font-family:'Bangers',cursive;font-size:1.1rem;letter-spacing:2px;color:#FFE600; }
        .banner-porto-sub  { font-size:0.72rem;color:rgba(255,255,255,0.55);font-weight:700;display:block;margin-top:1px; }
        .banner-porto-badge { margin-left:auto;background:#FFE600;color:#1A1A2E;font-family:'Bangers',cursive;font-size:0.7rem;letter-spacing:1px;padding:3px 12px;border-radius:20px;border:2px solid #1A1A2E;white-space:nowrap;animation:wobble 2s ease-in-out infinite; }

        /* ══ KOTAK KATEGORI ══ */
        .komik-box { background:#fff;border:4px solid #1A1A2E;border-radius:18px;box-shadow:7px 7px 0 #1A1A2E;padding:20px;margin-bottom:18px; }
        .komik-box-judul { font-family:'Bangers',cursive;font-size:0.95rem;letter-spacing:2px;background:#1A1A2E;color:#FFE600;display:inline-block;padding:3px 14px;border-radius:20px;margin-bottom:14px;box-shadow:2px 2px 0 rgba(0,0,0,0.3); }

        /* ══ LINK BUTTON ══ */
        .link-item { opacity:0;transform:translateX(-24px);animation:slideInLink 0.4s ease forwards; }
        @keyframes slideInLink { to{opacity:1;transform:translateX(0)} }
        .link-item-wrap { position:relative; margin-bottom: 0; }

        /* Container link + dropdown */
        .link-row { display: flex; flex-direction: column; gap: 0; }

        .link-btn {
            display:flex;align-items:center;gap:13px;
            padding:13px 18px;border-radius:14px;
            border:4px solid #1A1A2E;box-shadow:5px 5px 0 #1A1A2E;
            font-family:'Nunito',sans-serif;font-weight:900;font-size:0.97rem;
            text-decoration:none;
            transition:transform 0.12s cubic-bezier(.36,.07,.19,.97),box-shadow 0.12s cubic-bezier(.36,.07,.19,.97);
            position:relative;overflow:hidden;cursor:pointer;width:100%;
        }
        /* Rounded bawah dikondisikan */
        .link-btn.ada-dropdown { border-radius: 14px 14px 0 0; border-bottom: 2px solid rgba(0,0,0,0.2); }
        .link-btn::after { content:'';position:absolute;top:0;left:-100%;width:60%;height:100%;background:linear-gradient(90deg,transparent,rgba(255,255,255,0.3),transparent);transition:left 0.4s ease; }
        .link-btn:hover::after { left:140%; }
        .link-btn:hover { transform:translate(-4px,-4px);box-shadow:9px 9px 0 #1A1A2E; }
        .link-btn.ada-dropdown:hover { transform:translate(-4px,-4px);box-shadow:9px 9px 0 #1A1A2E; border-radius:14px 14px 0 0; }
        .link-btn:active,.link-btn.diklik { transform:translate(4px,4px) scale(0.96)!important;box-shadow:1px 1px 0 #1A1A2E!important; }
        .link-ikon { font-size:1.5rem;line-height:1;min-width:30px;text-align:center;transition:transform 0.3s ease; }
        .link-btn:hover .link-ikon { transform:scale(1.3) rotate(-5deg); }
        .link-teks { flex:1; }
        .link-teks-utama { display:block;font-size:0.97rem;font-weight:900; }
        .link-teks-sub   { display:block;font-size:0.73rem;opacity:0.7;font-weight:700;margin-top:1px; }

        /* Tombol info dropdown */
        .btn-info-toggle {
            flex-shrink: 0;
            display: flex; align-items: center; gap: 4px;
            padding: 4px 10px;
            border-radius: 20px;
            border: 2px solid rgba(255,255,255,0.5);
            background: rgba(0,0,0,0.15);
            color: inherit;
            font-family: 'Nunito', sans-serif;
            font-weight: 800; font-size: 0.7rem;
            cursor: pointer;
            transition: background 0.15s ease;
            white-space: nowrap;
        }
        .btn-info-toggle:hover { background: rgba(0,0,0,0.3); }
        .btn-info-toggle .panah { transition: transform 0.25s ease; font-size: 0.6rem; }
        .btn-info-toggle.terbuka .panah { transform: rotate(180deg); }

        /* Tombol share */
        .tombol-share { position:absolute;right:-2px;top:50%;transform:translateY(-50%);opacity:0;background:#FFE600;border:3px solid #1A1A2E;border-radius:50%;width:32px;height:32px;display:flex;align-items:center;justify-content:center;font-size:0.8rem;box-shadow:3px 3px 0 #1A1A2E;text-decoration:none;transition:opacity 0.2s ease,transform 0.2s ease;z-index:10; }
        .link-item-wrap:hover .tombol-share,.tombol-share:focus { opacity:1;transform:translateY(-50%) translateX(6px); }
        .tombol-share:hover { background:#1A1A2E;color:#FFE600; }

        /* ══ DROPDOWN INFO ══ */
        .dropdown-info {
            background: rgba(255,255,255,0.12);
            border: 0 solid transparent;
            border-radius: 0 0 14px 14px;
            border-left: 4px solid #1A1A2E;
            border-right: 4px solid #1A1A2E;
            border-bottom: 4px solid #1A1A2E;
            box-shadow: 5px 5px 0 #1A1A2E;
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease, padding 0.2s ease;
            backdrop-filter: brightness(0.92);
        }
        .dropdown-info.terbuka { max-height: 200px; padding: 10px 16px 14px; }
        .dropdown-info-isi {
            font-family: 'Nunito', sans-serif;
            font-size: 0.82rem; font-weight: 700;
            line-height: 1.55;
            display: flex; flex-direction: column; gap: 6px;
        }
        .dropdown-tujuan {
            display: flex; align-items: flex-start; gap: 8px;
        }
        .dropdown-tujuan-label {
            font-family: 'Bangers', cursive; font-size: 0.7rem;
            letter-spacing: 1px; opacity: 0.7;
            background: rgba(0,0,0,0.15);
            padding: 1px 8px; border-radius: 10px;
            white-space: nowrap; flex-shrink: 0;
        }
        .dropdown-url-link {
            font-size: 0.72rem; opacity: 0.8;
            text-decoration: underline; word-break: break-all;
        }

        /* Sembunyikan saat pencarian tidak cocok */
        .link-item-wrap.tersembunyi-cari { display:none; }
        .komik-box.kosong-cari { display:none; }

        /* ══ SCROLL REVEAL ══ */
        .reveal { opacity:0;transform:translateY(24px);transition:opacity 0.5s ease,transform 0.5s ease; }
        .reveal.tampil { opacity:1;transform:translateY(0); }

        /* ══ PARTIKEL ══ */
        .partikel { position:fixed;pointer-events:none;z-index:99999;font-family:'Bangers',cursive;font-size:1.4rem;font-weight:900;letter-spacing:1px;animation:partikelTerbang 0.8s ease-out forwards; }
        @keyframes partikelTerbang { 0%{opacity:1;transform:translate(0,0) scale(1) rotate(0deg)} 100%{opacity:0;transform:translate(var(--dx),var(--dy)) scale(0.3) rotate(var(--dr))} }

        /* ══ FOOTER ══ */
        .profil-footer { text-align:center;margin-top:8px;padding-bottom:20px; }
        .btn-admin { font-family:'Bangers',cursive;letter-spacing:2px;color:#1A1A2E;font-size:0.92rem;text-decoration:none;background:#fff;border:3px solid #1A1A2E;border-radius:20px;padding:5px 20px;box-shadow:3px 3px 0 #1A1A2E;transition:all 0.15s;display:inline-block; }
        .btn-admin:hover { background:#1A1A2E;color:#FFE600;transform:translate(-2px,-2px);box-shadow:5px 5px 0 #1A1A2E; }

        /* ══ POPUP AI ══ */
        #tombol-ai { position:fixed;bottom:28px;right:28px;width:58px;height:58px;border-radius:50%;background:linear-gradient(135deg,#1A1A2E,#0057FF);border:4px solid #FFE600;box-shadow:5px 5px 0 #1A1A2E,0 0 20px rgba(0,87,255,0.4);cursor:pointer;z-index:1000;display:flex;align-items:center;justify-content:center;font-size:1.6rem;transition:transform 0.2s ease;animation:tombolPulse 2.5s ease-in-out infinite; }
        @keyframes tombolPulse { 0%,100%{box-shadow:5px 5px 0 #1A1A2E,0 0 0 0 rgba(0,87,255,0.5)} 50%{box-shadow:5px 5px 0 #1A1A2E,0 0 0 10px rgba(0,87,255,0)} }
        #tombol-ai:hover { transform:scale(1.1) rotate(-5deg); }
        #tombol-ai-badge { position:absolute;top:-4px;right:-4px;background:#FF3B30;color:#fff;font-family:'Bangers',cursive;font-size:0.62rem;padding:1px 6px;border-radius:10px;border:2px solid #1A1A2E;animation:wobble 2s ease-in-out infinite; }
        #panel-ai { position:fixed;bottom:98px;right:28px;width:310px;max-height:470px;background:#fff;border:4px solid #1A1A2E;border-radius:20px;box-shadow:8px 8px 0 #1A1A2E;z-index:999;display:flex;flex-direction:column;overflow:hidden;transform:scale(0.85) translateY(20px);transform-origin:bottom right;opacity:0;pointer-events:none;transition:transform 0.25s cubic-bezier(.36,.07,.19,.97),opacity 0.25s ease; }
        #panel-ai.terbuka { transform:scale(1) translateY(0);opacity:1;pointer-events:all; }
        .ai-header { background:linear-gradient(135deg,#1A1A2E,#0057FF);padding:12px 15px;display:flex;align-items:center;gap:10px;border-bottom:3px solid #1A1A2E; }
        .ai-header-ikon { width:34px;height:34px;background:#FFE600;border-radius:50%;border:3px solid #fff;display:flex;align-items:center;justify-content:center;font-size:1rem;flex-shrink:0; }
        .ai-header-nama { font-family:'Bangers',cursive;font-size:0.95rem;letter-spacing:2px;color:#FFE600; }
        .ai-header-status { font-size:0.68rem;color:rgba(255,255,255,0.7);font-weight:700; }
        .ai-tutup { margin-left:auto;background:rgba(255,255,255,0.15);border:none;color:#fff;width:26px;height:26px;border-radius:50%;cursor:pointer;font-size:0.95rem;display:flex;align-items:center;justify-content:center;transition:background 0.15s; }
        .ai-tutup:hover { background:rgba(255,59,48,0.6); }
        #ai-pesan { flex:1;overflow-y:auto;padding:12px;display:flex;flex-direction:column;gap:9px;background:#FAFAFA;min-height:180px;max-height:260px; }
        #ai-pesan::-webkit-scrollbar { width:4px; } #ai-pesan::-webkit-scrollbar-thumb { background:#ddd;border-radius:4px; }
        .bubble { max-width:82%;padding:8px 12px;border-radius:14px;font-family:'Nunito',sans-serif;font-weight:700;font-size:0.83rem;line-height:1.45;border:2px solid #1A1A2E;animation:bubbleMuncul 0.25s ease; }
        @keyframes bubbleMuncul { from{opacity:0;transform:translateY(8px) scale(0.95)} to{opacity:1;transform:translateY(0) scale(1)} }
        .bubble-ai  { background:#fff;color:#1A1A2E;box-shadow:3px 3px 0 #1A1A2E;align-self:flex-start;border-radius:4px 14px 14px 14px; }
        .bubble-user{ background:#1A1A2E;color:#FFE600;box-shadow:3px 3px 0 rgba(0,0,0,0.3);align-self:flex-end;border-radius:14px 14px 4px 14px;border-color:#1A1A2E; }
        .typing-dots { display:flex;gap:4px;align-items:center;padding:4px 2px; }
        .typing-dots span { width:7px;height:7px;background:#999;border-radius:50%;animation:typingBounce 1s ease-in-out infinite; }
        .typing-dots span:nth-child(2){animation-delay:0.15s} .typing-dots span:nth-child(3){animation-delay:0.3s}
        @keyframes typingBounce { 0%,100%{transform:translateY(0);opacity:0.5} 50%{transform:translateY(-5px);opacity:1} }
        .ai-quick { padding:9px 12px;border-top:2px solid #eee;display:flex;gap:6px;flex-wrap:wrap;background:#fff; }
        .quick-btn { padding:4px 11px;border-radius:20px;border:2px solid #1A1A2E;background:#FFF9C4;font-family:'Nunito',sans-serif;font-weight:800;font-size:0.7rem;cursor:pointer;transition:all 0.12s ease;box-shadow:2px 2px 0 #1A1A2E; }
        .quick-btn:hover { background:#FFE600;transform:translate(-1px,-1px);box-shadow:3px 3px 0 #1A1A2E; }
        .ai-input-area { padding:9px 11px;border-top:3px solid #1A1A2E;display:flex;gap:7px;background:#fff; }
        #ai-input { flex:1;border:2px solid #1A1A2E;border-radius:10px;padding:7px 11px;font-family:'Nunito',sans-serif;font-weight:700;font-size:0.83rem;outline:none;background:#FAFAFA; }
        #ai-input:focus { border-color:#0057FF;background:#fff; }
        #ai-kirim { background:#0057FF;color:#fff;border:3px solid #1A1A2E;border-radius:10px;padding:0 13px;font-family:'Bangers',cursive;font-size:0.88rem;letter-spacing:1px;cursor:pointer;box-shadow:3px 3px 0 #1A1A2E;transition:all 0.12s ease; }
        #ai-kirim:hover { background:#FFE600;color:#1A1A2E;transform:translate(-1px,-1px); }
        @media(max-width:400px){ #panel-ai{width:calc(100vw - 32px);right:16px;} #tombol-ai{right:16px;bottom:16px;} }

        @keyframes fadeInUp { from{opacity:0;transform:translateY(20px)} to{opacity:1;transform:translateY(0)} }
    </style>
</head>
<body>

<!-- ══ LOADING ══ -->
<div id="layar-muat">
    <div class="muat-teks">💥 BERBAGI<br>TAUTAN</div>
    <div class="muat-bar-wrap"><div class="muat-bar"></div></div>
    <div class="muat-sub">Memuat semua link Rizki...</div>
</div>

<!-- ══ DEKORASI ══ -->
<span class="dekor dekor-1" style="--r:15deg">POW!</span>
<span class="dekor dekor-2" style="--r:-12deg">ZAP!</span>
<span class="dekor dekor-3" style="--r:8deg">BAM!</span>

<!-- ══ KARAKTER KIRI — RIZKI kiri.png (menghadap kanan = default) ══ -->
<div class="karakter-wrap kiri">
    <img src="{{ asset('img-kiri.png') }}"
         alt="Karakter Kiri"
         onerror="this.parentElement.style.display='none'">
</div>

<!-- ══ KARAKTER KANAN — rizki kanan.png (flip = menghadap kiri) ══ -->
<div class="karakter-wrap kanan">
    <img src="{{ asset('img-kanan.png') }}"
         alt="Karakter Kanan"
         onerror="this.parentElement.style.display='none'">
</div>

<!-- ══ AI CHATBOT ══ -->
<div id="tombol-ai" onclick="toggleAI()" title="Tanya AI">
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

        {{-- Search inline di bawah bio --}}
        <div class="cari-inline-wrap">
            <span class="cari-inline-ikon">🔍</span>
            <input type="text" id="cari-input"
                   placeholder="Cari link... (Lazada, GitHub, YouTube...)"
                   autocomplete="off" spellcheck="false">
        </div>

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
            <div style="font-family:'Bangers',cursive;font-size:2rem;color:#ccc;">😴 Belum ada link nih...</div>
        </div>
    @else
        @php
            $kategori = [
                '📱 Sosial Media'     => $links->whereBetween('urutan', [1,  5]),
                '💬 Komunitas & Chat' => $links->whereBetween('urutan', [6,  8]),
                '🛒 Marketplace'      => $links->whereBetween('urutan', [9, 11]),
                '💼 Profesional'      => $links->whereBetween('urutan', [12,16]),
                '☕ Donasi & Support' => $links->whereBetween('urutan', [17,20]),
                '🎨 Konten & Lainnya' => $links->whereBetween('urutan', [21,25]),
                '💻 Project & Repo'   => $links->whereBetween('urutan', [26,99]),
            ];
            $delay = 0;
        @endphp

        @foreach($kategori as $namaKat => $itemKat)
            @if($itemKat->isNotEmpty())
                <div class="reveal">
                    <div class="komik-box">
                        <div class="komik-box-judul">{{ $namaKat }}</div>
                        <div style="display:flex;flex-direction:column;gap:12px;">
                            @foreach($itemKat as $link)
                                @php
                                    $delay += 70;
                                    $sublabel = match(true) {
                                        str_contains($link->url, 'instagram')  => 'instagram.com',
                                        str_contains($link->url, 'tiktok')     => 'tiktok.com',
                                        str_contains($link->url, 'youtube')    => 'youtube.com',
                                        str_contains($link->url, 'twitter')    => 'twitter.com',
                                        str_contains($link->url, 'wa.me')      => 'WhatsApp Chat',
                                        str_contains($link->url, 't.me')       => 'Telegram',
                                        str_contains($link->url, 'discord')    => 'discord.gg',
                                        str_contains($link->url, 'shopee')     => 'shopee.co.id',
                                        str_contains($link->url, 'tokopedia')  => 'tokopedia.com',
                                        str_contains($link->url, 'lazada')     => 'lazada.co.id',
                                        str_contains($link->url, 'linkedin')   => 'linkedin.com',
                                        str_contains($link->url, 'github')     => 'github.com',
                                        str_contains($link->url, 'saweria')    => 'saweria.co',
                                        str_contains($link->url, 'trakteer')   => 'trakteer.id',
                                        str_contains($link->url, 'medium')     => 'medium.com',
                                        str_contains($link->url, 'spotify')    => 'open.spotify.com',
                                        str_contains($link->url, 'fiverr')     => 'fiverr.com',
                                        str_contains($link->url, 'member.lazada') => 'lazada.co.id (Akun)',
                                        str_contains($link->url, 'mailto')     => 'Kirim Email',
                                        str_contains($link->url, 'vercel.app') => parse_url($link->url, PHP_URL_HOST) ?? 'vercel.app',
                                        default => parse_url($link->url, PHP_URL_HOST) ?? $link->url,
                                    };
                                    $adaDeskripsi = !empty($link->deskripsi);
                                    $dropdownId   = 'dd-' . $link->id;
                                @endphp

                                <div class="link-item link-item-wrap"
                                     style="animation-delay:{{ $delay }}ms;"
                                     data-judul="{{ strtolower($link->judul) }}"
                                     data-sub="{{ strtolower($sublabel) }}">

                                    <div class="link-row">
                                        {{-- Tombol utama --}}
                                        <a href="{{ route('link.klik', $link) }}"
                                           class="link-btn {{ $adaDeskripsi ? 'ada-dropdown' : '' }}"
                                           style="background:{{ $link->warna_bg }};color:{{ $link->warna_teks }};"
                                           data-id="{{ $link->id }}">

                                            <span class="link-ikon">{{ $link->ikon }}</span>
                                            <span class="link-teks">
                                                <span class="link-teks-utama">{{ $link->judul }}</span>
                                                <span class="link-teks-sub">{{ $sublabel }}</span>
                                            </span>

                                            {{-- Tombol info dropdown --}}
                                            @if($adaDeskripsi)
                                            <button class="btn-info-toggle"
                                                    id="btn-{{ $dropdownId }}"
                                                    onclick="event.preventDefault();event.stopPropagation();toggleDropdown('{{ $dropdownId }}')"
                                                    title="Lihat info">
                                                ℹ️ Info <span class="panah">▼</span>
                                            </button>
                                            @else
                                            <span style="font-size:0.7rem;font-weight:800;background:rgba(0,0,0,0.18);border-radius:20px;padding:2px 8px;">→</span>
                                            @endif
                                        </a>

                                        {{-- Dropdown info --}}
                                        @if($adaDeskripsi)
                                        <div class="dropdown-info"
                                             id="{{ $dropdownId }}"
                                             style="background:{{ $link->warna_bg }};color:{{ $link->warna_teks }};">
                                            <div class="dropdown-info-isi">
                                                <div>{{ $link->deskripsi }}</div>
                                                <div class="dropdown-tujuan">
                                                    <span class="dropdown-tujuan-label">TUJUAN</span>
                                                    <a href="{{ route('link.klik', $link) }}"
                                                       class="dropdown-url-link"
                                                       style="color:{{ $link->warna_teks }};">
                                                        {{ $sublabel }} →
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                    </div>

                                    {{-- Tombol share --}}
                                    @if($link->slug)
                                    <a href="{{ route('link.berbagi', $link->slug) }}"
                                       class="tombol-share" title="Bagikan">📤</a>
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
            &nbsp;·&nbsp;
            <a href="https://github.com/rizki-habibi/berbagi-tautan" target="_blank" rel="noopener" style="color:#999;">Source</a>
        </p>
    </div>
</div>

<script>
/* ══ LOADING ══ */
window.addEventListener('load', function() {
    setTimeout(function() {
        document.getElementById('layar-muat').classList.add('hilang');
        document.getElementById('kontenUtama').classList.add('tampil');
        initScrollReveal();
    }, 1100);
});

/* ══ SCROLL REVEAL ══ */
function initScrollReveal() {
    var obs = new IntersectionObserver(function(entries) {
        entries.forEach(function(e) { if(e.isIntersecting){e.target.classList.add('tampil');obs.unobserve(e.target);} });
    }, {threshold:0.08});
    document.querySelectorAll('.reveal').forEach(function(el){obs.observe(el);});
}

/* ══ DROPDOWN INFO ══ */
function toggleDropdown(id) {
    var dd  = document.getElementById(id);
    var btn = document.getElementById('btn-' + id);
    var buka = !dd.classList.contains('terbuka');
    // Tutup semua dropdown lain
    document.querySelectorAll('.dropdown-info.terbuka').forEach(function(el){
        el.classList.remove('terbuka');
    });
    document.querySelectorAll('.btn-info-toggle.terbuka').forEach(function(el){
        el.classList.remove('terbuka');
    });
    if (buka) {
        dd.classList.add('terbuka');
        btn.classList.add('terbuka');
    }
}

/* ══ SEARCH ══ */
document.getElementById('cari-input').addEventListener('input', function() {
    var q = this.value.toLowerCase().trim();
    document.querySelectorAll('.komik-box').forEach(function(kotak) {
        var items = kotak.querySelectorAll('.link-item-wrap');
        var ada = false;
        items.forEach(function(item) {
            var cocok = !q || (item.dataset.judul||'').includes(q) || (item.dataset.sub||'').includes(q);
            item.classList.toggle('tersembunyi-cari', !cocok);
            if(cocok) ada = true;
        });
        kotak.classList.toggle('kosong-cari', !ada && q !== '');
    });
    if(q) document.querySelectorAll('.reveal').forEach(function(r){r.classList.add('tampil');});
});

/* ══ PARTIKEL ══ */
var pTeks  = ['POW!','ZAP!','BAM!','KLIK!','WOW!','🔥','💥','⚡','✨','🎉'];
var pWarna = ['#FF3B30','#FFE600','#2ECC40','#0057FF','#FF851B','#FF69B4'];
document.querySelectorAll('.link-btn').forEach(function(btn) {
    btn.addEventListener('click', function(e) {
        btn.classList.add('diklik');
        setTimeout(function(){btn.classList.remove('diklik');},300);
        for(var i=0;i<8;i++) buatPartikel(e.clientX,e.clientY);
    });
});
function buatPartikel(x,y) {
    var el=document.createElement('div'); el.className='partikel';
    el.textContent=pTeks[Math.floor(Math.random()*pTeks.length)];
    el.style.color=pWarna[Math.floor(Math.random()*pWarna.length)];
    el.style.left=x+'px'; el.style.top=y+'px';
    var s=Math.random()*360*(Math.PI/180), j=60+Math.random()*80;
    el.style.setProperty('--dx',Math.cos(s)*j+'px');
    el.style.setProperty('--dy',Math.sin(s)*j+'px');
    el.style.setProperty('--dr',(Math.random()*60-30)+'deg');
    el.style.fontSize=(0.8+Math.random()*0.8)+'rem';
    document.body.appendChild(el);
    setTimeout(function(){el.remove();},900);
}

/* ══ AI CHATBOT ══ */
var aiTerbuka=false, aiSudahSapa=false;
var aiData={
    sapa:'Halo! 👋 Aku <strong>Rizki-AI</strong>. Ada yang bisa aku bantu tentang Rizki Habibi?',
    tentang:'Rizki Habibi adalah <strong>Developer · Creator · Maker</strong> 💻 asal Indonesia. Aktif di YouTube <a href="https://www.youtube.com/@26_rizkihabibi73" target="_blank" style="color:#0057FF;">@26_rizkihabibi73</a>, GitHub <a href="https://github.com/rizki-habibi" target="_blank" style="color:#0057FF;">rizki-habibi</a>, dan juga di Fiverr sebagai freelancer! 🚀',
    porto:'Portofolio Rizki ada di <a href="https://rizki-habibi-portofolio.vercel.app" target="_blank" style="color:#0057FF;">rizki-habibi-portofolio.vercel.app</a>!',
    github:'GitHub: <a href="https://github.com/rizki-habibi" target="_blank" style="color:#0057FF;">github.com/rizki-habibi</a> — 20+ repo open-source! 💻',
    youtube:'YouTube: <a href="https://www.youtube.com/@26_rizkihabibi73" target="_blank" style="color:#FF0000;">@26_rizkihabibi73</a> ▶️',
    market:'Toko Rizki:<br>🛍️ <strong>Shopee</strong>, 🟢 <strong>Tokopedia</strong>, 🛒 <strong>Lazada</strong><br>Klik langsung dari daftar di atas 👆',
    fiverr:'Rizki juga aktif sebagai freelancer di <a href="https://www.fiverr.com/rizkihub" target="_blank" style="color:#1DBF73;">Fiverr</a> — cek profil dan jasa yang ditawarkan! 💼',
    populer:'Link terpopuler:<br>🚀 Portofolio, 💻 GitHub, ▶️ YouTube, 🛒 Marketplace, 💼 Fiverr',
    def:['Hmm, belum paham 🤔 Coba tanya: <em>Rizki, Portofolio, GitHub, YouTube, Fiverr</em>!','Aku spesialis info Rizki Habibi. Coba tanya soal <em>project, link, atau freelance</em>!']
};
function toggleAI(){
    var p=document.getElementById('panel-ai'),i=document.getElementById('tombol-ai-ikon'),b=document.getElementById('tombol-ai-badge');
    aiTerbuka=!aiTerbuka; p.classList.toggle('terbuka',aiTerbuka); i.textContent=aiTerbuka?'✕':'🤖';
    if(aiTerbuka){b.style.display='none';if(!aiSudahSapa){aiSudahSapa=true;setTimeout(function(){tampilkanTyping(function(){tambahBubble('ai',aiData.sapa);});},400);}setTimeout(function(){document.getElementById('ai-input').focus();},300);}
}
function tambahBubble(t,x){var a=document.getElementById('ai-pesan'),d=document.createElement('div');d.className='bubble bubble-'+t;d.innerHTML=x;a.appendChild(d);a.scrollTop=a.scrollHeight;}
function tampilkanTyping(cb){var a=document.getElementById('ai-pesan'),t=document.createElement('div');t.className='bubble bubble-ai';t.id='typing-indicator';t.innerHTML='<div class="typing-dots"><span></span><span></span><span></span></div>';a.appendChild(t);a.scrollTop=a.scrollHeight;setTimeout(function(){t.remove();cb();},800+Math.random()*500);}
function kirimPesan(){var inp=document.getElementById('ai-input'),txt=inp.value.trim();if(!txt)return;tambahBubble('user',txt);inp.value='';document.getElementById('ai-quick').style.display='none';var q=txt.toLowerCase(),j;if(q.match(/halo|hai|hi/))j='Halo! 👋 Senang bertemu kamu!';else if(q.match(/rizki|tentang|siapa/))j=aiData.tentang;else if(q.match(/porto|portfolio/))j=aiData.porto;else if(q.match(/github|repo/))j=aiData.github;else if(q.match(/youtube|video/))j=aiData.youtube;else if(q.match(/fiverr|freelance/))j=aiData.fiverr;else if(q.match(/shopee|tokopedia|lazada|belanja/))j=aiData.market;else if(q.match(/populer|top/))j=aiData.populer;else if(q.match(/terima kasih|thanks/))j='Sama-sama! 😊';else j=aiData.def[Math.floor(Math.random()*aiData.def.length)];tampilkanTyping(function(){tambahBubble('ai',j);});}
function kirimQuick(btn){document.getElementById('ai-input').value=btn.textContent.trim();kirimPesan();}
setTimeout(function(){if(!aiTerbuka){var b=document.getElementById('tombol-ai-badge');b.style.display='block';b.textContent='1';}},3500);
</script>
</body>
</html>
