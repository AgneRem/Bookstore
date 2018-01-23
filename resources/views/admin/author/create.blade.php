@extends ('layouts.admin')
@section('content')

<h2>Create new author</h2>
<form class="" action="{{ route('authors.store')}}" method="post">
  {{ csrf_field()}}
  <div class="form-group">
    <label for="first_name">First Name</label>
    <input type="text" name="first_name" value="" placeholder="Please enter author's name" class="form-control" id="first_name">
  </div>
  <div class="form-group">
    <label for="last_name">Last name</label>
    <input type="text" name="last_name" value="" placeholder="Please enter author's last name" class="form-control" id="last_name">
  </div>
  <input type="submit" name="" value="Submit">
</form>
@endsection
