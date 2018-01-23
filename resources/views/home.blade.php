@extends('layouts.app')

@section('content')
<div class="container">
  <h1>Welcome to our bookstore!</h1>
  <h2>Here you will find old books</h2>
  <div class="row">
    @foreach($books as $book)
    <div class="col-xs-6 col-sm-3 col-md-2" style="padding-left: 0px;">
      <div class="thumbnail category-row-item text-left">
      <a href="/read/{{ $book->id}}">
        <img id="" src="{{ $book->photo}}" alt="">
      </a>
     <div class="caption">
       <h4>
         <a href="/book/{{ $book->id}}">{{ $book->title}}</a>
       </h4>

       <p><span class="author">{{ $book->author->first_name}} {{ $book->author->last_name}}</span></p>
       <p>
         <strong style="font-size: 1.5em;">{{ $book->price}}
           <span class="smaller text-muted">Eur</span>
         </strong>
       </p>
      </div>
    </div>
  </div>
  @endforeach
</div>
<script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous">
</script>

@endsection
