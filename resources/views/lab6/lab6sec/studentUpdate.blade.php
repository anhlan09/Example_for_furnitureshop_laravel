
@extends('lab6.lab6mas.l6master')

@section('main')
  <div class="container">
    <h1 class="display-4">Update An Existing Student</h1>


    @include('partials.error')

    <form action="{{route('student.update', ['id' => old('id')?? $student->id])}}" method="post">
      @csrf
      @include('lab6\partisals\studentFields')
      <button type="submit" class="btn btn-dark">Submit</button>
    </form>
  </div>
@endsection
