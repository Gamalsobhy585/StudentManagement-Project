<?php

namespace App\Http\Controllers;
use App\Models\Teacher;

use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Http\Request;


class TeacherController extends Controller
{
    public function index()
    {
        $teachers = Teacher::all();
        return view('teachers.index')->with ('teachers' , $teachers);
    }
public function create(Request $request):View
{
 
return view('teachers.create');
}

public function store(Request $request):RedirectResponse 
{
    $validatedData = $request->validate([
        'name'=>'required|string',
        'address'=>'required|string|',
        'mobile'=>'required|string|digits:11',
       
    ]);
    $teacher = new Teacher();
    $teacher->name =$validatedData['name'];
    $teacher->address =$validatedData['address'];
    $teacher->mobile =$validatedData['mobile'];
    $teacher->save();
    if ($request->ajax()) {
        return response()->json(['success' => true, 'message' => 'Teacher added successfully.']);
    }

    return redirect('teachers')->with('flash_message', 'Teacher added successfully.');
}
public function show(string $id):View
{
    $teachers = Teacher::find($id);
    return view('teachers.show')->with ('teachers' , $teachers);
}




public function edit( String $id){
    $teachers = Teacher::find($id);

    return view('teachers.edit')->with ('teachers' , $teachers);
}

public function update( Request $request, String $id):RedirectResponse
{
    $teacher = Teacher::find($id);

    $validatedData = $request->validate([
        'name'=>'required|string',
        'address'=>'required|string|',
        'mobile'=>'required|string|digits:11',
       
    ]);
    $teacher->name =$validatedData['name'];
    $teacher->address =$validatedData['address'];
    $teacher->mobile =$validatedData['mobile'];
   
    $teacher->save();
    if ($request->ajax()) {
        return response()->json(['success' => true, 'message' => 'Teacher updated successfully.']);
    }

    return redirect('teachers')->with('flash_message', 'Teacher updated successfully.');
}
public function destroy( String $id):RedirectResponse
{
    Teacher::destroy($id);
    return redirect('teachers')->with('flash_message', 'Teacher deleted.');
}
}
