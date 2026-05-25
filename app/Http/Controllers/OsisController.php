<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OsisController extends Controller
{
    // 1. Data Sekbid disesuaikan menjadi 6 pilihan sesuai rencana awalmu
    private $sekbid = [
        1 => ['nama' => 'Sekbid Keagamaan', 'icon' => 'mosque', 'color' => '#2c7da0'],
        2 => ['nama' => 'Sekbid Pendidikan dan Penalaran', 'icon' => 'brain', 'color' => '#2a9d8f'],
        3 => ['nama' => 'Sekbid Kepribadian & Wawasan Kebangsaan', 'icon' => 'flag', 'color' => '#e76f51'],
        4 => ['nama' => 'Sekbid Olahraga & Kesenian', 'icon' => 'futbol', 'color' => '#e9c46a'],
        5 => ['nama' => 'Sekbid Komunikasi & Informasi', 'icon' => 'comments', 'color' => '#4a4e69'],
        6 => ['nama' => 'Sekbid Keterampilan & Wirausaha', 'icon' => 'lightbulb', 'color' => '#6b705c'],
    ];

    // 2. Data Bank Soal Statis beserta bobot nilainya
    private $bank_soal = [
        1 => [ // Sekbid 1: Keagamaan
            1 => ['soal' => 'Saat menghadapi dilema antara kepentingan pribadi dan nilai agama, aku…', 'opsi' => ['A' => ['teks' => 'Mengutamakan diri sendiri', 'skor' => 5], 'B' => ['teks' => 'Bingung dan menunda keputusan', 'skor' => 10], 'C' => ['teks' => 'Mempertimbangkan keduanya', 'skor' => 15], 'D' => ['teks' => 'Mengutamakan nilai agama', 'skor' => 20]]],
            2 => ['soal' => 'Ketika melihat teman melanggar norma agama, aku…', 'opsi' => ['A' => ['teks' => 'Mengabaikan', 'skor' => 5], 'C' => ['teks' => 'Ragu untuk bertindak', 'skor' => 10], 'B' => ['teks' => 'Menegur secara langsung', 'skor' => 15], 'D' => ['teks' => 'Menasihati dengan cara bijak', 'skor' => 20]]],
            3 => ['soal' => 'Dalam memahami ajaran agama, aku…', 'opsi' => ['B' => ['teks' => 'Tidak tertarik mendalami', 'skor' => 5], 'A' => ['teks' => 'Hanya mengikuti orang lain', 'skor' => 10], 'C' => ['teks' => 'Mencari pemahaman dasar', 'skor' => 15], 'D' => ['teks' => 'Menganalisis dan menerapkan', 'skor' => 20]]],
            4 => ['soal' => 'Saat ibadah terasa berat, aku…', 'opsi' => ['D' => ['teks' => 'Menyerah', 'skor' => 5], 'B' => ['teks' => 'Kadang meninggalkan', 'skor' => 10], 'A' => ['teks' => 'Tetap berusaha', 'skor' => 15], 'C' => ['teks' => 'Konsisten menjalankan', 'skor' => 20]]],
            5 => ['soal' => 'Peran agama dalam hidupku adalah…', 'opsi' => ['B' => ['teks' => 'Tidak terlalu penting', 'skor' => 5], 'A' => ['teks' => 'Formalitas', 'skor' => 10], 'C' => ['teks' => 'Pedoman hidup', 'skor' => 15], 'D' => ['teks' => 'Landasan utama dalam setiap keputusan', 'skor' => 20]]],
        ],
        2 => [ // Sekbid 2: Pendidikan & Penalaran
            1 => ['soal' => 'Saat menghadapi soal kompleks, aku…', 'opsi' => ['B' => ['teks' => 'Menunggu jawaban', 'skor' => 5], 'A' => ['teks' => 'Langsung menyerah', 'skor' => 10], 'D' => ['teks' => 'Mencoba tanpa strategi', 'skor' => 15], 'C' => ['teks' => 'Mengurai masalah secara sistematis', 'skor' => 20]]],
            2 => ['soal' => 'Dalam belajar konsep baru, aku…', 'opsi' => ['A' => ['teks' => 'Menghindari', 'skor' => 5], 'C' => ['teks' => 'Memahami sebagian', 'skor' => 10], 'B' => ['teks' => 'Menghafal tanpa paham', 'skor' => 15], 'D' => ['teks' => 'Menghubungkan dengan konsep lain', 'skor' => 20]]],
            3 => ['soal' => 'Ketika argumenku ditolak, aku…', 'opsi' => ['D' => ['teks' => 'Emosi', 'skor' => 5], 'B' => ['teks' => 'Diam', 'skor' => 10], 'A' => ['teks' => 'Mempertahankan tanpa alasan', 'skor' => 15], 'C' => ['teks' => 'Mengevaluasi dan memperbaiki', 'skor' => 20]]],
            4 => ['soal' => 'Saat diskusi ilmiah, aku…', 'opsi' => ['A' => ['teks' => 'Pasif', 'skor' => 5], 'B' => ['teks' => 'Ikut-ikutan', 'skor' => 10], 'D' => ['teks' => 'Berbicara tanpa dasar', 'skor' => 15], 'C' => ['teks' => 'Memberi argumen logis', 'skor' => 20]]],
            5 => ['soal' => 'Menurutku berpikir kritis adalah…', 'opsi' => ['B' => ['teks' => 'Sulit dilakukan', 'skor' => 5], 'A' => ['teks' => 'Tidak penting', 'skor' => 10], 'C' => ['teks' => 'Penting untuk belajar', 'skor' => 15], 'D' => ['teks' => 'Kunci memahami masalah', 'skor' => 20]]],
        ],
        // Catatan: Sekbid 3, 4, 5, dan 6 tinggal kamu teruskan polanya di sini sesuai data soalmu
    ];

    public function home() { return view('home'); }
    public function informasi() { return view('informasi'); }
    public function jadwal() { return view('jadwal'); }
    public function pengumuman() { return view('pengumuman'); }

    // Menampilkan halaman form biodata pendaftaran awal
    public function index()
    {
        $sekbid = $this->sekbid;
        return view('pendaftaran', compact('sekbid'));
    }

    // STEP 1: Submit biodata awal, lalu arahkan ke Halaman Quiz/Pertanyaan
    public function submitBiodata(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'kelas' => 'required|string|max:50',
            'jurusan' => 'required|string|max:50', // Tambahan input Jurusan
            'email' => 'required|email|max:255',
            'sekbid_id' => 'required|integer|in:1,2,3,4,5,6',
        ]);

        // Simpan sementara biodata siswa di session khusus registrasi aktif
        Session::put('temp_siswa', $validated);

        // Lempar siswa ke halaman kuis sekbid pilihan mereka
        return redirect()->route('osis.quiz');
    }

    // STEP 2: Tampilkan kuis berdasarkan sekbid yang dipilih siswa
    public function showQuiz()
    {
        $tempSiswa = Session::get('temp_siswa');
        if (!$tempSiswa) {
            return redirect()->route('osis.pendaftaran')->with('error', 'Silakan isi biodata terlebih dahulu.');
        }

        $sekbidId = $tempSiswa['sekbid_id'];
        $namaSekbid = $this->sekbid[$sekbidId]['nama'];
        
        // Ambil 5 pertanyaan yang sesuai dengan sekbid pilihan siswa
        $daftarSoal = $this->bank_soal[$sekbidId] ?? [];

        return view('quiz', compact('daftarSoal', 'namaSekbid'));
    }

    // STEP 3: Proses Jawaban Quiz, Hitung Nilai SPK, & Tentukan Keputusan
    public function submitQuiz(Request $request)
    {
        $tempSiswa = Session::get('temp_siswa');
        if (!$tempSiswa) {
            return redirect()->route('osis.pendaftaran')->with('error', 'Sesi pendaftaran habis.');
        }

        $sekbidId = $tempSiswa['sekbid_id'];
        $daftarSoal = $this->bank_soal[$sekbidId] ?? [];

        // Validasi: Pastikan kelima pertanyaan dijawab
        $request->validate([
            'jawaban' => 'required|array|size:5'
        ]);

        // --- PROSES SPK & PERHITUNGAN NILAI ---
        $totalNilai = 0;
        foreach ($request->jawaban as $idSoal => $opsiDipilih) {
            if (isset($daftarSoal[$idSoal]['opsi'][$opsiDipilih])) {
                $totalNilai += $daftarSoal[$idSoal]['opsi'][$opsiDipilih]['skor'];
            }
        }

        // Aturan Keputusan
        $status = $totalNilai >= 60 ? 'DITERIMA' : 'TIDAK DITERIMA';
        
        // Membuat jadwal wawancara otomatis acak jika status DITERIMA
        $jadwalWawancara = null;
        if ($status === 'DITERIMA') {
            $days = rand(2, 5);
            $jam = rand(8, 15);
            $menit = rand(0, 1) == 0 ? '00' : '30';
            $jadwalWawancara = now()->addDays($days)->setTime($jam, $menit)->format('l, d F Y H:i') . ' WIB';
        }

        // --- PENYIMPANAN DATA AKHIR ---
        $allPendaftar = Session::get('pendaftar', []);
        $newId = count($allPendaftar) + 1;

        $pendaftarBaru = [
            'id' => $newId,
            'nama' => $tempSiswa['nama'],
            'kelas' => $tempSiswa['kelas'],
            'jurusan' => $tempSiswa['jurusan'],
            'email' => $tempSiswa['email'],
            'sekbid_id' => $sekbidId,
            'nama_sekbid' => $this->sekbid[$sekbidId]['nama'],
            'nilai_pertanyaan' => $totalNilai,
            'status' => $status,
            'jadwal_wawancara' => $jadwalWawancara,
            'created_at' => now()->format('Y-m-d H:i:s'),
        ];

        $allPendaftar[] = $pendaftarBaru;
        Session::put('pendaftar', $allPendaftar);
        
        // Hapus session sementara biodata
        Session::forget('temp_siswa');

        // Kirim ID pendaftar yang baru dibuat ke halaman hasil output
        return redirect()->route('osis.hasil', ['id' => $newId]);
    }

    // STEP 4: Tampilkan Output Hasil Kelulusan Seleksi SPK
    public function hasil($id)
    {
        $allPendaftar = Session::get('pendaftar', []);
        
        // Cari data berdasarkan ID
        $dataSiswa = collect($allPendaftar)->firstWhere('id', $id);

        if (!$dataSiswa) {
            return redirect()->route('osis.pendaftaran')->with('error', 'Data hasil seleksi tidak ditemukan.');
        }

        return view('hasil_spk', compact('dataSiswa'));
    }

    // Menghapus data pendaftar (untuk dashboard admin/panitia)
    public function destroy($id)
    {
        $pendaftar = Session::get('pendaftar', []);
        $newPendaftar = array_filter($pendaftar, function ($item) use ($id) {
            return $item['id'] != $id;
        });
        
        Session::put('pendaftar', array_values($newPendaftar));
        return redirect()->back()->with('success', '🗑️ Data pendaftar berhasil dihapus.');
    }
}