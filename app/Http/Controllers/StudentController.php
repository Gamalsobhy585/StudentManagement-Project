<?php

namespace App\Http\Controllers;
use App\Models\Student;

use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return view('students.index')->with ('students' , $students);
    }
public function create(Request $request):View
{
 
return view('students.create');
}

public function store(Request $request):RedirectResponse 
{
    $validatedData = $request->validate([
        'name'=>'required|string',
        'address'=>'required|string|',
        'mobile'=>'required|string|digits:11',
        'age'=>'required|string|numeric|between:20,40'
    ]);
    $student = new Student();
    $student->name =$validatedData['name'];
    $student->address =$validatedData['address'];
    $student->mobile =$validatedData['mobile'];
    $student->age =$validatedData['age'];
    $student->save();
    if ($request->ajax()) {
        return response()->json(['success' => true, 'message' => 'Student added successfully.']);
    }

    return redirect('students')->with('flash_message', 'Student added successfully.');
}






public function show(string $id):View
{
    $students = Student::find($id);
    return view('students.show')->with ('students' , $students);
}










public function edit( String $id){
    $students = Student::find($id);

    return view('students.edit')->with ('students' , $students);
}








public function update( Request $request, String $id):RedirectResponse
{
    $student = Student::find($id);

    $validatedData = $request->validate([
        'name'=>'required|string',
        'address'=>'required|string|',
        'mobile'=>'required|string|digits:11',
        'age'=>'required|string|numeric|between:20,40'
    ]);
    $student->name =$validatedData['name'];
    $student->address =$validatedData['address'];
    $student->mobile =$validatedData['mobile'];
    $student->age =$validatedData['age'];
    $student->save();
    if ($request->ajax()) {
        return response()->json(['success' => true, 'message' => 'Student updated successfully.']);
    }

    return redirect('students')->with('flash_message', 'Student updated successfully.');
}










public function destroy( String $id):RedirectResponse
{
    Student::destroy($id);
    return redirect('students')->with('flash_message', 'Student deleted.');
}
}
