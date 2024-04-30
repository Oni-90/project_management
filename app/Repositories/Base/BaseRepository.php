<?php

namespace App\Repositories\Base;

use App\Repositories\Interfaces\EloquentRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;



/**
 * Implements the Repository Interface.
 * @member of class BaseRepository.
 */
class BaseRepository implements EloquentRepositoryInterface
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * BaseRepository constructor.
     *
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * Create record.
     * @param array $attributes.
     * @return Model
     */
    public function create(array $attributes): Model
    {
        return $this->model->create($attributes);
    }

    /**
     * Find record for the given ID.
     * @param $id
     * @return Model
     */
    public function find($id): ?Model
    {
        return $this->model->find($id);
    }

    /**
     * Get all of the models from the database.
     *
     * @param  array|string  $columns
     * @return Collection
     */
    public function all(): Collection
    {
        return $this->model->all();
    }

    /**
     * Update the model in the database.
     *
     * @param array $attributes
     * @param int $id
     * @return bool
     */
    public function update(array $attributes, $id)
    {
        return $this->model::where('id', $id)->update($attributes);
    }

    /**
     * Delete the model from the database.
     * @return bool|null.
     */
    public function delete($id)
    {
        return $this->model->destroy($id);
    }
}
