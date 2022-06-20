@extends('lab2master.l2master')

@section('main')
  <div class="container">
    <h1 >Update Teacher</h1>
    <form action="{{route('teacher.update', ['id' => $teachers['id']])}}" method="post">
      @csrf
      @include('partials.error')
      <input type="hidden" name="id" value="{{ old('id')?? $teachers['id'] }}" >
      <div class="form-group">
        <label for="exampleInputEmail1">Name</label>
        <input type="text" class="form-control" name="Name" id="Name" aria-describedby="aria-describedby" value="{{old('Name')??$teachers['Name'] }}" placeholder="Enter Name">
      </div>
     @php
        $date = explode('/',$teachers['DOB'])  ;
       $date = $date[2].'-'.$date[1].'-'.$date[0];
      @endphp
      <div class="form-group">
        <label for="exampleInputPassword1">Date of Birth</label>
        <input type="date" class="form-control" name="DOB" id="DOB" value="{{old('DOB')??$date}}" placeholder="Enter Date of Birth">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">SSID</label>
        <input type="text" class="form-control" name="SSID" id="SSID" value="{{old('SSID')??$teachers['SSID'] }}" placeholder="Enter SSID">
      </div>
      <button type="submit" class="btn btn-primary bg-dark border-dark">Submit</button>
    </form></div>

@endsection
