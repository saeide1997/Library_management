@extends('layouts.admin')



@section('content')
    <form action="{{route('book.index')}}" method='GET'>
        <div class="d-flex flex-row bd-highlight mb-3">

            <div class="p-3 m-3  bd-highlight" style="width: 45%">
                <span>Member's Information</span>
                <div class='flex-nowrap'>
                    <input type="text" name="Title" id="" class='form-control mt-1 mb-4'
                           placeholder='Search by Name...' value="{{request('Title')}}">
                    <span>Borrow Date</span><br>
                    <input type="date" name="Date" class="form-control mt-1" id="">
                </div>
            </div>
            <div class="p-3 m-3 bd-highlight" style="width: 45%">
                <span>Book's Name</span>
                <div class='flex-nowrap'>
                    <input type="text" name="Title" id="" class='form-control mt-1 mb-4'
                           placeholder='Search by Title...' value="{{request('Title')}}">
                    <span>Return Date</span><br>
                    <input type="date" name="Date" class="form-control mt-1" id="">
                </div>
            </div>
        </div>


        <div class="m-5 d-flex flex-column justify-content">
            <button type="submit" class='btn btn-success mt-3 justify-content-center'>Search</button>
            <a class='btn btn-primary mt-3 justify-content-center' href="#">
                Borrow</a>
        </div>

    </form>

    <table class="table table-bordered border-solid m-5" style="width: 90%" id='booktable'>
        <thead>
        <tr>
            <th>Member Name</th>
            <th>Book Name</th>
            <th>Shelf-No</th>
            <th>Category</th>
            <th>Borrow Date</th>
            <th>Return Date</th>

        </tr>
        </thead>

        <tbody class="">
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        </tbody>

@endsection
