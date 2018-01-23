@extends ('layouts.admin')
@section('content')

<h2>Edit a book</h2>
<form action="{{ route('books.update', $book)}}" method="post" class="col-md-4" enctype="multipart/form-data">
  <input type="hidden" name="_method" value="PUT">
  {{ csrf_field()}}
  <div class="form-group">
    <label for="title">Book Title</label>
    <input type="text" name="title" placeholder="Please enter book name" class="form-control" id="title" value="{{ $book->title}}">
  </div>
  <div class="form-group">
    <label for="photo">Book picture</label>
    <input type="text" name="photo" value="{{ $book->photo}}" placeholder="Please select a picture" class="form-control" id="photo">
  </div>
  <div class="form-group">
    <label for="year">Year</label>
    <input type="year" name="year" value="{{ $book->year}}" placeholder="Year" class="form-control" id="datepicker">
  </div>
  <div class="form-group">
    <label for="author_id">Select author</label>
    <select class="form-control" id="author_id" name="author_id">
      @foreach ($authors as $author)
      <option value="{{$author->id}}">{{ $author->first_name}} {{ $author->last_name}}</option>
      @endforeach
    </select>
  </div>
  <div class="form-group">
    <label for="description">Book description</label>
     <textarea class="form-control" id="description" rows="3" name="description" value="">{{ $book->description}}</textarea>
  </div>
  <div class="form-group">
    <label for="price">Price</label>
    <input type="text" name="price" value="{{ $book->price}}" placeholder="Please enter price" class="form-control" id="price">
  </div>

    <input type="submit" name="" value="Submit">


</form>
@endsection
