<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Validator;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $language = Language::all();
        $banners = Banner::with('language');
        return view('admin.banners.index', [
            'banners' => $banners->get(),
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
        return view('admin.banners.create', [
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
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3|max:100',
            'image' => 'required|image|mimes:jpg,png,jpeg|max:512|dimensions:min_width=1388,min_height=648,max_width=1388,max_height=648',
            'link' => 'required',
        ],
        [
            'title.required' => 'Title is required',
            'image.required' => 'Image is required.',
            'image.mimes'   => 'Image should JPG PNG of JPEG in format',
            'image.image'   => 'Image should JPG PNG of JPEG in format',
            'image.dimensions' => 'Image dimensions should be 1388x648 in pixels.',
            'image.max' => 'Image max filesize is 512KB only.',
            'link.required' => 'Link field is required'
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        } else {
            $newImageName = uniqid() . '.' . $request->image->extension();
            $request->image->move(public_path('/images/ads/'), $newImageName);
            Banner::create([
                'name' => $request->name,
                'link' => $request->link,
                'image' => $request->image = $newImageName,
            ]);
            return redirect()->back()->with('message', 'Banner created successfully.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function show(Banner $banner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Banner $banner)
    {   
        $language = Language::all();
        $banner = Banner::findOrfail($request->id);
        return view('admin.banners.edit', [
            'languages' => $language,
            'banners' => $banner
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Banner $banner, $id)
    {
        
            $banners = Banner::findOrfail($id);
            if($request->image == "") {
                $banners->update([
                    'name' => $request->name,
                    'language_id' => $request->language,
                    'link' => $request->link,
                    'status' => $request->status
                ]);
                return redirect()->back()->with('message', 'Banner updated successfully');
            } else {
                $validator = Validator::make($request->all(), [
                    'name' => 'required|min:3|max:100',
                    'image' => 'required|image|mimes:jpg,png,jpeg|max:512|dimensions:min_width=1388,min_height=648,max_width=1388,max_height=648',
                    'link' => 'required',
                ],
                [
                    'title.required' => 'Title is required',
                    'image.required' => 'Image is required.',
                    'image.mimes'   => 'Image should JPG PNG of JPEG in format',
                    'image.image'   => 'Image should JPG PNG of JPEG in format',
                    'image.dimensions' => 'Image dimensions should be 1388x648 in pixels.',
                    'image.max' => 'Image max filesize is 512KB only.',
                    'link.required' => 'Link field is required'
                ]);
        
                if($validator->fails()) {
                    return redirect()->back()->withErrors($validator->errors())->withInput();
                } else {
                    $newImageName = uniqid() . '.' . $request->image->extension();
                    $request->image->move(public_path('/images/ads'), $newImageName);
                    $banners->update([
                        'name' => $request->name,
                        'language_id' => $request->language,
                        'link' => $request->link,
                        'status' => $request->status,
                        'image' => $request->image = $newImageName,
                    ]);
                }
            }
            return redirect()->back()->with('message', 'Banner updated successfully');
    
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $banner = Banner::where('id', $request->id);
        $banner->delete();
        return redirect()->back()->with('message', 'Banner deleted successfully.');

    }
}
