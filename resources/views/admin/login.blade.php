<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin — BerbagiTautan</title>
    <link href="https://fonts.googleapis.com/css2?family=Bangers&family=Nunito:wght@400;700;800;900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        body {
            min-height: 100vh;
            background: #FFE600;
            background-image: radial-gradient(circle, rgba(0,0,0,0.12) 1.5px, transparent 1.5px);
            background-size: 18px 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Nunito', sans-serif;
            overflow: hidden;
        }

        .login-box {
            background: #fff;
            border: 5px solid #1A1A2E;
            border-radius: 20px;
            box-shadow: 10px 10px 0 #1A1A2E;
            padding: 40px 36px;
            width: 100%;
            max-width: 420px;
        }

        .login-title {
            font-family: 'Bangers', cursive;
            font-size: 2.8rem;
            letter-spacing: 3px;
            color: #1A1A2E;
            text-shadow: 3px 3px 0 #FF3B30;
            text-align: center;
            margin-bottom: 6px;
            animation: loginTitleBounce 0.7s cubic-bezier(.36,.07,.19,.97) both;
        }
        @keyframes loginTitleBounce {
            0%   { opacity:0; transform: scale(0.5) rotate(-10deg); }
            70%  { transform: scale(1.08) rotate(2deg); }
            100% { opacity:1; transform: scale(1) rotate(0deg); }
        }

        .login-box {
            animation: loginBoxMasuk 0.6s cubic-bezier(.22,.68,0,1.2) both;
        }
        @keyframes loginBoxMasuk {
            from { opacity:0; transform: translateY(60px) scale(0.9); }
            to   { opacity:1; transform: translateY(0) scale(1); }
        }

        /* Goyangan background dots */
        body::before {
            content: '';
            position: fixed;
            inset: -40px;
            background-image: radial-gradient(circle, rgba(0,0,0,0.12) 1.5px, transparent 1.5px);
            background-size: 18px 18px;
            animation: bgGerak 8s linear infinite;
            z-index: 0;
        }
        @keyframes bgGerak {
            from { transform: translate(0,0); }
            to   { transform: translate(18px,18px); }
        }
        .login-box { position: relative; z-index: 1; }

        .login-sub {
            text-align: center;
            font-weight: 700;
            color: #555;
            margin-bottom: 28px;
            font-size: 0.9rem;
        }

        .form-label {
            font-weight: 800;
            color: #1A1A2E;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .form-control {
            border: 3px solid #1A1A2E;
            border-radius: 10px;
            font-weight: 700;
            padding: 10px 14px;
            font-size: 0.95rem;
            box-shadow: 3px 3px 0 #1A1A2E;
            transition: all 0.2s;
        }

        .form-control:focus {
            border-color: #0057FF;
            box-shadow: 3px 3px 0 #0057FF;
            outline: none;
        }

        .btn-masuk {
            background: #FF3B30;
            color: #fff;
            border: 3px solid #1A1A2E;
            border-radius: 10px;
            font-family: 'Bangers', cursive;
            letter-spacing: 2px;
            font-size: 1.2rem;
            padding: 10px;
            box-shadow: 5px 5px 0 #1A1A2E;
            transition: all 0.15s;
            width: 100%;
        }

        .btn-masuk:hover {
            transform: translate(-2px, -2px);
            box-shadow: 7px 7px 0 #1A1A2E;
            background: #CC2020;
            color: #fff;
        }

        .btn-masuk:active {
            transform: translate(3px, 3px);
            box-shadow: 2px 2px 0 #1A1A2E;
        }

        .alert-danger {
            border: 3px solid #1A1A2E;
            border-radius: 10px;
            font-weight: 700;
            box-shadow: 3px 3px 0 #1A1A2E;
        }

        .dekor-kanan {
            position: fixed;
            top: 60px; right: 40px;
            font-family: 'Bangers', cursive;
            font-size: 6rem;
            color: rgba(255,59,48,0.15);
            letter-spacing: 4px;
            pointer-events: none;
            transform: rotate(15deg);
        }

        .dekor-kiri {
            position: fixed;
            bottom: 60px; left: 30px;
            font-family: 'Bangers', cursive;
            font-size: 4rem;
            color: rgba(0,87,255,0.12);
            letter-spacing: 4px;
            pointer-events: none;
            transform: rotate(-10deg);
        }

        .kembali-link {
            text-align: center;
            margin-top: 20px;
            font-weight: 700;
            font-size: 0.9rem;
        }

        .kembali-link a {
            color: #0057FF;
            text-decoration: none;
            font-weight: 800;
        }

        .kembali-link a:hover { text-decoration: underline; }
    </style>
</head>
<body>
    <span class="dekor-kanan">POW!</span>
    <span class="dekor-kiri">ZAP!</span>

    <div class="login-box">
        <div class="login-title">💥 MASUK</div>
        <p class="login-sub">Area Khusus Admin — Jangan Ngintip!</p>

        @if($errors->any())
            <div class="alert alert-danger mb-4">
                <i class="bi bi-exclamation-triangle-fill me-1"></i>
                {{ $errors->first() }}
            </div>
        @endif

        @if(session('sukses'))
            <div class="alert alert-success mb-4" style="border:3px solid #1A1A2E; box-shadow:3px 3px 0 #1A1A2E; font-weight:700;">
                <i class="bi bi-check-circle-fill me-1"></i>
                {{ session('sukses') }}
            </div>
        @endif

        <form action="{{ route('login.post') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">
                    <i class="bi bi-envelope-fill me-1"></i> Email
                </label>
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                    value="{{ old('email') }}" placeholder="admin@berbagi.com" required autofocus>
            </div>

            <div class="mb-4">
                <label class="form-label">
                    <i class="bi bi-lock-fill me-1"></i> Password
                </label>
                <input type="password" name="password" class="form-control" placeholder="••••••••" required>
            </div>

            <div class="form-check mb-4">
                <input class="form-check-input" type="checkbox" name="ingat_saya" id="ingatSaya"
                    style="border:2px solid #1A1A2E; width:20px; height:20px;">
                <label class="form-check-label ms-1" for="ingatSaya" style="font-weight:700; font-size:0.9rem;">
                    Ingat Saya
                </label>
            </div>

            <button type="submit" class="btn-masuk">
                🚀 MASUK SEKARANG!
            </button>
        </form>

        <div class="kembali-link">
            <a href="{{ route('profil') }}">← Kembali ke Halaman Publik</a>
        </div>

        <div class="mt-4 p-3 rounded text-center"
             style="background:#FFF9C4; border:2px dashed #888; font-size:0.8rem; font-weight:700; color:#555;">
            Demo login:<br>
            📧 admin@berbagi.com<br>
            🔑 password123
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    /* Ripple pada tombol masuk */
    document.querySelector('.btn-masuk').addEventListener('click', function(e) {
        const btn = this;
        const ripple = document.createElement('span');
        ripple.style.cssText = `
            position:absolute; border-radius:50%;
            background:rgba(255,255,255,0.35);
            transform:scale(0); animation:rippleLogin 0.5s linear;
            width:200px; height:200px;
            left:${e.offsetX - 100}px; top:${e.offsetY - 100}px;
            pointer-events:none;
        `;
        btn.style.position = 'relative';
        btn.style.overflow = 'hidden';
        btn.appendChild(ripple);
        setTimeout(() => ripple.remove(), 600);
    });
    </script>
    <style>
    @keyframes rippleLogin {
        to { transform: scale(4); opacity: 0; }
    }
    </style>
</body>
</html>
</html>
