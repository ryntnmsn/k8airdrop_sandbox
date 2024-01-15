

<div class="fixme" style="width:200px; margin:0 auto">
    @foreach($ads as $ad)
    @if($ad->language->code == app()->getLocale())
    @if($ad->layout == 'left')
    <a href="{{$ad->img_website}}" target="_blank">
        <img src="{{url($ad->img_url)}}" alt="" style="margin-bottom:30px">
    </a>
    <a href="{{$ad->video_website}}" target="_blank">
        <video width="200" height="auto" muted autoplay loop>
            <source src="{{URL::asset($ad->video_url)}}" type="video/mp4">
        </video>
    </a>
    @endif
    @endif
    @endforeach
</div>
