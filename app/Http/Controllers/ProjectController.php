<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Lead;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    // Menampilkan daftar leads yang masih pending
    public function index()
    {
        // Pastikan hanya MANAGER yang bisa melihat
        if (Auth::user()->role !== 'MANAGER') {
            return redirect('/dashboard')->with('error', 'Akses ditolak. Anda bukan Manager.');
        }

        // Ambil data leads yang masih pending
        $leads = Lead::with('layanan')->where('status', 'pending')->get();  // Memfilter berdasarkan status 'pending'
        
        return view('projects.index', compact('leads'));
    }

    // Approve lead menjadi customer
    public function approve($id)
    {
        $lead = Lead::findOrFail($id);

        // Pastikan hanya MANAGER yang bisa approve
        if (auth()->user()->role !== 'MANAGER') {
            return redirect()->route('projects.index')->with('error', 'Akses ditolak. Anda bukan Manager.');
        }

        // Simpan ke tabel customers
        Customer::create([
            'nama'       => $lead->nama,
            'email'      => $lead->email,
            'telepon'    => $lead->telepon,
            'layanan_id' => $lead->layanan_id,
            'status'     => 'approved',
        ]);

        // Simpan ke tabel projects (detail lengkap)
        Project::create([
            'nama'       => $lead->nama,
            'email'      => $lead->email,
            'telepon'    => $lead->telepon,
            'layanan_id' => $lead->layanan_id,
            'status'     => 'approved',
        ]);

        // Hapus lead dari tabel leads
        $lead->delete();

        return redirect()->route('projects.index')->with('success', 'Lead berhasil dipindahkan ke customer.');
    }

    // Reject lead
    public function reject($id)
    {
        $lead = Lead::findOrFail($id);

        // Pastikan hanya MANAGER yang bisa reject
        if (auth()->user()->role !== 'MANAGER') {
            return redirect()->route('projects.index')->with('error', 'Akses ditolak. Anda bukan Manager.');
        }

        // Simpan ke tabel projects meski ditolak
        Project::create([
            'nama'       => $lead->nama,
            'email'      => $lead->email,
            'telepon'    => $lead->telepon,
            'layanan_id' => $lead->layanan_id,
            'status'     => 'rejected',
        ]);

        // Hapus lead dari tabel leads
        $lead->delete();

        return redirect()->route('projects.index')->with('success', 'Lead berhasil ditolak dan dihapus dari daftar.');
    }
}
