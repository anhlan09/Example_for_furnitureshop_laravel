@extends('lab6.lab6mas.l6master')

@section('main')
  <div class="container">
    <h1 class="display-4">Are you sure you want to delete?</h1>
    @include('lab6.partisals.classDetails')

    <form action="{{route('class.destroy', ['id' =>$class->id])}}" method="post">
      @csrf
      <input type="hidden" name="id" value="{{$class->id}}">
      <button type="submit" class="btn btn-danger">Delete</button>
      <a href="{{route('class.index')}}" class="btn btn-info">Cancel</a>
    </form>
  </div>
@endsection
