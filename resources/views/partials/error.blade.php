@if(count($errors->all()))
  <div class="row">
    <div class="col-md-12">
      <div class="alter alter-danger">
        <ul>
          @foreach($errors->all() as $e)
            <li>{{ $e }}</li>
          @endforeach
        </ul>
      </div>
    </div>
  </div>
@endif
