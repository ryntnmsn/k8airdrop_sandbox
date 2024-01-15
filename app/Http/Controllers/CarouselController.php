<?php

namespace App\Http\Controllers;

use App\Models\Carousel;
use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Validator;

class CarouselController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $language = Language::all();
        $carousels = Carousel::with('language');
        return view('admin.carousels.index', [
            'carousels' => $carousels->get(),
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
        return view('admin.carousels.create', [
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
            'title' => 'required|min:3|max:100',
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
            carousel::create([
                'title' => $request->title,
                'link' => $request->link,
                'language_id' => $request->language,
                'status' => $request->status,
                'image' => $request->image = $newImageName,
            ]);
            return redirect('admin/carousels')->with('message', 'carousel created successfully.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\carousel  $carousel
     * @return \Illuminate\Http\Response
     */
    public function show(carousel $carousel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\carousel  $carousel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, carousel $carousel)
    {   
        $language = Language::all();
        $carousel = carousel::findOrfail($request->id);
        return view('admin.carousels.edit', [
            'languages' => $language,
            'carousels' => $carousel
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\carousel  $carousel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, carousel $carousel, $id)
    {
        
            $carousels = carousel::findOrfail($id);
            if($request->image == "") {
                $carousels->update([
                    'title' => $request->title,
                    'language_id' => $request->language,
                    'link' => $request->link,
                    'status' => $request->status
                ]);
                return redirect()->back()->with('message', 'Carousel updated successfully');
            } else {
                $validator = Validator::make($request->all(), [
                    'title' => 'required|min:3|max:100',
                    'image' => 'required|image|mimes:jpg,png,jpeg|max:512|dimensions:min_width=1388,min_height=648,max_width=1388,max_height=648',
                    'link' => 'required',
                ],
                [
                    'title.required' => 'Title is required',
                    'image.required' => 'Image is required.',
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
                    $carousels->update([
                        'title' => $request->title,
                        'language_id' => $request->language,
                        'link' => $request->link,
                        'status' => $request->status,
                        'image' => $request->image = $newImageName,
                    ]);
                }
            }
            return redirect()->back()->with('message', 'Carousel updated successfully');
    
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Carousel  $carousel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $carousel = Carousel::where('id', $request->id);
        $carousel->delete();
        return redirect()->back()->with('message', 'Carousel deleted successfully.');

    }
}
