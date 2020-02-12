<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\ClubResource as ClubResource;
use App\Club;

class ClubController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $c=Club::paginate(10);
        return ClubResource::collection($d);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $club=new Club();
        $club->name=$request->input('name');
        $club->logo=$request->input('logo');
        $club->creation_date=$request->input('creation_date');
        $club->email=$request->input('email');
        $club->description=$request->input('description');
        $club->save();
        return "inserted";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $club=Club::find($id);
        return $club;
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $club=Club::find($id);
        $club->name=$request->input('name');
        $club->logo=$request->input('logo');
        $club->creation_date=$request->input('creation_date');
        $club->email=$request->input('email');
        $club->description=$request->input('description');
        $club->save();
        return "updated";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
}
