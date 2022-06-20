@extends('lab6.lab6mas.l6master')

@section('main')
  <div class="container">
    <h1 class="display-4">Are you sure you want to delete?</h1>
    @include('lab6.partisals.studentDetails')

    <form action="{{route('student.destroy', ['id' =>$student->id])}}" method="post">
      @csrf
      <input type="hidden" name="id" value="{{$student->id}}">
      <button type="submit" class="btn btn-danger">Delete</button>
      <a href="{{route('student.index')}}" class="btn btn-info">Cancel</a>
    </form>
  </div>
@endsection
