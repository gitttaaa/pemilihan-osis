<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OSIS | Jadwal</title>
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
        .grid { display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; }
        .card { background: rgba(255,255,255,0.06); border: 1px solid rgba(255,255,255,0.1); border-radius: 1.75rem; padding: 1.75rem; }
        .card h2 { font-size: 1.5rem; margin-bottom: 1rem; color: #fff; }
        .card p { color: rgba(255,255,255,0.78); margin-bottom: 1rem; }
        .schedule-list { list-style: none; }
        .schedule-item { display: flex; align-items: flex-start; gap: 1rem; margin-bottom: 1rem; }
        .schedule-item span { min-width: 90px; font-weight: 700; color: #f7b36b; }
        .schedule-item div { color: rgba(255,255,255,0.82); line-height: 1.7; }
        .cta { margin-top: 2rem; text-align: center; }
        .cta a { display: inline-flex; align-items: center; gap: 0.7rem; background: #f7b36b; color: #1c2132; text-decoration: none; padding: 0.95rem 1.6rem; border-radius: 999px; font-weight: 700; }
        footer { text-align: center; margin-top: 2.5rem; color: rgba(255,255,255,0.55); }
        @media (max-width: 900px) { .grid { grid-template-columns: 1fr; } }
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
            <h1>Jadwal Wawancara OSIS</h1>
            <p>Lihat rangkaian jadwal penting seleksi OSIS dan persiapkan diri dengan baik untuk tahapan wawancara setelah verifikasi data.</p>
        </section>

        <div class="grid">
            <div class="card">
                <h2>Jadwal Utama</h2>
                <ul class="schedule-list">
                    <li class="schedule-item"><span>H+2</span><div>Verifikasi admin selesai, jadwal wawancara mulai dibuka.</div></li>
                    <li class="schedule-item"><span>H+3</span><div>Informasi jadwal dikirim ke pendaftar yang terverifikasi.</div></li>
                    <li class="schedule-item"><span>H+4</span><div>Wawancara OSIS berjalan dalam beberapa sesi.</div></li>
                    <li class="schedule-item"><span>H+5</span><div>Evaluasi hasil wawancara dan pengumuman lanjutan.</div></li>
                </ul>
            </div>
            <div class="card">
                <h2>Persiapan Wawancara</h2>
                <p>Pastikan kamu sudah menyiapkan:</p>
                <ul>
                    <li>Data diri lengkap dan dokumen pendukung</li>
                    <li>Jawaban yang jelas tentang visi-misi OSIS</li>
                    <li>Contoh kontribusi yang ingin kamu lakukan</li>
                    <li>Motivasi memilih sekbid tertentu</li>
                </ul>
            </div>
        </div>

        <div class="cta">
            <a href="{{ route('osis.pendaftaran') }}"><i class="fas fa-pencil-alt"></i> Kembali ke Pendaftaran</a>
        </div>

        <footer>2026 • Jadwal ASIS SMK Plus Pelita Nusantara</footer>
    </div>
</body>
</html>
