<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OSIS | Beranda</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,300;400;500;600;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            min-height: 100vh;
            background: #212a44;
            color: #eef2ff;
        }

        .page {
            max-width: 1300px;
            margin: 0 auto;
            padding: 1.5rem;

            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* NAVBAR */
        .main-nav {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
            border-bottom: 3px solid rgba(255,255,255,0.2);
            padding-bottom: 1rem;
            margin-bottom: 2rem;
        }

        .brand {
            font-size: 1.3rem;
            font-weight: 800;
            color: #f7b36b;
            letter-spacing: 0.08em;
        }

        .main-nav nav {
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
            align-items: center;
        }

        .main-nav a {
            color: rgba(255,255,255,0.85);
            text-decoration: none;
            font-weight: 600;
            transition: color 0.2s;
        }

        .main-nav a:hover {
            color: #f7b36b;
        }

        .main-nav .btn-nav {
            background: #f7b36b;
            color: #1c2132;
            padding: 0.8rem 1.2rem;
            border-radius: 999px;
            font-weight: 700;
        }

        /* HERO */
        .hero {
            flex: 1;

            display: grid;
            grid-template-columns: 1fr 1fr;
            align-items: center;
            gap: 2rem;
        }

        /* LEFT */
        .hero-content {
            max-width: 600px;
        }

        .hero-content h1 {
            font-size: clamp(2.8rem, 4vw, 4.4rem);
            line-height: 0.95;
            letter-spacing: -0.05em;
            margin-bottom: 1rem;

            text-align: left;
        }

        .hero-content p {
            color: rgba(255,255,255,0.82);
            font-size: 1.05rem;
            line-height: 1.7;

            margin-bottom: 2rem;
            text-align: left;
        }

        .hero-buttons {
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .hero-buttons a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.6rem;
            padding: 0.95rem 1.5rem;
            border-radius: 999px;
            font-weight: 700;
            text-decoration: none;
            transition: transform 0.2s ease;
        }

        .hero-buttons a:hover {
            transform: translateY(-2px);
        }

        .btn-primary {
            background: #f7b36b;
            color: #1c2132;
        }

        .btn-secondary {
            background: rgba(255,255,255,0.08);
            color: #f7f7ff;
            border: 1px solid rgba(255,255,255,0.18);
        }

        /* RIGHT */
        .hero-image {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .hero-image img {
            width: 100%;
            max-width: 420px;
            object-fit: contain;
        }

        footer {
            text-align: center;
            margin-top: 2rem;
            color: rgba(255,255,255,0.6);
            font-size: 0.9rem;
        }

        @media (max-width: 900px) {
            .hero {
                grid-template-columns: 1fr;
                text-align: center;
            }

            .hero-content {
                max-width: 100%;
            }

            .hero-content h1,
            .hero-content p {
                text-align: center;
            }

            .hero-buttons {
                justify-content: center;
            }

            .hero-image {
                margin-top: 2rem;
            }
        }

        @media (max-width: 720px) {
            .main-nav {
                flex-direction: column;
                align-items: flex-start;
            }

            .hero-content h1 {
                font-size: 2.8rem;
            }
        }
    </style>
</head>

<body>

    <div class="page">

        <header class="main-nav">
            <div class="brand">OSIS</div>

            <nav>
                <a href="{{ route('home') }}">Beranda</a>
                <a href="{{ route('osis.informasi') }}">Informasi</a>
                <a href="{{ route('osis.jadwal') }}">Jadwal</a>
                <a href="{{ route('osis.pengumuman') }}">Pengumuman</a>

                <a href="{{ route('osis.pendaftaran') }}" class="btn-nav">
                    Daftar Sekarang
                </a>
            </nav>
        </header>

        <section class="hero">

            <!-- LEFT -->
            <div class="hero-content">

                <h1>
                    Pendaftaran<br>
                    Calon OSIS
                </h1>

                <p>
                    Jadilah bagian dari kepemimpinan sekolah dan kontribusimu
                    untuk perubahan positif.
                </p>

                <div class="hero-buttons">

                    <a href="{{ route('osis.pendaftaran') }}" class="btn-primary">
                        <i class="fas fa-pencil-alt"></i>
                        Daftar Sekarang
                    </a>

                    <a href="{{ route('osis.informasi') }}" class="btn-secondary">
                        <i class="fas fa-info-circle"></i>
                        Lihat Informasi
                    </a>

                </div>

            </div>

            <!-- RIGHT-->
            <div class="hero-image">
                <img src="{{ asset('image/losis.png') }}" alt="Logo OSIS">
            </div>

        </section>

        <footer>
            2026 • Sistem Pemilihan OSIS • Berdasarkan flowchart resmi
        </footer>

    </div>

</body>
</html>