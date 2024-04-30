<?php

namespace App\Repositories\Interfaces;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

/**
 * Interface EloquentRepositoryInterface
 * @package App\Repositories\Intefaces
 */
interface EloquentRepositoryInterface
{
  /**
   * Create record.
   * @param array attribute
   * @return Model
   */
  public function create(array $attributes): Model;

  /**
   * Find record for the given ID.
   * @param $id
   * @return Model

   */
  public function find($id): ?Model;


  /**
   * Get all records.
   * @return Collection
   */
  public function all(): Collection;

  /**
   * Update record for the given Data and ID.
   * @param $attributes
   * @param $id
   * @return updated record.
   */
  public function update(array $attributes, $id);

  /**
   * Delete the model from the database.
   * @param $id
   * @return bool|null.
   */
  public function delete($id);
}
