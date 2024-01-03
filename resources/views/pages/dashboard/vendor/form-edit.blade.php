@extends('layouts.dashboard.page-layout')

@section('pages')
<div class="wrapper-content">
  <h1>Edit {{$vendor->nama_vendor}}</h1>

  <form action="{{ route('dashboard.vendor.edit', ['id' => $vendor->idvendor]) }}" method="POST">
    @method('PUT')
    <div class="card">
      @csrf
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-8">
        <x-form-input label="Nama Vendor" name="nama_vendor" value="{{$vendor->nama_vendor}}" placeholder="Masukkan nama vendor" />
      </div>
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-8">
        <x-form-input label="Badan Hukum" name="badan_hukum" value="{{$vendor->badan_hukum}}" placeholder="Masukkan badan hukum" />
      </div>

      <div class="flex items-center justify-center space-x-4">
        <x-button-submit />
        <a href="{{ route('dashboard.satuan.halamanSatuan') }}" class="w-28 btn btn-info block">Batal</a>
      </div>
    </div>
  </form>
</div>
@endsection