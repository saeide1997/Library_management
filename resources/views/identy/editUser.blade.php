@extends('layouts.admin')

@section('content')

    <div class="col-md-6"> <div class="card m-4">
            <h5 class="card-header">Add a New Book</h5>
            <div class="card-body">

                <form action="{{route('user.update',['user'=>$user->id])}}" method="POST" class="m-3">
                    @csrf
                    @method('PUT')
                    @include('layouts.userForm')
                    <button type="submit" class='btn btn-success'>Update</button>
                </form>


            </div>
        </div>
    </div>


@endsection
