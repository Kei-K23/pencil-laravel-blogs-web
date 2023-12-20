<x-app-layout>

    <div class="py-12">
        <div class="mx-auto my-5 max-w-5xl sm:px-6 lg:px-8">
            <x-blog-card-wrapper>
                <x-blog-card :blog="$blog" />
            </x-blog-card-wrapper>
        </div>
    </div>


    {{-- command section --}}

    <div class="py-12">
        <h2 class="text-center text-lg md:text-xl">Total commands: {{ count($commands) }}</h2>
        @foreach ($commands as $command)
        <div class="mx-auto my-5 max-w-5xl sm:px-6 lg:px-8">
            <x-blog-card-wrapper>
                <div>
                    <div>
                        <h2>{{ $command->user }}</h2>
                    </div>
                    {{ $command }}

                </div>
            </x-blog-card-wrapper>
        </div>
        @endforeach
    </div>


</x-app-layout>
