<div class="fixme" style="position:relative; width:200px; margin:0 auto">
    @foreach($ads as $ad)
    @if($ad->layout == 'right')
    @if($ad->language->code == app()->getLocale())
    <div style="padding-bottom:30px">
        <a href="{{$ad->img_website}}" target="_blank">
            <img src="{{url($ad->img_url)}}" alt="" style="margin-bottom:30px" >
        </a>
        <a href="{{$ad->video_website}}" target="_blank">
            <video width="200" height="auto" muted autoplay loop>
                <source src="{{URL::asset($ad->video_url)}}" type="video/mp4">
            </video>
        </a>
    </div>
    @endif
    @endif
    @endforeach
</div>
