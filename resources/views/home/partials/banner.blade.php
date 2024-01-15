<!-- Flickity HTML init -->
<div class="gallery-banner js-flickity" data-flickity-options='{ "wrapAround": true, "imagesLoaded": true }'>
     @foreach ($banners as $banner)
        <div class="gallery-cell-banner">
            <a href="{{$banner->link}}" target="_blank" style="cursor:pointer"><img src="{{url('images/ads/' . $banner->image)}}" class="d-block w-100" alt="{{$banner->title}}"></a>
        </div>
    @endforeach
</div>
