<?php

namespace App\Repository;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;

/**
* Interface EloquentRepositoryInterface
* @package App\Repositories
*/
interface EloquentRepositoryInterface
{
   /**
    * @param Request $request
    * @return Model
    */
   public function create(Request $request): Model;
   
   /**
    * @param Model $model
    * @param Request $request
    * @return Model
    */
   public function update(Model $model, Request $request): Model;
   
   /**
    * @return Collection
    */
   public function all(): ?Collection;
   
   /**
    * @param $id
    * @return Model
    */
   public function find($id): ?Model;
}