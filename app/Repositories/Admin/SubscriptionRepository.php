<?php

namespace App\Repositories\Admin;

use App\Interfaces\Admin\SubscriptionRepositoryInterface;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use App\Models\Subscription;

class SubscriptionRepository extends BaseRepository implements SubscriptionRepositoryInterface
{
    /**
     * @return string
     *  Return the model
     */
    public function __construct(Subscription $model)
    {
        $this->model = $model;
    }

    public function index(array $data=[])
    {
        // TODO: Implement index() method.
        return $this->paginate();
    }

    public function store(array $data): mixed
    {
        return $this->create($data);
        // TODO: Implement store() method.
    }

    public function show(int $id): Model
    {
        // TODO: Implement show() method.
    }

    public function update(array $data, int $id): bool
    {
        // TODO: Implement update() method.
    }

    public function destroy(int $id): bool
    {
        // TODO: Implement destroy() method.
    }
}