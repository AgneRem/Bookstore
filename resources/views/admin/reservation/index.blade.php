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
                                <th>User name</th>
                                <th>Author</th>
                                <th>Book title</th>
                                <th>Reserved at</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($reservations as $reservation)
                            <tr>
                                <td>{{ $reservation->user['name'] }}</td>
                                <td>{{ $reservation->first_name}} {{ $reservation->last_name}}</td>
                                <td>{{ $reservation->title }}</td>
                                <td>{{ $reservation->created_at }}</td>
                                <td>
                                  <form action="{{ route('reservations.destroy', $reservation) }}" method="POST" style="display: inline" onsubmit="return confirm('Are you sure?');">
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
