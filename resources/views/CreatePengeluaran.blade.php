@extends('layouts.user_type.auth')
@section('content')
    <div class="container mt-5">
        <h2>Create Pesanan</h2>

        <!-- Check for success message -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <!-- Form for Creating Pesanan -->
        <form action="{{ route('pengeluaran.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nama_barang" class="form-label">Nama Barang</label>
                <input type="text" name="nama_barang" id="nama_barang" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="duit_keluar" class="form-label">Jumlah Pengeluaran</label>
                <input type="number" name="duit_keluar" id="duit_keluar" class="form-control" min="1" required>
            </div>

            <div class="mb-3">
                <label for="tanggal" class="form-label">Tanggal Beli</label>
                <input type="date" name="tanggal" id="tanggal" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Buat Pesanan</button>
        </form>
    </div>
@endsection