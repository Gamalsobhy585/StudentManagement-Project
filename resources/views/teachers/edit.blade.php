@extends('layout')
@section('title', 'Edit ' . $teachers->name)
@section('content')
<div class="card">
    <div class="card-header">
        <div class="card-body">
            <form method="POST" action="{{ url('teacher/' . $teachers->id) }}">
                @csrf
                @method('PUT')
            <input type="text" value="{{$teachers->name}}" class="form-control my-3" id="name" name="name" placeholder="Teacher Name">
@error('name')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror

<input value="{{$teachers->address}}" type="text" class="form-control my-3" id="address" name="address" placeholder="Teacher Address">
@error('address')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror

<input value="{{$teachers->mobile}}" type="text" class="form-control my-3" id="mobile" name="mobile" placeholder="Teacher mobile">
@error('mobile')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror


            <input  type="submit" value="save" class="btn btn-success  my-3">

            </form>
        </div>
    </div>
</div>
@endsection