<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    /**
     * Menampilkan semua data pendaftar
     */
    public function index()
    {
        $registrations = Registration::all();

        return view('registrations.index', compact('registrations'));
    }

    /**
     * Menampilkan form pendaftaran
     */
    public function create()
    {
        return view('registrations.create');
    }

    /**
     * Menyimpan data pendaftaran
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required',
            'kelas' => 'required',
            'nis' => 'required|unique:registrations',
            'no_hp' => 'required'
        ]);

        Registration::create([
            'nama_lengkap' => $request->nama_lengkap,
            'kelas' => $request->kelas,
            'nis' => $request->nis,
            'no_hp' => $request->no_hp
        ]);

        return redirect('/registrations')
                ->with('success', 'Pendaftaran berhasil');
    }
}