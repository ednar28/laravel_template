@extends('layouts.dashboard.page-layout')

@section('pages')
<div class="wrapper-content">
    <h1>Tambah Penerimaan</h1>

    <form action="{{ route('dashboard.penerimaan.tambah') }}" method="POST">
        @csrf
        <div class="card">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-8">
                <x-form-input label="ID Pengadaan" name="idpengadaan" placeholder="Masukkan ID Pengadaan" />
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-8">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-8">
                    <label class="block text-sm font-medium text-gray-700">Barang</label>
                    <div class="mt-1">
                        <select name="barang[0][idbarang]" class="form-select">
                            @foreach($listBarang as $barang)
                            <option value="{{ $barang->idbarang }}">{{ $barang->nama_barang }}</option>
                            @endforeach
                        </select>
                        <input type="number" name="barang[0][jumlah_terima]" class="form-input" placeholder="Jumlah Terima">
                    </div>
                </div>
            </div>


            <div class="flex items-center justify-center space-x-4">
                <x-button-submit />
                <a href="{{ route('dashboard.penerimaan.halamanPenerimaan') }}" class="w-28 btn btn-info block">Batal</a>
            </div>
        </div>
    </form>
</div>
@endsection
