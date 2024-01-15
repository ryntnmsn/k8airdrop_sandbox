<?php

namespace App\Http\Controllers\Home\Blog;

use App\Models\Tag;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\GetCountryCodeController;

class HomeBlogController extends Controller
{


    public function index() {
        
        $getLocale = (new GetCountryCodeController)->getCountryCode();

        $blog = Blog::with('category', 'language', 'tags')->where('status', 'active')->orderBy('created_at', 'desc');
        $category = Category::with('language');
        $tag = Tag::with('language');
        
        $blog_banner = $blog->inRandomOrder()->limit(3);
        $blog_most_read = $blog->inRandomOrder()->limit(5)->get();

        if(isset($blog)) {
            if($getLocale == 'jp') {
                $blogs = $blog->where('language_id' , 2);
                $tags = $tag->where('language_id', 2);
                $blog_most_read = $blog->where('language_id', 2)->inRandomOrder()->limit(5)->get();
            } else {
                $blogs = $blog->where('language_id' , 1);
                $tags = $tag->where('language_id' , 1);
                $blog_most_read = $blog->where('language_id', 1)->inRandomOrder()->limit(5)->get();
            } 
        }

        return view('news', [
            'blog_banners' => $blog_banner->get(),
            'blogs' => $blogs->paginate(12),
            'blog_most_read' => $blog_most_read,
            'categories' => $category->get(),
            'tags' => $tags->get(),
        ]);
    }


    public function show($slug) {
        
        $getLocale = (new GetCountryCodeController)->getCountryCode();

        $blog = Blog::with('category', 'language', 'tags')->where('status', 'active');
        $blogId = Blog::with('category', 'language', 'tags')->where('status', 'active')->where('slug', $slug)->first();
        $category = Category::with('language')->get();
        $tag = Tag::with('language')->get();

        if($getLocale == 'jp') {
            $recommendedBlog = $blog->where('language_id', 2)->inRandomOrder()->take(3)->get();
            $blog_most_read =  $blog->where('language_id', 2)->inRandomOrder()->take(5)->get();
            $tags = $tag->where('language_id', 2);
        } else {
            $recommendedBlog = $blog->where('language_id', 1)->inRandomOrder()->take(3)->get();
            $blog_most_read =  $blog->where('language_id', 1)->inRandomOrder()->take(5)->get();
            $tags = $tag->where('language_id' , 1);
        } 
   
        return view('news-single', [
            'blogs' => $blogId,
            'blog_most_read' => $blog_most_read,
            'categories' => $category,
            'tags' => $tags,
            'recommendedBlog' => $recommendedBlog
        ]);
    }

    public function showCat($slug) {

        $getLocale = (new GetCountryCodeController)->getCountryCode();

        $blog = Blog::with('category', 'language', 'tags')->where('status', 'active');
        $category_blog = Category::with('language', 'blog')->where('slug', $slug)->first();
        $category = Category::with('language', 'blog');
        $tag = Tag::with('language')->get();
        $blog_most_read = $blog->orderBy('created_at', 'asc')->inRandomOrder()->limit(5)->get();
   
        if($getLocale == 'jp') {
            $recommendedBlog = $blog->where('language_id', 2)->inRandomOrder()->take(3)->get();
            $blog_most_read =  $blog->where('language_id', 2)->inRandomOrder()->take(5)->get();
            $tags = $tag->where('language_id', 2);
        } else {
            $recommendedBlog = $blog->where('language_id', 1)->inRandomOrder()->take(3)->get();
            $blog_most_read =  $blog->where('language_id', 1)->inRandomOrder()->take(5)->get();
            $tags = $tag->where('language_id' , 1);
        } 
   

        return view('news-category', [
            'category_blog' => $category_blog,
            'blogs' => $blog,
            'blog_most_read' => $blog_most_read,
            'categories' => $category->get(),
            'tags' => $tags,
            'recommendedBlog' => $recommendedBlog

        ]);
    }


    public function showTag($slug) {

        $getLocale = (new GetCountryCodeController)->getCountryCode();

        $blog = Blog::with('category', 'language', 'tags')->where('status', 'active');
        $category = Category::with('language', 'blog');
        $tag = Tag::with('language')->get();
        $tag_blog = Tag::with('language', 'blogs')->where('slug', $slug)->first();

        $blog_most_read = $blog->orderBy('created_at', 'asc');
        $recommendedBlog = Blog::with('category', 'language', 'tags');

        if($getLocale == 'jp') {
            $recommendedBlog = $blog->where('language_id', 2)->inRandomOrder()->take(3)->get();
            $blog_most_read =  $blog->where('language_id', 2)->inRandomOrder()->take(5)->get();
            $tags = $tag->where('language_id', 2);
        } else {
            $recommendedBlog = $blog->where('language_id', 1)->inRandomOrder()->take(3)->get();
            $blog_most_read =  $blog->where('language_id', 1)->inRandomOrder()->take(5)->get();
            $tags = $tag->where('language_id' , 1);
        } 
   

        return view('news-tag', [
            'tag_blog' => $tag_blog,
            'blogs' => $blog,
            'blog_most_read' => $blog_most_read,
            'categories' => $category->get(),
            'tags' => $tags,
            'recommendedBlog' => $recommendedBlog
        ]);
    }
}
