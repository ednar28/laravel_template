@extends('layouts.dashboard.page-layout')

@section('pages')
<div class="flex items-center justify-between mb-8">
    <h1>Penjualan</h1>
    <a href="{{ route('dashboard.penjualan.form-tambah') }}" class="btn btn-primary">Tambah</a>
</div>

<div class="card">
    <table class="table">
        <thead>
            <th class="w-px p-2 text-right">No</th>
            <th class="p-2 text-left">Sub Total</th>
            <th class="p-2 text-left">PPN</th>
            <th class="p-2 text-left">Total Nilai</th>
        </thead>
        <tbody>
            @foreach ($penjualan as $p)
            <tr>
                <td class="w-px p-2 text-right">{{ $p->idpenjualan }}</td>
                <td class="p-2 text-left">{{ $p->sub_total }}</td>
                <td class="p-2 text-left">{{ $p->ppn }}</td>
                <td class="p-2 text-left">{{ $p->total_nilai }}</td>
                <td class="w-px whitespace-nowrap">
                    <div class="flex items-center space-x-2">
                        <a class="btn-icon btn-detail" href="{{ route('dashboard.penjualan.detail', ['id' => $p->idpenjualan]) }}">
                            <x-far-file-alt class="icon" />
                        </a>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
