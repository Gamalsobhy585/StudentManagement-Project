@extends('layout')
@section('title', 'Teachers List')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card mt-3">
                <div class="card-header bg-primary text-white">
                    <h2 class="text-center m-0">Teachers List</h2>
                </div>
                <div class="card-body">
                    <a class="btn btn-success btn-sm mb-3" href="{{ url('/teachers/create') }}" title="Add New Teacher">
                        <i class="fa fa-plus" aria-hidden="true"></i> Add New
                    </a>

                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th class="text-center" scope="col">#</th>
                                    <th class="text-center" scope="col">Name</th>
                                    <th class="text-center" scope="col">Address</th>
                                    <th class="text-center" scope="col">Mobile</th>
                                    <th class="text-center" scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($teachers as $teacher)
                                <tr>
                                    <td class="text-center" >{{ $loop->iteration }}</td>
                                    <td class="text-center">{{ $teacher->name }}</td>
                                    <td class="text-center">{{ $teacher->address }}</td>
                                    <td class="text-center">{{ $teacher->mobile }}</td>
                                    <td class="text-center">
                                        <a href="{{ url('/teacher/'.$teacher->id) }}" class="btn btn-info btn-sm" title="View Teacher">View</a>
                                        <a href="{{ url('/teacher/'.$teacher->id.'/edit') }}" class="btn btn-primary btn-sm" title="Edit Teacher">Edit</a>
                                        <form action="{{ url('/teacher/'.$teacher->id) }}" method="POST" class="d-inline" onsubmit="confirmDelete(event)">
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
