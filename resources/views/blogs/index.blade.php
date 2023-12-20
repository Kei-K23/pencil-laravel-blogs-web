<x-app-layout>

    <form method="GET">
        <div class="relative border-2 border-gray-100 m-4 rounded-lg">
            <div class="absolute top-4 left-3">
                <i class="fa fa-search text-gray-400 z-20 hover:text-gray-500"></i>
            </div>
            <input type="text" name="search"
                class="h-14 w-full pl-10 pr-20 rounded-lg z-0 focus:shadow focus:outline-none"
                placeholder="Search blogs..." />
            <div class="absolute top-2 right-2">
                <button type="submit" class="h-10 w-20 text-white rounded-lg bg-sky-500 hover:bg-sky-600">
                    Search
                </button>
            </div>
        </div>
    </form>

    @unless ($blogs->isEmpty())

    <div class="py-12">
        @foreach ($blogs as $blog)
        <div class="mx-auto my-5 max-w-5xl sm:px-6 lg:px-8">
            <x-blog-card-wrapper>
                <x-blog-card :blog="$blog" />
            </x-blog-card-wrapper>
        </div>
        @endforeach
    </div>
    @else

    <div class="py-12">
        <div class="mx-auto max-w-5xl sm:px-6 lg:px-8">
            <x-blog-card-wrapper>
                {{ __('No blogs yet!')}}
            </x-blog-card-wrapper>
        </div>
    </div>
    @endunless

    <div class="mx-auto max-w-5xl sm:px-6 lg:px-8 pb-12">
        {{ $blogs->links() }}
    </div>
</x-app-layout>
