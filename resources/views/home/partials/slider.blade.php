
<div class="container-main" style="margin-top:24px">
    <div class="container-sub">
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <!--<a href="/">
                    <div class="carousel-item active">
                        <img src="{{url('images/logo/k8-lucky-airdrop-banner.jpg')}}" alt="Lucky Airdop Promos">
                    </div>
                </a>-->
            @foreach($is_banner as $index => $promo)
                <a href="{{$promo->link}}" target="_blank">
                    <div class="carousel-item active">
                        <img src="{{url('images/promos/' . $promo->image)}}" alt="{{$promo->title}}" class="img-fluid">
                    </div>
                </a>
                <!-- </a>
                <a href="{{$promo->link}}" target="_blank">
                    <div class="carousel-item @if($index == 0) active @else '' @endif"  style="background-image: url('{{url('images/promos/' . $promo->image)}}');"></div>
                </a> -->
            @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">{{__('Previous')}}</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">{{__('Next')}}</span>
            </button>
        </div>
    </div>
</div>