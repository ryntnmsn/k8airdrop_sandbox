<div class="mt-5">
    <h5 class="mb-4">{{ __('Recommended to read') }}</h5>
    <div class="container-blog-list">
        @foreach ($recommendedBlog as $blog)
            @if($blog->language->code == app()->getLocale())
                <div class="blog-card blur-filter ">
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