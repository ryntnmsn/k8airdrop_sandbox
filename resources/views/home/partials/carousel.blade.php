

<div class="gallery js-flickity mt-3" data-flickity-options='{ "wrapAround": true, "autoPlay": 3000, "imagesLoaded": true }'>
      @foreach ($long_term_posts as $long_term_post )
            <div class="gallery-cell">
            	<!--<div class="button_hover"><a class="promo_btn" href="{{$long_term_post->link}}">READ MORE</a></div>-->
                <a href="{{$long_term_post->link}}" target="__blank">
                	<img src="{{ url('images/promos/' . $long_term_post->image) }}" alt="">
                </a>
            </div>
        @endforeach
</div>