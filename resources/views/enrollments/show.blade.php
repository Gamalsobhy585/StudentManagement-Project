@extends('layout')
@section('title', $enrollments->enroll_no)
@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h2 class="text-center m-0">Batch Details</h2>
                </div>
                <div class="card-body">
                    <div class="d-flex mb-3">
                        <p class="fw-bold mb-0">ID:</p>
                        <p class="card-text">{{ $enrollments->id }}</p>
                    </div>
                    <div class="mb-3 d-flex">
                        <p class="fw-bold mb-0">Batch:</p>
                        <p class="card-text">{{ $enrollments->batch_id }}</p>
                    </div>
                    <div class="mb-3 d-flex">
                        <p class="fw-bold mb-0">join Date:</p>
                        <p class="card-text">{{ $enrollments->join_date }}</p>
                    </div>
                   
                    <div class="mb-3 d-flex">
                        <p class="fw-bold mb-0">Fee:</p>
                        <p class="card-text">{{ $enrollments->fee }}</p>
                    </div>
                   
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
