@extends('layouts.admin')

@section('content')

    <div class="col-md-6">
        <div class="card m-4">
            <h5 class="card-header">Edit Borrowed Book Information</h5>
            <div class="card-body">

                <form action="{{route('borrowUpdate',['borrow'=>$borrow->id])}}" method="POST" class="m-3">
                    @csrf
                    @method('PUT')
                    <label for="exampleFormControlInput1" class="form-label">Book's Title</label>
                    <input type="text" name='user_id'
                           value="{{old('user_id',optional($borrow ?? null)->user->Name)}}" class="form-control mb-3"/>


                    <label for="exampleFormControlInput1" class="form-label">Book's Author</label>
                    <input type="text" name='book_id'
                           value="{{old('book_id',optional($borrow ?? null)->book->Title)}}" class="form-control mb-3"/>
                    <label for="exampleFormControlInput1" class="form-label">Borrow Date</label>
                    <input type="date" name='Date_borrowing'
                           value="{{old('Date_borrowing',optional($borrow ?? null)->Date_borrowing)}}" class="form-control mb-3"/>
                    <label for="exampleFormControlInput1" class="form-label">Return Date</label>
                    <input type="date" name='Due_date'
                           value="{{old('Due_date',optional($borrow ?? null)->Due_date)}}" class="form-control mb-3"/>

                    <button type="submit" class='btn btn-success'>Update</button>
                </form>


            </div>
        </div>
    </div>

@endsection
