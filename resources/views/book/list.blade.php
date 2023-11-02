@extends('layouts.admin')

@section('content')

@forelse ($books as $book)
<div class="row m-5">
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Book title: {{$book->Title}}</h5>
        <p class="card-text">written by: {{$book->Author}}</p>
        <p class="card-text">Published in: {{$book->Date}}</p>
        <a href="#" class="btn btn-warning">Edite</a>
        <a href="#" class="btn btn-danger">Delete</a>
      </div>
    </div>
  </div>
</div>
  @empty
  @endforelse
@endsection