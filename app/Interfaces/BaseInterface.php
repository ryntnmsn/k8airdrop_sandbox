<?php

namespace App\Interfaces;

interface BaseInterface
{

    public function getQuery();

    public function factory();

    public function getDbQuery();

    public function first();

    public function all();

    public function count();

    // public function paginate($limit = 12);

    public function find($id, $withTrash = false);

    public function where($column, $id, $first = false);

    public function create(array $request);

    public function with($relation);

    public function update($id, array $request, $withTrash = false);

    public function delete($id);
}