@extends('lab2master.l2master')


@section('main')
  <div class="container">
    <h1 >Update Student</h1>
    <form action="{{route('students.update', ['id' => $student['id']])}}" method="post">
      @csrf
      @include('partials.error')
      <input type="hidden" name="id" value="{{ old('id')?? $student['id'] }}" >
      <div class="form-group">
        <label for="exampleInputEmail1">Name</label>
        <input type="text" class="form-control" name="name" id="Name" aria-describedby="aria-describedby" value="{{ old('name')??$student['name'] }}">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Email</label>
        <input type="email" class="form-control" name="email" id="Email" value="{{ old('email')??$student['email'] }}">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Contact</label>
        <input type="text" class="form-control" name="contact" id="Contact" value="{{ old('contact')??$student['contact'] }}">
      </div>
      <button type="submit" class="btn btn-primary bg-dark border-dark">Submit</button>
    </form></div>
@endsection
