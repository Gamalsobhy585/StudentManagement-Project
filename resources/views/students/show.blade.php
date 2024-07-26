@extends('layout')
@section('title', $students->name)
@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h2 class="text-center m-0">Student Details</h2>
                </div>
                <div class="card-body">
                    <div class=" d-flex mb-3">
                        <p class="fw-bold mb-0">ID:</p>
                        <p class="card-text">{{ $students->id }}</p>
                    </div>
                    <div class="mb-3  d-flex">
                        <p class="fw-bold mb-0">Name:</p>
                        <p class="card-text">{{ $students->name }}</p>
                    </div>
                    <div class="mb-3  d-flex">
                        <p class="fw-bold mb-0">Address:</p>
                        <p class="card-text">{{ $students->address }}</p>
                    </div>
                    <div class="mb-3  d-flex">
                        <p class="fw-bold mb-0">Mobile:</p>
                        <p class="card-text">{{ $students->mobile }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
