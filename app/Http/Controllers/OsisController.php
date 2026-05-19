<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OsisController extends Controller
{
    // Data Sekbid statis
    private $sekbid = [
        1 => ['nama' => 'Sekbid Keagamaan', 'icon' => 'mosque', 'color' => '#2c7da0'],
        2 => ['nama' => 'Sekbid Olahraga', 'icon' => 'futbol', 'color' => '#2a9d8f'],
        3 => ['nama' => 'Sekbid Seni & Budaya', 'icon' => 'palette', 'color' => '#e76f51'],
        4 => ['nama' => 'Sekbid Kepemimpinan', 'icon' => 'users', 'color' => '#e9c46a'],
        5 => ['nama' => 'Sekbid Literasi & IPTEK', 'icon' => 'laptop-code', 'color' => '#4a4e69'],
    ];

    public function home()
    {
        return view('home');
    }

    public function informasi()
    {
        return view('informasi');
    }

    public function jadwal()
    {
        return view('jadwal');
    }

    public function pengumuman()
    {
        return view('pengumuman');
    }

    public function index()
    {
        $pendaftar = Session::get('pendaftar', []);
        $sekbid = $this->sekbid;
        return view('pendaftaran', compact('pendaftar', 'sekbid'));
    }

    public function submit(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'nis' => 'required|string|max:20',
            'kelas' => 'required|string|max:50',
            'email' => 'required|email|max:255',
            'no_hp' => 'required|string|max:15',
            'sekbid_id' => 'required|integer|in:1,2,3,4,5',
            'alasan' => 'required|string|min:20|max:1000',
            'kontribusi' => 'required|string|min:20|max:1000',
            'pengalaman' => 'nullable|string|max:1000',
        ]);

        // Ambil data pendaftar dari session
        $pendaftar = Session::get('pendaftar', []);
        
        // Buat ID baru
        $newId = count($pendaftar) + 1;

        // Simpan data baru
        $pendaftar[] = [
            'id' => $newId,
            'nama' => $validated['nama'],
            'nis' => $validated['nis'],
            'kelas' => $validated['kelas'],
            'email' => $validated['email'],
            'no_hp' => $validated['no_hp'],
            'sekbid_id' => (int) $validated['sekbid_id'],
            'alasan' => $validated['alasan'],
            'kontribusi' => $validated['kontribusi'],
            'pengalaman' => $validated['pengalaman'] ?? '',
            'status' => 'pending', // pending, verified, rejected
            'jadwal_wawancara' => null,
            'created_at' => now()->format('Y-m-d H:i:s'),
        ];

        Session::put('pendaftar', $pendaftar);

        return redirect()->route('osis.pendaftaran')
            ->with('success', '✅ Pendaftaran berhasil! Data kamu akan segera diverifikasi oleh admin.');
    }

    public function verifikasi($id)
    {
        $pendaftar = Session::get('pendaftar', []);
        $found = false;

        foreach ($pendaftar as $key => &$data) {
            if ($data['id'] == $id) {
                // Ubah status menjadi verified
                $data['status'] = 'verified';
                
                // Generate jadwal wawancara otomatis (H+2 sampai H+5)
                $days = rand(2, 5);
                $jam = rand(8, 15); // jam 8-15
                $menit = rand(0, 1) == 0 ? '00' : '30';
                $data['jadwal_wawancara'] = now()->addDays($days)->setTime($jam, $menit)->format('l, d F Y H:i') . ' WIB';
                
                $found = true;
                break;
            }
        }

        if ($found) {
            Session::put('pendaftar', $pendaftar);
            return redirect()->route('osis.pendaftaran')
                ->with('success', '✅ Pendaftar berhasil diverifikasi! Jadwal wawancara telah dibuat.');
        }

        return redirect()->route('osis.pendaftaran')
            ->with('error', '❌ Data pendaftar tidak ditemukan.');
    }

    public function destroy($id)
    {
        $pendaftar = Session::get('pendaftar', []);
        $newPendaftar = array_filter($pendaftar, function ($item) use ($id) {
            return $item['id'] != $id;
        });
        
        Session::put('pendaftar', array_values($newPendaftar));
        
        return redirect()->route('osis.pendaftaran')
            ->with('success', '🗑️ Data pendaftar berhasil dihapus.');
    }
}