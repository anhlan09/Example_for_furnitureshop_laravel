@extends('master.master')

@section('main')
  <div class="container">
    <h1 >New Book</h1>
    <form>
      <div class="form-group">
        <label for="exampleInputEmail1">Title</label>
        <input type="text" class="form-control" id="Title" aria-describedby="aria-describedby" placeholder="Enter Title">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Author</label>
        <input type="text" class="form-control" id="Author" placeholder="Author Name">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Pages</label>
        <input type="number" class="form-control" id="Pages" placeholder="Number of pages">
      </div>
      <button type="submit" class="btn btn-primary bg-dark border-dark">Submit</button>
    </form></div>

@endsection
