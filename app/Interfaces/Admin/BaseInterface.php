<?php

namespace App\Interfaces\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Resources\Json\ResourceCollection;

interface BaseInterface
{
    public function index(array $data);

    public function store(array $data): mixed;

    public function show(int $id): Model;

    public function update(array $data, int $id): bool;

    public function destroy(int $id): bool;
}