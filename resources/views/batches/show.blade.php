@extends('layout')
@section('title', $batches->name)
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
                        <p class="card-text">{{ $batches->id }}</p>
                    </div>
                    <div class="mb-3 d-flex">
                        <p class="fw-bold mb-0">Name:</p>
                        <p class="card-text">{{ $batches->course_id }}</p>
                    </div>
                    <div class="mb-3 d-flex">
                        <p class="fw-bold mb-0">Duration:</p>
                        <p class="card-text">{{ $batches->start_date }}</p>
                    </div>
                   
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
