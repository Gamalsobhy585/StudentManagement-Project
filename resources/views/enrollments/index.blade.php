@extends('layout')
@section('title', 'Enrollments List')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card mt-3">
                <div class="card-header bg-primary text-white">
                    <h2 class="text-center m-0">Enrollments List</h2>
                </div>
                <div class="card-body">
                    <a class="btn btn-success btn-sm mb-3" href="{{ url('/enrollments/create') }}" title="Add New Enrollment">
                        <i class="fa fa-plus" aria-hidden="true"></i> Add New
                    </a>

                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th class="text-center" scope="col">#</th>
                                    <th class="text-center" scope="col">Enrollment Number</th>
                                    <th class="text-center" scope="col">Batch Name</th>
                                    <th class="text-center" scope="col">Student Name</th>
                                    <th class="text-center" scope="col">Join Date</th>
                                    <th class="text-center" scope="col">Fee</th>
                                    <th class="text-center" scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($enrollments as $enrollment)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td class="text-center">{{ $enrollment->enroll_no }}</td>
                                    <td class="text-center">{{ $enrollment->batch->name }}</td>
                                    <td class="text-center">{{ $enrollment->student->name }}</td>
                                    <td class="text-center">{{ $enrollment->join_date }}</td>
                                    <td class="text-center">{{ $enrollment->fee }}</td>
                                    <td class="text-center">
                                        <a href="{{ url('/enrollment/'.$enrollment->id) }}" class="btn btn-info btn-sm" title="View Enrollment">View</a>
                                        <a href="{{ url('/enrollment/'.$enrollment->id.'/edit') }}" class="btn btn-primary btn-sm" title="Edit Enrollment">Edit</a>
                                        <form action="{{ url('/enrollment/'.$enrollment->id) }}" method="POST" class="d-inline" onsubmit="confirmDelete(event)">
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
