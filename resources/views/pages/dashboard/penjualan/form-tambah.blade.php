@extends('layouts.dashboard.page-layout')

@section('pages')
<div class="wrapper-content">
   <h1>Tambah Penjualan</h1>

   <form action="{{ route('dashboard.penjualan.tambah') }}" method="POST">
       <div class="card">
           @csrf
           <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-8">
               <x-form-input label="Sub Total" name="sub_total" placeholder="Masukkan sub total" />
               <x-form-input label="PPN" name="ppn" placeholder="Masukkan PPN" />
               <x-form-input label="Total Nilai" name="total_nilai" placeholder="Masukkan total nilai" />
               <!-- Tambahkan form-input lain sesuai kebutuhan -->
           </div>

           <div class="flex items-center justify-center space-x-4">
               <x-button-submit />
               <a href="{{ route('dashboard.penjualan.halamanPenjualan') }}" class="w-28 btn btn-info block">Batal</a>
           </div>
       </div>
   </form>
</div>
@endsection
