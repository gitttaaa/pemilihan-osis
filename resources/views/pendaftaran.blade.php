<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Pemilihan OSIS | Pendaftaran Calon Pengurus</title>
    
    <!-- Google Fonts & Font Awesome -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: #23293a; /* dark navy */
            min-height: 100vh;
            padding: 1.5rem 2rem;
            color: rgba(255,255,255,0.95);
        }

        .container {
            max-width: 1400px;
            margin: 0 auto;
        }

        .main-nav {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 1.25rem;
        }

        .brand {
            font-size: 1.5rem;
            font-weight: 800;
            color: #f6ad55;
            display: inline-flex;
            align-items: center;
            gap: 0.65rem;
        }

        /* Header / Page Title */
        .page-hero {
            display: block;
            margin-bottom: 2rem;
        }

        .page-title {
            font-size: 3.4rem;
            font-weight: 800;
            margin-bottom: 0.5rem;
            color: #ffffff;
        }

        .page-subtitle {
            color: rgba(255,255,255,0.75);
            margin-bottom: 1rem;
        }

        .title-underline {
            width: 120px;
            height: 4px;
            background: rgba(255,255,255,0.12);
            border-radius: 4px;
            margin: 1rem 0 1.6rem 0;
        }

        /* Alert Messages */
        .alert {
            padding: 1rem 1.5rem;
            border-radius: 1rem;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.8rem;
            animation: slideDown 0.3s ease;
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .alert-success {
            background: #d4edda;
            color: #155724;
            border-left: 5px solid #28a745;
        }

        .alert-error {
            background: #f8d7da;
            color: #721c24;
            border-left: 5px solid #dc3545;
        }

        /* Grid Layout */
        .grid-2col {
            display: grid;
            grid-template-columns: 1fr;
            gap: 2rem;
            align-items: start;
        }

        /* Card Style */
        .card {
            background: rgba(15,23,42,0.9);
            border-radius: 1.5rem;
            border: 1px solid rgba(255,255,255,0.03);
            overflow: hidden;
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 25px 60px rgba(2,6,23,0.6);
        }

        .card-header {
            display: none;
        }

        .card-body {
            padding: 2.2rem;
        }

        .card-body h2 {
            font-size: 2rem;
            font-weight: 800;
            margin-bottom: 0.8rem;
            color: white;
        }

        .card-header i {
            margin-right: 0.7rem;
        }

        .card-body {
            padding: 1.8rem;
        }

        /* Form Elements */
        .form-group {
            margin-bottom: 1.2rem;
        }

        label {
            font-weight: 600;
            display: block;
            margin-bottom: 0.4rem;
            color: rgba(255,255,255,0.9);
            font-size: 0.95rem;
        }

        label .required {
            color: #e53e3e;
            margin-left: 0.2rem;
        }

        input, select, textarea {
            width: 100%;
            border-radius: 999px;
            padding: 1rem 1.25rem 1rem 4.5rem;
            border: none;
            background: #ffffff;
            color: #1f2937;
            font-family: 'Inter', sans-serif;
            font-size: 0.95rem;
            box-shadow: inset 0 -6px 15px rgba(0,0,0,0.03);
            transition: all 0.2s;
            min-height: 3.5rem;
        }

        input::placeholder, textarea::placeholder {
            color: #9ca3af;
        }

        input:focus, select:focus, textarea:focus {
            outline: none;
            box-shadow: 0 6px 18px rgba(99,102,241,0.12);
            background: #fff;
        }

        .input-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1.25rem;
            align-items: start;
            margin-bottom: 1rem;
        }

        .form-group { position: relative; margin-bottom: 0.85rem; }

        .icon-circle {
            position: absolute;
            left: 0.9rem;
            top: 50%;
            transform: translateY(-50%);
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #6b7280;
            box-shadow: 0 4px 10px rgba(2,6,23,0.12);
            font-size: 0.95rem;
        }

        .btn-primary {
            background: #f59e5b;
            color: #1b1e32;
            padding: 0.9rem 1.6rem;
            border-radius: 999px;
            border: none;
            font-weight: 700;
            cursor: pointer;
            box-shadow: 0 10px 30px rgba(245,158,92,0.18);
            transition: transform 0.15s;
        }

        .btn-primary:hover { transform: translateY(-2px); }

        .form-actions { display: flex; justify-content: flex-end; margin-top: 0.6rem; }

        .hidden { display: none; }

        /* Sekbid Selection Cards */
        .sekbid-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(180px, 1fr));
            gap: 1rem;
            margin: 1.5rem 0;
        }

        .sekbid-option {
            background: #f7fafc;
            border: 2px solid #e2e8f0;
            border-radius: 1rem;
            padding: 1rem;
            text-align: center;
            cursor: pointer;
            transition: all 0.2s;
            position: relative;
        }

        .sekbid-option:hover {
            transform: translateY(-3px);
            border-color: #667eea;
            background: #edf2f7;
        }

        .sekbid-option.selected {
            background: linear-gradient(135deg, #667eea15, #764ba215);
            border-color: #667eea;
            border-width: 2px;
        }

        .sekbid-icon {
            font-size: 2rem;
            margin-bottom: 0.5rem;
        }

        .sekbid-name {
            font-weight: 600;
            font-size: 0.9rem;
            color: #2d3748;
        }

        .radio-check {
            position: absolute;
            top: 0.5rem;
            right: 0.5rem;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background: white;
            border: 2px solid #cbd5e0;
        }

        .sekbid-option.selected .radio-check {
            background: #667eea;
            border-color: #667eea;
            box-shadow: inset 0 0 0 3px white;
        }

        /* Button */
        .btn-submit {
            width: 100%;
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            border: none;
            padding: 0.9rem;
            border-radius: 0.75rem;
            font-weight: 700;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.2s;
            margin-top: 0.5rem;
        }

        .btn-submit:hover {
            transform: scale(0.98);
            background: linear-gradient(135deg, #5a67d8, #6b46a0);
        }

        /* Pendaftar List */
        .pendaftar-list {
            max-height: 500px;
            overflow-y: auto;
        }

        .pendaftar-item {
            background: #f7fafc;
            border-radius: 1rem;
            padding: 1rem;
            margin-bottom: 1rem;
            border-left: 4px solid;
            transition: all 0.2s;
        }

        .pendaftar-item.pending {
            border-left-color: #ed8936;
        }

        .pendaftar-item.verified {
            border-left-color: #48bb78;
        }

        .pendaftar-name {
            font-weight: 700;
            font-size: 1rem;
            color: #2d3748;
        }

        .pendaftar-detail {
            font-size: 0.8rem;
            color: #718096;
            margin: 0.3rem 0;
        }

        .status-badge {
            display: inline-block;
            padding: 0.2rem 0.6rem;
            border-radius: 50px;
            font-size: 0.7rem;
            font-weight: 600;
        }

        .status-pending {
            background: #feebc8;
            color: #c05621;
        }

        .status-verified {
            background: #c6f6d5;
            color: #276749;
        }

        .jadwal-info {
            background: #e9d8fd;
            padding: 0.5rem;
            border-radius: 0.5rem;
            margin-top: 0.5rem;
            font-size: 0.75rem;
        }

        .action-buttons {
            display: flex;
            gap: 0.5rem;
            margin-top: 0.7rem;
        }

        .btn-verify, .btn-delete {
            padding: 0.3rem 0.8rem;
            border-radius: 0.5rem;
            font-size: 0.75rem;
            font-weight: 600;
            border: none;
            cursor: pointer;
            transition: 0.2s;
        }

        .btn-verify {
            background: #48bb78;
            color: white;
        }

        .btn-verify:hover {
            background: #38a169;
        }

        .btn-delete {
            background: #fc8181;
            color: white;
        }

        .btn-delete:hover {
            background: #f56565;
        }

        .empty-state {
            text-align: center;
            padding: 2rem;
            color: #a0aec0;
        }

        /* Responsive */
        @media (max-width: 900px) {
            .grid-2col {
                grid-template-columns: 1fr;
            }
            body {
                padding: 1rem;
            }
            .header h1 {
                font-size: 1.8rem;
            }
        }

        footer {
            text-align: center;
            margin-top: 2rem;
            color: rgba(255,255,255,0.7);
            font-size: 0.8rem;
        }
    </style>
</head>
<body>
    <div class="container">
        <header class="main-nav">
            <div class="brand"><i class="fas fa-arrow-left"></i> OSIS</div>
        </header>

        <!-- Page Hero -->
        <div class="page-hero">
            <div class="page-title">Data Diri</div>
            <div class="page-subtitle">Lengkapi data dirimu dengan lengkap untuk melanjutkan proses pendaftaran calon OSIS.</div>
            <div class="title-underline"></div>
        </div>

        <!-- Alert Messages -->
        @if(session('success'))
            <div class="alert alert-success">
                <i class="fas fa-check-circle fa-lg"></i>
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-error">
                <i class="fas fa-exclamation-circle fa-lg"></i>
                {{ session('error') }}
            </div>
        @endif

        <!-- Main Content -->
        <div class="grid-2col">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('osis.submit') }}">
                        @csrf

                        <div class="step-1">
                            <div class="input-grid">
                                <div class="form-group">
                                    <label>Nama Lengkap <span class="required">*</span></label>
                                    <span class="icon-circle"><i class="fas fa-user"></i></span>
                                    <input type="text" name="nama" value="{{ old('nama') }}" required placeholder="Masukkan nama lengkap">
                                    @error('nama') <small style="color:#e53e3e">{{ $message }}</small> @enderror
                                </div>

                                <div class="form-group">
                                    <label>NIS <span class="required">*</span></label>
                                    <span class="icon-circle"><i class="fas fa-id-card"></i></span>
                                    <input type="text" name="nis" value="{{ old('nis') }}" required placeholder="Masukkan NIS">
                                    @error('nis') <small style="color:#e53e3e">{{ $message }}</small> @enderror
                                </div>

                                <div class="form-group">
                                    <label>Kelas <span class="required">*</span></label>
                                    <span class="icon-circle"><i class="fas fa-book-open"></i></span>
                                    <input type="text" name="kelas" value="{{ old('kelas') }}" required placeholder="Contoh XI PRL 2">
                                    @error('kelas') <small style="color:#e53e3e">{{ $message }}</small> @enderror
                                </div>

                                <div class="form-group">
                                    <label>No. Handphone <span class="required">*</span></label>
                                    <span class="icon-circle"><i class="fas fa-phone"></i></span>
                                    <input type="text" name="no_hp" value="{{ old('no_hp') }}" required placeholder="08xxxxxxxxxxxx">
                                    @error('no_hp') <small style="color:#e53e3e">{{ $message }}</small> @enderror
                                </div>
                            </div>

                            <div class="form-actions">
                                <button type="button" id="nextBtn" class="btn-primary">
                                    <i class="fas fa-arrow-right"></i>
                                    Selanjutnya
                                </button>
                            </div>
                        </div>

                        <div class="step-2 hidden">
                            <label>Pilih Sekbid yang diminati <span class="required">*</span></label>
                            <div class="sekbid-grid" id="sekbidGrid">
                                @foreach($sekbid as $id => $data)
                                <div class="sekbid-option" data-id="{{ $id }}" data-nama="{{ $data['nama'] }}">
                                    <div class="radio-check"></div>
                                    <div class="sekbid-icon">
                                        <i class="fas fa-{{ $data['icon'] }}" style="color: {{ $data['color'] }}"></i>
                                    </div>
                                    <div class="sekbid-name">{{ $data['nama'] }}</div>
                                </div>
                                @endforeach
                            </div>
                            <input type="hidden" name="sekbid_id" id="selectedSekbid" required>
                            @error('sekbid_id') <small style="color:#e53e3e">{{ $message }}</small> @enderror

                            <div class="form-group">
                                <label>📌 Mengapa Anda tertarik di sekbid ini? <span class="required">*</span></label>
                                <textarea name="alasan" rows="3" required placeholder="Jelaskan alasan ketertarikan Anda terhadap sekbid pilihan...">{{ old('alasan') }}</textarea>
                                @error('alasan') <small style="color:#e53e3e">{{ $message }}</small> @enderror
                            </div>

                            <div class="form-group">
                                <label>📌 Kontribusi apa yang bisa Anda berikan? <span class="required">*</span></label>
                                <textarea name="kontribusi" rows="3" required placeholder="Tuliskan ide, program kerja, atau kontribusi nyata yang akan Anda lakukan...">{{ old('kontribusi') }}</textarea>
                                @error('kontribusi') <small style="color:#e53e3e">{{ $message }}</small> @enderror
                            </div>

                            <div class="form-group">
                                <label>🏆 Pengalaman Organisasi (Opsional)</label>
                                <textarea name="pengalaman" rows="2" placeholder="Pernah menjabat sebagai? (OSIS, MPK, Pramuka, dll)">{{ old('pengalaman') }}</textarea>
                            </div>

                            <div class="form-actions">
                                <button type="submit" class="btn-primary">
                                    <i class="fas fa-paper-plane"></i>
                                    Submit Pendaftaran
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <footer>
            <i class="fas fa-copyright"></i> 2026 - Sistem Pemilihan OSIS | Berdasarkan Flowchart Resmi
        </footer>
    </div>

    <script>
        const step2 = document.querySelector('.step-2');
        const nextBtn = document.getElementById('nextBtn');
        const sekbidOptions = document.querySelectorAll('.sekbid-option');
        const hiddenInput = document.getElementById('selectedSekbid');

        nextBtn.addEventListener('click', () => {
            step2.classList.remove('hidden');
            nextBtn.classList.add('hidden');
            step2.scrollIntoView({ behavior: 'smooth', block: 'start' });
        });

        sekbidOptions.forEach(option => {
            option.addEventListener('click', function() {
                const id = this.getAttribute('data-id');
                hiddenInput.value = id;

                sekbidOptions.forEach(opt => opt.classList.remove('selected'));
                this.classList.add('selected');
            });
        });

        @if(old('sekbid_id') || old('alasan') || old('kontribusi') || old('pengalaman'))
            step2.classList.remove('hidden');
            nextBtn.classList.add('hidden');
        @endif

        @if(old('sekbid_id'))
            const oldId = "{{ old('sekbid_id') }}";
            const oldOption = document.querySelector(`.sekbid-option[data-id='${oldId}']`);
            if(oldOption) {
                oldOption.classList.add('selected');
                hiddenInput.value = oldId;
            }
        @endif
    </script>
</body>
</html>