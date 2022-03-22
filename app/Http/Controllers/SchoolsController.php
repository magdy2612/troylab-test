<?php

namespace App\Http\Controllers;

use App\School;
use App\Http\Requests\SchoolRequest;

class SchoolsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resources = new School();
        $resources = $resources->get();

        return view('schools.index', compact('resources'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('schools.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SchoolRequest $request){
        $resource = new School;

        $data = $request->all();

        $resource->create($data);

        return redirect()->route('schools.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\School  $school
     * @return \Illuminate\Http\Response
     */
    public function show(School $school)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  School id $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $resource = School::findOrFail($id);

        return view('schools.edit', [
            'resource' => $resource,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  School id  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SchoolRequest $request, $id){
        $resource = School::findOrFail($id);

        $data = $request->all();

        $resource->update($data);

        return redirect()->route('schools.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  School id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $resource = School::findOrFail($id);
        $deleted = $resource->delete();

        return redirect()->route('schools.index');
    }
}
