<section id="promo-carousel" class="splide rounded-xl pb-10">
    <div class="splide__track rounded-xl pt-5">
        <div class="splide__list rounded-xl" style="grid-template-columns:repeat(3, 1fr); gap:14px">
            @foreach ($carousels as $carousel)
                @if($carousel->language->code == app()->getLocale())
                    <div class="border-solid splide__slide hover:-translate-y-2 hover:shadow-xl rounded-xl ease-in-out duration-300">
                        <a href="{{$carousel->link}}" target="_blank"><img class="rounded-xl" src="{{ url('images/ads/' . $carousel->image) }}" alt=""></a>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</section>