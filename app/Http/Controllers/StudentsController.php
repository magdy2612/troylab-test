<?php

namespace App\Http\Controllers;

use App\School;
use App\Student;
use App\Http\Requests\StudentRequest;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $resources = new Student();
        $resources = $resources->get();

        return view('students.index', compact('resources'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $schools = School::get();
        return view('students.create', ['schools' => $schools]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentRequest $request){
        $resource = new Student;

        $data = $request->all();
        $resource->create($data);

        return redirect()->route('students.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  Student id $id
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Student id $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $resource = School::findOrFail($id);
        $schools = School::get();
        return view('students.edit', [
            'resource' => $resource,
            'schools' => $schools,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Student id $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student){
        $resource = Student::findOrFail($id);

        $data = $request->all();

        $resource->update($data);

        return redirect()->route('students.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Student id $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $resource = Student::findOrFail($id);
        $deleted = $resource->delete();

        return redirect()->route('students.index');
    }
}
