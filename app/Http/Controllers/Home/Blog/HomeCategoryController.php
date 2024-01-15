<?php

namespace App\Http\Controllers\Home\Blog;

use App\Models\Tag;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $blog = Blog::inRandomOrder()->limit(3)->get();
        $categoryList = Category::with('blog', 'language')->where('slug', $id)->first();
        $category = Category::with('language');
        $tag = Tag::with('language');
        $recommendedBlog = Blog::with('category', 'language', 'tags')->where('status', 'active')->inRandomOrder()->limit(3)->get();
        return view('home.blog.category.index', [
            'categories' => $category->get(),
            'categoriesList' => $categoryList,
            'tags' => $tag->get(),
            'blogs' => $blog,
            'recommendedBlog' => $recommendedBlog
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
