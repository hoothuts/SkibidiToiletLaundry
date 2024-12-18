<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesanan;
use App\models\Pengeluaran;

class RekapController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('rekapitulasi');
    }

    public function recapitulateIncome()
    {

        $currentMonth = date('m');
        $currentYear = date('Y');

        // Income calculations
        $totalIncome = \App\Models\Pesanan::whereYear('tanggal_masuk', $currentYear)
            ->whereMonth('tanggal_masuk', $currentMonth)
            ->sum('biaya');

        $previousMonth = $currentMonth - 1 ?: 12;
        $previousYear = $currentMonth == 1 ? $currentYear - 1 : $currentYear;

        $previousIncome = \App\Models\Pesanan::whereYear('tanggal_masuk', $previousYear)
            ->whereMonth('tanggal_masuk', $previousMonth)
            ->sum('biaya');

        $percentageChangeIncome = $previousIncome > 0
            ? (($totalIncome - $previousIncome) / $previousIncome) * 100
            : 100;

        // Spending calculations
        $totalSpending = \App\Models\Pengeluaran::whereYear('tanggal', $currentYear)
            ->whereMonth('tanggal', $currentMonth)
            ->sum('duit_keluar');

        $previousSpending = \App\Models\Pengeluaran::whereYear('tanggal', $previousYear)
            ->whereMonth('tanggal', $previousMonth)
            ->sum('duit_keluar');

        $percentageChangeSpending = $previousSpending > 0
            ? (($totalSpending - $previousSpending) / $previousSpending) * 100
            : 100;

        // Return view with all data
        $pengeluaran = Pengeluaran::all();
        $pesanan = Pesanan::all();
        return view('/rekapitulasi', [
            'totalIncome' => $totalIncome,
            'percentageChangeIncome' => $percentageChangeIncome,
            'totalSpending' => $totalSpending,
            'percentageChangeSpending' => $percentageChangeSpending,
        ], compact('pengeluaran','pesanan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
