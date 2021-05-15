<?php   

namespace App\Repository\Eloquent;   

use App\Repository\EloquentRepositoryInterface; 
use Illuminate\Database\Eloquent\Model;   
use Illuminate\Support\Collection;
use Illuminate\Http\Request;

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
    * @param Request $request
    *
    * @return Model
    */
    public function create(Request $request): Model
    {
        $attributes = $request->all();
        
        return $this->model->create($attributes);
    }
    
    /**
    * @param Model $model
    * @param Request $request
    *
    * @return Model
    */
    public function update(Model $model, Request $request): Model
    {
        $attributes = $request->all();
        $model->update($attributes);
        
        return $model;
    }
 
    /**
     * @return Collection
     */
    public function all(): Collection 
    {
        return $this->model->all();
    }
    
    /**
    * @param $id
    * @return Model
    */
    public function find($id): ?Model
    {
        return $this->model->find($id);
    }
}