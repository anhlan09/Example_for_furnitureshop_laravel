@extends('lab2master.l2master')

@section('main')
  <div class="container">
    <h1 >New Class</h1>
    <form action="{{route('classes.store')}}" method="post">
      @csrf
      @include('partials.error')
      <div class="form-group">
        <label for="exampleInputEmail1">Name</label>
        <input type="text" class="form-control" name="name" id="name" aria-describedby="aria-describedby" value="{{old('name')}}" placeholder="Enter Name">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Start Date</label>
        <input type="date" class="form-control" name="StartDate" id="Start_Date" value="{{old('StartDate')}}">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Size</label>
        <input type="text" class="form-control" name="Size" id="Size" placeholder="Enter Size" value="{{old('Size')}}">
      </div>
      <button type="submit" class="btn btn-primary bg-dark border-dark">Submit</button>
    </form></div>
@endsection
