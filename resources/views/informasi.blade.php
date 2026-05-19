<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OSIS | Informasi</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Inter', sans-serif; min-height: 100vh; background: #1f2d4d; color: #eef2ff; }
        .page { max-width: 1200px; margin: 0 auto; padding: 1.5rem; }
        .main-nav { display: flex; align-items: center; justify-content: space-between; gap: 1rem; margin-bottom: 2rem; }
        .brand { font-size: 1.3rem; font-weight: 800; color: #f7b36b; }
        .main-nav nav { display: flex; flex-wrap: wrap; gap: 1rem; align-items: center; }
        .main-nav a { color: rgba(255,255,255,0.85); text-decoration: none; font-weight: 600; }
        .main-nav a:hover { color: #f7b36b; }
        .btn-nav { background: #f7b36b; color: #1c2132; padding: 0.75rem 1.2rem; border-radius: 999px; }
        .hero { background: rgba(255,255,255,0.07); border: 1px solid rgba(255,255,255,0.12); border-radius: 2rem; padding: 2rem; margin-bottom: 2rem; }
        .hero h1 { font-size: clamp(2.5rem, 4vw, 3.5rem); margin-bottom: 0.8rem; }
        .hero p { color: rgba(255,255,255,0.78); font-size: 1rem; line-height: 1.8; max-width: 50rem; }
        .content-grid { display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 1.5rem; }
        .card { background: rgba(255,255,255,0.06); border: 1px solid rgba(255,255,255,0.1); border-radius: 1.75rem; padding: 1.75rem; }
        .card h2 { font-size: 1.45rem; margin-bottom: 1rem; color: #fff; }
        .card p { color: rgba(255,255,255,0.78); line-height: 1.75; margin-bottom: 1rem; }
        .card ul { list-style: none; margin-top: 0.5rem; }
        .card li { display: flex; align-items: flex-start; gap: 0.75rem; margin-bottom: 0.85rem; color: rgba(255,255,255,0.82); }
        .card li::before { content: '•'; color: #f7b36b; margin-top: 0.15rem; }
        .cta { margin-top: 2rem; text-align: center; }
        .cta a { display: inline-flex; align-items: center; gap: 0.7rem; background: #f7b36b; color: #1c2132; text-decoration: none; padding: 0.95rem 1.6rem; border-radius: 999px; font-weight: 700; }
        footer { text-align: center; margin-top: 2.5rem; color: rgba(255,255,255,0.55); }
        @media (max-width: 900px) { .content-grid { grid-template-columns: 1fr; } }
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
            <h1>Informasi Pemilihan OSIS</h1>
            <p>Dapatkan informasi lengkap tentang syarat, alur, dan manfaat mengikuti seleksi calon OSIS. Halaman ini dibuat agar setiap siswa memahami proses pendaftaran dengan jelas.</p>
        </section>

        <div class="content-grid">
            <div class="card">
                <h2>Apa itu OSIS?</h2>
                <p>OSIS adalah organisasi siswa intra sekolah yang berfungsi sebagai wadah pengembangan kepemimpinan, kreativitas, dan tanggung jawab sosial bagi siswa.</p>
                <ul>
                    <li>Menjadi perwakilan siswa</li>
                    <li>Membuat program kegiatan sekolah</li>
                    <li>Mendukung kesiswaan yang positif</li>
                </ul>
            </div>
            <div class="card">
                <h2>Syarat Pendaftaran</h2>
                <ul>
                    <li>Terdaftar sebagai siswa aktif sekolah</li>
                    <li>Mengisi formulir pendaftaran dengan lengkap</li>
                    <li>Memilih sekbid yang diminati</li>
                    <li>Menjawab alasan & kontribusi dengan jelas</li>
                </ul>
            </div>
            <div class="card">
                <h2>Alur Seleksi</h2>
                <ul>
                    <li>Buka halaman beranda</li>
                    <li>Klik Daftar Sekarang</li>
                    <li>Pilih sekbid dan isi pertanyaan</li>
                    <li>Tunggu verifikasi admin & jadwal wawancara</li>
                </ul>
            </div>
            <div class="card">
                <h2>Kenapa Harus Ikut?</h2>
                <p>Menjadi calon OSIS memberi kesempatan untuk berkontribusi langsung pada kegiatan sekolah, mengembangkan kemampuan komunikasi, dan memperluas jaringan teman serta guru.</p>
            </div>
        </div>

        <div class="cta">
            <a href="{{ route('osis.pendaftaran') }}"><i class="fas fa-arrow-right"></i> Mulai Daftar Sekarang</a>
        </div>

        <footer>2026 • OSIS SMK Plus Pelita Nusantara</footer>
    </div>
</body>
</html>
