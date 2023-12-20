<x-app-layout>

    <div class="flex flex-col md:flex-row items-start justify-between">

        <div class="py-0 md:py-12 sticky top-16 md:top-20 mx-auto  sm:px-0 md:px-6 lg:px-8 w-full md:w-auto">
            <x-blog-card-wrapper class="transition-all duration-[0.2s] overflow-hidden border-[3.5px] border-black
    md:rounded-lg bg-[#d6e3d1] rounded-none border-none
    md:hover:drop-shadow-3xl">
                <div class="flex items-start justify-start flex-col">
                    <h3>
                        Author: <b> {{ $user->name }}</b>
                    </h3>
                    <h3>
                        Email: <b> {{ $user->email }}</b>
                    </h3>
                    <h3>
                        Joined at: <b> {{ $user->created_at }}</b>
                    </h3>
                    <h3>
                        Total Blogs: <b> {{ count($user->blogs) }} </b>
                    </h3>
                </div>
            </x-blog-card-wrapper>
        </div>

        <div class="flex-1 py-12 ">
            @unless ($blogs->isEmpty())

            @foreach ($blogs as $blog)
            <div class="mx-auto my-5 max-w-5xl px-3 sm:px-6 lg:px-8">
                <x-blog-card-wrapper>
                    <x-blog-card :blog="$blog" />
                </x-blog-card-wrapper>
            </div>
            @endforeach

            @else

            <div class="mx-auto max-w-5xl sm:px-6 lg:px-8">
                <x-blog-card-wrapper>
                    {{ __('No blogs yet!')}}
                </x-blog-card-wrapper>
            </div>
            @endunless
        </div>

    </div>
</x-app-layout>
