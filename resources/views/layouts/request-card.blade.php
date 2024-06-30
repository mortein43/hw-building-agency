
<section>
    <a href="{{ route('request.edit', ['request' => $request]) }}">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="flex bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg hover-scale-12 hover-text-light-grey">

                    <div class="flex-grow p-6 text-gray-900 dark:text-gray-100">
                        <p style="font-size: 2rem;">{{$request->complex->name}}</p>
                        <p style="font-size: 1.5rem;"><b>{{$request->type->name}}</b></p>
                        <p style="font-size: 1.5rem;">{{__('message.Area')}}: {{$request->area}} {{__('message.m')}}<sup>2</sup></p>
                        <p style="font-size: 1.5rem;">{{__('message.Budget')}}: {{$request->budget}}$</p>
                    </div>

                </div>
            </div>
        </div>
    </a>
</section>

<style>
    .hover-text-light-grey:hover p{
        color: gray;
    }
    .hover-scale-12:hover img {
        transform: scale(1.2);
        transition: transform 0.7s ease
    }
</style>
