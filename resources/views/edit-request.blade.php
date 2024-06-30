<x-app-layout>


<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
            <div class="max-w-xl">
<form method="post" action="{{ route('request.update', ['requestModel' => $request->id]) }}" class="space-y-6">
    @csrf
    @method('patch')

    <x-input-label for="complex" :value="__('messages.Complex')" />
    <select id="complex" name="complex_id">
        <?php $complexes=\App\Models\Complex::all();?>
        @foreach($complexes as $complex)
            <option value="{{ $complex->id }}" {{ $request->complex_id == $complex->id ? 'selected' : '' }}>
                {{ $complex->name }}
            </option>
        @endforeach
    </select>

    <x-input-label for="type" :value="__('messages.Type')" />
    <select id="type" name="type_id">
        <?php $types=\App\Models\Type::all();?>
        @foreach($types as $type)
            <option value="{{ $type->id }}" {{ $request->type_id == $type->id ? 'selected' : '' }}>
                {{ $type->name }}
            </option>
        @endforeach
    </select>

    <div>
        <x-input-label for="area" :value="__('messages.Area')" />
        <x-text-input id="area" name="area" type="number" class="mt-1 block w-full" :value="old('area', $request['area'])" required autofocus autocomplete="area" />
        <x-input-error class="mt-2" :messages="$errors->get('area')" />
    </div>

    <div>
        <x-input-label for="budget" :value="__('messages.Budget')" />
        <x-text-input id="budget" name="budget" type="text" class="mt-1 block w-full rounded-md shadow-sm" :value="old('budget', $request->budget)" required autofocus autocomplete="budget" />
    </div>

    <div class="flex items-center gap-4">
        <x-primary-button>{{ __('messages.Update') }}</x-primary-button>
    </div>
</form>

<form method="post" action="{{ route('request.destroy', ['requestModel' => $request->id]) }}" class="space-y-6">
    @csrf
    @method('delete')

    <div class="flex items-center gap-4">
        <x-danger-button>{{ __('messages.Delete') }}</x-danger-button>
    </div>
</form>
            </div>
        </div>
    </div>
</div>
</x-app-layout>
