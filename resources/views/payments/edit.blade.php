@extends('layout')
@section('title', 'Edit Payment: ' . $payment->enrollment->enroll_no)
@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="card-title">Edit Payment: {{ $payment->enrollment->enroll_no }}</h5>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ url('payment/' . $payment->id) }}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="enrollment_id">Enrollment</label>
                <select class="form-control" id="enrollment_id" name="enrollment_id">
                    @foreach($enrollments as $enrollment)
                        <option value="{{ $enrollment->id }}" {{ $payment->enrollment_id == $enrollment->id ? 'selected' : '' }}>{{ $enrollment->enroll_no }}</option>
                    @endforeach
                </select>
                @error('enrollment_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="paid_date">Paid Date</label>
                <input type="date" class="form-control" id="paid_date" name="paid_date" value="{{ $payment->paid_date }}">
                @error('paid_date')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="amount">Amount</label>
                <input type="number" class="form-control" id="amount" name="amount" value="{{ $payment->amount }}" placeholder="Enter payment amount">
                @error('amount')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="mt-3 btn btn-primary">Save Changes</button>
        </form>
    </div>
</div>
@endsection
