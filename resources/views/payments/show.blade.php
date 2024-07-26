@extends('layout')
@section('title', 'Payment Details: ' . $payments->enrollment->enroll_no)
@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h2 class="text-center m-0">Payment Details</h2>
                </div>
                <div class="card-body">
                    <div class="d-flex mb-3">
                        <p class="fw-bold mb-0">ID:</p>
                        <p class="card-text">{{ $payments->id }}</p>
                    </div>
                    <div class="mb-3 d-flex">
                        <p class="fw-bold mb-0">Enrollment Number:</p>
                        <p class="card-text">{{ $payments->enrollment->enroll_no }}</p>
                    </div>
                    <div class="mb-3 d-flex">
                        <p class="fw-bold mb-0">Paid Date:</p>
                        <p class="card-text">{{ $payments->paid_date }}</p>
                    </div>
                    <div class="mb-3 d-flex">
                        <p class="fw-bold mb-0">Amount:</p>
                        <p class="card-text">{{ $payments->amount }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
