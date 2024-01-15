<?php

namespace App\Repositories;
use Illuminate\Database\Eloquent\Model;

class BaseRepository
{
    protected $model;


    public function getQuery()
    {
        return $this->model->query();
    }

    public function factory(): \Illuminate\Database\Eloquent\Factories\Factory
    {
        return $this->model::factory();
    }

    public function getDbQuery()
    {
        return DB::connection($this->model->getConnectionName())->table($this->model->getTable());
    }

    public function first()
    {
        return $this->getQuery()->first();
    }

    public function all()
    {
        return $this->getQuery()->get();
    }

    public function count()
    {
        return $this->getQuery()->count();
    }

    public function paginate($limit = 1000,array $orderBy = [])
    {
        $query = $this->getQuery();
        
        if (empty($orderBy)) {
            $orderBy = ['created_at', 'desc'];
        }
        $query = $query->orderBy($orderBy[0],$orderBy[1]);
        return $query->paginate($limit);
    }

    public function find($id, $withTrash = false)
    {
        if ($withTrash) {
            return $this->getQuery()->withTrashed()->find($id);
        }

        return $this->getQuery()->find($id);
    }

    public function where($column, $id, $first = false)
    {
        $query = $this->getQuery()->where($column, $id);

        return ($first) ? $query->first() : $query->get();
    }

    public function create(array $request): mixed
    {
        return $this->getQuery()->create($request);
    }

    public function with($relation)
    {
        return $this->getQuery()->with($relation);
    }

    public function update(array $request, int $id)
    {
//        if ($withTrash) {
//            $app = $this->getQuery()->withTrashed()->find($id);
//        } else {
//
//        }
        $app = $this->getQuery()->find($id);
        $app->update($request);

        return $app;
    }

    public function delete($id)
    {
        return $this->getQuery()->find($id)->delete();
    }
}