<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <a href="{{ route('posts.create') }}" class="text-gray-300 dark:hover:text-gray-100 transition-colors underline underline-offset-4">
                        &plus; {{ __('Create new') }}
                    </a>

                    <a href="{{ route('posts.index', ['trash']) }}" class="text-gray-300 dark:hover:text-gray-100 transition-colors hover:underline underline-offset-4">
                        {{ __('View trashed') }}
                    </a>

                    <hr class="my-3 border-gray-400">

                    <ul>
                        @foreach ($posts as $post)
                            <li>
                                @if(!$post->trashed())
                                    <h3 class="text-3xl">
                                        <a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a>
                                    </h3>
                                @else
                                    <h3 class="text-xl">{{ $post->title }}</h3>
                                @endif

                                <div class="mt-1">
                                    <span class="text-gray-800 dark:text-gray-200">{{ $post->user->name }}</span>
                                    <small class="ml-2 text-sm text-gray-600 dark:text-gray-300">{{ $post->created_at->format('j M Y, g:i a') }}</small>
                                    @unless ($post->created_at->eq($post->updated_at))
                                        <small class="text-sm text-gray-600 dark:text-gray-300"> &middot; {{ __('edited') }}</small>
                                    @endunless
                                </div>

                                @if($post->trashed())
                                    @can('restore', $post)
                                        <form method="POST" action="{{ route('posts.restore', $post) }}" class="inline">
                                            @csrf
                                            @method('patch')
                                            <x-primary-button>{{ __('Restore') }}</x-primary-button>
                                        </form>
                                    @endcan

                                    @can('forceDelete', $post)
                                        <form method="POST" action="{{ route('posts.delete', $post) }}" class="inline">
                                            @csrf
                                            @method('delete')
                                            <x-primary-button>{{ __('Delete') }}</x-primary-button>
                                        </form>
                                    @endcan
                                @endif

                                <hr class="my-3 border-gray-400">
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
