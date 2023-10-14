@extends('layouts.dashboard.page-layout')

@section('pages')
<div class="wrapper-content">
    <div class="flex items-center justify-between">
        <h1>List Pengguna</h1>
        <a href="{{ route('dashboard.user.create') }}" class="btn btn-primary">Tambah</a>
    </div>

    <div class="card overflow-auto" x-data="{ deleteUser: null }">
        <table class="table">
            <thead>
                <th class="text-right w-px">No</th>
                <th class="text-left">Nama</th>
                <th class="text-left">Email</th>
                <th class="text-left">Dibuat</th>
                <th class="w-px"></th>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td class="text-right w-px">{{ $loop->index + 1 }}</td>
                    <td class="text-left">{{ $user->name }}</td>
                    <td class="text-left">{{ $user->email }}</td>
                    <td class="text-left">{{ $user->created_at->diffForHumans() }}</td>
                    <td class="w-px whitespace-nowrap">
                        <div class="flex items-center space-x-2">
                            <a class="btn-icon btn-edit" href="{{ route('dashboard.user.edit', ['user' => $user]) }}">
                                <x-far-edit class="icon" />
                            </a>
                            <button class="btn-icon btn-danger" x-on:click="deleteUser = {{$user}}">
                                <x-far-trash-alt class="icon" />
                            </button>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        @include('pages.dashboard.user.modal-delete')
    </div>

    <div class="w-full">
        {{ $users->links() }}
    </div>
</div>
@endsection