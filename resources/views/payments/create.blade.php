@extends('layout')
@section('title', 'Create Payment')
@section('content')
<div class="card">
    <div class="card-header">
        <h2>Create Payment</h2>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ url('payments') }}">
            @csrf

            <div class="form-group">
                <label for="enrollment_id">Enrollment</label>
                <select class="form-control" id="enrollment_id" name="enrollment_id">
                    @foreach($enrollments as $enrollment)
                        <option value="{{ $enrollment->id }}">{{ $enrollment->enroll_no }}</option>
                    @endforeach
                </select>
                @error('enrollment_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="paid_date">Paid Date</label>
                <input type="date" class="form-control" id="paid_date" name="paid_date" placeholder="Enter paid date">
                @error('paid_date')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="amount">Amount</label>
                <input type="text" class="form-control" id="amount" name="amount" placeholder="Amount of Payment">
                @error('amount')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <input type="submit" value="Save" class="btn btn-success my-3">
        </form>
    </div>
</div>
@endsection
