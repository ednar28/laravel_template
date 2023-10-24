@extends('layouts.dashboard.page-layout')

@section('pages')
<div class="wrapper-content">
  <h1>Edit {{$satuan->nama_satuan}}</h1>

  <form action="{{ route('dashboard.satuan.edit', ['id' => $satuan->idsatuan]) }}" method="POST">
    @method('PUT')
    <div class="card">
      @csrf
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-8">
        <x-form-input label="Nama Satuan" name="nama_satuan" value="{{$satuan->nama_satuan}}" placeholder="Masukkan Satuan" />
      </div>

      <div class="flex items-center justify-center space-x-4">
        <x-button-submit />
        <a href="{{ route('dashboard.satuan.halamanSatuan') }}" class="w-28 btn btn-info block">Batal</a>
      </div>
    </div>
  </form>
</div>
@endsection