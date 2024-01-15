<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Language;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blog = Blog::with('category', 'language')->orderBy('created_at', 'desc')->paginate(25);
        return view('admin.blog.index', [
            'blogs' => $blog
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
        $categories = Category::all();
        $tag = Tag::all();
        return view('admin.blog.create', [
            'languages' => $language,
            'categories' => $categories,
            'tags' => $tag
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        
        $validator = Validator::make($request->all(), [
            'title' => 'required|min:5',
            'short_description' => 'required|min:10',
            'image' => 'required|image|mimes:jpg,png,jpeg|max:512|dimensions:min_width=1388,min_height=750,max_width=1388,max_height=750',
        ],
        [
            'title.required' => 'Title is required',
            'short_description' => 'Short description is required',
            'image.required' => 'Image is required.',
            'image.mimes'   => 'Image should JPG PNG of JPEG in format',
            'image.dimensions' => 'Image dimensions should be 1388x750 in pixels.',
            'image.max' => 'Image max filesize is 512KB only.',
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        } else {
            $newImageName = uniqid() . '.' . $request->image->extension();
            $request->image->move(public_path('/images'), $newImageName);
            $blog = Blog::create([
                'title' => $request->title,
                'language_id' => $request->language,
                'category_id' => $request->category,
                'slug' => Str::slug($request->title, '-' , 'ja'),
                'description' => $request->description,
                'short_description' => $request->short_description,
                'status' => $request->status,
                'demo_link' => $request->demo_link,
                'image' => $request->image = $newImageName
            ]);

            if($request->tag != "")
            {
                $tagNames = explode(',', $request->tag);
                $tagIds = [];
                foreach($tagNames as $tagName)
                {
                    $tag = Tag::firstOrCreate([
                        'name'=> $tagName,
                        'slug' => Str::slug($tagName, '-' , 'ja'),
                        'language_id' => $request->language
                    ]);
                   
                    if($tag)
                    {
                      $tagIds[] = $tag->id;
                    }
                }
                $blog->tags()->sync($tagIds);
            }
            /*$blog->tags()->attach($request->tag);*/
            return redirect()->back()->with('message', 'New blog created successfully');
        }
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
        $blog = Blog::with('category', 'language', 'tags')->where('id', $id)->first();
        $language = Language::all();
        $category = Category::all();
        return view('admin/blog/edit', [
            'blogs' => $blog,
            'categories' => $category,
            'languages' => $language,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        $blog = Blog::findOrfail($id);
        if($request->image == '') {
            $blog->update([
                'title' => $request->title,
                'slug' => Str::slug($request->title, '-' ,'ja'),
                'language_id' => $request->language,
                'category_id' => $request->category,
                'description' => $request->description,
                'demo_link' => $request->demo_link,
                'short_description' => $request->short_description,
                'status'    => $request->status,
            ]);
        } else {

            $validator = Validator::make($request->all(), [
                'title' => 'required|min:5',
                'short_description' => 'required|min:10',
                'image' => 'required|image|mimes:jpg,png,jpeg|max:512|dimensions:min_width=1388,min_height=750,max_width=1388,max_height=750',
            ],
            [
                'title.required' => 'Title is required',
                'short_description' => 'Short description is required',
                'image.required' => 'Image is required.',
                'image.mimes'   => 'Image should JPG PNG of JPEG in format',
                'image.dimensions' => 'Image dimensions should be 1388x750 in pixels.',
                'image.max' => 'Image max filesize is 512KB only.',
            ]);
    
            if($validator->fails()) {
                return redirect()->back()->withErrors($validator->errors())->withInput();
            } else {
                $newImageName = uniqid() . '.' . $request->image->extension();
                $request->image->move(public_path('images/'), $newImageName);
                $blog->update([
                    'title' => $request->title,
                    'slug' => Str::slug($request->title, '-' ,'ja'),
                    'language_id' => $request->language,
                    'category_id' => $request->category,
                    'description' => $request->description,
                    'short_description' => $request->short_description,
                    'status' => $request->status,
                    'demo_link' => $request->demo_link,
                    'image' => $request->image = $newImageName 
                ]);
            }

            if($request->tag != "")
            {
                $tagNames = explode(',', $request->tag);
                $tagIds = [];
                foreach($tagNames as $tagName)
                {
                    $tag = Tag::firstOrCreate([
                        'name' => $tagName,
                        'slug' => Str::slug($tagName, '-' , 'ja'),
                        'language_id' => $request->language
                    ]);
                    if($tag)
                    {
                    $tagIds[] = $tag->id;
                    }
                }
                $blog->tags()->syncWithoutDetaching($tagIds);
            }  
        }
        return redirect()->back()->with('message', 'Blog updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $blog = Blog::where('id', $request->id);
        $blog->delete();
        return redirect()->back()->with('message', 'Article deleted successfully.');
    }

    public function detach_tag($id) {
        $blog = Blog::find($id);
        $blog->tags()->detach($id);
        return redirect()->back()->with('message', 'Blog updated successfully.');
    }
    
    public function search(Request $request) {

        $blog = Blog::where('title', 'LIKE' , "%{$request->q}%")->paginate(25);
        return view('admin.blog.index', [
            'blogs' => $blog
        ]);

    }
}
