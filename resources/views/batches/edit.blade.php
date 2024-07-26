@extends('layout')
@section('title', 'Edit ' . $batches->name)
@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="card-title">Edit Batch: {{ $batches->name }}</h5>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ url('batch/' . $batches->id) }}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Batch Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $batches->name }}" placeholder="Enter batch name">
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="course_id">Course</label>
                <select class="form-control" id="course_id" name="course_id">
                    @foreach($courses as $course)
                        <option value="{{ $course->id }}" {{ $batches->course_id == $course->id ? 'selected' : '' }}>{{ $course->name }}</option>
                    @endforeach
                </select>
                @error('course_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="start_date">Start Date</label>
                <textarea class="form-control" id="start_date" name="start_date" rows="3" placeholder="Enter batch start_date">{{ $batches->start_date }}</textarea>
                @error('start_date')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

           


            <button type="submit" class="mt-3 btn btn-primary">Save Changes</button>
        </form>
    </div>
</div>
@endsection
