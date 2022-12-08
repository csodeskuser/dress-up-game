<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClothModel;
use App\Models\DressOperationModel;
use Illuminate\Support\Facades\Validator;

class ClothController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
        	'name' => 'required|string',
            'file' => 'required|mimes:png,jpg,jpeg|max:2048',
        ]);

        $fileName = time().'-'.random_int(100000, 999999).'.'.$request->file->extension();
        $filePath = 'uploads/'.$fileName;
        $request->file->move(public_path('uploads'), $fileName);   

        ClothModel::create([
        	'name' => $data['name'],
        	'image' => $filePath
        ]);
    	return response()->json([
    		'message' => 'cloth added',
    		'image' => $filePath
    	]);
    }

    public function dressUp(Request $request)
    {
        $data = $request->validate([
        	'user_id' => 'required|integer',
            'cloth_id' => 'required|integer',
        ]);

        $isExists = $this->isDressExists($data['user_id'], $data['cloth_id']);

        if ($isExists) {
            return response()->json([
                'message' => 'Already Exists'
            ]);
        }

        $cloth =ClothModel::where([
        	'id' => $data['cloth_id'],
	    ])
	    ->first();

	    if(empty($cloth))
	    {
	    	return response()->json([
	    		'message' => 'Cloth Not Exists',
	    	]);    		    	
	    }

        DressOperationModel::create([
	        'user_id' => $data['user_id'],
	        'cloth_id' => $data['cloth_id']
        ]);

    	return response()->json([
    		'image' => config('app.stored_file_path').''.$cloth->image,
    	]);    	
    }

    public function dressRemove(Request $request)
    {
        $data = $request->validate([
        	'user_id' => 'required|integer',
            'cloth_id' => 'required|integer',
        ]);

        $isExists = $this->isDressExists($data['user_id'], $data['cloth_id']);

        if (!$isExists) {
            return response()->json([
                'message' => 'Does not Exists'
            ]);
        }

        DressOperationModel::query()
        	->where([
	        	'user_id' => $data['user_id'],
	        	'cloth_id' => $data['cloth_id']
       		])->delete();

    	return response()->json([
    		'message' => 'Dress removed',
    	]);
    }

    protected function isDressExists($user_id, $cloth_id)
    {
        $isExists = DressOperationModel::query()
            ->where([
	        	'user_id' => $user_id,
	        	'cloth_id' => $cloth_id
            ])
            ->exists();

        return $isExists;
    }
}
