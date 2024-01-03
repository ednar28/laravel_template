@extends('layouts.dashboard.page-layout')

@section('pages')
<div class="flex items-center justify-between mb-8">
  <h1>List Pengadaan</h1>
  <a href="{{ route('dashboard.satuan.form-tambah') }}" class="btn btn-primary">Tambah</a>
</div>

<div class="card">
  <table class="table">
    <thead>
      <th class="w-px p-2 text-right">No</th>
      <th class="p-2 text-left">Nama Satuan</th>
      <th class="p-2 text-left">Status</th>
      <th class="p-2 text-left">Action</th>
    </thead>
    <tbody>
      @foreach ($list as $pengadaan)
      <tr>
        <td class="w-px p-2 text-right">{{$pengadaan->idpengadaan}}</td>
        <td class="p-2 text-left">{{$s->nama_satuan}}</td>
        <td class="p-2 text-left">{{$s->deleted_at ? 'Tidak Aktif' : 'Aktif'}}</td>
        <td class="w-px whitespace-nowrap">
          <div class="flex items-center space-x-2">
            <a class="btn-icon btn-edit" href="{{ route('dashboard.satuan.form-edit', ['id' => $s->idsatuan]) }}">
              <x-far-edit class="icon" />
            </a>
            @if ($s->deleted_at)
            <form action="{{route('dashboard.satuan.memulihkan', ['id' => $s->idsatuan])}}" method="POST">
              @csrf
              <button class="text-red-500" type="submit">
                <x-bi-toggle-off />
              </button>
            </form>
            @endif

            @if (is_null($s->deleted_at))
            <form action="{{route('dashboard.satuan.hapus', ['id'=>$s->idsatuan])}}" method="POST">
              @csrf
              @method('DELETE')
              <button class="text-red-500">
                <x-bi-toggle-on />
              </button>
            </form>
            @endif
          </div>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection