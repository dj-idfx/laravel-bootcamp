<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Post: ').$post->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex-1">
                        <div class="flex justify-between items-start">
                            <h3 class="text-4xl">
                                {{ $post->title }}
                            </h3>

                            @can('update', $post)
                                <x-dropdown>
                                    <x-slot name="trigger">
                                        <button>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                                <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                            </svg>
                                        </button>
                                    </x-slot>
                                    <x-slot name="content">
                                        <x-dropdown-link :href="route('posts.edit', $post)">
                                            {{ __('Edit') }}
                                        </x-dropdown-link>

                                        @can('delete', $post)
                                            <form method="POST" action="{{ route('posts.destroy', $post) }}">
                                                @csrf
                                                @method('delete')
                                                <x-dropdown-link :href="route('posts.destroy', $post)" onclick="event.preventDefault(); this.closest('form').submit();">
                                                    {{ __('Delete') }}
                                                </x-dropdown-link>
                                            </form>
                                        @endcan
                                    </x-slot>
                                </x-dropdown>
                            @endcan
                        </div>
                    </div>

                    <div class="mt-4 text-lg whitespace-pre-wrap">{{ $post->content }}</div>

                    <div class="mt-3 pt-3 border-t border-t-gray-400">
                        <span class="text-gray-800 dark:text-gray-200">{{ $post->user->name }}</span>
                        <small class="ml-2 text-sm text-gray-600 dark:text-gray-300">{{ $post->created_at->format('j M Y, g:i a') }}</small>
                        @unless ($post->created_at->eq($post->updated_at))
                            <small class="text-sm text-gray-600 dark:text-gray-300"> &middot; {{ __('edited') }}</small>
                        @endunless
                    </div>
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('posts.index') }}" class="text-gray-300 dark:hover:text-gray-100 transition-colors underline underline-offset-4">
                    &lt; {{ __('All posts') }}
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
