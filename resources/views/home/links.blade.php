
@include('home.partials.header')

<div class="container-margin-top" style="margin-top:30px">

        <div class="container-margin-top-body" style="margin-bottom:100px; margin-top:20px">
            <div class="container-promo-center">
                <div class="container-main">
                    <div class="link-head">
                        <h1>{{__('K8 Links')}}</h1>
                        <p class="title-sub-cont" style="color:#B1BCCA;">{{__('Welcome to K8’s Airdrop site! Track & join our monthly Airdrop activities, from our social media pages to messaging apps! May luck come with you along the way')}}!</p>
                    </div>
                    
                    @foreach($links as $link)
                    <a href="{{ $link->url }}" target="_blank" style="text-decoration:none">
                        <div class="link-table blur-filter">
                            <div class="link-table-cell-left">
                            
                            	@if($link->icon == "")
                            		<img src="{{ url('images/ads/link-placeholder.png') }}" alt="">
                            	@else
                            		<img src="{{ url('images/ads/' . $link->icon) }}" alt="">
                            	@endif
                            	
                            
                            </div>
                            <div class="link-table-cell-center">
                                <div class="link-title">{{ $link->name }}</div>
                                <div class="link-url"><small><p>{{ $link->url }}</p></small></div>
                            </div>
                            <div class="link-table-cell-right"><i class="fa-solid fa-up-right-from-square" style="color:#B1BCCA"></i></div>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
</div>
@include('home.partials.footer')


