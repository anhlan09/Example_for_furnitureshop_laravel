@extends('master.master')

@section('main')
  <div class="container">
    <br>
    <h1 >Book Index</h1>

    <table class="table table-hover">
      <thead class="bg-dark text-white">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Title</th>
        <th scope="col">Author</th>
        <th scope="col">Pages</th>
        <th></th>
        <th></th>
      </tr>
      </thead>
      <tbody>
      <tr>
        <th scope="row">1</th>
        <td>PHP for Dummies</td>
        <td>Green Hulk</td>
        <td>431</td>
        <td><a href="{{route('book.editBook')}}"><button type="button" class="btn btn-success" >Edit</button></a></td>
        <td> <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal" data-hi="PHP for Dummies"  data-whatever="Green Hulk" data-page="431">Delete</button>
        </td>
      </tr>
      <tr>
        <th scope="row">2</th>
        <td>Getting started with Laravel</td>
        <td>Stan Lee</td>
        <td>209</td>
        <td><a href="{{route('book.editBook')}}"><button type="button" class="btn btn-success" >Edit</button></a></td>
        <td> <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal" data-hi="Getting started with Laravel" data-whatever="Stan Lee" data-page="209">Delete</button>
        </td>
      </tr>
      <tr>
        <th scope="row">3</th>
        <td>Advance Laravel</td>
        <td>Chadwick Aaron Boseman</td>
        <td>559</td>
        <td><a href="{{route('book.editBook')}}"><button type="button" class="btn btn-success" >Edit</button></a></td>
        <td> <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal" data-hi="Advanced Laravel" data-whatever="Chadwick Aaron Boseman" data-page="559">Delete</button>
        </td>
      </tr>
      </tbody>

    </table>
  </div>

@endsection


@section('other')
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Delete Book </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form>
            <div class="form-group">
              <label for="title" class="col-form-label">Title</label>
              <input type="text" class="form-control" id="title">
            </div>
            <div class="col-form-label">
              <label for="author" class="col-form-label">Author</label>
              <input type="text" class="form-control" id="author">
            </div>
            <div class="form-group d">
              <label for="number" class="col-form-label">Pages</label>
              <input type="text" class="form-control" id="number">
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" >Delete</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        </div>
      </div>
    </div>
  </div>

@endsection

@section('script')
  <script>
    $('#exampleModal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget)

      var title = button.data('hi')
      var author = button.data('whatever')
      var page = button.data('page')

      var modal = $(this)
      modal.find('.modal-title').text('Deleting A Book')
      modal.find('.modal-body #title').val(title)
      modal.find('.modal-body #author').val(author)
      modal.find('.modal-body #number').val(page)
    })
  </script>

@endsection
