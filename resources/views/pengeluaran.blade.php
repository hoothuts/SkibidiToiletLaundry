@extends('layouts.user_type.auth')
@section('content')
    <div class="card mb-4">
        <div class="card-header pb-0">
            <h6>Daftar Pengeluaran</h6>
        </div>
        <div class="card-header">
            <a href="/CreatePengeluaran" class="btn bg-gradient-primary btn-sm mb-0" type="button">+&nbsp;Tambah Data Pengeluaran</a>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                    <thead>
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Barang</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Jumlah Pengeluaran</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pengeluaran as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->nama_barang }}</td>
                                <td>{{ $item->duit_keluar }}</td>
                                <td>{{ $item->tanggal }}</td>
                                <td class="text-center">
                                    <a href="/pengeluaran/{{ $item->id }}/edit" class="btn btn-warning btn-sm ml-2">Edit</a>
                                    <form action="/pengeluaran/{{ $item->id }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm ml-2"
                                            onclick="confirmDelete({{ $item->id }})">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
