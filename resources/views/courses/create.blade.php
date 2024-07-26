@extends('layout')
@section('title', 'Create Course')
@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="card-title mb-0">Create New Course</h5>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ url('courses') }}">
            @csrf
            <div class="form-group">
                <label for="name">Course Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter course name">
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="duration">Duration</label>
                <input type="text" class="form-control" id="duration" name="duration" placeholder="Enter course duration">
                @error('duration')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="syllabus">Syllabus</label>
                <textarea class="form-control" id="syllabus" name="syllabus" rows="3" placeholder="Enter course syllabus"></textarea>
                @error('syllabus')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="teacher_id">Teacher</label>
                <select class="form-control" id="teacher_id" name="teacher_id">
                    @foreach($teachers as $teacher)
                        <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                    @endforeach
                </select>
                @error('teacher_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn mt-3 btn-primary">Create Course</button>
        </form>
    </div>
</div>
@endsection
