@extends('lab6.lab6mas.l6master')

@section('main')
  <div class="container">
    <h1 class="display-4">Class Details</h1>
    @include('lab6.partisals.classDetails')
    <a type="button" href="{{route('class.index')}}" class="btn btn-info">Back to Index</a>
  </div>
@endsection
