@extends('layouts.app')

@section('content')

@if (session('message'))
<div class="alert alert-info">
  {{ session('message')}}
</div>
@endif


<div class="container">
  <div class="row" style="margin:40px 70px 60px 60px">
    <div class="col-md-4">
        <img src="{{ $book->photo}}" alt="{{ $book->title}}" style="height:400px">
    </div>

    <div class="col-md-8">
      <h3>{{ $book->author->first_name}} {{ $book->author->last_name}}</h3>
      <h2>{{ $book->title}}</h2>
      <p>Description:</p>
      <p>{{ $book->description}}</p>
      <h3>Price: {{$book->price}} Eur</h3>
      <a href="{{ route ('home')}}" class="btn btn-default">Back</a>
      <a href="{{ route ('reservation', $book->title, $book->author_id)}}" class="btn btn-success">Reserve</a>
    </div >
  </div>
</div>

@endsection
