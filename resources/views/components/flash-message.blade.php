@if (session()->has('message'))

<div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false , 3000)"
    class="z-50 fixed left-1/2 -translate-x-1/2 top-10 px-4 py-2 border-[2px] border-black bg-slate-200">
    <p>
        {{ session('message')}}
    </p>
</div>

@endif
