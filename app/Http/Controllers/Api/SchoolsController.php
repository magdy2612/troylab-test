<?php

namespace App\Http\Controllers\Api;

use Validator;
use App\School;
use App\Http\Controllers\Controller;
use App\Http\Requests\SchoolRequest as request;

class SchoolsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $resources = School::get();
        return response()->json($resources, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $resource = new School;

        $data = $request->all();

        $resource = $resource->create($data);

        return response()->json(['success' => true, 'data' => $data], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\School  $school
     * @return \Illuminate\Http\Response
     */
    public function show(School $school){
        return response()->json(['success' => true, 'data' => $school], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\School  $school
     * @return \Illuminate\Http\Response
     */
    public function edit(School $school)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\School  $school
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, School $school){
        if($school->update($request->all()))
            return response()->json(['success' => true, 'data' => $school], 202);

        return response()->json(['success' => false, 'message' => 'something went wrong'], 500);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\School  $school
     * @return \Illuminate\Http\Response
     */
    public function destroy(School $school){
        if($school->delete())
            return response()->json(['success' => true], 200);

        return response()->json(['success' => false, 'message' => 'something went wrong'], 500);
    }
}
