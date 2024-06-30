<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('messages.Your applications') }}
        </h2>
    </x-slot>

    <div class="p-6 text-gray-900 dark:text-gray-100">
        @foreach($requests as $request)
            @include('layouts.request-card', ['request' => $request])
        @endforeach
    </div>
</x-app-layout>
