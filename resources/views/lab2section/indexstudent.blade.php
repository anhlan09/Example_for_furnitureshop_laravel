@extends('lab2master.l2master')

@section('main')
  <div class="container">
    <h1 class="display-4">All Student</h1>

    <table class="table table-hover">
      <thead class="bg-dark text-white">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Contact</th>
        <th scope="col">&nbsp;</th>
        <th scope="col">&nbsp;</th>
      </tr>
      </thead>
      <tbody>
      @foreach($students as $s)
        <tr>
          <th scope="row">{{$s['id']}}</th>
          <td>{{$s['name']}}</td>
          <td>{{$s['email']}}</td>
          <td>{{$s['contact']}}</td>
          <td><a type="button" class="btn btn-success btn-sm"
              href="{{ route('students.edit', ['id' => $s['id']]) }}"
            >Edit</a></td>
          <td><a type="button" class="btn btn-danger btn-sm">Delete</a></td>
        </tr>
      @endforeach
      </tbody>
    </table>
@endsection
