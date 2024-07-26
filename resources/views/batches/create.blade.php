@extends('layout')
@section('title', 'Create Batch')
@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="card-title mb-0">Create New Batch</h5>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ url('batches') }}">
            @csrf
            <div class="form-group">
                <label for="name">Batch Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter batch name">
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>



            
            <div class="form-group">
                <label for="course_id">Course</label>
                <select class="form-control" id="course_id" name="course_id">
                    @foreach($courses as $course)
                        <option value="{{ $course->id }}">{{ $course->name }}</option>
                    @endforeach
                </select>
                @error('course_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>



            <div class="form-group">
                <label for="start_date">Start Date</label>
                <textarea class="form-control" id="start_date" name="start_date" rows="3" placeholder="Enter batch start_date"></textarea>
                @error('start_date')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
           
            <button type="submit" class="btn mt-3 btn-primary">Create Batch</button>
        </form>
    </div>
</div>
@endsection
