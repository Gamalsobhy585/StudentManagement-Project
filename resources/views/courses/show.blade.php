@extends('layout')
@section('title', $courses->name)
@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h2 class="text-center m-0">Course Details</h2>
                </div>
                <div class="card-body">
                    <div class="d-flex mb-3">
                        <p class="fw-bold mb-0">ID:</p>
                        <p class="card-text">{{ $courses->id }}</p>
                    </div>
                    <div class="mb-3 d-flex">
                        <p class="fw-bold mb-0">Name:</p>
                        <p class="card-text">{{ $courses->name }}</p>
                    </div>
                    <div class="mb-3 d-flex">
                        <p class="fw-bold mb-0">Duration:</p>
                        <p class="card-text">{{ $courses->duration }}</p>
                    </div>
                    <div class="mb-3 d-flex">
                        <p class="fw-bold mb-0">Syllabus:</p>
                        <p class="card-text">{{ $courses->syllabus }}</p>
                    </div>
                    {{-- <div class="mb-3 d-flex">
                        <p class="fw-bold mb-0">Teacher:</p>
                        <p class="card-text">{{ $courses->teacher_name }}</p>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
