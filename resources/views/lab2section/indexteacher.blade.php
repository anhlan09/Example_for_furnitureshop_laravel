@extends('lab2master.l2master')

@section('main')
  <div class="container">
    <h1 class="display-4">Teacher Index</h1>

    <table class="table table-hover">
      <thead class="bg-dark text-white">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">DOB</th>
        <th scope="col">SSID</th>
        <th scope="col">&nbsp;</th>
        <th scope="col">&nbsp;</th>
      </tr>
      </thead>
      <tbody>
      @foreach($teachers as $t)
        <tr>
          <th scope="row">{{$t['id']}}</th>
          <td>{{$t['Name']}}</td>
          <td>{{$t['DOB']}}</td>
          <td>{{$t['SSID']}}</td>
          <td><a type="button" class="btn btn-success btn-sm"
             href="{{route('teacher.edit', ['id' => $t['id']]) }}"
            >Edit</a></td>
          <td><a type="button" class="btn btn-danger btn-sm">Delete</a></td>
        </tr>
      @endforeach
      </tbody>
    </table>
@endsection
