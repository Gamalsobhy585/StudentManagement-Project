@extends('layout')
@section('title', 'Create Teacher')
@section('content')
<div class="card">
    <div class="card-header">
        <div class="card-body">
            <form method="POST" action="{{url('teachers')}}">
            @csrf
            <input type="text" class="form-control my-3" id="name" name="name" placeholder="Teacher Name">
@error('name')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror

<input type="text" class="form-control my-3" id="address" name="address" placeholder="Teacher Address">
@error('address')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror

<input type="text" class="form-control my-3" id="mobile" name="mobile" placeholder="Teacher mobile">
@error('mobile')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror


            <input  type="submit" value="save" class="btn btn-success  my-3">

            </form>
        </div>
    </div>
</div>
@endsection