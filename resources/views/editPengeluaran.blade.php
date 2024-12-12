@extends('layouts.user_type.auth')
@section('content')
    <div class="container mt-5">
        <h2>Edit Pengeluaran</h2>

        <!-- Check for success message -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Form for Creating Pesanan -->
        <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                    <form action="{{ route('pengeluaran.update', $pengeluaran->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="nama_barang" class="form-label">Nama Barang</label>
                            <input type="text" name="nama_barang" id="nama_barang" value="{{ $pengeluaran->nama_barang }}" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="duit_keluar" class="form-label">Jumlah Pengeluaran</label>
                            <input type="number" name="duit_keluar" id="duit_keluar" value="{{ $pengeluaran->duit_keluar }}" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="tanggal" class="form-label">Tanggal Beli</label>
                            <input type="date" name="tanggal" id="tanggal" value="{{ $pengeluaran->tanggal }}" class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Ubah</button>
                    </form>
                </table>
            </div>
        </div>
    </div>
@endsection