@extends('layouts.dashboard.page-layout')

@section('pages')
<div class="wrapper-content">
  <h1>Edit {{$user->name}}</h1>

  <form action="{{ route('dashboard.user.update', ['user' => $user]) }}" method="POST">
    @method('PUT')
    <div class="card">
      @csrf
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-8">
        <x-form-input label="Nama" name="name" value="{{$user->name}}" placeholder="Icha" />
        <x-form-input label="Email" name="email" value="{{$user->email}}" placeholder="icha@example.test" />
      </div>

      <div class="flex items-center justify-center space-x-4">
        <x-button-submit />
        <a href="{{ route('dashboard.user.index') }}" class="w-28 btn btn-info block">Batal</a>
      </div>
    </div>
  </form>
</div>
@endsection