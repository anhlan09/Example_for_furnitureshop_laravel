@extends('lab2master.l2master')

@section('main')
  <div class="container">
    <h1 >Update Class</h1>
    <form action="{{route('classes.update', ['id' => $classes['id']])}}" method="post">
      @csrf
      @include('partials.error')
      <input type="hidden" name="id" value="{{ old('id')??$classes['id'] }}" >
      <div class="form-group">
        <label for="exampleInputEmail1">Name</label>
        <input type="text" class="form-control" name="name" id="name" aria-describedby="aria-describedby" value="{{old('name')??$classes['name']}}" placeholder="Enter Name">
      </div>
      @php
      $date = explode('/',$classes['StartDate']) ;
      $date = $date[2].'-'.$date[1].'-'.$date[0];
      //echo $date;
      @endphp
      <div class="form-group">
        <label for="exampleInputPassword1">Start Date</label>
        <input type="date" class="form-control" name="StartDate" id="Start_Date" value="{{old('StartDate')??$date}}">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Size</label>
        <input type="text" class="form-control" name="Size" id="Size" placeholder="Enter Size" value="{{old('Size')??$classes['Size']}}">
      </div>
      <button type="submit" class="btn btn-primary bg-dark border-dark">Submit</button>
    </form></div>
@endsection
