@extends('layout')
@section('title', 'Payments List')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card mt-3">
                <div class="card-header bg-primary text-white">
                    <h2 class="text-center m-0">Payments List</h2>
                </div>
                <div class="card-body">
                    <a class="btn btn-success btn-sm mb-3" href="{{ url('/payments/create') }}" title="Add New Payment">
                        <i class="fa fa-plus" aria-hidden="true"></i> Add New
                    </a>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th class="text-center" scope="col">#</th>
                                    <th class="text-center" scope="col">Enrollment Number</th>
                                    <th class="text-center" scope="col">Paid Date</th>
                                    <th class="text-center" scope="col">Amount</th>
                                    <th class="text-center" scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($payments as $payment)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td class="text-center">{{ $payment->enrollment->enroll_no }}</td>
                                    <td class="text-center">{{ $payment->paid_date }}</td>
                                    <td class="text-center">{{ $payment->amount }}</td>
                                    <td class="text-center">
                                        <a href="{{ url('/payment/'.$payment->id) }}" class="btn btn-info btn-sm" title="View Payment">View</a>
                                        <a href="{{ url('/payment/'.$payment->id.'/edit') }}" class="btn btn-primary btn-sm" title="Edit Payment">Edit</a>
                                        <form action="{{ url('/payment/'.$payment->id) }}" method="POST" class="d-inline" onsubmit="confirmDelete(event)">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                        <a href="{{ url('report/report1/'.$payment->id) }}" class="btn btn-success btn-sm" title="Print Payment">
                                            <i class="fa-solid fa-print"></i> Print
                                        </a>
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

@section('scripts')
<script>
    function confirmDelete(event) {
        if (!confirm('Are you sure you want to delete this payment?')) {
            event.preventDefault();
        }
    }
</script>
@endsection
