@extends('lab6.lab6mas.l6master')

@section('main')
  <div class="container">
    <h1 class="display-4">Teacher Index</h1>
    @include('lab6.partisals.sesssionmessage')
    <table class="table table-hover">
      <thead class="thead-dark">
      <tr>
        {{--        <th scope="col">#</th>--}}
        <th scope="col">Name</th>
        <th scope="col">DOB</th>
        <th scope="col">SSID</th>
        <th scope="col">&nbsp;</th>
        <th scope="col">&nbsp;</th>
        <th scope="col">&nbsp;</th>
      </tr>
      </thead>
      <tbody>
      @foreach($teacher as $t)
        <tr>
          <td>{{$t->Name}}</td>
          <td>{{$t->DOB}}</td>
          <td>{{$t->SSID}}</td>
          <td><a type="button" class="btn btn-primary btn-sm"
                 href="{{route('teacher.show', ['id' => $t->id])}}"
            >Details</a>
          </td>
          <td><a type="button" class="btn btn-success btn-sm"
                 href="{{route('teacher.edit', ['id' => $t->id])}}"
            >Edit</a>
          </td>
          <td>

            <a type="button" class="btn btn-danger btn-sm"
               href="{{route('teacher.confirm', ['id' => $t->id])}}"
            >Delete</a></td>
        </tr>
      @endforeach
      </tbody>
    </table>

  </div>
@endsection
