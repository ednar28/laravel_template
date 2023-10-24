<x-modal refs="HapusSatuan">
    @section('content')
    Apakah anda yakin menghapus <span class="text-red-500 font-medium" x-text="deleteNama_Satuan + '?'"></span>
  
    <form x-bind:action="'{{route ('dashboard.satuan.edit', ['id' => $satuan->idsatuan]) }}" 
      method="POST">
      <div class="mt-6 flex justify-center items-center space-x-4">
        @method('DELETE')
        @csrf
        <x-button-submit label="Hapus" />
        <button class="btn btn-info w-28" x-on:click="deleteSatuan = null">Batal</button>
      </div>
    </form>
    @endsection
  </x-modal>

  