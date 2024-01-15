@include('home.partials.header')

<div class="container-margin-top" style="margin-top:30px">
    {{-- <div class="container-promo-left"></div> --}}

    <div class="container-margin-top-body" style="margin-bottom:100px; margin-top:20px">
        <div class="container-blog-center">
            <div class="container-main">
                <div class="container-blog-wrap">
                    <div class="container-blog-left">
                        <div class="single-blog-img"><img style="width:100%; border-top-left-radius:10px; border-top-right-radius:10px" src="{{ url('images/', $blogs->image) }}" alt=""></div>
                        <div class="single-blog-container blur-filter p-4" style="border-top-left-radius:0; border-top-right-radius:0;">
                            
                            <div class="single-blog-details">
                                <h1 class="mb-3" style="font-size:32px">{{ $blogs->title }}</h1>
                                <small><b>{{ __('Category:') }}</b> {{ $blogs->category->title }}</small><br>
                                <small><b>{{ __('Created:') }}</b>  {{ $blogs->created_at }}</small>
                                <hr>
                                <div class="single-blog-description">{!! $blogs->description !!}</div>
                                <div class="single-blog-tags">
                                    <ul>
                                        <small>{{ __('Tags:') }} </small>   
                                        @foreach ($blogs->tags as $tag)
                                            <li>
                                                <small><i class="fa-solid fa-tag"></i></small>
                                                <small><a href="#">{{ $tag->name }}</a></small>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        
                        @include('home.partials.recommended-blog')

                    </div>
                    @include('home.partials.blog-aside')
                </div>
            </div>
        </div>
    </div> 
    {{-- <div class="container-promo-right"></div> --}}
</div>
@include('home.partials.footer')