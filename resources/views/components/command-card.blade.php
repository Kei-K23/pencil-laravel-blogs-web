@props(['blog', 'command'])

@php
include(base_path('lib/helper.php'));
$date = calcTime($command->created_at);
@endphp

<div x-data="{ editing: false }">
    <div class="flex items-center gap-x-3">
        <a href="{{ url('/users/'.$command->user->name)}}" class="transition-all hover:text-sky-600 font-bold">{{
            $command->user->name }}</a>
        <h3>{{ $date }}</h3>
        <button @click="editing = true" class="ml-3 text-blue-500">Edit</button>
        <form action="{{ route('commands.destroy', ['command' => $command]) }}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-red-500">Delete</button>
        </form>
    </div>

    <template x-if="editing">
        <form method="POST" action="{{ route('commands.update', ['command' => $command]) }}">
            @csrf
            @method('PUT')
            <textarea name="content" class="mt-2 w-full">{{ $command->content }}</textarea>
            <div class="mt-2">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2">Save</button>
                <button @click="editing = false" class="ml-2 px-4 py-2">Cancel</button>
            </div>
        </form>
    </template>

    <template x-if="!editing">
        <p class="mt-2">
            {{ $command->content }}
        </p>
    </template>
</div>
