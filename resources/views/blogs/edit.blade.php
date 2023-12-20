<x-app-layout>

    <form method="POST" action="{{ route('blogs.update', ['blog' => $blog])}} "
        class="py-12 mx-auto max-w-5xl px-3 md:px-6 lg:px-8">
        @csrf
        @method('PUT')
        <div class="border-b border-gray-900/10 pb-12">
            <h2 class="text-base font-semibold leading-7 text-gray-900">Create new Blog</h2>
            <p class="mt-1 text-sm leading-6 text-gray-600">Tells us about what your experiences.</p>

            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <div class="sm:col-span-3">
                    <label for="title" class="block text-sm font-medium leading-6 text-gray-900">Title</label>
                    <div class="mt-2">
                        <input value="{{ $blog->title }}" type="text" name="title" id="title" autocomplete="given-name"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                    @error('title')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="sm:col-span-3">
                    <label for="tags" class="block text-sm font-medium leading-6 text-gray-900">Tags (must be comma
                        separated)</label>
                    <div class="mt-2">
                        <input value="{{ $blog->tags }}" type="text" name="tags" id="tags" autocomplete="given-name"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                            placeholder="e.g HTML, CSS, JavaScript">
                    </div>
                    @error('tags')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="sm:col-span-3">
                    <label for="content" class="block text-sm font-medium leading-6 text-gray-900">Title</label>
                    <div class="mt-2">
                        <textarea type="text" name="content" id="content" autocomplete="given-name"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">{{ $blog->content }}</textarea>
                    </div>
                    @error('content')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <button type="submit" class="transition-all duration-[0.2s] overflow-hidden border-[3.5px] border-black
    rounded-lg bg-[#d6e3d1]
    hover:drop-shadow-3xl px-3 py-2 mt-4">Edit</button>
        </div>
    </form>

</x-app-layout>
