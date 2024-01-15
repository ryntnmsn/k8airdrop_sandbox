<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $language = Language::all();
        $category = Category::with('language');
        return view('admin.blog.category.index', [
            'categories' => $category->get(),
            'languages' => $language
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $language = Language::all();
        return view('admin.blog.category.create', [
            'languages' => $language
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Category::create([
            'title' => $request->title,
            'language_id' => $request->language,
            'slug' => Str::slug($request->title)
        ]);
        return redirect('admin/category')->with('message', 'New category added successfully');
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
        $language = Language::all();
        $category = Category::with('language')->where('id', $id)->first();
        return view('admin.blog.category.edit', [
            'categories' => $category,
            'languages' => $language
        ]);
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
        $category = Category::findOrfail($id);
        $category->update([
            'title' => $request->title,
            'language_id' => $request->language,
            'slug' => Str::slug($request->title),
        ]);
        
        return redirect('admin/category')->with('message', 'Blog category updated successfully.');
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
