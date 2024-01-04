@extends('layouts.dashboard.page-layout')

@section('pages')
<div class="flex items-center justify-between mb-8">
  <h1>List Penjualan</h1>
  <a href="{{ route('dashboard.penjualan.form-tambah') }}" class="btn btn-primary">Tambah</a>
</div>

<div class="card">
  <table class="table">
    <thead>
      <th class="w-px p-2 text-right">No</th>
      <th class="p-2 text-left">Pengguna</th>
      <th class="p-2 text-left">Action</th>
    </thead>
    <tbody>
      @foreach ($list as $penjualan)
      <tr>
        <td class="w-px p-2 text-right">{{$penjualan->idpenjualan}}</td>
        <td class="p-2 text-left">{{$users->firstWhere('iduser', $penjualan->iduser)->username}}</td>
        <td class="w-px whitespace-nowrap">
          <div class="flex items-center space-x-2">
            <a class="btn-icon btn-edit" href="{{ route('dashboard.satuan.form-edit', ['id' => $s->idsatuan]) }}">
              <x-bi-eye class="icon" />
            </a>
          </div>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection