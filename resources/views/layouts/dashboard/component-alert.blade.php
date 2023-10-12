@if (session()->get('message'))
<div class="fixed top-20 inset-x-0 md:ml-64" x-data="{ show: true }" x-show="show"
  x-init="setTimeout(() => show = false, 3000)">
  <div class="container flex justify-center">
    <div class="p-4 mb-4 text-sm text-primary-800 rounded-lg bg-primary-50">
      <span class="font-medium">Berhasil!</span> {{session()->get('message')}}
    </div>
  </div>
</div>
@endif