@extends('layouts.user_type.auth')
@section('content')
    <div class="container mt-5">
        <h2>Edit Pesanan</h2>

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
                    <form action="{{ route('pesanan.update', $pesanan->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="status_pembayaran">Status Pembayaran</label>
                            <select name="status_pembayaran" id="status_pembayaran" class="form-control" required>
                                <option value="Lunas" {{ $pesanan->status_pembayaran === 'Lunas' ? 'selected' : '' }}>Lunas
                                </option>
                                <option value="Belum Lunas"
                                    {{ $pesanan->status_pembayaran === 'Belum Lunas' ? 'selected' : '' }}>Belum Lunas
                                </option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="progress">Progress</label>
                            <select name="progress" id="progress" class="form-control" required>
                                <option value="Belum diproses"
                                    {{ $pesanan->progress === 'Belum diproses' ? 'selected' : '' }}>Belum diproses</option>
                                <option value="Dalam proses" {{ $pesanan->progress === 'Dalam proses' ? 'selected' : '' }}>
                                    Dalam proses</option>
                                <option value="Selesai" {{ $pesanan->progress === 'Selesai' ? 'selected' : '' }}>Selesai
                                </option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Ubah</button>
                    </form>
                </table>
            </div>
        </div>
    </div>
@endsection
