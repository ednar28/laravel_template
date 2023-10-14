<x-modal refs="deleteUser">
  @section('content')
  Apakah anda yakin menghapus <span class="text-red-500 font-medium" x-text="deleteUser.name + '?'"></span>

  <form x-bind:action="'{{route('dashboard.user.destroy', ['user' => 'x'])}}'.replace('x', deleteUser.id)"
    method="POST">
    <div class="mt-6 flex justify-center items-center space-x-4">
      @method('DELETE')
      @csrf
      <x-button-submit label="Hapus" />
      <button class="btn btn-info w-28" x-on:click="deleteUser = null">Batal</button>
    </div>
  </form>
  @endsection
</x-modal>