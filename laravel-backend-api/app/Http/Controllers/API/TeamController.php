<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\TeamModel;
use App\droplet;
use App\Http\Resources\TeamResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $ceos =TeamModel::all();
        return response([ 'team' => TeamResource::collection($ceos), 'message' => 'Retrieved successfully'], 200);
  
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
            'name' => 'required|max:255',
            'description' => 'required|max:255'
            
        ]);

        if($validator->fails()){
            return response(['error' => $validator->errors(), 'Validation Error']);
        }

        $ceo = TeamModel::create($data);

        return response([ 'team' => new TeamResource($ceo), 'message' => 'Created successfully'], 200);


    }

    /**
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TeamModel  $team
     * @return \Illuminate\Http\Response
     */

    public function getTeams($userid){

       $flight = droplet::orderBy('id','DESC')->get();

        //$green_foods = $flight->where('id',1); 
   
             return response([ 'team' => $flight, 'message' => 'Retrieved successfully'], 200);
    }


    public function init_droplet(Request $r){
         $data = $r->all();

        $validator = Validator::make($data, [
            'droplet_id' => 'required|max:255',
            'email' => 'required|max:255',
            'wpinfo' =>'required|max:255'
            
        ]);

        if($validator->fails()){
            return response(['error' => $validator->errors(), 'Validation Error']);
        }

        $ceo = droplet::create($data);

        return response([ 'team' => $r->input('title'), 'message' => 'Retrieved successfully'], 200);
    }


   

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Team $team)
    {
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $team)
    {
        //
    }
}
