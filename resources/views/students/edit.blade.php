@extends('layout')
@section('title', 'Edit ' . $students->name)
@section('content')
<div class="card">
    <div class="card-header">
        <div class="card-body">
            <form method="POST" action="{{ url('student/' . $students->id) }}">
                @csrf
                @method('PUT')
            <input type="text" value="{{$students->name}}" class="form-control my-3" id="name" name="name" placeholder="Student Name">
@error('name')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror

<input value="{{$students->address}}" type="text" class="form-control my-3" id="address" name="address" placeholder="Student Address">
@error('address')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror

<input value="{{$students->mobile}}" type="text" class="form-control my-3" id="mobile" name="mobile" placeholder="Student mobile">
@error('mobile')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror

<input value="{{$students->age}}" type="text" class="form-control my-3" id="age" name="age" placeholder="Student age">
@error('age')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
            <input  type="submit" value="save" class="btn btn-success  my-3">

            </form>
        </div>
    </div>
</div>
@endsection