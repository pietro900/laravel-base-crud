<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all();
        // dd('students.index', compact('students'));
        return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $request->validate([
            'first_name' => 'required|max:50',
            'last_name' => 'required|max:50',
            'student_id_nr' => 'required|max:10|unique:students,student_id_nr',
            'email' => 'email|nullable|max:255|unique:students,email'
        ]);
            $newData = $request->all();
            $newStudent = new Student();
            $newStudent->fill($newData);
            $newStudent->save();
        return redirect()->route('students.show', ['student' => $newStudent->id]);
     }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    public function show(Student $student)//injection
    {
        // $student = Student::find($id);
        return view('students.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student) {
        $request->validate([
        'first_name' => 'required|max:50',
        'last_name' => 'required|max:50',
        'student_id_nr' => 'required|max:10|unique:students,student_id_nr,'.$student->id,
        'email' => 'email|nullable|max:255|unique:students,email,'.$student->email
        ]);
       $data = $request->all();
       $student->update($data);
       return redirect()->route('students.show', ['student' => $student]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
