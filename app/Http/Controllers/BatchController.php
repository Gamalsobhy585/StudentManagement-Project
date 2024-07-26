<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class BatchController extends Controller
{
    public function index(): View
    {
        $batches = Batch::all();
        return view('batches.index')->with('batches', $batches);
    }

    public function create(Request $request): View
    {
        $courses = Course::all();
        return view('batches.create')->with('courses', $courses);
    }

    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'start_date' => 'required|date|date_format:Y-m-d',
            'course_id' => 'required|exists:courses,id', 
        ]);

        $batch = new Batch();
        $batch->name = $validatedData['name'];
        $batch->start_date = $validatedData['start_date'];
        $batch->course_id = $validatedData['course_id'];
        $batch->save();

        return redirect('batches')->with('flash_message', 'Batch added successfully.');
    }

    public function show(string $id): View
    {
        $batches = Batch::findOrFail($id);
        return view('batches.show')->with('batches', $batches);
    }

    public function edit(string $id): View
    {
        $batches = Batch::findOrFail($id);
        $courses = Course::all();
        return view('batches.edit')->with('batches', $batches)->with('courses', $courses);
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        $batch = Batch::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required|string',
            'start_date' => 'required|date_format:Y-m-d',
            'course_id' => 'required|exists:courses,id', 
        ]);

        $batch->name = $validatedData['name'];
        $batch->start_date = $validatedData['start_date'];
        $batch->course_id = $validatedData['course_id'];
        $batch->save();

        return redirect('batches')->with('flash_message', 'Batch updated successfully.');
    }

    public function destroy(string $id): RedirectResponse
    {
        Batch::destroy($id);
        return redirect('batches')->with('flash_message', 'Batch deleted.');
    }
}
