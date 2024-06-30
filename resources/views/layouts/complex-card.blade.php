
<section>
    <a href="{{ route('complex.show', ['complex' => $complex]) }}">
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg hover-scale-12 hover-text-light-grey">
                    <div class="w-1/3 overflow-hidden transition-transform transform-gpu rounded-lg" style="width: 50%">
                        <img src="{{$complex->photos()->first()->photo}}">
                    </div>

                <div class="flex-grow p-6 text-gray-900 dark:text-gray-100">
                    <p style="font-size: 4rem;">{{$complex['name']}}</p>
                    <p style="font-size: 1.5rem;"><b>{{__('messages.from')}} {{$complex['min_price']}}</b>$ {{__('messages.per m')}}<sup>2</sup></p>
                    <p style="font-size: 1.5rem;">{{$complex['address']}}</p>
                    <p style="font-size: 1.5rem;">{{__('messages.Types')}}: {{$complex['count_types']}}  &middot; {{__('messages.flats')}}: {{$complex['count_flats']}}</p>
                    <p style="font-size: 1.5rem;">{{__('messages.Developer')}}: <b>{{$complex['developer']}}</b></p>
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
