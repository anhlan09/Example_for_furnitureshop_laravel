<br>
<dl class="row">
  <dt class="col-sm-3">ID</dt>
  <dd class="col-sm-9">{{ $class->id }}</dd>

  <dt class="col-sm-3">Name</dt>
  <dd class="col-sm-9">{{ $class->name }} </dd>

  <dt class="col-sm-3">Start Date</dt>
  <dd class="col-sm-9">{{ $class->StartDate }}</dd>

  <dt class="col-sm-3">Size</dt>
  <dd class="col-sm-9">{{ $class->Size }}</dd>

  <dt class="col-sm-3">Teacher</dt>
  <dd class="col-sm-9">
    @foreach($teacher as $t)
      <div class="row">
        <div class="col-sm">{{$t->Name}}</div>
      </div>
    @endforeach
  </dd>

</dl>
<br>
