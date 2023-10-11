@extends('layouts.dashboard.page-layout')

@section('pages')
    <div class="space-y-8 mb-8">
        <div class="flex items-center justify-between">
            <h1>List Pengguna</h1>
            <button class="btn btn-primary">Tambah</button>
        </div>

        <div class="card">
            <table class="table">
                <thead>
                    <th class="text-right w-px">No</th>
                    <th class="text-left">Nama</th>
                    <th class="text-left">Email</th>
                    <th class="text-left">Dibuat</th>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td class="text-right w-px">{{ $loop->index + 1 }}</td>
                            <td class="text-left">{{ $user->name }}</td>
                            <td class="text-left">{{ $user->email }}</td>
                            <td class="text-left">{{ $user->created_at->diffForHumans() }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="w-full">
            {{ $users->links() }}
        </div>
    </div>
@endsection
