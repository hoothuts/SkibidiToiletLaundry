<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesanan;

class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pesanan = Pesanan::all();
        return view('pesanan', compact('pesanan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('CreatePesanan');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'order_id' => 'required|unique:pesanan,order_id',
            'nama' => 'required|string',
            'jenis' => 'required|in:Setrika,Cuci Setrika,Cuci',
            'layanan' => 'required|in:Express,Regular',
            'berat' => 'required|numeric|min:1',
            'tanggal_masuk' => 'required|date',
            'status_pembayaran' => 'required|in:Lunas,Belum Lunas',
        ]);

        // Add progress and default status
        $validated['progress'] = 'Belum diproses';
        if ($validated['jenis'] === 'Cuci Setrika') {
            $validated['biaya'] = $validated['berat'] * 5000;
        } elseif ($validated['jenis'] === 'Setrika' || $validated['jenis'] === 'Cuci') {
            $validated['biaya'] = $validated['berat'] * 3000;
        } else {
            $validated['biaya'] = 0;
        }

        // Create the Pesanan record
        $pesanan = new \App\Models\Pesanan();
        $pesanan->fill($validated);
        $pesanan->save();
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
    public function edit($id)
    {
        $pesanan = Pesanan::find($id);
        return view('editPesanan', compact('pesanan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'status_pembayaran' => 'required|in:Lunas,Belum Lunas',
            'progress' => 'required|in:Belum diproses,Dalam proses,Selesai',
        ]);

        // Find the Pesanan record by ID
        $pesanan = Pesanan::findOrFail($id);
        $pesanan->fill($validated);
        $pesanan->save();

        return redirect('/pesanan')->back()->with('success', 'Pesanan updated successfully!');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //tidak memakai delete
    }
}
