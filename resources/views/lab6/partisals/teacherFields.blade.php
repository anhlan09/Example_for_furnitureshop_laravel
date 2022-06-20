<input type="hidden" name="id" value="{{old('id')?? $teacher->id}}">
<div class="form-group">
  <label for="Name" class="font-weight-bold">Name</label>
  <input type="text" class="form-control" id="Name" name="Name" value="{{old('Name')?? $teacher->Name}}">
  {{--        when removing title value to trigger "required" validation, --}}
  {{--        old('title') is not set so $book['title'] is shown--}}
  {{--        it is because redirect()->back() calls edit() which provides $book for view--}}
</div>

<div class="form-group">
  <label for="DOB" class="font-weight-bold">Date of Birth</label>
  <input type="date" class="form-control" id="DOB" name="DOB" value="{{old('DOB')?? $teacher->DOB}}">
</div>

<div class="form-group">
  <label for="SSID" class="font-weight-bold">SSID</label>
  <input type="number" class="form-control" id="SSID" name="SSID" min="0" value="{{old('SSID')?? $teacher->SSID}}">
</div>
