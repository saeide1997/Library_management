@extends('layouts.admin')

@section('content')

<div class="col-md-6"> <div class="card m-4">
  <h5 class="card-header">Add a New Book</h5>
  <div class="card-body">

    <form action="{{route('book.store')}}" method="POST" class="m-3">
      @csrf
      @include('layouts.form')
    <button type="submit" class='btn btn-success'>create</button>
    </form>


</div>
</div>
</div>


@endsection