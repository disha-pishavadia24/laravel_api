<?php
namespace App\Services;
use App\Repository\Eloquent\VoyageRepository;
use App\Repository\VoyageRepositoryInterface;
use App\Models\Vessel;
use Exception;
use Illuminate\Support\Facades\Validator;

class VoyageService{
    
    private $voyageRepository;

    public function __construct(VoyageRepositoryInterface $voyageRepository) {
        $this->voyageRepository = $voyageRepository;
    }

    public function saveData($data)
    {
        //validate the inputs
        $validator = Validator::make($data, [
            'vessel_id' => 'required|exists:vessels,id',
            'start' => 'date',
            'end' => 'date',
            'revenues'=>'required|numeric', 
            'expenses'=>'required|numeric',
        ]);

        if ($validator->fails()) {
            return response(['error' => $validator->errors(), 'Validation Error']);
        }

        $vessselName = Vessel::where('id', $data['vessel_id'])->first()->name;
        $data['code'] = $vessselName.'-'.$data['start'];
        $data['status'] = 'pending';

        $voyage = $this->voyageRepository->create($data);

        return $voyage;
        
    }
}
?>