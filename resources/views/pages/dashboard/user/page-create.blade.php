@extends('layouts.dashboard.page-layout')

@section('pages')
<div class="wrapper-content">
    <h1>Buat Pengguna</h1>

    <form action="{{ route('dashboard.user.store') }}" method="POST">
        <div class="card">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-8">
                <x-form-input label="Nama" name="name" placeholder="Rizky Putra Ednar" />
                <x-form-input label="Email" name="email" placeholder="rizkyputraednar@example.test" />
                <x-form-input label="Password" type="password" name="password" placeholder="******" />
            </div>

            <div class="flex items-center justify-center space-x-4">
                <x-button-submit />
                <a href="{{ route('dashboard.user.index') }}" class="w-28 btn btn-info block">Batal</a>
            </div>
        </div>
    </form>
</div>
@endsection