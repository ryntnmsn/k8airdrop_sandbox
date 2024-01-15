

<section id="promo-banner" class="splide rounded-xl">
    <div class="splide__track rounded-xl pt-5">
        <div class="splide__list rounded-xl">
            @foreach ($banners as $banner)
                @if($banner->language->code == app()->getLocale())
                    <div class="border-solid splide__slide h-auto object-contain hover:-translate-y-2 hover:shadow-xl rounded-xl ease-in-out duration-300">
                        <a class="block" href="{{$banner->link}}" target="_blank"><img class="rounded-xl h-auto object-contain" src="{{ url('images/ads/' . $banner->image) }}" alt=""></a>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</section>












