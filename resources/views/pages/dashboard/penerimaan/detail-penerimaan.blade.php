@extends('layouts.dashboard.page-layout')

@section('pages')
<div class="wrapper-content">
    <h1>Detail Penerimaan</h1>

    <div class="card">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-8">
            <x-form-input label="ID Penerimaan" name="idpenerimaan" value="{{ $penerimaan->idpenerimaan }}" readonly />
            <x-form-input label="Total Pembelian" name="sub_total_terima" value="{{ $penerimaan->sub_total_terima }}" readonly />
        </div>

        <h2>Detail Barang Terima</h2>
        <table class="table">
            <thead>
                <th class="w-px p-2 text-right">No</th>
                <th class="p-2 text-left">ID Barang</th>
                <th class="p-2 text-left">Harga Satuan</th>
                <th class="p-2 text-left">Jumlah Terima</th>
                <th class="p-2 text-left">Sub Total Terima</th>
            </thead>
            <tbody>
                @foreach ($penerimaan->detailPenerimaan as $index => $detail)
                <tr>
                    <td class="w-px p-2 text-right">{{ $index + 1 }}</td>
                    <td class="p-2 text-left">{{ $detail->idbarang }}</td>
                    <td class="p-2 text-left">{{ $detail->harga_satuan_terima }}</td>
                    <td class="p-2 text-left">{{ $detail->jumlah_terima }}</td>
                    <td class="p-2 text-left">{{ $detail->sub_total_terima }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="flex items-center justify-center space-x-4">
            <a href="{{ route('dashboard.penerimaan.halamanPenerimaan') }}" class="w-28 btn btn-info block">Kembali</a>
        </div>
    </div>
</div>
@endsection
