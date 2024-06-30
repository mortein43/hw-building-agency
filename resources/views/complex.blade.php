<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $complex['name'] }}
        </h2>
    </x-slot>
    <br>
<div style="display: flex">
    <div class="carousel">
        <div class="carousel-container">
            @foreach($complex->photos as $photo)
                <div class="slide">
                    <img src="{{$photo['photo']}}" alt="{{$complex['name']}}">
                </div>
            @endforeach
        </div>
        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>
    </div>

    <div class="flex-grow p-6 text-gray-900 dark:text-gray-100">
        <p style="font-size: 4rem;">{{$complex['name']}}</p>
        <p style="font-size: 1.5rem;"><b>{{__('messages.from')}} {{$complex['min_price']}}</b>$ {{__('messages.per m')}}<sup>2</sup></p>
        <p style="font-size: 1.5rem;">{{$complex['address']}}</p>
        <p style="font-size: 1.5rem;">{{__('messages.Developer')}}: <b>{{$complex['developer']}}</b></p>
    </div>
</div>
    <div class="p-6 text-gray-900 dark:text-gray-100">
        <p style="font-size: 4rem;">{{__('messages.Flats')}}:</p>
        @php
            $uniqueTypes = $complex->types->unique('name');
        @endphp

        <div class="flex flex-wrap">
            @foreach($uniqueTypes as $type)
                <div class="w-1/3 px-4">
                    <p style="font-size: 1.5rem;">{{ $type->name }}:</p>
                    @foreach($complex->flats()->where('type_id', $type->id)->get() as $flat)
                        @include('layouts.flat-card', ['flat' => $flat])
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>

</x-app-layout>

<script>
    let slideIndex = 1;
    showSlides(slideIndex);

    function plusSlides(n) {
        showSlides((slideIndex += n));
    }

    function currentSlide(n) {
        showSlides((slideIndex = n));
    }

    function showSlides(n) {
        let i;
        const slides = document.querySelectorAll(".carousel-container .slide");
        const dots = document.querySelectorAll(".dot");
        if (n > slides.length) {
            slideIndex = 1;
        }
        if (n < 1) {
            slideIndex = slides.length;
        }
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex - 1].style.display = "block";
        dots[slideIndex - 1].className += " active";
    }

</script>


<style>
    .carousel {
        position: relative;
        width: 50%;
        justify-content: center;
        align-items: center;
    }

    .carousel-container {
        position: relative;
        display: flex;
        overflow: hidden;
        transition: transform 0.5s ease;
        justify-content: left;
    }

    .slide {
        flex: 0 0 auto;
        width: 100%;
        transition: opacity 0.5s ease;
    }

    .slide img {
        width: 100%;
        object-fit: cover;
        object-position: center;
    }

    .prev,
    .next {
        cursor: pointer;
        position: absolute;
        top: 50%;
        width: auto;
        margin-top: -22px;
        padding: 16px;
        color: white;
        font-weight: bold;
        font-size: 18px;
        transition: 0.6s ease;
        border-radius: 0 3px 3px 0;
        user-select: none;
        background-color: rgba(0, 0, 0, 0.5);
    }

    .next {
        right: 0;
        border-radius: 3px 0 0 3px;
    }
</style>
