@extends('layouts.admin')

@section('content')

<div class="border-solid border-success p-3 m-4">
  <form action="{{route('category.store')}}" method="POST">
    @csrf
  <input type="text" name='Name' class="form-control mb-3" placeholder="Category Name" aria-label="Category Name" aria-describedby="button-addon2">
  <input type="text" name='Details' class="form-control mb-3" placeholder="Category Detail" aria-label="Category Name" aria-describedby="button-addon2">
  <button type="submit" class="btn btn-outline-success" id="button-addon2">save</button>
  </form>
</div>




@endsection
