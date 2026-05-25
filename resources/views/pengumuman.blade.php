<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Seleksi Pendaftaran OSIS</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Inter', sans-serif;
            background: #23293a; /* Menyamakan dengan halaman pendaftaran */
            color: rgba(255,255,255,0.95);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
        }
        .card {
            background: rgba(15,23,42,0.9);
            max-width: 600px;
            width: 100%;
            border-radius: 1.5rem;
            padding: 3rem 2rem;
            text-align: center;
            border: 1px solid rgba(255,255,255,0.03);
            box-shadow: 0 25px 60px rgba(2,6,23,0.6);
        }
        .icon-box {
            font-size: 4.5rem;
            margin-bottom: 1.5rem;
        }
        .text-success { color: #48bb78; }
        .text-danger { color: #f56565; }
        
        h1 { font-size: 2.2rem; font-weight: 800; margin-bottom: 1rem; }
        p { color: rgba(255,255,255,0.75); font-size: 1.05rem; line-height: 1.6; margin-bottom: 2rem; }
        
        .info-table {
            background: rgba(255,255,255,0.05);
            padding: 1.2rem;
            border-radius: 1rem;
            margin-bottom: 2.5rem;
            text-align: left;
        }
        .info-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 0.5rem;
            font-size: 0.95rem;
        }
        .info-row:last-child { margin-bottom: 0; }
        .info-label { color: rgba(255,255,255,0.5); }
        .info-value { font-weight: 600; color: #ffffff; }

        .btn-back {
            display: inline-block;
            background: #f59e5b;
            color: #1b1e32;
            text-decoration: none;
            padding: 1rem 2rem;
            border-radius: 999px;
            font-weight: 700;
            transition: transform 0.15s;
        }
        .btn-back:hover { transform: translateY(-2px); }
    </style>
</head>
<body>

    <div class="card">
        @if($isLolos)
            <div class="icon-box text-success">
                <i class="fas fa-check-circle"></i>
            </div>
            <h1>SELAMAT, {{ strtoupper($nama) }}!</h1>
            <p>Kamu dinyatakan <strong>LOLOS</strong> seleksi administrasi dan kuis OSIS periode 2026. Terima kasih atas usaha dan kerja keras yang telah kamu tunjukkan selama proses pengisian data.</p>
        @else
            <div class="icon-box text-danger">
                <i class="fas fa-times-circle"></i>
            </div>
            <h1>MAAF, KAMU BELUM LOLOS</h1>
            <p>Mohon maaf, saat ini kamu belum berhasil memenuhi ambang batas nilai seleksi. Jangan berkecil hati, tetap semangat dan terima kasih banyak atas partisipasi serta antusiasme yang kamu berikan!</p>
        @endif

        <div class="info-table">
            <div class="info-row">
                <span class="info-label">Nama Pendaftar</span>
                <span class="info-value">{{ $nama }}</span>
            </div>
            <div class="info-row">
                <span class="info-label">Pilihan Bidang</span>
                <span class="info-value">{{ $sekbid }}</span>
            </div>
            <div class="info-row">
                <span class="info-label">Skor Kuis Anda</span>
                <span class="info-value" style="color: {{ $isLolos ? '#48bb78' : '#f56565' }}">{{ $score }} / 100</span>
            </div>
            @if($isLolos)
            <div class="info-row">
                <span class="info-label">Tahap Selanjutnya</span>
                <span class="info-value" style="color: #f6ad55;">Wawancara Tatap Muka</span>
            </div>
            @endif
        </div>

        <a href="/" class="btn-back"><i class="fas fa-home"></i> Kembali ke Dashboard</a>
    </div>

</body>
</html>