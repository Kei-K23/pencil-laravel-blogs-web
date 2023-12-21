<x-app-layout>

    <div class="pt-12 py-8">
        <div class="mx-auto my-5 max-w-5xl sm:px-6 lg:px-8">
            <x-blog-card-wrapper>
                <x-blog-card :blog="$blog" />
            </x-blog-card-wrapper>
        </div>
    </div>


    {{-- command create form --}}

    <div class="mx-auto my-5 max-w-5xl py-2 sm:px-6 lg:px-8 bg-white">
        <form action="{{ route('commands.store') }}" method="post">
            @csrf
            <div class="sm:col-span-3">
                <label for="content" class="block text-sm font-medium leading-6 text-gray-900">Your command: </label>
                <div class="mt-2">
                    <input type="hidden" name="blog_id" value="{{ $blog->id }}" type="number">
                    <input value="{{ old('content')}}" type="text" name="content" id="content" autocomplete="given-name"
                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                        required placeholder="write your command">
                </div>
                @error('content')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <button type="submit"
                    class="my-3 px-2 py-1 bg-sky-500 rounded-lg hover:bg-sky-400 transition-all">Command</button>
            </div>
        </form>
    </div>

    {{-- command section --}}

    <div class="py-12">
        <h2 class="text-center text-lg md:text-xl">Total commands: {{ count($commands) }}</h2>
        @foreach ($commands as $command)
        <div class="mx-auto my-5 max-w-5xl sm:px-6 lg:px-8">
            <x-blog-card-wrapper class="bg-sky-200">
                <x-command-card :blog="$blog" :command="$command" />
            </x-blog-card-wrapper>
        </div>
        @endforeach
    </div>


</x-app-layout>
