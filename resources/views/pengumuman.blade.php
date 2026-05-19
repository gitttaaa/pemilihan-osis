<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OSIS | Pengumuman</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Inter', sans-serif; min-height: 100vh; background: #1f2d4d; color: #eef2ff; }
        .page { max-width: 1200px; margin: 0 auto; padding: 1.5rem; }
        .main-nav { display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 1rem; margin-bottom: 2rem; }
        .brand { font-size: 1.3rem; font-weight: 800; color: #f7b36b; }
        .main-nav nav { display: flex; flex-wrap: wrap; gap: 1rem; align-items: center; }
        .main-nav a { color: rgba(255,255,255,0.85); text-decoration: none; font-weight: 600; }
        .main-nav a:hover { color: #f7b36b; }
        .btn-nav { background: #f7b36b; color: #1c2132; padding: 0.75rem 1.2rem; border-radius: 999px; }
        .hero { background: rgba(255,255,255,0.07); border: 1px solid rgba(255,255,255,0.12); border-radius: 2rem; padding: 2rem; margin-bottom: 2rem; }
        .hero h1 { font-size: clamp(2.5rem, 4vw, 3.5rem); margin-bottom: 0.8rem; }
        .hero p { color: rgba(255,255,255,0.78); line-height: 1.8; max-width: 55rem; }
        .announcement-list { display: grid; gap: 1rem; }
        .announcement { background: rgba(255,255,255,0.06); border: 1px solid rgba(255,255,255,0.1); border-radius: 1.75rem; padding: 1.5rem; }
        .announcement h2 { font-size: 1.35rem; margin-bottom: 0.8rem; color: #fff; }
        .announcement p { color: rgba(255,255,255,0.8); line-height: 1.75; }
        .announcement time { display: inline-block; margin-top: 0.8rem; color: rgba(255,255,255,0.65); font-size: 0.9rem; }
        .cta { margin-top: 2rem; text-align: center; }
        .cta a { display: inline-flex; align-items: center; gap: 0.7rem; background: #f7b36b; color: #1c2132; text-decoration: none; padding: 0.95rem 1.6rem; border-radius: 999px; font-weight: 700; }
        footer { text-align: center; margin-top: 2.5rem; color: rgba(255,255,255,0.55); }
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
                <a href="{{ route('osis.pendaftaran') }}" class="btn-nav">Daftar Sekarang</a>
            </nav>
        </header>

        <section class="hero">
            <h1>Pengumuman Penting</h1>
            <p>Semua informasi terbaru mengenai pendaftaran calon OSIS, verifikasi, dan jadwal tersedia di halaman ini. Pastikan selalu cek pengumuman untuk tidak ketinggalan update.</p>
        </section>

        <div class="announcement-list">
            <article class="announcement">
                <h2>Pengumuman Pendaftaran Dibuka</h2>
                <p>Pendaftaran calon OSIS resmi dibuka untuk seluruh siswa aktif. Silakan cek halaman beranda dan klik tombol Daftar Sekarang untuk memulai.</p>
                <time>12 Mei 2026</time>
            </article>
            <article class="announcement">
                <h2>Informasi Verifikasi</h2>
                <p>Setelah mengirim formulir, data akan diverifikasi oleh admin. Status pendaftar akan berubah menjadi terverifikasi jika lengkap.</p>
                <time>13 Mei 2026</time>
            </article>
            <article class="announcement">
                <h2>Jadwal Wawancara</h2>
                <p>Jadwal wawancara akan muncul setelah verifikasi. Pastikan kamu mempersiapkan jawaban tentang visi, misi, dan kontribusi kamu.</p>
                <time>14 Mei 2026</time>
            </article>
        </div>

        <div class="cta">
            <a href="{{ route('osis.pendaftaran') }}"><i class="fas fa-pencil-alt"></i> Kembali ke Pendaftaran</a>
        </div>

        <footer>2026 • Pengumuman OSIS SMK Plus Pelita Nusantara</footer>
    </div>
</body>
</html>
