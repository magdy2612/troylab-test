<?php

namespace App\Http\Controllers\Api;

use Validator;
use App\Student;
use App\Http\Requests\StudentRequest as request;
use App\Http\Controllers\Controller;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $resources = Student::get();
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
        $resource = new Student;

        $data = $request->all();

        $resource = $resource->create($data);

        return response()->json(['success' => true, 'data' => $data], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student){
        return response()->json(['success' => true, 'data' => $student], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student){
        if($student->update($request->all()))
            return response()->json(['success' => true, 'data' => $student], 202);

        return response()->json(['success' => false, 'message' => 'something went wrong'], 500);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student){
        if($student->delete())
            return response()->json(['success' => true], 200);
        
        return response()->json(['success' => false, 'message' => 'something went wrong'], 500);
    }
}
