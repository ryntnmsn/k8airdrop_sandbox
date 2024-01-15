<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\LanguageRequest;
use Illuminate\Http\Request;
use App\Services\AdvertisementService;
use App\Interfaces\Admin\LanguageRepositoryInterface;
use App\Http\Requests\Admin\AdvertisementRequest;

class AdvertisementController extends Controller
{
    /**
     * @param AdvertisementService $advertisementService
     */
    public function __construct(AdvertisementService $advertisementService, LanguageRepositoryInterface $languageRepository,)
    {
        $this->advertisementService = $advertisementService;
        $this->languageRepository = $languageRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $ads = $this->advertisementService ->index($request);
        return view('admin.advertisement.index', [
            'ads' => $ads,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $languages = $this->languageRepository ->index([]);
        return view('admin.advertisement.create', [
            'languages' => $languages,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdvertisementRequest $request)
    {
        $language = $this->advertisementService->store($request->except('_method','_token'));
        return redirect(route('admin.ads.index'))->with('message', 'New Promo added successfully.');

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
        $languages = $this->languageRepository ->index([]);
        $ads = $this->advertisementService->show($id);
        return view('admin.advertisement.edit', [
            'ad'         => $ads,
            'languages' => $languages
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdvertisementRequest $request, $id)
    {
        $language = $this->advertisementService->update($request->except('_method'),$id);
        if($language) {
            return redirect(route('admin.ads.index'))->with('message', 'New Promo added successfully.');
        } else {
            return redirect(route('admin.ads.index'))->with('message', 'Please Try again');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $language = $this->advertisementService->destroy($id);
        if($language) {
            return redirect(route('admin.ads.index'))->with('message', 'New Promo added successfully.');
        } else {
            return redirect(route('admin.ads.index'))->with('message', 'Please Try again');
        }
    }
}
