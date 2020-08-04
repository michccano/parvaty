<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\HuddleUp;
use App\Http\Resources\HuddleUpResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HuddleUpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $ceos = HuddleUp::all();
        return response([ 'ceos' => HuddleUpResource::collection($ceos), 'message' => 'Retrieved successfully'], 200);
  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $data = $request->all();

        $validator = Validator::make($data, [
            'title' => 'required|max:255',
            'sub-title' => 'required|max:255'
            
        ]);

        if($validator->fails()){
            return response(['error' => $validator->errors(), 'Validation Error']);
        }

        $ceo = HuddleUp::create($data);

        return response([ 'huddleup' => new HuddleUpResource($ceo), 'message' => 'Created successfully'], 200);


    }


    /**
     * Display the specified resource.
     *
     * @param  \App\CEO  $ceo
     * @return \Illuminate\Http\Response
     */
    public function show(CEO $ceo)
    {
        return response([ 'ceo' => new CEOResource($ceo), 'message' => 'Retrieved successfully'], 200);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CEO  $ceo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HuddleUp $ceo)
    {

        $ceo->update($request->all());

        return response([ 'ceo' => new HuddleUpResource($ceo), 'message' => 'Retrieved successfully'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\CEO $ceo
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(HuddleUp $ceo)
    {
        $ceo->delete();

        return response(['message' => 'Deleted']);
    }
}
