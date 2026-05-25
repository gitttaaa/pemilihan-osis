<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Seleksi OSIS | Aturan Keputusan SPK</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Inter', sans-serif; background: #23293a; min-height: 100vh; padding: 1.5rem 2rem; color: rgba(255,255,255,0.95); }
        .container { max-width: 1400px; margin: 0 auto; }
        .main-nav { display: flex; align-items: center; gap: 1rem; margin-bottom: 1.25rem; }
        .brand { font-size: 1.5rem; font-weight: 800; color: #f59e5b; display: inline-flex; align-items: center; gap: 0.65rem; }
        .page-hero { display: block; margin-bottom: 2rem; }
        .page-title { font-size: 3rem; font-weight: 800; margin-bottom: 0.5rem; color: #ffffff; }
        .page-subtitle { color: rgba(255,255,255,0.75); margin-bottom: 1rem; }
        .title-underline { width: 120px; height: 4px; background: rgba(255,255,255,0.12); border-radius: 4px; margin: 1rem 0 1.6rem 0; }
        .grid-2col { display: grid; grid-template-columns: 1fr; gap: 2rem; align-items: start; }
        .card { background: rgba(15,23,42,0.9); border-radius: 1.5rem; border: 1px solid rgba(255,255,255,0.03); overflow: hidden; box-shadow: 0 20px 40px rgba(0,0,0,0.3); }
        .card-body { padding: 2.2rem; }
        .form-group { margin-bottom: 1.2rem; position: relative; }
        label { font-weight: 600; display: block; margin-bottom: 0.4rem; color: rgba(255,255,255,0.9); font-size: 0.95rem; }
        label .required { color: #e53e3e; margin-left: 0.2rem; }
        input, textarea { width: 100%; border-radius: 999px; padding: 1rem 1.25rem 1rem 4.5rem; border: none; background: #ffffff; color: #1f2937; font-family: 'Inter', sans-serif; font-size: 0.95rem; transition: all 0.2s; min-height: 3.5rem; }
        textarea { border-radius: 1.5rem !important; padding: 1.25rem !important; resize: none; }
        input:focus, textarea:focus { outline: none; box-shadow: 0 6px 18px rgba(245,158,91,0.2); background: #fff; }
        .input-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 1.25rem; margin-bottom: 1rem; }
        .icon-circle { position: absolute; left: 0.9rem; top: 50%; transform: translateY(-50%); width: 40px; height: 40px; border-radius: 50%; background: #ffffff; display: flex; align-items: center; justify-content: center; color: #6b7280; box-shadow: 0 4px 10px rgba(2,6,23,0.12); font-size: 0.95rem; }
        .btn-primary { background: #f59e5b; color: #1b1e32; padding: 0.9rem 1.6rem; border-radius: 999px; border: none; font-weight: 700; cursor: pointer; transition: all 0.15s; }
        .btn-primary:hover { transform: translateY(-2px); filter: brightness(1.1); }
        .form-actions { display: flex; justify-content: flex-end; margin-top: 1.5rem; gap: 1rem; }
        .hidden { display: none; }
        .sekbid-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(220px, 1fr)); gap: 1rem; margin: 1.5rem 0; }
        .sekbid-option { background: #1e293b; border: 2px solid rgba(255,255,255,0.05); border-radius: 1rem; padding: 1.2rem; text-align: center; cursor: pointer; transition: all 0.2s; position: relative; }
        .sekbid-option:hover { transform: translateY(-3px); border-color: #f59e5b; }
        .sekbid-option.selected { background: rgba(245, 158, 91, 0.1); border-color: #f59e5b; }
        .sekbid-icon { font-size: 2rem; margin-bottom: 0.5rem; }
        .sekbid-name { font-weight: 600; font-size: 0.9rem; color: #ffffff; }
        .radio-check { position: absolute; top: 0.5rem; right: 0.5rem; width: 20px; height: 20px; border-radius: 50%; background: rgba(255,255,255,0.1); border: 2px solid rgba(255,255,255,0.2); }
        .sekbid-option.selected .radio-check { background: #f59e5b; border-color: #f59e5b; box-shadow: inset 0 0 0 3px #1e293b; }
        
        /* Quiz Layout Styles */
        .quiz-progress-container { background: rgba(255, 255, 255, 0.05); padding: 1rem; border-radius: 1rem; margin-bottom: 1.5rem; }
        .quiz-progress-bar-wrapper { width: 100%; background: rgba(255, 255, 255, 0.1); height: 6px; border-radius: 10px; overflow: hidden; margin-top: 0.5rem; }
        .quiz-progress-fill { background: #f59e5b; height: 100%; width: 20%; transition: width 0.3s ease; }
        .quiz-option-item { background: rgba(255, 255, 255, 0.03); border: 1px solid rgba(255, 255, 255, 0.08); padding: 1.2rem; border-radius: 1rem; margin-bottom: 0.8rem; cursor: pointer; display: flex; align-items: center; gap: 1rem; transition: all 0.2s; }
        .quiz-option-item:hover { background: rgba(245, 158, 91, 0.05); border-color: #f59e5b; }
        .quiz-option-item.selected { background: rgba(245, 158, 91, 0.1); border-color: #f59e5b; }
        .quiz-radio { width: 18px; height: 18px; border: 2px solid rgba(255, 255, 255, 0.4); border-radius: 50%; display: flex; align-items: center; justify-content: center; }
        .quiz-option-item.selected .quiz-radio { border-color: #f59e5b; background: #f59e5b; box-shadow: inset 0 0 0 3px #151b26; }
        
        /* --- STYLE BARU UNTUK KELURUSAN SEPERTI DI GAMBAR --- */
        .result-container {
            text-align: center;
            padding: 1.5rem 0;
        }
        .result-icon-wrapper {
            margin-bottom: 1.5rem;
        }
        .result-icon-wrapper i {
            font-size: 4.5rem;
        }
        .result-icon-success {
            color: #ffffff;
            background: #23293a;
            width: 90px;
            height: 90px;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border: 4px solid #ffffff;
        }
        .result-icon-failed {
            color: #ef4444;
            font-size: 5rem !important;
        }
        .result-title-status {
            font-size: 1.6rem;
            font-weight: 800;
            letter-spacing: 1px;
            margin-bottom: 0.5rem;
            color: #ffffff;
        }
        .result-message {
            color: rgba(255, 255, 255, 0.7);
            font-size: 0.95rem;
            max-width: 500px;
            margin: 0 auto 2rem auto;
            line-height: 1.5;
        }
        .badge-info-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 0.65rem;
            margin-bottom: 2.5rem;
            max-width: 800px;
            margin-left: auto;
            margin-right: auto;
        }
        .pill-badge {
            background: #23293a;
            padding: 0.6rem 1.2rem;
            border-radius: 999px;
            font-size: 0.85rem;
            font-weight: 500;
            color: rgba(255, 255, 255, 0.8);
            border: 1px solid rgba(255, 255, 255, 0.05);
        }
        .pill-badge strong {
            color: #ffffff;
            font-weight: 700;
        }
        .btn-dashboard {
            background: #f59e5b;
            color: #1b1e32;
            padding: 0.9rem 2.5rem;
            border-radius: 999px;
            border: none;
            font-weight: 700;
            font-size: 0.95rem;
            cursor: pointer;
            transition: all 0.2s;
            box-shadow: 0 4px 15px rgba(245, 158, 91, 0.2);
        }
        .btn-dashboard:hover {
            transform: translateY(-2px);
            filter: brightness(1.1);
        }
        footer { text-align: center; margin-top: 2rem; color: rgba(255,255,255,0.4); font-size: 0.8rem; }
    </style>
</head>
<body>
    <div class="container">
        <header class="main-nav">
            <div class="brand"><i class="fas fa-graduation-cap"></i>OSIS</div>
        </header>

        <div class="page-hero" id="pageHeroHeader">
            <div class="page-title" id="heroTitle">Data Diri</div>
            <div class="page-subtitle" id="heroSubtitle">Lengkapi data dirimu dengan lengkap untuk melanjutkan proses pendaftaran calon pengurus OSIS.</div>
            <div class="title-underline"></div>
        </div>

        <div class="grid-2col">
            <div class="card">
                <div class="card-body">
                    <form id="osisForm" onsubmit="event.preventDefault();">
                        
                        <div class="step-1">
                            <div class="input-grid">
                                <div class="form-group">
                                    <label>Nama Lengkap <span class="required">*</span></label>
                                    <span class="icon-circle"><i class="fas fa-user"></i></span>
                                    <input type="text" id="input_nama" name="nama" value="{{ old('nama') }}" required placeholder="Masukkan nama lengkap">
                                </div>

                                <div class="form-group">
                                    <label>NIS <span class="required">*</span></label>
                                    <span class="icon-circle"><i class="fas fa-id-card"></i></span>
                                    <input type="text" id="input_nis" name="nis" value="{{ old('nis') }}" required placeholder="Masukkan NIS">
                                </div>

                                <div class="form-group">
                                    <label>Kelas <span class="required">*</span></label>
                                    <span class="icon-circle"><i class="fas fa-book-open"></i></span>
                                    <input type="text" id="input_kelas" name="kelas" value="{{ old('kelas') }}" required placeholder="Contoh XI PPLG 2">
                                </div>

                                <div class="form-group">
                                    <label>No. Handphone <span class="required">*</span></label>
                                    <span class="icon-circle"><i class="fas fa-phone"></i></span>
                                    <input type="text" id="input_nohp" name="no_hp" value="{{ old('no_hp') }}" required placeholder="08xxxxxxxxxxxx">
                                </div>
                            </div>
                            <div class="form-actions">
                                <button type="button" id="nextBtn" class="btn-primary">
                                    Next: Pilih Bidang <i class="fas fa-arrow-right"></i>
                                </button>
                            </div>
                        </div>

                        <div class="step-2 hidden">
                            <label>Pilih Seksi Bidang yang Diminati <span class="required">*</span></label>
                            <div class="sekbid-grid" id="sekbidGrid">
                                <div class="sekbid-option" data-id="1" data-nama="Sekbid 1 (Keagamaan)">
                                    <div class="radio-check"></div>
                                    <div class="sekbid-icon"><i class="fas fa-mosque" style="color: #4299e1"></i></div>
                                    <div class="sekbid-name">Sekbid 1 (Keagamaan)</div>
                                </div>
                                <div class="sekbid-option" data-id="2" data-nama="Sekbid 2 (Pendidikan & Penalaran)">
                                    <div class="radio-check"></div>
                                    <div class="sekbid-icon"><i class="fas fa-brain" style="color: #48bb78"></i></div>
                                    <div class="sekbid-name">Sekbid 2 (Pendidikan & Penalaran)</div>
                                </div>
                                <div class="sekbid-option" data-id="3" data-nama="Sekbid 3 (Kepribadian & Wawasan Kebangsaan)">
                                    <div class="radio-check"></div>
                                    <div class="sekbid-icon"><i class="fas fa-flag" style="color: #e53e3e"></i></div>
                                    <div class="sekbid-name">Sekbid 3 (Wawasan Kebangsaan)</div>
                                </div>
                                <div class="sekbid-option" data-id="4" data-nama="Sekbid 4 (Olahraga & Kesenian)">
                                    <div class="radio-check"></div>
                                    <div class="sekbid-icon"><i class="fas fa-palette" style="color: #ed64a6"></i></div>
                                    <div class="sekbid-name">Sekbid 4 (Olahraga & Kesenian)</div>
                                </div>
                                <div class="sekbid-option" data-id="5" data-nama="Sekbid 5 (Komunikasi, Informasi & Literasi)">
                                    <div class="radio-check"></div>
                                    <div class="sekbid-icon"><i class="fas fa-bullhorn" style="color: #9f7aea"></i></div>
                                    <div class="sekbid-name">Sekbid 5 (Public Speaking)</div>
                                </div>
                                <div class="sekbid-option" data-id="6" data-nama="Sekbid 6 (Keterampilan & Wirausaha)">
                                    <div class="radio-check"></div>
                                    <div class="sekbid-icon"><i class="fas fa-lightbulb" style="color: #ecc94b"></i></div>
                                    <div class="sekbid-name">Sekbid 6 (Wirausaha)</div>
                                </div>
                            </div>
                            <input type="hidden" id="selectedSekbidId">
                            <input type="hidden" id="selectedSekbidNama">

                            <div class="form-actions">
                                <button type="button" id="backToStep1" class="btn-primary" style="background:#4a5568; color:white;">Kembali</button>
                                <button type="button" id="goToQuizBtn" class="btn-primary">Next: Mulai Kuis <i class="fas fa-bolt"></i></button>
                            </div>
                        </div>

                        <div class="step-3 hidden">
                            <div class="quiz-progress-container">
                                <div style="display:flex; justify-content:space-between; font-size:0.85rem; color:rgba(255,255,255,0.7)">
                                    <span id="quiz-step-text">Pertanyaan 1 dari 5</span>
                                    <span id="quiz-percent-text">20% Completed</span>
                                </div>
                                <div class="quiz-progress-bar-wrapper">
                                    <div id="quizProgressFill" class="quiz-progress-fill"></div>
                                </div>
                            </div>

                            <div style="margin-bottom: 1.5rem;">
                                <h3 id="quizQuestionText" style="font-size: 1.25rem; font-weight:700; line-height:1.5; color:#ffffff;"></h3>
                            </div>

                            <div id="quizOptionsContainer"></div>

                            <div class="form-actions">
                                <button type="button" id="quizBackBtn" class="btn-primary" style="background:#4a5568; color:white;">Kembali</button>
                                <button type="button" id="quizNextBtn" class="btn-primary">Selanjutnya <i class="fas fa-arrow-right"></i></button>
                            </div>
                        </div>

                        <div class="step-4 hidden">
                            <div class="result-container">
                                
                                <div id="containerLolos" class="hidden">
                                    <div class="result-icon-wrapper">
                                        <div class="result-icon-success">
                                            <i class="fas fa-check"></i>
                                        </div>
                                    </div>
                                    <h2 class="result-title-status">SELAMAT !</h2>
                                    <p class="result-message">Kamu lolos seleksi OSIS baru! Terimakasih atas usaha kamu dan tetap bekerja keras saat bertugas</p>
                                </div>

                                <div id="containerGagal" class="hidden">
                                    <div class="result-icon-wrapper">
                                        <i class="fas fa-file-alt result-icon-failed"></i>
                                    </div>
                                    <h2 class="result-title-status">Maaf, Kamu belum lolos</h2>
                                    <p class="result-message">Terima kasih atas partisipasi kamu dalam seleksi kamu belum dirasa kompeten untuk saat ini. Tetap berkarya luar biasa di luar organisasi luar sana dan jangan mudah menyerah ya</p>
                                </div>

                                <div class="badge-info-container">
                                    <div class="pill-badge">Nama: <strong id="lblNama">-</strong></div>
                                    <div class="pill-badge">Kelas: <strong id="lblKelas">-</strong></div>
                                    <div class="pill-badge">Sekbid: <strong id="lblSekbid">-</strong></div>
                                    <div class="pill-badge">Nilai Kuis: <strong id="lblNilai">-</strong></div>
                                </div>

                                <div style="margin-top: 1.5rem;">
                                    <button type="button" id="restartBtn" class="btn-dashboard">Kembali ke Dashboard</button>
                                </div>

                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>

        <footer>
            <i class="fas fa-copyright"></i> 2026 - Panitia Seleksi Pengurus OSIS Berbasis Aturan Keputusan SPK
        </footer>
    </div>

    <script>
        const step1 = document.querySelector('.step-1');
        const step2 = document.querySelector('.step-2');
        const step3 = document.querySelector('.step-3');
        const step4 = document.querySelector('.step-4');
        
        const nextBtn = document.getElementById('nextBtn');
        const backToStep1 = document.getElementById('backToStep1');
        const goToQuizBtn = document.getElementById('goToQuizBtn');
        
        const heroTitle = document.getElementById('heroTitle');
        const heroSubtitle = document.getElementById('heroSubtitle');
        const sekbidOptions = document.querySelectorAll('.sekbid-option');

        // BANK DATA PERTANYAAN DAN SKOR REAL USER
        const bankKuisSekbid = {
            "1": [
                { tanya: "Saat menghadapi dilema antara kepentingan pribadi dan nilai agama, aku…", opsi: [{teks:"A. Mengutamakan diri sendiri", skor:5}, {teks:"B. Bingung dan menunda keputusan", skor:10}, {teks:"C. Mempertimbangkan keduanya", skor:15}, {teks:"D. Mengutamakan nilai agama", skor:20}] },
                { tanya: "Ketika melihat teman melanggar norma agama, aku…", opsi: [{teks:"A. Mengabaikan", skor:5}, {teks:"C. Ragu untuk bertindak", skor:10}, {teks:"B. Menegur secara langsung", skor:15}, {teks:"D. Menasihati dengan cara bijak", skor:20}] },
                { tanya: "Dalam memahami ajaran agama, aku…", opsi: [{teks:"B. Tidak tertarik mendalami", skor:5}, {teks:"A. Hanya mengikuti orang lain", skor:10}, {teks:"C. Mencari pemahaman dasar", skor:15}, {teks:"D. Menganalisis dan menerapkan", skor:20}] },
                { tanya: "Saat ibadah terasa berat, aku…", opsi: [{teks:"D. Menyerah", skor:5}, {teks:"B. Kadang meninggalkan", skor:10}, {teks:"A. Tetap berusaha", skor:15}, {teks:"C. Konsisten menjalankan", skor:20}] },
                { tanya: "Peran agama dalam hidupku adalah…", opsi: [{teks:"B. Tidak terlalu penting", skor:5}, {teks:"A. Formalitas", skor:10}, {teks:"C. Pedoman hidup", skor:15}, {teks:"D. Landasan utama dalam setiap keputusan", skor:20}] }
            ],
            "2": [
                { tanya: "Saat menghadapi soal kompleks, aku…", opsi: [{teks:"B. Menunggu jawaban", skor:5}, {teks:"A. Langsung menyerah", skor:10}, {teks:"D. Mencoba tanpa strategi", skor:15}, {teks:"C. Mengurai masalah secara sistematis", skor:20}] },
                { tanya: "Dalam belajar konsep baru, aku…", opsi: [{teks:"A. Menghindari", skor:5}, {teks:"C. Memahami sebagian", skor:10}, {teks:"B. Menghafal tanpa paham", skor:15}, {teks:"D. Menghubungkan dengan konsep lain", skor:20}] },
                { tanya: "Ketika argumenku ditolak, aku…", opsi: [{teks:"D. Emosi", skor:5}, {teks:"B. Diam", skor:10}, {teks:"A. Mempertahankan tanpa alasan", skor:15}, {teks:"C. Mengevaluasi dan memperbaiki", skor:20}] },
                { tanya: "Saat diskusi ilmiah, aku…", opsi: [{teks:"A. Pasif", skor:5}, {teks:"B. Ikut-ikutan", skor:10}, {teks:"D. Berbicara tanpa dasar", skor:15}, {teks:"C. Memberi argumen logis", skor:20}] },
                { tanya: "Menurutku berpikir kritis adalah…", opsi: [{teks:"B. Sulit dilakukan", skor:5}, {teks:"A. Tidak penting", skor:10}, {teks:"C. Penting untuk belajar", skor:15}, {teks:"D. Kunci memahami masalah", skor:20}] }
            ],
            "3": [
                { tanya: "Saat menghadapi perbedaan budaya, aku…", opsi: [{teks:"A. Menolak", skor:5}, {teks:"C. Biasa saja", skor:10}, {teks:"B. Menghargai", skor:15}, {teks:"D. Mempelajari dan menghargai", skor:20}] },
                { tanya: "Dalam situasi konflik sosial, aku…", opsi: [{teks:"D. Ikut terlibat emosi", skor:5}, {teks:"B. Menghindar", skor:10}, {teks:"A. Menenangkan", skor:15}, {teks:"C. Menjadi penengah", skor:20}] },
                { tanya: "Pemahamanku tentang nasionalisme…", opsi: [{teks:"B. Tidak peduli", skor:5}, {teks:"A. Minim", skor:10}, {teks:"C. Cukup memahami", skor:15}, {teks:"D. Mendalam dan diterapkan", skor:20}] },
                { tanya: "Saat melihat ketidakadilan, aku…", opsi: [{teks:"A. Diam", skor:5}, {teks:"B. Takut bertindak", skor:10}, {teks:"C. Menyuarakan pendapat", skor:15}, {teks:"D. Bertindak sesuai aturan", skor:20}] },
                { tanya: "Menurutku peran generasi muda adalah…", opsi: [{teks:"B. Tidak penting", skor:5}, {teks:"A. Terbatas", skor:10}, {teks:"C. Penting", skor:15}, {teks:"D. Sangat strategis bagi bangsa", skor:20}] }
            ],
            "4": [
                { tanya: "Saat latihan rutin, aku…", opsi: [{teks:"A. Mudah bosan", skor:5}, {teks:"B. Hanya jika disuruh", skor:10}, {teks:"C. Cukup disiplin", skor:15}, {teks:"D. Konsisten dan berkembang", skor:20}] },
                { tanya: "Dalam berkarya seni, aku…", opsi: [{teks:"B. Tidak tertarik", skor:5}, {teks:"A. Ikut-ikutan", skor:10}, {teks:"C. Menyalurkan kreativitas", skor:15}, {teks:"D. Mengeksplorasi ide baru", skor:20}] },
                { tanya: "Saat gagal dalam kompetisi, aku…", opsi: [{teks:"D. Kecewa berlebihan", skor:5}, {teks:"B. Menyerah", skor:10}, {teks:"A. Mencoba lagi", skor:15}, {teks:"C. Evaluasi diri", skor:20}] },
                { tanya: "Dalam kerja tim olahraga, aku…", opsi: [{teks:"A. Pasif", skor:5}, {teks:"B. Mengikuti saja", skor:10}, {teks:"D. Kadang aktif", skor:15}, {teks:"C. Berkontribusi aktif", skor:20}] },
                { tanya: "Menurutku olahraga & seni adalah…", opsi: [{teks:"C. Hiburan", skor:5}, {teks:"B. Hobi", skor:10}, {teks:"A. Kebutuhan", skor:15}, {teks:"D. Sarana pengembangan diri", skor:20}] }
            ],
            "5": [
                { tanya: "Saat menyampaikan pendapat, aku…", opsi: [{teks:"B. Tidak percaya diri", skor:5}, {teks:"A. Tidak jelas", skor:10}, {teks:"C. Cukup jelas", skor:15}, {teks:"D. Jelas & meyakinkan", skor:20}] },
                { tanya: "Jika menerima informasi penting, aku…", opsi: [{teks:"A. Langsung percaya", skor:5}, {teks:"C. Ragu", skor:10}, {teks:"B. Memahami", skor:15}, {teks:"D. Mengecek & memverifikasi", skor:20}] },
                { tanya: "Dalam forum, aku…", opsi: [{teks:"D. Ragu", skor:5}, {teks:"B. Diam", skor:10}, {teks:"A. Berpendapat", skor:15}, {teks:"C. Aktif & kritis", skor:20}] },
                { tanya: "Saat berbeda pendapat, aku…", opsi: [{teks:"A. Memaksakan", skor:5}, {teks:"B. Menghindar", skor:10}, {teks:"C. Menghargai", skor:15}, {teks:"D. Diskusi sehat", skor:20}] },
                { tanya: "Kemampuan komunikasi bagiku…", opsi: [{teks:"B. Sulit", skor:5}, {teks:"A. Tidak penting", skor:10}, {teks:"C. Penting", skor:15}, {teks:"D. Sangat penting untuk pemimpin", skor:20}] }
            ],
            "6": [
                { tanya: "Saat melihat peluang program kerja, aku…", opsi: [{teks:"A. Tidak peduli", skor:5}, {teks:"B. Ragu", skor:10}, {teks:"C. Mengusulkan ide", skor:15}, {teks:"D. Mengembangkan & mengeksekusi", skor:20}] },
                { tanya: "Dalam tanggung jawab, aku…", opsi: [{teks:"D. Lalai", skor:5}, {teks:"B. Menghindar", skor:10}, {teks:"A. Cukup bertanggung jawab", skor:15}, {teks:"C. Sangat bertanggung jawab", skor:20}] },
                { tanya: "Jika program gagal, aku…", opsi: [{teks:"A. Menyerah", skor:5}, {teks:"B. Menyalahkan", skor:10}, {teks:"C. Evaluasi", skor:15}, {teks:"D. Perbaiki & bangkit", skor:20}] },
                { tanya: "Saat bekerja dalam tim, aku…", opsi: [{teks:"B. Ikut saja", skor:5}, {teks:"A. Tidak berkontribusi", skor:10}, {teks:"C. Aktif", skor:15}, {teks:"D. Inisiatif tinggi", skor:20}] },
                { tanya: "Jiwa wirausaha dalam diriku…", opsi: [{teks:"B. Rendah", skor:5}, {teks:"A. Tidak ada", skor:10}, {teks:"C. Cukup", skor:15}, {teks:"D. Tinggi & inovatif", skor:20}] }
            ]
        };

        let daftarKuisAktif = [];
        let kuisIndex = 0;
        let jawabanTerpilih = {}; 

        // S1 -> S2
        nextBtn.addEventListener('click', () => {
            if(!document.getElementById('input_nama').value || !document.getElementById('input_kelas').value){
                Swal.fire('Form Belum Lengkap', 'Harap isi Nama dan Kelas terlebih dahulu!', 'warning');
                return;
            }
            step1.classList.add('hidden');
            step2.classList.remove('hidden');
            heroTitle.innerText = "Pilih Seksi Bidang";
            heroSubtitle.innerText = "Silakan tentukan sub-organisasi OSIS yang ingin kamu kembangkan.";
        });

        // S2 -> S1
        backToStep1.addEventListener('click', () => {
            step2.classList.add('hidden');
            step1.classList.remove('hidden');
            heroTitle.innerText = "Data Diri";
        });

        // Handle Klik Card Sekbid
        sekbidOptions.forEach(option => {
            option.addEventListener('click', function() {
                document.getElementById('selectedSekbidId').value = this.getAttribute('data-id');
                document.getElementById('selectedSekbidNama').value = this.getAttribute('data-nama');
                sekbidOptions.forEach(opt => opt.classList.remove('selected'));
                this.classList.add('selected');
            });
        });

        // S2 -> S3 (Load Soal Berdasarkan Pilihan)
        goToQuizBtn.addEventListener('click', () => {
            const sekbidId = document.getElementById('selectedSekbidId').value;
            if(!sekbidId){
                Swal.fire('Pilih Sekbid', 'Silakan klik salah satu Sekbid di atas!', 'warning');
                return;
            }

            daftarKuisAktif = bankKuisSekbid[sekbidId];
            step2.classList.add('hidden');
            step3.classList.remove('hidden');
            heroTitle.innerText = "Pengerjaan Kuis Kompetensi";
            heroSubtitle.innerText = "Sistem akan menyimpan dan memproses akumulasi skormu berdasarkan aturan SPK.";
            
            kuisIndex = 0;
            jawabanTerpilih = {};
            renderSoalKuis();
        });

        function renderSoalKuis() {
            const dataSoal = daftarKuisAktif[kuisIndex];
            const totalSoal = daftarKuisAktif.length;

            document.getElementById('quiz-step-text').innerText = `Pertanyaan ${kuisIndex + 1} dari ${totalSoal}`;
            const persen = Math.round(((kuisIndex + 1) / totalSoal) * 100);
            document.getElementById('quiz-percent-text').innerText = `${persen}% Completed`;
            document.getElementById('quizProgressFill').style.width = `${persen}%`;

            document.getElementById('quizQuestionText').innerText = `${kuisIndex + 1}. ${dataSoal.tanya}`;

            const containerOpsi = document.getElementById('quizOptionsContainer');
            containerOpsi.innerHTML = '';

            dataSoal.opsi.forEach((opsi, idx) => {
                const isSelected = jawabanTerpilih[kuisIndex] === idx ? 'selected' : '';
                containerOpsi.innerHTML += `
                    <div class="quiz-option-item ${isSelected}" onclick="pilihOpsiKuis(${idx})">
                        <div class="quiz-radio"></div>
                        <span style="font-size:0.95rem;">${opsi.teks}</span>
                    </div>
                `;
            });

            const nextBtnText = document.getElementById('quizNextBtn');
            if (kuisIndex === totalSoal - 1) {
                nextBtnText.innerHTML = `Evaluasi SPK <i class="fas fa-calculator"></i>`;
                nextBtnText.style.background = "linear-gradient(135deg, #48bb78, #38a169)";
            } else {
                nextBtnText.innerHTML = `Selanjutnya <i class="fas fa-arrow-right"></i>`;
                nextBtnText.style.background = "#f59e5b";
            }
        }

        window.pilihOpsiKuis = function(idx) {
            jawabanTerpilih[kuisIndex] = idx;
            renderSoalKuis(); 
        }

        document.getElementById('quizBackBtn').addEventListener('click', () => {
            if (kuisIndex > 0) {
                kuisIndex--;
                renderSoalKuis();
            } else {
                step3.classList.add('hidden');
                step2.classList.remove('hidden');
                heroTitle.innerText = "Pilih Seksi Bidang";
            }
        });

        // ACTION BUTTON NEXT / PROSES SPK
        document.getElementById('quizNextBtn').addEventListener('click', () => {
            if (jawabanTerpilih[kuisIndex] === undefined) {
                Swal.fire('Jawaban Kosong', 'Pilih salah satu jawaban terlebih dahulu!', 'warning');
                return;
            }

            if (kuisIndex < daftarKuisAktif.length - 1) {
                kuisIndex++;
                renderSoalKuis();
            } else {
                let totalSkor = 0;
                daftarKuisAktif.forEach((soal, idx) => {
                    const idxPilihan = jawabanTerpilih[idx];
                    totalSkor += soal.opsi[idxPilihan].skor;
                });

                // Mapping Pengisian Nilai Baru ke Elemen Pill Badge
                document.getElementById('lblNama').innerText = document.getElementById('input_nama').value;
                document.getElementById('lblKelas').innerText = document.getElementById('input_kelas').value;
                document.getElementById('lblSekbid').innerText = document.getElementById('selectedSekbidNama').value;
                document.getElementById('lblNilai').innerText = `${totalSkor}/100`;

                const areaLolos = document.getElementById('containerLolos');
                const areaGagal = document.getElementById('containerGagal');

                // IMPLEMENTASI LOGIKA KEPUTUSAN VISUAL (MATCHING MOCKUP)
                if (totalSkor >= 60) {
                    areaLolos.classList.remove('hidden');
                    areaGagal.classList.add('hidden');
                } else {
                    areaGagal.classList.remove('hidden');
                    areaLolos.classList.add('hidden');
                }

                step3.classList.add('hidden');
                step4.classList.remove('hidden');
                
                // Mengubah Header Sesuai Gambar Mockup Paling Atas
                heroTitle.innerText = "HASIL EVALUASI SISTEM (SPK)";
                heroSubtitle.innerText = "Hasil penilaian otomatis terhitung oleh sistem secara realtime.";
            }
        });

        // Restart Form / Kembali ke Dashboard
        document.getElementById('restartBtn').addEventListener('click', () => {
            document.getElementById('osisForm').reset();
            sekbidOptions.forEach(opt => opt.classList.remove('selected'));
            document.getElementById('selectedSekbidId').value = "";
            document.getElementById('selectedSekbidNama').value = "";
            
            step4.classList.add('hidden');
            step1.classList.remove('hidden');
            heroTitle.innerText = "Data Diri";
            heroSubtitle.innerText = "Lengkapi data dirimu dengan lengkap untuk melanjutkan proses pendaftaran calon pengurus OSIS.";
        });
    </script>
</body>
</html>