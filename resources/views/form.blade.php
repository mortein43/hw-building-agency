<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('messages.Подати заявку') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <form name="request_form" method="POST">
                @csrf
            @auth
            @else
                <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                    <div class="max-w-xl">
                            <header>
                                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                    {{ __('messages.Контактна інформація') }}
                                </h2>
                            </header>


                            <div>
                                <x-input-label for="first_name" :value="__('messages.First name')" />
                                <x-text-input id="first_name" name="first_name" type="text" class="mt-1 block w-full" required autofocus autocomplete="first_name" />
                                <x-input-error class="mt-2" :messages="$errors->get('first_name')" />
                            </div>

                            <div>
                                <x-input-label for="last_name" :value="__('messages.Last name')" />
                                <x-text-input id="last_name" name="last_name" type="text" class="mt-1 block w-full" required autofocus autocomplete="last_name" />
                                <x-input-error class="mt-2" :messages="$errors->get('first_name')" />
                            </div>

                            <div>
                                <x-input-label for="phone_number" :value="__('messages.Phone number')" />
                                <x-text-input id="phone_number" name="phone_number" type="text" class="mt-1 block w-full" required autofocus autocomplete="phone_number"/>
                                <x-input-error class="mt-2" :messages="$errors->get('phone_number')" />
                            </div>

                            <div>
                                <x-input-label for="email" :value="__('messages.Email')" />
                                <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" required autocomplete="username" />
                                <x-input-error class="mt-2" :messages="$errors->get('email')" />
                            </div>


                    </div>
                </div>
            @endauth
                    <header>
                        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                            {{ __('messages.Інформація про квартиру') }}
                        </h2>
                    </header>

                    <div class="mt-4">
                        <x-input-label for="complex" :value="__('messages.Complex')" />
                        <select id="complex" name="complex" class="mt-1 block w-full">
                            @foreach($complexes as $complexItem)
                                <option value="{{ $complexItem->id }}">{{ $complexItem->name }}</option>
                            @endforeach
                        </select>
                        <x-input-error class="mt-2" :messages="$errors->get('complex')" />
                    </div>


                    <div class="mt-4">
                        <x-input-label for="type" :value="__('messages.Type')" />
                        <select id="type" name="type" class="mt-1 block w-full">
                            @foreach($types as $type)
                                <option value="{{ $type->id }}">{{ $type->name }}</option>
                            @endforeach
                        </select>
                        <x-input-error class="mt-2" :messages="$errors->get('type')" />
                    </div>

                    <div>
                        <x-input-label for="area" :value="__('messages.Площа')" />
                        <x-text-input id="area" name="area" type="number" class="mt-1 block w-full" required autofocus autocomplete="area" />
                        <x-input-error class="mt-2" :messages="$errors->get('area')" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="budget" :value="__('messages.Budget')" />
                        <div class="relative">
        <span class="absolute inset-y-0 left-0 flex items-center pl-2">
            <span class="text-gray-500 sm:text-sm sm:leading-5">
                $
            </span>
        </span>
                            <x-text-input id="budget" name="budget" type="text" class="pl-8 pr-4 py-2 mt-1 block w-full" required autofocus autocomplete="budget" />
                        </div>
                        <x-input-error class="mt-2" :messages="$errors->get('budget')" />
                    </div>

                <div class="flex justify-center mt-8">
                    <x-primary-button>{{ __('messages.Save') }}</x-primary-button>
                </div>
            </form>
        </div>
    </div>

    @if(isset($flats) && count($flats) > 0)
        <div class="p-6 text-gray-900 dark:text-gray-100">
        <p style="font-size: 3rem;">Квартири, схожі за вашим запитом:</p>
        <div class="flex flex-wrap">

        @foreach($flats as $flat)

            @include('layouts.flat-card', ['flat' => $flat])
        @endforeach
        </div>
        </div>
    @else
        @if(isset($message))
            <div class="p-6 text-gray-900 dark:text-gray-100">
            <p style="font-size: 2rem;">{{__('messages.Схожих квартир поки немає, почекайте, коли будуть нові пропозиції')}}</p>
            </div>
        @endif
    @endif

</x-app-layout>
