@extends('layouts.auth.page-layout')

@section('pages')
<form action="{{route('auth.attempt')}}" method="POST">
  @csrf
  <div class="space-y-6">
    <x-form-input label="Email" type="string" name="email" placeholder="rizkyputraednar@example.test" />
    <x-form-input label="Password" type="string" name="password" placeholder="**********" />
    <div class="flex justify-end">
      <x-button-submit label="Login" />
    </div>
  </div>
</form>
@endsection