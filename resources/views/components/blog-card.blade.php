@props([
'blog'
])

@php
include(base_path('lib/helper.php'));
$date = calcTime($blog->created_at);
@endphp

<div>
    <div class="flex flex-col items-start">
        <a href="{{ url('/'.$blog->id) }}"
            class="text-xl font-bold transition-all duration-300 hover:underline md:text-2xl">{{
            $blog->title }}</a>
        <a href="{{ url('/users/'.$blog->user->id)}}" class="transition-all hover:text-sky-600">{{
            $blog->user->name
            }}</a>
    </div>
    <h3 class="text-neutral-700">{{ $date }}</h3>
    <p class="mt-3">{{ $blog->content}}</p>
</div>
