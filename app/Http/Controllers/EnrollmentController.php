<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\Enrollment;
use App\Models\Student;
use App\Models\Batch;
use Illuminate\View\View;
class EnrollmentController extends Controller
{
    public function index(): View
    {
        $enrollments = Enrollment::all();
        return view('enrollments.index')->with ('enrollments' , $enrollments);
    }


    public function create(Request $request): View
    {
        $batches = Batch::all();
        $students = Student::all();

        return view('enrollments.create')->with('batches', $batches)->with('students',$students);
    }


public function store(Request $request):RedirectResponse
{
    $validatedData = $request->validate([
        'enroll_no' => 'required|string',
        'batch_id' => 'required|exists:batches,id',
        'student_id' => 'required|exists:students,id',
        'join_date' => 'required|date|date_format:Y-m-d',
        'fee' => 'required|string',

    ]);
    $enrollment = new Enrollment();
    $enrollment->enroll_no = $validatedData['enroll_no'];
    $enrollment->batch_id = $validatedData['batch_id'];
    $enrollment->student_id = $validatedData['student_id'];
    $enrollment->join_date = $validatedData['join_date'];
    $enrollment->fee = $validatedData['fee'];
    $enrollment->save();

    return redirect('enrollments')->with('flash_message', 'Enrollment added successfully.');
}




public function show(string $id): View
    {
        $enrollments = Enrollment::findOrFail($id);
        return view('enrollments.show')->with('enrollments', $enrollments);
    }



    public function edit($id): View
    {
        $enrollment = Enrollment::findOrFail($id);
        $batches = Batch::all();
        $students = Student::all();
        return view('enrollments.edit', compact('enrollment', 'batches', 'students'));
    }
    public function update(Request $request, string $id): RedirectResponse
    {
        $enrollment = Enrollment::findOrFail($id);

        $validatedData = $request->validate([
            'enroll_no' => 'required|string',
            'batch_id' => 'required|exists:batches,id',
            'student_id' => 'required|exists:students,id',
            'join_date' => 'required|date|date_format:Y-m-d',
            'fee' => 'required|string',
        ]);


     $enrollment->enroll_no = $validatedData['enroll_no'];
    $enrollment->batch_id = $validatedData['batch_id'];
    $enrollment->student_id = $validatedData['student_id'];
    $enrollment->join_date = $validatedData['join_date'];
    $enrollment->fee = $validatedData['fee'];
    $enrollment->save();

        return redirect('enrollments')->with('flash_message', 'Enrollment updated successfully.');
    }

    public function destroy(string $id): RedirectResponse
    {
        Enrollment::destroy($id);
        return redirect('enrollments')->with('flash_message', 'Enrollment deleted.');
    }
}
