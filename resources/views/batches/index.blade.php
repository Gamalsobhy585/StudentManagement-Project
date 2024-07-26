@extends('layout')
@section('title', 'Batches List')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card mt-3">
                <div class="card-header bg-primary text-white">
                    <h2 class="text-center m-0">Batches List</h2>
                </div>
                <div class="card-body">
                    <a class="btn btn-success btn-sm mb-3" href="{{ url('/batches/create') }}" title="Add New Batch">
                        <i class="fa fa-plus" aria-hidden="true"></i> Add New
                    </a>

                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th class="text-center" scope="col">#</th>
                                    <th class="text-center" scope="col">Name</th>
                                    <th class="text-center" scope="col">Course</th>
                                    <th class="text-center" scope="col">Start Date</th>
                                    <th class="text-center" scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($batches as $batch)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td class="text-center">{{ $batch->name }}</td>
                                    <td class="text-center">{{ $batch->course_id }}</td>
                                    <td class="text-center">{{ $batch->start_date }}</td>
                                    <td class="text-center">
                                        <a href="{{ url('/batch/'.$batch->id) }}" class="btn btn-info btn-sm" title="View Batch">View</a>
                                        <a href="{{ url('/batch/'.$batch->id.'/edit') }}" class="btn btn-primary btn-sm" title="Edit Batch">Edit</a>
                                        <form action="{{ url('/batch/'.$batch->id) }}" method="POST" class="d-inline" onsubmit="confirmDelete(event)">
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
