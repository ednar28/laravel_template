@extends('layouts.dashboard.page-layout')

@section('pages')
<div class="wrapper-content">
  <h1>Edit {{$barang->nama_barang}}</h1>

  <form action="{{ route('dashboard.barang.edit', ['id' => $barang->idbarang]) }}" method="POST">
    @method('PUT')
    <div class="card">
      @csrf
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-8">
        <x-form-input label="Jenis" name="jenis" value="{{$barang->jenis}}" placeholder="Masukkan Jenis" />
        <x-form-input label="Nama Barang" name="nama" value="{{$barang->nama_barang}}"
          placeholder="Masukkan Nama Barang" />
        <x-form-input label="Harga" name="harga" value="{{$barang->harga}}" placeholder="Masukkan Harga Barang" />

      </div>

      <div class="flex items-center justify-center space-x-4">
        <x-button-submit />
        <a href="{{ route('dashboard.barang.halamanBarang') }}" class="w-28 btn btn-info block">Batal</a>
      </div>
    </div>
  </form>
</div>
@endsection