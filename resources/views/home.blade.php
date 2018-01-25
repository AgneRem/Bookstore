@extends('layouts.app')

@section('content')
<div style="background-image:url(http://www.baltana.com/files/wallpapers-5/Light-Background-Desktop-Wallpaper-16371.jpg)">
  <div class="container">
    <h1>Welcome to our bookstore!</h1>

    <div class="row">
      @foreach($books as $book)
      <div class="col-xs-6 col-sm-3 col-md-2" style="padding-left: 0px;">
        <div class="thumbnail category-row-item text-center">
          <a href="/read/{{ $book->id}}">
            <img id="" style="height:264px" src="{{ $book->photo}}" alt="{{ $book->title}}">
          </a>
       <div class="caption">
         <h4 style="height:40px">
           <a href="/read/{{ $book->id}}">{{ $book->title}}</a>
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
    {{ $books->appends(['s' => $s])->links()}}
</div>


<script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous">
</script>

@endsection
