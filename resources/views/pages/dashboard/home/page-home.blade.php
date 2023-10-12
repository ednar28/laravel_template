@extends('layouts.dashboard.page-layout')

@section('pages')
<div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-4">
    <div class="p-6 shadow-md bg-white flex items-center justify-between rounded-lg">
        <div>
            <div class="font-bold text-lg text-primary-500">{{ $usersCount }}</div>
            <div class="text-xs text-gray-400">
                Pengguna
            </div>
        </div>
        <x-fas-users class="w-8 h-8 text-primary-500" />
    </div>
    <div class="p-6 shadow-md bg-white flex items-center justify-between rounded-lg">
        <div>
            <div class="font-bold text-lg text-primary-500">50</div>
            <div class="text-xs text-gray-400">
                Produk
            </div>
        </div>
        <x-fas-box class="w-8 h-8 text-primary-500" />
    </div>
</div>
@endsection