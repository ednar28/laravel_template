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

        <x-modal refs="deleteUser">
            @section('content')
            Apakah anda yakin menghapus <span class="text-red-500 font-medium" x-text="deleteUser.name + '?'"></span>

            <form x-bind:action="'{{route('dashboard.user.index') . '/'}}'+deleteUser.id" method="POST">
                <div class="mt-6 flex justify-center items-center space-x-4">
                    @method('DELETE')
                    @csrf
                    <x-button-submit label="Hapus" />
                    <button class="btn btn-info w-28" x-on:click="deleteUser = null">Batal</button>
                </div>
            </form>
            @endsection
        </x-modal>
    </div>

    <div class="w-full">
        {{ $users->links() }}
    </div>
</div>
@endsection