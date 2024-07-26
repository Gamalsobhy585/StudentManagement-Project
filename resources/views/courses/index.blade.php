@extends('layout')
@section('title', 'Courses List')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card mt-3">
                <div class="card-header bg-primary text-white">
                    <h2 class="text-center m-0">Courses List</h2>
                </div>
                <div class="card-body">
                    <a class="btn btn-success btn-sm mb-3" href="{{ url('/courses/create') }}" title="Add New Course">
                        <i class="fa fa-plus" aria-hidden="true"></i> Add New
                    </a>

                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th class="text-center" scope="col">#</th>
                                    <th class="text-center" scope="col">Name</th>
                                    <th class="text-center" scope="col">Duration</th>
                                    {{-- <th class="text-center" scope="col">Teacher</th> --}}
                                    <th class="text-center" scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($courses as $course)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td class="text-center">{{ $course->name }}</td>
                                    <td class="text-center">{{ $course->duration }}</td>
                                    {{-- <td class="text-center">{{ $course->teacher_name }}</td> --}}
                                    <td class="text-center">
                                        <a href="{{ url('/course/'.$course->id) }}" class="btn btn-info btn-sm" title="View Course">View</a>
                                        <a href="{{ url('/course/'.$course->id.'/edit') }}" class="btn btn-primary btn-sm" title="Edit Course">Edit</a>
                                        <form action="{{ url('/course/'.$course->id) }}" method="POST" class="d-inline" onsubmit="confirmDelete(event)">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
