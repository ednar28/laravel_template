<div class="sidebar">
    <div>
        <img src="/images/logo.jpg" class="w-full">
    </div>

    <div class="pt-4 space-y-4 px-3">
        <a href="{{ route('dashboard.beranda') }}" @class([
            'sidebar-link',
            'active' => Route::getCurrentRoute()->getName() === 'dashboard.beranda',
        ])>
            <x-fas-home class="w-5 h-5" />
            <div>Dashboard</div>
        </a>
        <a href="{{ route('dashboard.user.index') }}" @class([
            'sidebar-link',
            'active' => Route::getCurrentRoute()->getName() === 'dashboard.user.index',
        ])>
            <x-fas-users class="w-5 h-5" />
            <div>Pengguna</div>
        </a>
        <a href="{{ route('dashboard.user.index') }}" @class([
            'sidebar-link',
            'active' => Route::getCurrentRoute()->getName() === 'dashboard.product.index',
        ])>
            <x-fas-box class="w-5 h-5" />
            <div>Produk</div>
        </a>
    </div>
</div>
