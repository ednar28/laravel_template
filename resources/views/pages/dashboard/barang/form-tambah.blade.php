@extends('layouts.dashboard.page-layout')

@section('pages')
<div class="wrapper-content">
   <h1>Buat Barang</h1>

   <form action="{{ route('dashboard.barang.tambah') }}" method="POST">
       <div class="card">
           @csrf
           <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-8">
               <x-form-input label="Jenis" name="jenis" placeholder="Masukkan Jenis" />
               <x-form-input label="Nama Barang" name="nama" placeholder="Masukkan Nama Barang" />
               <x-form-input label="Harga" name="harga" type="number" placeholder="Masukkan Harga Barang" />
               <x-form-select label="Satuan" name="idsatuan" placeholder="Pilih Satuan" :options="$satuan" />
           </div>

           <div class="flex items-center justify-center space-x-4">
               <x-button-submit />
               <a href="{{ route('dashboard.barang.halamanBarang') }}" class="w-28 btn btn-info block">Batal</a>
           </div>
       </div>
   </form>
</div>
@endsection