<!-- File: detail-penjualan.blade.php -->

@extends('layouts.dashboard.page-layout')

@section('pages')
<div class="flex items-center justify-between mb-8">
    <h1>Detail Penjualan</h1>
    <a href="{{ route('dashboard.penjualan.halamanPenjualan') }}" class="btn btn-primary">Kembali</a>
</div>

<div class="card">
    <h2>ID Penjualan: {{ $penjualan->idpenjualan }}</h2>
    <p>ID User: {{ $penjualan->iduser }}</p>
    <p>Sub Total: {{ $penjualan->sub_total }}</p>
    <p>PPN: {{ $penjualan->ppn }}</p>
    <p>Total Nilai: {{ $penjualan->total_nilai }}</p>

    <table class="table">
        <thead>
            <th class="w-px p-2 text-right">No</th>
            <th class="p-2 text-left">ID Barang</th>
            <th class="p-2 text-left">Harga Satuan</th>
            <th class="p-2 text-left">Jumlah</th>
            <th class="p-2 text-left">Sub Total</th>
        </thead>
        <tbody>
            @foreach ($penjualanDetail as $detail)
            <tr>
                <td class="w-px p-2 text-right">{{ $loop->iteration }}</td>
                <td class="p-2 text-left">{{ $detail->idbarang }}</td>
                <td class="p-2 text-left">{{ $detail->harga_satuan }}</td>
                <td class="p-2 text-left">{{ $detail->jumlah }}</td>
                <td class="p-2 text-left">{{ $detail->sub_total }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
