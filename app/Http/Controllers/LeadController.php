<?php


namespace App\Http\Controllers;

use App\Models\Lead;
use App\Models\Layanan;
use Illuminate\Http\Request;

class LeadController extends Controller
{
    public function index() {
        $leads = Lead::all();
        return view('leads.index', compact('leads'));
    }
    

    public function create() {
        $layanan = Layanan::all();
        return view('leads.create', compact('layanan')); 
    }

    public function store(Request $request) {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:leads',
            'telepon' => 'required',
            'layanan_id' => 'nullable|exists:layanan,id', // Validasi layanan_id
        ]);

        Lead::create($request->only(['nama', 'email', 'telepon', 'layanan_id'])); 
        return redirect()->route('leads.index')->with('success', 'Lead berhasil ditambahkan!');
    }

    public function edit(Lead $lead) {
        $layanan = Layanan::all();
        return view('leads.edit', compact('lead', 'layanan'));
    }

    public function update(Request $request, Lead $lead) {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:leads,email,' . $lead->id,
            'telepon' => 'required',
            'layanan_id' => 'nullable|exists:layanan,id', // Validasi layanan_id
        ]);

        $lead->update($request->only(['nama', 'email', 'telepon', 'layanan_id'])); 
        return redirect()->route('leads.index')->with('success', 'Lead berhasil diperbarui!');
    }

    public function destroy(Lead $lead) {
        $lead->delete();
        return redirect()->route('leads.index')->with('success', 'Lead berhasil dihapus!');
    }
}
