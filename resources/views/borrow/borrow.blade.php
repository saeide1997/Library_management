@extends('layouts.admin')



@section('content')
    <form action="{{route('insert')}}" method='GET'>
        <div class="d-flex flex-row bd-highlight mb-3">

            <div class="p-3 m-3  bd-highlight" style="width: 45%">
                <span >Member's Information</span>
                <div class='flex-nowrap mt-1 mb-3'>
                    <select class="js-example-basic-single " style="width: 100%; " name="user">
                        @forelse($users as $user)
                            <option value="{{$user->userId}}">{{$user->Name}}</option>
                        @empty
                        @endforelse
                    </select>

                </div>
                <div>
                    <span>Borrow Date</span><br>
                    <input type="date" name="Date_borrowing" class="form-control mt-1" id="">
                </div>
            </div>
            <div class="p-3 m-3 bd-highlight" style="width: 45%">
                <span>Book's Name</span>
                <div class='flex-nowrap mt-1 mb-3'>
                    <select class="js-example-basic-single-1 " style="width: 100%; " name="book">
                        @forelse($books as $book)
                            <option value="{{$book->bookId}}">{{$book->Title}}</option>
                        @empty
                        @endforelse
                    </select>
                </div>
                <div>
                    <span>Return Date</span><br>
                    <input type="date" name="Due_date" class="form-control mt-1" id="">
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
@section('scripts')
    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
            $('.js-example-basic-single-1').select2();
        });
    </script>

@endsection
