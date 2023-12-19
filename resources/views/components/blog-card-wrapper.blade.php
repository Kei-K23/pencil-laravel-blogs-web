<div {{ $attributes->merge(['class' => 'transition-all duration-[0.2s] overflow-hidden border-[3.5px] border-black
    rounded-lg bg-[#d6e3d1]
    hover:drop-shadow-3xl sm:rounded-lg']) }}>
    <div class="p-6 text-gray-900">
        {{ $slot }}
    </div>
</div>
