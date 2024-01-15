<?php

namespace App\Repositories\Admin;
use App\Interfaces\Admin\LanguageRepositoryInterface;
use App\Models\Language;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Resources\Json\ResourceCollection;

class LanguageRepository implements LanguageRepositoryInterface
{
    /**
     * @return string
     *  Return the model
     */
    public function model(): string
    {
        return Language::class;
    }

    public function index(array $data)
    {
//        return $this->model()::collection($this->model()::tableSearch($data));
        return $this->model()::where(function ($q) use ($data) {
            foreach ($data as $key => $value) {
                if($value != null && $key != 'page') {
                    $q->orWhere($key, 'like', "%{$value}%");
                }
            }
        })->paginate(12);
    }

    public function store(array $data): Model
    {
        return $this->model()::create($data);
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