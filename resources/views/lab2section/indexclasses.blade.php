@extends('lab2master.l2master')

@section('main')
  <div class="container">
    <h1 class="display-4">Classroom Index</h1>

    <table class="table table-hover">
      <thead class="bg-dark text-white">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Start Date</th>
        <th scope="col">Size</th>
        <th scope="col">&nbsp;</th>
        <th scope="col">&nbsp;</th>
      </tr>
      </thead>
      <tbody>
      @foreach($classes as $c)
        <tr>
          <th scope="row">{{$c['id']}}</th>
          <td>{{$c['name']}}</td>
          <td>{{$c['StartDate']}}</td>
          <td>{{$c['Size']}}</td>
          <td><a type="button" class="btn btn-success btn-sm"
              href="{{ route('classes.edit', ['id' => $c['id']]) }}"
            >Edit</a></td>
          <td><a type="button" class="btn btn-danger btn-sm">Delete</a></td>
        </tr>
      @endforeach
      </tbody>
    </table>
@endsection
