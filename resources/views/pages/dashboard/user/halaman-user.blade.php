@extends('layouts.dashboard.page-layout')

@section('pages')
<div class="wrapper-content">
    <div class="flex items-center justify-between">
        <h1>List Pengguna</h1>
        <a href="{{ route('dashboard.user.form-tambah') }}" class="btn btn-primary">Tambah</a>
    </div>

    <div class="card overflow-auto" x-data="{ deleteUser: null }">
        <table class="table">
            <thead>
                <th class="text-right w-px">No</th>
                <th class="text-left">Username</th>
                <th class="w-px"></th>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td class="text-right w-px">{{ $loop->index + 1 }}</td>
                    <td class="text-left">{{ $user->username }}</td>
                    <td class="w-px whitespace-nowrap">
                        <div class="flex items-center space-x-2">
                            <a class="btn-icon btn-edit" href="{{ route('dashboard.user.form-edit', ['id' => $user->iduser]) }}">
                                <x-far-edit class="icon" />
                            </a>

                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
@endsection