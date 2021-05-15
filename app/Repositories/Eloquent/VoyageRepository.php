<?php

namespace App\Repository\Eloquent;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\Model\Voyage;
use App\Repository\VoyageRepositoryInterface;

class VoyageRepository extends BaseRepository implements VoyageRepositoryInterface {

    /**
     * VoyageRepository constructor.
     *
     * @param Voyage $model
     */
    public function __construct(Voyage $model) {
        parent::__construct($model);
    }

    /**
    * @param Request $request
    *
    * @return Voyage
    */
    public function create(Request $request): Model
    {
        $attributes = $request->all(); 
        return $this->model->create($attributes);
    }

    /**
    * @param Model $voyage
    * @param Request $request
    *
    * @return Voyage
    */
    public function update(Model $voyage, Request $request): Model
    {
        $attributes = $request->all();        
        $voyage->update($attributes);        
        return $voyage;
    }
   
    public function delete($id){
        $voyage = $this->model->find($id);           
        return $voyage->delete();
    }
}
