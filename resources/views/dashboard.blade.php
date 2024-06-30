<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('messages.Residential complexes') }}
        </h2>
    </x-slot>
<br>
    <div class="flex justify-center mt-8">
        <a href="{{ route('leave-request') }}">
        <x-primary-button style="font-size: 2rem;">{{ __('messages.Apply') }}</x-primary-button>
        </a>
    </div>

@foreach($complexes as $complex)
        @include('layouts.complex-card', ['complex' => $complex])
@endforeach

</x-app-layout>
