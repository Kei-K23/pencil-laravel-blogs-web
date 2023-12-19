<x-app-layout>
    @unless ($blogs->isEmpty())

    <div class="py-12">
        @foreach ($blogs as $blog)
        <div class="mx-auto my-5 max-w-7xl sm:px-6 lg:px-8">
            <x-blog-card-wrapper>
                <x-blog-card :blog="$blog" />
            </x-blog-card-wrapper>
        </div>
        @endforeach
    </div>
    @else

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <x-blog-card-wrapper>
                {{ __('No blogs yet!')}}
            </x-blog-card-wrapper>
        </div>
    </div>
    @endunless
</x-app-layout>
