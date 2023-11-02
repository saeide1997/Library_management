@extends('layouts.admin')

@section('content')
<div class='flex-nowrap' > <form action="{{route('book.index')}}" method='GET' class=' m-5 ' > <input type="text"
    name="Title" id="" class='form-control m-1' placeholder='Search by Title...' value="{{request('Title')}}"> <button
    type="submit" class='btn btn-success'>Search</button> <a class='btn btn-primary' href="{{route('book.index')}}">
        Clear</a>
        </form> </div> @endsection