<?php

namespace App\Repositories\API;

use \App\Interfaces\API\AdvertisementRepositoryInterface;
use App\Models\Advertisement;
use App\Http\Resources\AdvertisementResource;

class AdvertisementRepository implements AdvertisementRepositoryInterface
{
    /**
     * @return string
     *  Return the model
     */
    public function model(): string
    {
        return Advertisement::class;
    }

    public function index(array $data=[])
    {
        return $this->model()::with('language')->where(function ($q) use ($data) {
            foreach ($data as $key => $value) {
                if($value != null && $key != 'page') {
                    $q->orWhere($key, 'like', "%{$value}%");
                }
            }
        })
        ->orderBy('created_at','desc')
        ->paginate();
        return $data;
        return AdvertisementResource::collection($data);
    }
}
