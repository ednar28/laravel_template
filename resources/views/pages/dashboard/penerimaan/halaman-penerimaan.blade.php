@extends('layouts.dashboard.page-layout')

@section('pages')
<div class="flex items-center justify-between mb-8">
    <h1>Daftar Penerimaan</h1>
    <a href="{{ route('dashboard.penerimaan.formTambah') }}" class="btn btn-primary">Tambah</a>
</div>

<div class="card">
   <table class="table">
    <thead>
        <th class="w-px p-2 text-right">No</th>
        <th class="p-2 text-left">ID Penerimaan</th>
        <th class="p-2 text-left">ID User</th>
        <th class="p-2 text-left">Sub Total Terima</th>
        <th class="p-2 text-left">Jumlah Terima</th>
        <th class="p-2 text-left">Harga Satuan Terima</th>
        <th class="p-2 text-left">Aksi</th> <!-- Kolom tambahan untuk tombol aksi -->
    </thead>
    <tbody>
        @foreach ($penerimaan as $p)
        <tr>
            <td class="w-px p-2 text-right">{{ $loop->iteration }}</td>
            <td class="p-2 text-left">{{ $p->idpenerimaan }}</td>
            <td class="p-2 text-left">{{ $p->iduser }}</td>
            <td class="p-2 text-left">{{ $p->sub_total_terima }}</td>
            <td class="p-2 text-left">{{ $p->jumlah_terima }}</td>
            <td class="p-2 text-left">{{ $p->harga_satuan_terima }}</td>
            <td class="w-px whitespace-nowrap">
                <div class="flex items-center space-x-2">
                    <a href="{{ route('dashboard.penerimaan.detail', ['id' => $p->idpenerimaan]) }}" class="btn btn-info">Detail</a>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
   </table>
</div>
@endsection
