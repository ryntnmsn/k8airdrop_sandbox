<?php

namespace App\Repositories\Admin;


use App\Interfaces\Admin\AdvertisementRepositoryInterface;
use App\Models\Advertisement;
use Illuminate\Database\Eloquent\Model;

class AdvertisementRepository implements AdvertisementRepositoryInterface {

    /**
     * @return string
     *  Return the model
     */
    public function model(): string
    {
        return Advertisement::class;
    }

    public function index(array $data)
    {
        return $this->model()::where(function ($q) use ($data) {
            foreach ($data as $key => $value) {
                if($value != null && $key != 'page') {
                    $q->orWhere($key, 'like', "%{$value}%");
                }
            }
        })->with('language')->paginate();
    }

    public function store(array $data): Model
    {
        return $this->model()::updateOrCreate(['language_id' => $data['language_id'], 'layout' => $data['layout']],$data);
    }

    public function show(int $id): Model
    {
        return $this->model()::findOrfail($id);
    }

    public function update(array $data, int $id): bool
    {
        $user = $this->model()::find($id);
        return  $user->update($data);;
        // TODO: Implement update() method.
    }

    public function destroy(int $id): bool
    {
        return $this->model()::destroy($id);
        // TODO: Implement destroy() method.
    }
}