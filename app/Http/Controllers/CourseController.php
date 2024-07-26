<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class CourseController extends Controller
{
    public function index(): View
    {
        $courses = Course::all();
        return view('courses.index', compact('courses'));
    }
public function create(Request $request):View
    {
        $teachers = Teacher::all();
    
        return view('courses.create')->with ('teachers' , $teachers);
    }

    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'duration' => 'required|string',
            'syllabus' => 'required|string',
            'teacher_id' => 'required|exists:teachers,id', 
        ]);

        $course = new Course();
        $course->name = $validatedData['name'];
        $course->duration = $validatedData['duration'];
        $course->syllabus = $validatedData['syllabus'];
        $course->teacher_id = $validatedData['teacher_id'];
        $course->save();

        return redirect('courses')->with('flash_message', 'Course added successfully.');
    }





    
    public function show(string $id): View
    {
        $courses = Course::find($id);
        return view('courses.show')->with ('courses' , $courses);
    }









    public function edit(string $id): View
    {
        $courses = Course::find($id);
        $teachers = Teacher::all();
        return view('courses.edit')->with ('courses' , $courses)->with ('teachers' , $teachers);
    }








    public function update(Request $request, string $id): RedirectResponse
    {
        $course = Course::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required|string',
            'duration' => 'required|string',
            'syllabus' => 'required|string',
            'teacher_id' => 'required|exists:teachers,id', 
            // 'teacher_name' => 'required|string',        
         ]);

        $course->name = $validatedData['name'];
        $course->duration = $validatedData['duration'];
        $course->syllabus = $validatedData['syllabus'];
        $course->teacher_id = $validatedData['teacher_id'];
        // $course->teacher_name = $validatedData['teacher_name'];
        $course->save();

        return redirect('courses')->with('flash_message', 'Course updated successfully.');
    }

    public function destroy(string $id): RedirectResponse
    {
        Course::destroy($id);
        return redirect('courses')->with('flash_message', 'Course deleted.');
    }
}
