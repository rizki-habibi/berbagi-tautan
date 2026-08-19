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
           TOMBOL SHARE PER CARD
        ══════════════════════════════════════════ */
        .link-item-wrap { position: relative; }

        .tombol-share {
            position: absolute;
            right: -2px;
            top: 50%;
            transform: translateY(-50%);
            opacity: 0;
            background: #FFE600;
            border: 3px solid #1A1A2E;
            border-radius: 50%;
            width: 34px; height: 34px;
            display: flex; align-items: center; justify-content: center;
            font-size: 0.85rem;
            box-shadow: 3px 3px 0 #1A1A2E;
            text-decoration: none;
            transition: opacity 0.2s ease, transform 0.2s ease;
            z-index: 10;
        }
        .link-item-wrap:hover .tombol-share,
        .tombol-share:focus {
            opacity: 1;
            transform: translateY(-50%) translateX(6px);
        }
        .tombol-share:hover {
            background: #1A1A2E;
            color: #FFE600;
        }

        /* ══════════════════════════════════════════
           PORTOFOLIO BANNER
        ══════════════════════════════════════════ */
        .banner-porto {
            background: linear-gradient(135deg, #1A1A2E, #16213E);
            border: 4px solid #FFE600;
            border-radius: 18px;
            box-shadow: 7px 7px 0 #FFE600;
            padding: 18px 22px;
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
        .banner-porto-ikon { font-size: 2.5rem; }
        .banner-porto-nama {
            font-family: 'Bangers', cursive;
            font-size: 1.15rem;
            letter-spacing: 2px;
            color: #FFE600;
        }
        .banner-porto-sub {
            font-size: 0.75rem;
            color: rgba(255,255,255,0.6);
            font-weight: 700;
            display: block;
            margin-top: 2px;
        }
        .banner-porto-badge {
            margin-left: auto;
            background: #FFE600;
            color: #1A1A2E;
            font-family: 'Bangers', cursive;
            font-size: 0.72rem;
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

        /* ══════════════════════════════════════════
           SOSIAL MEDIA IKON BARIS (HEADER)
        ══════════════════════════════════════════ */
        .sosmed-baris {
            display: flex;
            gap: 10px;
            justify-content: center;
            flex-wrap: wrap;
            margin-top: 14px;
        }
        .sosmed-btn {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 5px 14px;
            border-radius: 20px;
            border: 3px solid #1A1A2E;
            box-shadow: 3px 3px 0 #1A1A2E;
            font-family: 'Nunito', sans-serif;
            font-weight: 900;
            font-size: 0.78rem;
            text-decoration: none;
            transition: transform 0.12s ease, box-shadow 0.12s ease;
        }
        .sosmed-btn:hover {
            transform: translate(-2px, -2px);
            box-shadow: 5px 5px 0 #1A1A2E;
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

        /* ══════════════════════════════════════════
           KARAKTER ANIME — KIRI & KANAN
        ══════════════════════════════════════════ */
        .karakter-anime {
            position: fixed;
            bottom: 0;
            pointer-events: none;
            z-index: 5;
            width: 160px;
            filter: drop-shadow(4px 0 0 rgba(0,0,0,0.18));
        }
        .karakter-kiri  { left: 0;  transform-origin: bottom left; }
        .karakter-kanan { right: 0; transform-origin: bottom right; }

        /* Animasi napas naik-turun */
        @keyframes animeNafas {
            0%, 100% { transform: translateY(0); }
            50%       { transform: translateY(-14px); }
        }
        .karakter-kiri  { animation: animeNafas 3.5s ease-in-out infinite; }
        .karakter-kanan { animation: animeNafas 4s ease-in-out 0.5s infinite; }

        /* Sembunyikan di layar kecil */
        @media (max-width: 900px) {
            .karakter-anime { display: none; }
        }

        /* Bubble nama di atas karakter */
        .karakter-nama {
            position: fixed;
            bottom: 230px;
            font-family: 'Bangers', cursive;
            font-size: 0.9rem;
            letter-spacing: 2px;
            padding: 4px 14px;
            border: 3px solid #1A1A2E;
            border-radius: 20px;
            box-shadow: 3px 3px 0 #1A1A2E;
            animation: animeNafas 3.5s ease-in-out infinite;
            pointer-events: none;
            z-index: 6;
        }
        .karakter-nama-kiri  { left: 12px; background: #FFB7C5; color: #1A1A2E; }
        .karakter-nama-kanan { right: 12px; background: #FF3B30; color: #fff; animation-duration: 4s; animation-delay: 0.5s; }
        @media (max-width: 900px) {
            .karakter-nama { display: none; }
        }

        /* ══════════════════════════════════════════
           POPUP AI CHATBOT
        ══════════════════════════════════════════ */
        /* Tombol trigger mengambang */
        #tombol-ai {
            position: fixed;
            bottom: 28px;
            right: 28px;
            width: 62px; height: 62px;
            border-radius: 50%;
            background: linear-gradient(135deg, #1A1A2E, #0057FF);
            border: 4px solid #FFE600;
            box-shadow: 5px 5px 0 #1A1A2E, 0 0 20px rgba(0,87,255,0.4);
            cursor: pointer;
            z-index: 1000;
            display: flex; align-items: center; justify-content: center;
            font-size: 1.8rem;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
            animation: tombolPulse 2.5s ease-in-out infinite;
        }
        @keyframes tombolPulse {
            0%, 100% { box-shadow: 5px 5px 0 #1A1A2E, 0 0 0 0 rgba(0,87,255,0.5); }
            50%       { box-shadow: 5px 5px 0 #1A1A2E, 0 0 0 10px rgba(0,87,255,0); }
        }
        #tombol-ai:hover { transform: scale(1.1) rotate(-5deg); }

        /* Badge notif di tombol AI */
        #tombol-ai-badge {
            position: absolute;
            top: -4px; right: -4px;
            background: #FF3B30;
            color: #fff;
            font-family: 'Bangers', cursive;
            font-size: 0.65rem;
            letter-spacing: 0.5px;
            padding: 1px 6px;
            border-radius: 10px;
            border: 2px solid #1A1A2E;
            animation: wobble 2s ease-in-out infinite;
        }

        /* Panel chat */
        #panel-ai {
            position: fixed;
            bottom: 102px;
            right: 28px;
            width: 320px;
            max-height: 480px;
            background: #fff;
            border: 4px solid #1A1A2E;
            border-radius: 20px;
            box-shadow: 8px 8px 0 #1A1A2E;
            z-index: 999;
            display: flex;
            flex-direction: column;
            overflow: hidden;
            transform: scale(0.85) translateY(20px);
            transform-origin: bottom right;
            opacity: 0;
            pointer-events: none;
            transition: transform 0.25s cubic-bezier(.36,.07,.19,.97),
                        opacity 0.25s ease;
        }
        #panel-ai.terbuka {
            transform: scale(1) translateY(0);
            opacity: 1;
            pointer-events: all;
        }

        /* Header panel */
        .ai-header {
            background: linear-gradient(135deg, #1A1A2E, #0057FF);
            padding: 14px 16px;
            display: flex;
            align-items: center;
            gap: 10px;
            border-bottom: 3px solid #1A1A2E;
        }
        .ai-header-ikon {
            width: 36px; height: 36px;
            background: #FFE600;
            border-radius: 50%;
            border: 3px solid #fff;
            display: flex; align-items: center; justify-content: center;
            font-size: 1.1rem;
            flex-shrink: 0;
        }
        .ai-header-nama {
            font-family: 'Bangers', cursive;
            font-size: 1rem;
            letter-spacing: 2px;
            color: #FFE600;
        }
        .ai-header-status {
            font-size: 0.7rem;
            color: rgba(255,255,255,0.7);
            font-weight: 700;
        }
        .ai-tutup {
            margin-left: auto;
            background: rgba(255,255,255,0.15);
            border: none;
            color: #fff;
            width: 28px; height: 28px;
            border-radius: 50%;
            cursor: pointer;
            font-size: 1rem;
            display: flex; align-items: center; justify-content: center;
            transition: background 0.15s;
            flex-shrink: 0;
        }
        .ai-tutup:hover { background: rgba(255,59,48,0.6); }

        /* Area pesan */
        #ai-pesan {
            flex: 1;
            overflow-y: auto;
            padding: 14px;
            display: flex;
            flex-direction: column;
            gap: 10px;
            background: #FAFAFA;
            min-height: 200px;
            max-height: 280px;
        }
        #ai-pesan::-webkit-scrollbar { width: 4px; }
        #ai-pesan::-webkit-scrollbar-track { background: transparent; }
        #ai-pesan::-webkit-scrollbar-thumb { background: #ddd; border-radius: 4px; }

        .bubble {
            max-width: 82%;
            padding: 9px 13px;
            border-radius: 14px;
            font-family: 'Nunito', sans-serif;
            font-weight: 700;
            font-size: 0.85rem;
            line-height: 1.45;
            border: 2px solid #1A1A2E;
            animation: bubbleMuncul 0.25s ease;
        }
        @keyframes bubbleMuncul {
            from { opacity: 0; transform: translateY(8px) scale(0.95); }
            to   { opacity: 1; transform: translateY(0) scale(1); }
        }
        .bubble-ai {
            background: #fff;
            color: #1A1A2E;
            box-shadow: 3px 3px 0 #1A1A2E;
            align-self: flex-start;
            border-radius: 4px 14px 14px 14px;
        }
        .bubble-user {
            background: #1A1A2E;
            color: #FFE600;
            box-shadow: 3px 3px 0 rgba(0,0,0,0.3);
            align-self: flex-end;
            border-radius: 14px 14px 4px 14px;
            border-color: #1A1A2E;
        }

        /* Typing indicator */
        .typing-dots {
            display: flex; gap: 4px; align-items: center;
            padding: 4px 2px;
        }
        .typing-dots span {
            width: 7px; height: 7px;
            background: #999;
            border-radius: 50%;
            animation: typingBounce 1s ease-in-out infinite;
        }
        .typing-dots span:nth-child(2) { animation-delay: 0.15s; }
        .typing-dots span:nth-child(3) { animation-delay: 0.3s; }
        @keyframes typingBounce {
            0%, 100% { transform: translateY(0); opacity: 0.5; }
            50%       { transform: translateY(-5px); opacity: 1; }
        }

        /* Tombol quick-reply */
        .ai-quick {
            padding: 10px 14px;
            border-top: 2px solid #eee;
            display: flex;
            gap: 6px;
            flex-wrap: wrap;
            background: #fff;
        }
        .quick-btn {
            padding: 4px 12px;
            border-radius: 20px;
            border: 2px solid #1A1A2E;
            background: #FFF9C4;
            font-family: 'Nunito', sans-serif;
            font-weight: 800;
            font-size: 0.72rem;
            cursor: pointer;
            transition: all 0.12s ease;
            box-shadow: 2px 2px 0 #1A1A2E;
        }
        .quick-btn:hover {
            background: #FFE600;
            transform: translate(-1px,-1px);
            box-shadow: 3px 3px 0 #1A1A2E;
        }

        /* Input area */
        .ai-input-area {
            padding: 10px 12px;
            border-top: 3px solid #1A1A2E;
            display: flex;
            gap: 8px;
            background: #fff;
        }
        #ai-input {
            flex: 1;
            border: 2px solid #1A1A2E;
            border-radius: 10px;
            padding: 7px 12px;
            font-family: 'Nunito', sans-serif;
            font-weight: 700;
            font-size: 0.85rem;
            outline: none;
            background: #FAFAFA;
        }
        #ai-input:focus { border-color: #0057FF; background: #fff; }
        #ai-kirim {
            background: #0057FF;
            color: #fff;
            border: 3px solid #1A1A2E;
            border-radius: 10px;
            padding: 0 14px;
            font-family: 'Bangers', cursive;
            font-size: 0.9rem;
            letter-spacing: 1px;
            cursor: pointer;
            box-shadow: 3px 3px 0 #1A1A2E;
            transition: all 0.12s ease;
        }
        #ai-kirim:hover {
            background: #FFE600; color: #1A1A2E;
            transform: translate(-1px,-1px);
            box-shadow: 4px 4px 0 #1A1A2E;
        }

        @media (max-width: 400px) {
            #panel-ai { width: calc(100vw - 32px); right: 16px; }
            #tombol-ai { right: 16px; bottom: 16px; }
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

<!-- ══ KARAKTER ANIME KIRI: NEZUKO (Demon Slayer) ══ -->
<div class="karakter-nama karakter-nama-kiri">🌸 NEZUKO</div>
<svg class="karakter-anime karakter-kiri" viewBox="0 0 160 320" xmlns="http://www.w3.org/2000/svg">
    <!-- Rambut belakang panjang -->
    <path d="M55 40 Q20 80 18 200 Q16 260 30 300 Q35 320 40 320 L48 310 Q36 270 38 200 Q40 100 60 60 Z" fill="#1A0A00"/>
    <path d="M105 40 Q140 80 142 200 Q144 260 130 300 Q125 320 120 320 L112 310 Q124 270 122 200 Q120 100 100 60 Z" fill="#1A0A00"/>
    <!-- Badan kimono pink -->
    <rect x="42" y="155" width="76" height="110" rx="8" fill="#FFB7C5" stroke="#1A1A2E" stroke-width="3"/>
    <!-- Pola kimono -->
    <path d="M42 175 L118 175" stroke="#FF6B9D" stroke-width="1.5" opacity="0.4"/>
    <path d="M42 195 L118 195" stroke="#FF6B9D" stroke-width="1.5" opacity="0.4"/>
    <circle cx="65" cy="185" r="4" fill="#FF6B9D" opacity="0.5"/>
    <circle cx="95" cy="185" r="4" fill="#FF6B9D" opacity="0.5"/>
    <!-- Obi (ikat pinggang) -->
    <rect x="40" y="195" width="80" height="22" rx="4" fill="#E53935" stroke="#1A1A2E" stroke-width="2.5"/>
    <rect x="60" y="191" width="40" height="30" rx="4" fill="#FF6B9D" stroke="#1A1A2E" stroke-width="2"/>
    <!-- Rok -->
    <path d="M42 265 Q55 320 80 320 Q105 320 118 265 Z" fill="#FFB7C5" stroke="#1A1A2E" stroke-width="2.5"/>
    <!-- Kaki -->
    <rect x="58" y="295" width="14" height="25" rx="4" fill="#FFD0A0" stroke="#1A1A2E" stroke-width="2"/>
    <rect x="88" y="295" width="14" height="25" rx="4" fill="#FFD0A0" stroke="#1A1A2E" stroke-width="2"/>
    <!-- Geta (sandal) -->
    <rect x="54" y="316" width="22" height="6" rx="2" fill="#8B4513" stroke="#1A1A2E" stroke-width="1.5"/>
    <rect x="84" y="316" width="22" height="6" rx="2" fill="#8B4513" stroke="#1A1A2E" stroke-width="1.5"/>
    <!-- Lengan -->
    <path d="M42 160 Q20 180 18 220 Q22 230 30 225 Q36 195 50 175 Z" fill="#FFB7C5" stroke="#1A1A2E" stroke-width="2.5"/>
    <path d="M118 160 Q140 180 142 220 Q138 230 130 225 Q124 195 110 175 Z" fill="#FFB7C5" stroke="#1A1A2E" stroke-width="2.5"/>
    <!-- Tangan kecil -->
    <ellipse cx="22" cy="225" rx="9" ry="7" fill="#FFD0A0" stroke="#1A1A2E" stroke-width="2"/>
    <ellipse cx="138" cy="225" rx="9" ry="7" fill="#FFD0A0" stroke="#1A1A2E" stroke-width="2"/>
    <!-- Leher -->
    <rect x="68" y="138" width="24" height="22" rx="4" fill="#FFD0A0" stroke="#1A1A2E" stroke-width="2"/>
    <!-- Kepala -->
    <ellipse cx="80" cy="105" rx="38" ry="42" fill="#FFD0A0" stroke="#1A1A2E" stroke-width="3"/>
    <!-- Rambut depan hitam -->
    <path d="M42 85 Q45 55 60 48 Q70 44 80 44 Q90 44 100 48 Q115 55 118 85" fill="#1A0A00" stroke="#1A0A00" stroke-width="1"/>
    <path d="M42 85 Q38 95 42 108" fill="#1A0A00"/>
    <path d="M118 85 Q122 95 118 108" fill="#1A0A00"/>
    <!-- Pita rambut merah -->
    <path d="M44 90 Q60 78 80 76 Q100 78 116 90" stroke="#E53935" stroke-width="5" fill="none" stroke-linecap="round"/>
    <!-- Bamboo mouth guard -->
    <rect x="58" y="118" width="44" height="12" rx="6" fill="#A0522D" stroke="#1A1A2E" stroke-width="2"/>
    <circle cx="80" cy="118" r="4" fill="#E53935"/>
    <!-- Mata kiri -->
    <ellipse cx="66" cy="102" rx="8" ry="9" fill="#fff" stroke="#1A1A2E" stroke-width="1.5"/>
    <ellipse cx="66" cy="103" rx="5" ry="6" fill="#FF6B9D"/>
    <ellipse cx="66" cy="103" rx="3" ry="3.5" fill="#1A0A00"/>
    <circle cx="68" cy="101" r="1.5" fill="#fff"/>
    <!-- Mata kanan -->
    <ellipse cx="94" cy="102" rx="8" ry="9" fill="#fff" stroke="#1A1A2E" stroke-width="1.5"/>
    <ellipse cx="94" cy="103" rx="5" ry="6" fill="#FF6B9D"/>
    <ellipse cx="94" cy="103" rx="3" ry="3.5" fill="#1A0A00"/>
    <circle cx="96" cy="101" r="1.5" fill="#fff"/>
    <!-- Alis -->
    <path d="M59 92 Q66 89 73 92" stroke="#5C3317" stroke-width="2" fill="none" stroke-linecap="round"/>
    <path d="M87 92 Q94 89 101 92" stroke="#5C3317" stroke-width="2" fill="none" stroke-linecap="round"/>
    <!-- Pipi merah muda -->
    <ellipse cx="58" cy="112" rx="9" ry="5" fill="#FF9BB0" opacity="0.5"/>
    <ellipse cx="102" cy="112" rx="9" ry="5" fill="#FF9BB0" opacity="0.5"/>
    <!-- Telinga -->
    <ellipse cx="42" cy="105" rx="6" ry="8" fill="#FFD0A0" stroke="#1A1A2E" stroke-width="2"/>
    <ellipse cx="118" cy="105" rx="6" ry="8" fill="#FFD0A0" stroke="#1A1A2E" stroke-width="2"/>
    <!-- Hiasan rambut bunga -->
    <circle cx="52" cy="72" r="7" fill="#FF6B9D" stroke="#1A1A2E" stroke-width="1.5"/>
    <circle cx="52" cy="72" r="3" fill="#FFE600"/>
</svg>

<!-- ══ KARAKTER ANIME KANAN: ZERO TWO (Darling in the FranXX) ══ -->
<div class="karakter-nama karakter-nama-kanan">🦋 ZERO TWO</div>
<svg class="karakter-anime karakter-kanan" viewBox="0 0 160 320" xmlns="http://www.w3.org/2000/svg">
    <!-- Rambut panjang merah muda -->
    <path d="M55 42 Q15 90 12 200 Q10 270 25 310 Q30 322 38 320 L45 308 Q32 268 35 195 Q38 100 62 62 Z" fill="#FF6B9D"/>
    <path d="M105 42 Q145 90 148 200 Q150 270 135 310 Q130 322 122 320 L115 308 Q128 268 125 195 Q122 100 98 62 Z" fill="#FF6B9D"/>
    <!-- Seragam merah-putih -->
    <rect x="38" y="155" width="84" height="115" rx="8" fill="#fff" stroke="#1A1A2E" stroke-width="3"/>
    <!-- Aksen merah di seragam -->
    <path d="M38 155 L38 200 Q42 205 50 202 L62 170 Z" fill="#FF3B30" stroke="#1A1A2E" stroke-width="1.5"/>
    <path d="M122 155 L122 200 Q118 205 110 202 L98 170 Z" fill="#FF3B30" stroke="#1A1A2E" stroke-width="1.5"/>
    <rect x="68" y="155" width="24" height="35" rx="3" fill="#FF3B30" stroke="#1A1A2E" stroke-width="1.5"/>
    <!-- Rok -->
    <path d="M38 270 Q52 320 80 320 Q108 320 122 270 Z" fill="#FF3B30" stroke="#1A1A2E" stroke-width="2.5"/>
    <!-- Kaki -->
    <rect x="56" y="294" width="14" height="26" rx="4" fill="#FFCBA4" stroke="#1A1A2E" stroke-width="2"/>
    <rect x="90" y="294" width="14" height="26" rx="4" fill="#FFCBA4" stroke="#1A1A2E" stroke-width="2"/>
    <!-- Sepatu merah -->
    <ellipse cx="63" cy="320" rx="13" ry="5" fill="#FF3B30" stroke="#1A1A2E" stroke-width="2"/>
    <ellipse cx="97" cy="320" rx="13" ry="5" fill="#FF3B30" stroke="#1A1A2E" stroke-width="2"/>
    <!-- Lengan -->
    <path d="M38 162 Q16 185 14 228 Q18 238 27 232 Q34 202 50 178 Z" fill="#fff" stroke="#1A1A2E" stroke-width="2.5"/>
    <path d="M122 162 Q144 185 146 228 Q142 238 133 232 Q126 202 110 178 Z" fill="#fff" stroke="#1A1A2E" stroke-width="2.5"/>
    <ellipse cx="19" cy="232" rx="9" ry="7" fill="#FFCBA4" stroke="#1A1A2E" stroke-width="2"/>
    <ellipse cx="141" cy="232" rx="9" ry="7" fill="#FFCBA4" stroke="#1A1A2E" stroke-width="2"/>
    <!-- Leher -->
    <rect x="67" y="138" width="26" height="22" rx="5" fill="#FFCBA4" stroke="#1A1A2E" stroke-width="2"/>
    <!-- Kepala -->
    <ellipse cx="80" cy="100" rx="40" ry="44" fill="#FFCBA4" stroke="#1A1A2E" stroke-width="3"/>
    <!-- Rambut depan -->
    <path d="M40 88 Q44 52 65 44 Q72 40 80 40 Q88 40 95 44 Q116 52 120 88" fill="#FF6B9D" stroke="#FF6B9D" stroke-width="1"/>
    <path d="M40 88 Q36 100 40 114" fill="#FF6B9D"/>
    <path d="M120 88 Q124 100 120 114" fill="#FF6B9D"/>
    <!-- Poni panjang -->
    <path d="M58 60 Q52 80 56 100" stroke="#FF6B9D" stroke-width="8" fill="none" stroke-linecap="round"/>
    <!-- Tanduk kecil merah -->
    <path d="M66 46 Q62 28 58 18 Q56 12 60 14 Q65 16 68 36 Z" fill="#FF3B30" stroke="#1A1A2E" stroke-width="1.5"/>
    <path d="M94 46 Q98 28 102 18 Q104 12 100 14 Q95 16 92 36 Z" fill="#FF3B30" stroke="#1A1A2E" stroke-width="1.5"/>
    <!-- Mata — khas Zero Two (cyan/teal) -->
    <ellipse cx="66" cy="98" rx="9" ry="10" fill="#fff" stroke="#1A1A2E" stroke-width="1.5"/>
    <ellipse cx="66" cy="99" rx="6" ry="7" fill="#00BCD4"/>
    <ellipse cx="66" cy="99" rx="3.5" ry="4" fill="#00838F"/>
    <circle cx="68.5" cy="97" r="1.8" fill="#fff"/>
    <ellipse cx="94" cy="98" rx="9" ry="10" fill="#fff" stroke="#1A1A2E" stroke-width="1.5"/>
    <ellipse cx="94" cy="99" rx="6" ry="7" fill="#00BCD4"/>
    <ellipse cx="94" cy="99" rx="3.5" ry="4" fill="#00838F"/>
    <circle cx="96.5" cy="97" r="1.8" fill="#fff"/>
    <!-- Alis -->
    <path d="M58 87 Q66 83 74 87" stroke="#FF6B9D" stroke-width="2.5" fill="none" stroke-linecap="round"/>
    <path d="M86 87 Q94 83 102 87" stroke="#FF6B9D" stroke-width="2.5" fill="none" stroke-linecap="round"/>
    <!-- Mulut senyum -->
    <path d="M70 116 Q80 124 90 116" stroke="#FF6B9D" stroke-width="2.5" fill="none" stroke-linecap="round"/>
    <!-- Pipi -->
    <ellipse cx="56" cy="108" rx="10" ry="6" fill="#FF9BB0" opacity="0.55"/>
    <ellipse cx="104" cy="108" rx="10" ry="6" fill="#FF9BB0" opacity="0.55"/>
    <!-- Telinga -->
    <ellipse cx="40" cy="100" rx="6" ry="9" fill="#FFCBA4" stroke="#1A1A2E" stroke-width="2"/>
    <ellipse cx="120" cy="100" rx="6" ry="9" fill="#FFCBA4" stroke="#1A1A2E" stroke-width="2"/>
    <!-- Tanda x di dahi (ciri Zero Two) -->
    <path d="M74 72 L78 76 M78 72 L74 76" stroke="#FF3B30" stroke-width="2.5" stroke-linecap="round"/>
    <!-- Hiasan kepala / headband -->
    <path d="M42 88 Q60 76 80 74 Q100 76 118 88" stroke="#FF3B30" stroke-width="4" fill="none" stroke-linecap="round"/>
</svg>

<!-- ══ POPUP AI CHATBOT ══ -->
<!-- Tombol trigger -->
<div id="tombol-ai" onclick="toggleAI()" title="Tanya AI Asisten">
    <span id="tombol-ai-ikon">🤖</span>
    <span id="tombol-ai-badge">AI</span>
</div>

<!-- Panel Chat -->
<div id="panel-ai">
    <!-- Header -->
    <div class="ai-header">
        <div class="ai-header-ikon">🤖</div>
        <div>
            <div class="ai-header-nama">RIZKI-AI</div>
            <div class="ai-header-status">● Online sekarang</div>
        </div>
        <button class="ai-tutup" onclick="toggleAI()" title="Tutup">✕</button>
    </div>

    <!-- Area pesan -->
    <div id="ai-pesan"></div>

    <!-- Quick reply -->
    <div class="ai-quick" id="ai-quick">
        <button class="quick-btn" onclick="kirimQuick(this)">👋 Halo!</button>
        <button class="quick-btn" onclick="kirimQuick(this)">💼 Tentang Rizki</button>
        <button class="quick-btn" onclick="kirimQuick(this)">🔗 Link populer</button>
        <button class="quick-btn" onclick="kirimQuick(this)">🛒 Marketplace</button>
    </div>

    <!-- Input -->
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
            <div class="avatar-img">👨‍💻</div>
            <span class="avatar-badge">OPEN!</span>
        </div>
        <h1 class="profil-nama">Rizki Habibi</h1>
        <p class="profil-bio">💻 Developer · Creator · Maker</p>

        {{-- Sosial Media Ikon Baris --}}
        <div class="sosmed-baris">
            <a href="https://github.com/rizki-habibi"
               target="_blank" rel="noopener"
               class="sosmed-btn"
               style="background:#1A1A2E; color:#fff;">
                🐙 GitHub
            </a>
            <a href="https://www.youtube.com/@26_rizkihabibi73"
               target="_blank" rel="noopener"
               class="sosmed-btn"
               style="background:#FF0000; color:#fff;">
                ▶ YouTube
            </a>
            <a href="https://rizki-habibi-portofolio.vercel.app"
               target="_blank" rel="noopener"
               class="sosmed-btn"
               style="background:#FFE600; color:#1A1A2E;">
                🌐 Portofolio
            </a>
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
                                <div class="link-item link-item-wrap" style="animation-delay: {{ $delay }}ms;">
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
                                    {{-- Tombol share per card --}}
                                    @if($link->slug)
                                    <a href="{{ route('link.berbagi', $link->slug) }}"
                                       class="tombol-share"
                                       title="Bagikan {{ $link->judul }}">
                                        📤
                                    </a>
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

/* ══════════════════════════════════════
   POPUP AI CHATBOT
══════════════════════════════════════ */
let aiTerbuka = false;
let aiSudahSapa = false;

// Pengetahuan AI tentang Rizki
const aiPengetahuan = {
    sapa: [
        "Halo! 👋 Aku <strong>Rizki-AI</strong>, asisten virtual Rizki Habibi. Ada yang bisa aku bantu?",
        "Hai! 😄 Selamat datang di halaman link Rizki Habibi! Kamu bisa tanya apa saja tentang Rizki, link-nya, atau proyek-proyeknya."
    ],
    tentang: "Rizki Habibi adalah seorang <strong>Developer · Creator · Maker</strong> 💻. Dia aktif membuat konten di YouTube <a href='https://www.youtube.com/@26_rizkihabibi73' target='_blank' style='color:#0057FF;'>@26_rizkihabibi73</a>, punya repositori open-source di <a href='https://github.com/rizki-habibi' target='_blank' style='color:#0057FF;'>GitHub</a>, dan portofolio lengkap di <a href='https://rizki-habibi-portofolio.vercel.app' target='_blank' style='color:#0057FF;'>rizki-habibi-portofolio.vercel.app</a> 🚀",
    portofolio: "Portofolio Rizki bisa kamu lihat di <a href='https://rizki-habibi-portofolio.vercel.app' target='_blank' style='color:#0057FF;'>rizki-habibi-portofolio.vercel.app</a> — di sana ada project, skill, pengalaman, dan kontak lengkap. 🌐",
    github: "GitHub Rizki ada di <a href='https://github.com/rizki-habibi' target='_blank' style='color:#0057FF;'>github.com/rizki-habibi</a> — cek repositori dan project open-source-nya! 💻",
    youtube: "Channel YouTube Rizki: <a href='https://www.youtube.com/@26_rizkihabibi73' target='_blank' style='color:#FF0000;'>@26_rizkihabibi73</a> — ada video tutorial coding, project, dan konten teknologi keren. Subscribe yuk! ▶️",
    marketplace: "Rizki punya toko di beberapa marketplace:<br>🛍️ <strong>Shopee</strong> — flash sale & promo<br>🟢 <strong>Tokopedia</strong> — belanja aman<br>🛒 <strong>Lazada</strong> — harga murah!<br><br>Klik langsung dari daftar link di atas ya!",
    populer: "Link paling populer di halaman ini:<br>🚀 <strong>Portofolio</strong> — wajib dikunjungi!<br>💻 <strong>GitHub</strong> — project open-source<br>▶️ <strong>YouTube</strong> — tutorial coding<br>🛒 <strong>Lazada</strong> — promo terbaik<br><br>Semua ada di daftar atas! 👆",
    contact: "Mau kontak Rizki? Bisa via:<br>📧 <strong>Email</strong> — kirim langsung dari link email di atas<br>💬 <strong>WhatsApp</strong> — chat personal<br>✈️ <strong>Telegram</strong> — join channel<br>💼 <strong>LinkedIn</strong> — profesional",
    default: [
        "Hmm, aku belum paham pertanyaanmu 🤔 Coba tanya tentang: <em>Rizki, portofolio, GitHub, YouTube, marketplace, atau link populer</em>!",
        "Pertanyaan menarik! 😄 Tapi aku spesialis info tentang Rizki Habibi. Coba tanya: <em>'Tentang Rizki'</em>, <em>'Link populer'</em>, atau <em>'Marketplace'</em>!",
        "Wah aku kurang tahu soal itu 😅 Tapi aku bisa bantu info soal <em>Rizki Habibi, proyek-proyeknya, atau link di halaman ini</em>!"
    ]
};

function toggleAI() {
    const panel = document.getElementById('panel-ai');
    const ikon  = document.getElementById('tombol-ai-ikon');
    const badge = document.getElementById('tombol-ai-badge');
    aiTerbuka = !aiTerbuka;
    panel.classList.toggle('terbuka', aiTerbuka);
    ikon.textContent = aiTerbuka ? '✕' : '🤖';

    if (aiTerbuka) {
        badge.style.display = 'none';
        if (!aiSudahSapa) {
            aiSudahSapa = true;
            setTimeout(function() {
                tampilkanTyping(function() {
                    tambahBubble('ai', aiPengetahuan.sapa[0]);
                });
            }, 400);
        }
        setTimeout(function() {
            document.getElementById('ai-input').focus();
        }, 300);
    } else {
        ikon.textContent = '🤖';
    }
}

function tambahBubble(tipe, teks) {
    const area = document.getElementById('ai-pesan');
    const div  = document.createElement('div');
    div.className = 'bubble bubble-' + tipe;
    div.innerHTML = teks;
    area.appendChild(div);
    area.scrollTop = area.scrollHeight;
}

function tampilkanTyping(callback) {
    const area = document.getElementById('ai-pesan');
    const typing = document.createElement('div');
    typing.className = 'bubble bubble-ai';
    typing.id = 'typing-indicator';
    typing.innerHTML = '<div class="typing-dots"><span></span><span></span><span></span></div>';
    area.appendChild(typing);
    area.scrollTop = area.scrollHeight;

    setTimeout(function() {
        typing.remove();
        callback();
    }, 900 + Math.random() * 600);
}

function kirimPesan() {
    const input = document.getElementById('ai-input');
    const teks  = input.value.trim();
    if (!teks) return;

    tambahBubble('user', teks);
    input.value = '';

    // Sembunyikan quick reply setelah pertanyaan pertama
    document.getElementById('ai-quick').style.display = 'none';

    // Analisa pesan
    const q = teks.toLowerCase();
    let jawaban;

    if (q.match(/halo|hai|hi|hello|hy|hey/))
        jawaban = "Halo! 👋 Senang bertemu kamu! Ada yang bisa aku bantu tentang Rizki Habibi?";
    else if (q.match(/rizki|tentang|siapa|profil|bio/))
        jawaban = aiPengetahuan.tentang;
    else if (q.match(/porto|portfolio|website|web/))
        jawaban = aiPengetahuan.portofolio;
    else if (q.match(/github|repo|code|kode|project/))
        jawaban = aiPengetahuan.github;
    else if (q.match(/youtube|video|channel|subscribe/))
        jawaban = aiPengetahuan.youtube;
    else if (q.match(/shopee|tokopedia|lazada|marketplace|toko|beli|belanja|murah/))
        jawaban = aiPengetahuan.marketplace;
    else if (q.match(/populer|popular|terbaik|paling|top|favorit/))
        jawaban = aiPengetahuan.populer;
    else if (q.match(/kontak|contact|hubungi|email|wa|whatsapp|telegram/))
        jawaban = aiPengetahuan.contact;
    else if (q.match(/terima kasih|makasih|thanks|thx/))
        jawaban = "Sama-sama! 😊 Senang bisa bantu. Jangan lupa kunjungi link-link keren Rizki di atas ya! 🚀";
    else if (q.match(/bagus|keren|wow|mantap|canggih/))
        jawaban = "Hehe terima kasih! 😄 Rizki memang keren! Kunjungi <a href='https://rizki-habibi-portofolio.vercel.app' target='_blank' style='color:#0057FF;'>portofolionya</a> untuk lihat lebih banyak karya!";
    else if (q.match(/link|tautan|daftar|semua/))
        jawaban = aiPengetahuan.populer;
    else
        jawaban = aiPengetahuan.default[Math.floor(Math.random() * aiPengetahuan.default.length)];

    tampilkanTyping(function() {
        tambahBubble('ai', jawaban);
    });
}

function kirimQuick(btn) {
    const teks = btn.textContent.trim();
    document.getElementById('ai-input').value = teks;
    kirimPesan();
}

// Tampilkan badge notif setelah 3 detik
setTimeout(function() {
    if (!aiTerbuka) {
        const badge = document.getElementById('tombol-ai-badge');
        badge.style.display = 'block';
        badge.textContent = '1';
    }
}, 3000);
</script>
</body>
</html>
