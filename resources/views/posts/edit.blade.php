<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
            <form method="POST" action="{{ route('posts.update', $post) }}">
                @csrf
                @method('patch')

                <div class="mb-4">
                    <x-input-label for="title" :value="__('Title')" />
                    <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title', $post->title)" placeholder="{{ __('Post title') }}" required autofocus />
                    <x-input-error :messages="$errors->get('title')" class="mt-2" />
                </div>

                <div class="mb-4">
                    <x-input-label for="title" :value="__('Content')" />
                    <textarea
                        name="content"
                        rows="6"
                        placeholder="{{ __('Post content') }}"
                        class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                    >{{ old('content', $post->content) }}</textarea>
                    <x-input-error :messages="$errors->get('content')" class="mt-2" />
                </div>

                <div class="mt-4 space-x-2">
                    <x-primary-button>{{ __('Save') }}</x-primary-button>
                    <a class="text-gray-800 dark:text-gray-200" href="{{ route('posts.show', $post) }}">{{ __('Cancel') }}</a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
