@extends('layout')
@section('title', 'Edit Enrollment: ' . $enrollment->enroll_no)
@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="card-title">Edit Enrollment: {{ $enrollment->enroll_no }}</h5>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ url('enrollment/' . $enrollment->id) }}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="enroll_no">Enrollment Number</label>
                <input type="text" class="form-control" id="enroll_no" name="enroll_no" value="{{ $enrollment->enroll_no }}" placeholder="Enter enrollment number">
                @error('enroll_no')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="batch_id">Batch</label>
                <select class="form-control" id="batch_id" name="batch_id">
                    @foreach($batches as $batch)
                        <option value="{{ $batch->id }}" {{ $enrollment->batch_id == $batch->id ? 'selected' : '' }}>{{ $batch->name }}</option>
                    @endforeach
                </select>
                @error('batch_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="student_id">Student</label>
                <select class="form-control" id="student_id" name="student_id">
                    @foreach($students as $student)
                        <option value="{{ $student->id }}" {{ $enrollment->student_id == $student->id ? 'selected' : '' }}>{{ $student->name }}</option>
                    @endforeach
                </select>
                @error('student_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="join_date">Join Date</label>
                <input type="date" class="form-control" id="join_date" name="join_date" value="{{ $enrollment->join_date }}">
                @error('join_date')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="fee">Fee</label>
                <input type="text" class="form-control" id="fee" name="fee" value="{{ $enrollment->fee }}" placeholder="Enter fee amount">
                @error('fee')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="mt-3 btn btn-primary">Save Changes</button>
        </form>
    </div>
</div>
@endsection
