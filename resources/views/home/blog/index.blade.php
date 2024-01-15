@include('home.partials.header')

<div class="container-margin-top" style="margin-top:30px">


    <div class="container-margin-top-body" style="margin-bottom:100px; margin-top:20px; position:relative">
        <div class="container-blog-center">
            <div class="container-main">
                <h1 class="mb-4 fw-bold">{{ __('Blogs') }}</h1>
                <div class="container-blog-wrap">
                    <div class="container-blog-left">
                        <div class="container-blog-list">
                            @foreach ($blogs as $blog)
                                @if($blog->language->code == app()->getLocale())
                                <div class="blog-card blur-filter ">
                                    <a href="/blog/{{ $blog->slug }}" class="blog-card-link"></a>
                                    <div class="blog-container">
                                        <div class="blog-image">
                                            <img src="{{ url('images/', $blog->image) }}" alt="">
                                        </div>
                                        <div class="blog-details">
                                            <div class="blog-category">
                                                <span>
                                                    <a href="{{ route('blog.category', $blog->category->slug) }}">{{ $blog->category->title }}</a>
                                                </span>
                                            </div>
                                            <h4 class="blog-title"><a href="/blog/{{ $blog->slug }}">{{ $blog->title }}</a></h4>
                                            <div class="blog-description">{!! $blog->description !!}</div>
                                            @if($blog->tags->count() != 0)
                                                <div class="blog-tags">
                                                    <ul>
                                                        <li><i class="fa-solid fa-tag"></i></li>
                                                        @foreach ($blog->tags as $tag)
                                                            <li><a href="{{ route('blog.tag', $tag->slug) }}">{{ $tag->name }},</a></li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    @include('home.partials.blog-aside')
                </div>
            </div>
        </div>
    </div> 

</div>

@include('home.partials.footer')