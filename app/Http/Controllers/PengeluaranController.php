<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengeluaran;

class PengeluaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengeluaran = Pengeluaran::all();
        return view('pengeluaran', compact('pengeluaran'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('CreatePengeluaran');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_barang' => 'required|string',
            'duit_keluar' => 'required|numeric|min:1',
            'tanggal' => 'required|date'
        ]);

        $pengeluaran = new \App\Models\Pengeluaran();
        $pengeluaran->fill($validated);
        $pengeluaran->save();
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pengeluaran = Pengeluaran::find($id);
        return view('editPengeluaran', compact('pengeluaran'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'nama_barang' => 'required|string',
            'duit_keluar' => 'required|numeric|min:1',
            'tanggal' => 'required|date'
        ]);

        // Find the Pesanan record by ID
        $pengeluaran = Pengeluaran::findOrFail($id);
        $pengeluaran->fill($validated);
        $pengeluaran->save();

        return redirect()->back()->with('success', 'pengeluaran updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
