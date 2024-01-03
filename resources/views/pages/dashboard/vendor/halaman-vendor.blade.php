@extends('layouts.dashboard.page-layout')

@section('pages')
<div class="flex items-center justify-between mb-8">
    <h1>Vendor</h1>
    <a href="{{ route('dashboard.vendor.form-tambah') }}" class="btn btn-primary">Tambah</a>
</div>

<div class="card">
   <table class="table">
    <thead>
        <th class="w-px p-2 text-right">No</th>
        <th class="p-2 text-left">Nama Vendor</th>
        <th class="p-2 text-left">Badan Hukum</th>
        <th class="p-2 text-left">Status</th>
    </thead>
    <tbody>
        @foreach ($vendor as $v)
        <tr>
            <td class="w-px p-2 text-right">{{$v->idvendor}}</td>
            <td class="p-2 text-left">{{$v->nama_vendor}}</td>
            <td class="p-2 text-left">{{$v->badan_hukum}}</td>
            <td class="p-2 text-left">{{$v->deleted_at ? 'Tidak Aktif' : 'Aktif'}}</td>
            <td class="w-px whitespace-nowrap">
                <div class="flex items-center space-x-2">
                    <a class="btn-icon btn-edit" href="{{ route('dashboard.vendor.form-edit', ['id' => $v->idvendor]) }}">
                        <x-far-edit class="icon" />
                    </a>
                    @if ($v->deleted_at)
                    <form action="{{route('dashboard.vendor.memulihkan', ['id' => $v->idvendor])}}" method="POST">
                        @csrf
                        <button class="text-red-500" type="submit">
                            <x-bi-toggle-off />
                        </button>    
                    </form>
                    @endif

                    @if (is_null($v->deleted_at))
                    <form action="{{route('dashboard.vendor.hapus', ['id'=>$v->idvendor])}}" method="POST">
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