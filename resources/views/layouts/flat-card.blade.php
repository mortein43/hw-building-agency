
<section>
    <div class="py-12">
        <div class="max-w-md mx-auto sm:px-6 lg:px-8">
            <div class=" bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg hover-scale-12 hover-text-light-grey">
                <div class="w-1/5 overflow-hidden transition-transform transform-gpu rounded-lg">
                    <img src="{{$flat['photo']}}" alt="Фото квартири">
                </div>

                <div class="flex-grow flex flex-col justify-center p-6 text-gray-900 dark:text-gray-100">
                    <p class="text-sm" style="font-size: 1.5rem;">{{$flat['price']}} $  &middot; {{$flat['area']}}м<su</p>
                    <br>
                    <p class="text-sm" style="font-size: 1.5rem;">{{__('messages.On sale')}}: <b>{{$flat['count']}}</b></p>
                </div>
            </div>
        </div>
    </div>


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
