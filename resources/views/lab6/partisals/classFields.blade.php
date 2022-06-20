<input type="hidden" name="id" value="{{old('id')?? $class->id}}">
<div class="form-group">
  <label for="name" class="font-weight-bold">Name</label>
  <input type="text" class="form-control" id="name" name="name" value="{{old('name')?? $class->name}}">
  {{--        when removing title value to trigger "required" validation, --}}
  {{--        old('title') is not set so $book['title'] is shown--}}
  {{--        it is because redirect()->back() calls edit() which provides $book for view--}}
</div>

<div class="form-group">
  <label for="StartDate" class="font-weight-bold">Start Date</label>
  <input type="date" class="form-control" id="StartDate" name="StartDate" value="{{old('StartDate')?? $class->StartDate}}">
</div>

<div class="form-group">
  <label for="Size" class="font-weight-bold">Size</label>
  <input type="number" class="form-control" id="Size" name="Size" min="0" value="{{old('Size')?? $class->Size}}">
</div>


{{--many-to-many relationship--}}
@php
  $tIds = old('selectedT')?? array_column($selectedT, 'id') ?? array();
@endphp
<div class="form-group">
  <label class="font-weight-bold mr-3">Teacher</label>
  @foreach($teacher as $t)
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="checkbox" value="{{$t->id}}" id="{{$t->Name}}" name="selectedT[]"
        {{in_array($t->id, $tIds) ? 'checked' : ''}}
      >
      <label class="form-check-label" for="{{$t->Name}}">
        {{$t->Name}}
      </label>
    </div>
  @endforeach
</div>
