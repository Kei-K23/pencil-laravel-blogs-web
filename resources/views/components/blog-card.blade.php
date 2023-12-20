@props([
'blog'
])

@php
include(base_path('lib/helper.php'));
$date = calcTime($blog->created_at);
$route = request()->path();
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


    <p>{{ $blog->tags }}</p>

    @if ($route == '/')
    <p class="mt-3 line-clamp-4 mb-4">{{ $blog->content}}</p>
    <a href="{{ url('/'.$blog->id) }}" class="font-bold transition-all duration-300 hover:underline">Read
        More</a>
    @else
    <p class="mt-3  mb-4">{{ $blog->content}}</p>
    @endif

    <div class="flex items-center gap-x-3">
        <form action="{{ route('blogs.edit', ['blog' => $blog]) }}">
            <button class="px-3 py-1 bg-blue-500 rounded-lg hover:bg-blue-400 transition-all">Edit</button>
        </form>

        <form method="POST" action="{{ route('blogs.destroy', ['blog' => $blog]) }}">
            @csrf
            @method('DELETE')
            <button class="px-3 py-1 bg-red-500 rounded-lg hover:bg-red-400 transition-all">Delete</button>
        </form>
    </div>
</div>
