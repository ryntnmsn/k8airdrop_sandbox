<div class="container-blog-right">
    <div class="cat-cont">
        <h5 class="mb-3">{{ __('Categories') }}</h5>
        <hr>
        <ul class="cat-list">
            @foreach ($categories as $category)
                @if($category->language->code == app()->getLocale())
                    <li class="mb-2"><a href="{{ route('blog.category', $category->slug) }}">{{ $category->title }}</a></li>
                @endif              
            @endforeach
        </ul>  
    </div>
    <div class="tag-cont mt-5">
        <h5 class="mb-3">{{ __('Tags') }}</h5>
        <hr>
        <ul class="tag-list">
            @foreach ($tags as $tag)
                @if($tag->language->code == app()->getLocale())
                    <li class="mb-2">
                        <span><i class="fa-solid fa-tag"></i></span>
                        <span><a href="{{ route('blog.tag', $tag->slug) }}">{{ $tag->name }}</a></span>
                    </li>     
                @endif          
            @endforeach
        </ul>  
    </div>
</div>