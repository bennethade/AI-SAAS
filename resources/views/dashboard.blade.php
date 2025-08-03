<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{-- {{ __("You're logged in!") }} --}}

                    <h2 class="text-2xl">Blog Content Generator</h2>
                    <form action="{{ route('blog.generator') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div>
                            <label for="blog-post">Write A Blog Post About...</label>
                            <input type="text" name="blog_post" id="" placeholder="">
                        </div>
                        <div>
                            <button type="submit" class="rounded-sm bg-indigo-500 bg-block p-2">Submit</button>
                        </div>
                    </form>

                    @if (isset($result))
                        <h2 class="text-2xl">Blog Post:</h2>
                        <div>{{ $result }}</div>
                    @endif
                </div>

            </div>
        </div>
    </div>

    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{-- {{ __("You're logged in!") }} --}}

                    <h2 class="text-2xl">Blog Image Generator</h2>
                    <form action="{{ route('image.generator') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div>
                            <label for="blog-post">Generate an image for the blog...</label>
                            <input type="text" name="blog_image" id="" placeholder="">
                        </div>
                        <div>
                            <button type="submit" class="rounded-sm bg-indigo-500 bg-block p-2">Submit</button>
                        </div>
                    </form>
                    @if (isset($response))
                        <h2 class="text-2xl">Blog Image:</h2>
                        <div>
                            <img src="{{ $response }}" alt="Generated Image" class="w-full h-auto">
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
