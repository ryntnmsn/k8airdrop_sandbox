
<div class="container-main">
    <div class="container-sub">

        
            @if($ny_ns_promo)
                <div class="ny-ns-cont">
                    <video width="100%" height="120" muted autoplay loop>
                        <source src="{{URL::asset('/images/logo/NYNS-Leaderboard.mp4')}}" type="video/mp4">
                    </video>
                    <!-- <h3 class="text-white">New Year, New Subscribers</h3> -->
                    
                    <div class="row">
                        <div class="col-sm-8">
                            <iframe width="100%" height="400" src="{{$ny_ns_promo->embedded_code}}?autoplay=1&controls=1&loop=1&mute=1&rel=0" title="{{$ny_ns_promo->title}}" frameborder="0" allowfullscreen></iframe>
                        </div>
                        <div class="col-sm-4">
                            <table class="table table-striped mt-2" style="background:#1b2135; border:1px solid #161c2d">
                                <thead style="background:#161c2d">
                                    <tr>
                                        <td class="text-white">{{__('New Year Subscribers')}}</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($ny_ns_promo->participants->shuffle()->take(10) as $participant)
                                    <tr>
                                        <td class="text-custom-secondary" style="padding:5px; font-size:15px">
                                            {{substr($participant->name, 0, -4) . "***";}}
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @else
                @include('home.partials.nba-leaderboard')
            @endif
        
            
        

    </div>
</div>