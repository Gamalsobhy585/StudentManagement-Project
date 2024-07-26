@extends('layout')
@section('title', 'Students List')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card mt-3">
                <div class="card-header bg-primary text-white">
                    <h2 class="text-center m-0">Students List</h2>
                </div>
                <div class="card-body">
                    <a class="btn btn-success btn-sm mb-3" href="{{ url('/students/create') }}" title="Add New Student">
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
                                @foreach ($students as $student)
                                <tr>
                                    <td class="text-center" >{{ $loop->iteration }}</td>
                                    <td class="text-center">{{ $student->name }}</td>
                                    <td class="text-center">{{ $student->address }}</td>
                                    <td class="text-center">{{ $student->mobile }}</td>
                                    <td class="text-center">
                                        <a href="{{ url('/student/'.$student->id) }}" class="btn btn-info btn-sm" title="View Student">View</a>
                                        <a href="{{ url('/student/'.$student->id.'/edit') }}" class="btn btn-primary btn-sm" title="Edit Student">Edit</a>
                                        <form action="{{ url('/student/'.$student->id) }}" method="POST" class="d-inline" onsubmit="confirmDelete(event)">
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
