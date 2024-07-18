<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit chirp') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
            <form method="POST" action="{{ route('chirps.update', $chirp) }}">
                @csrf
                @method('patch')
                <textarea
                    name="message"
                    maxlength="250"
                    rows="3"
                    class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                >{{ old('message', $chirp->message) }}</textarea>
                <x-input-error :messages="$errors->get('message')" class="mt-2" />
                <div class="mt-4 space-x-2">
                    <x-primary-button>{{ __('Save') }}</x-primary-button>
                    <a class="text-gray-800 dark:text-gray-200" href="{{ route('chirps.index') }}">{{ __('Cancel') }}</a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
