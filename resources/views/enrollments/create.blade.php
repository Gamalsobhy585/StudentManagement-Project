@extends('layout')
@section('title', 'Create Enrollment')
@section('content')
<div class="card">
    <div class="card-header">
        <div class="card-body">
            <form method="POST" action="{{ url('enrollments') }}">
                @csrf
                <input type="text" class="form-control my-3" id="enroll_no" name="enroll_no" placeholder="Enrollment number">
                @error('enroll_no')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <div class="form-group">
                    <label for="batch_id">Batch</label>
                    <select class="form-control" id="batch_id" name="batch_id">
                        @foreach($batches as $batch)
                            <option value="{{ $batch->id }}">{{ $batch->name }}</option>
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
                            <option value="{{ $student->id }}">{{ $student->name }}</option>
                        @endforeach
                    </select>
                    @error('student_id')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="join_date">Join Date</label>
                    <input type="date" class="form-control" id="join_date" name="join_date" placeholder="Enter enrollment join date">
                    @error('join_date')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="fee">Fee</label>
                    <input type="text" class="form-control" id="fee" name="fee" placeholder="Enter fee">
                    @error('fee')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <input type="submit" value="Save" class="btn btn-success my-3">
            </form>
        </div>
    </div>
</div>
@endsection
