@extends('layouts.admin')

@section('content')
<div class="container">
  @if (session('message'))
  <div class="alert alert-danger">
    {{ session('message')}}
  </div>
  @endif
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">

                <div class="panel-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Author</th>
                                <th>Title</th>
                                <th>Year</th>
                                <th>Price</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($books as $book)
                            <tr>
                                <td>{{ $book->author->first_name }} {{ $book->author->last_name }}</td>
                                <td>{{ $book->title }}</td>
                                <td>{{ $book->year }}</td>
                                <td>{{ $book->price }}</td>
                                <td>
                                    <a href="{{ route('books.edit', $book)}}" class="btn btn-default">Edit</a>
                                    <form action="{{ route('books.destroy', $book) }}" method="POST" style="display: inline" onsubmit="return confirm('Are you sure?');">
                                    <input type="hidden" name="_method" value="DELETE">
                                     {{ csrf_field() }}
                                     <button class="btn btn-danger pull-right">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                                <tr>
                                    <td colspan="3">No entries found.</td>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
