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
        <form action="{{ route('pesanan.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="order_id" class="form-label">Order ID</label>
                <input type="text" name="order_id" id="order_id" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" name="nama" id="nama" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="jenis" class="form-label">Jenis</label>
                <select name="jenis" id="jenis" class="form-select" required>
                    <option value="Setrika">Setrika</option>
                    <option value="Cuci Setrika">Cuci Setrika</option>
                    <option value="Cuci">Cuci</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="layanan" class="form-label">Layanan</label>
                <select name="layanan" id="layanan" class="form-select" required>
                    <option value="Express">Express</option>
                    <option value="Regular">Regular</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="berat" class="form-label">Berat (kg)</label>
                <input type="number" name="berat" id="berat" class="form-control" min="1" required>
            </div>

            <div class="mb-3">
                <label for="tanggal_masuk" class="form-label">Tanggal Masuk</label>
                <input type="date" name="tanggal_masuk" id="tanggal_masuk" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="status_pembayaran" class="form-label">Status Pembayaran</label>
                <select name="status_pembayaran" id="status_pembayaran" class="form-select" required>
                    <option value="Lunas">Lunas</option>
                    <option value="Belum Lunas">Belum Lunas</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Buat Pesanan</button>
        </form>
    </div>
@endsection
