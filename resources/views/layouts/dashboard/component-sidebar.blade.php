<div class="w-64 fixed left-0 inset-y-0 md:flex flex-col bg-primary-500 hidden">
  <div>
    <img src="/images/logo.jpg" class="w-full">
  </div>

  <div class="pt-4 space-y-4 px-3">
    <a
    href="{{ route('dasboard.home') }}"
    @class([
      'px-4 py-2 rounded-md mx-auto text-sm font-bold flex items-center space-x-3 block',
      'bg-white text-primary-500' => Route::getCurrentRoute()->getName() === 'dasboard.home',
      'text-white' => Route::getCurrentRoute()->getName() !== 'dasboard.home',
    ])>
      <x-fas-home class="w-5 h-5" />
      <div>Dashboard</div>
    </a>
    <div class="px-4 py-2 text-white rounded-md mx-auto text-sm font-bold flex items-center space-x-3">
      <x-fas-users class="w-5 h-5" />
      <div>Pengguna</div>
    </div>
    <div class="px-4 py-2 text-white rounded-md mx-auto text-sm font-bold flex items-center space-x-3">
      <x-fas-box class="w-5 h-5" />
      <div>Produk</div>
    </div>
  </div>
</div>