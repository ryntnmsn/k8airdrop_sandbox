<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Interfaces\API\AdvertisementRepositoryInterface;

class AdvertisementController extends Controller
{
    private AdvertisementRepositoryInterface $ad;

    /**
     * @param AdvertisementRepositoryInterface $ad
     */
    public function __construct(AdvertisementRepositoryInterface $ad)
    {
        $this->ad = $ad;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return array
     */
    public function index(Request $request)
    {
        return $this->ad->index($request->all());
    }
}
