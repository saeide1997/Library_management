@extends('layouts.admin')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <style>
        .container {
            padding: 2%;
            width: 94%;
            margin: 3%;
            background: rgba(76, 128, 246, 0.06);
            color: black;
        }

        label {
            color: black;
        }

        div.dataTables_wrapper div.dataTables_length select {
            width: 3rem;
        }

    </style>

@endsection

@section('content')
    <form action="{{route('insert')}}" method='GET'>
        <div class="d-flex flex-row bd-highlight mb-3">

            <div class="p-3 m-3  bd-highlight" style="width: 45%">
                <span>Member's Information</span>
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
            <button type="submit" class='btn btn-success mt-3 justify-content-center'>Borrow</button>
            <a class='btn btn-primary mt-3 justify-content-center' href="#">
                Search</a>
        </div>

    </form>

{{--    <div class="container">--}}
{{--        <table class="m-5" id='booktable'>--}}
{{--            <thead>--}}
{{--            <tr>--}}
{{--                <th>.</th>--}}
{{--                <th>Book Name</th>--}}
{{--                <th>Author</th>--}}
{{--                <th>Shelf-No</th>--}}
{{--                <th>Publish Date</th>--}}
{{--                <th>Status</th>--}}
{{--                <th>Actions</th>--}}
{{--            </tr>--}}
{{--            </thead>--}}
{{--            @forelse ($borrows as $borrow)--}}
{{--                <tbody class="table-border-bottom-0">--}}
{{--                <tr>--}}
{{--                    <th>{{ $loop->iteration }}</th>--}}
{{--                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <span--}}
{{--                            class="fw-medium">{{$borrow->book_id}}</span>--}}
{{--                    </td>--}}
{{--                    <td>{{$borrows->user_id}}</td>--}}
{{--                    <td>{{$borrows->Date_borrowing}}</td>--}}
{{--                    <td>--}}
{{--                        <i class="fab fa-angular fa-lg text-danger me-3"></i>--}}
{{--                        <span class="fw-medium">{{$book->Due_date}}</span>--}}
{{--                    </td>--}}
{{--                    <td><span class="badge bg-label-primary me-1">Active</span></td>--}}
{{--                    <td>--}}
{{--                        <div class="dropdown">--}}
{{--                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow"--}}
{{--                                    data-bs-toggle="dropdown">--}}
{{--                                <i class="bx bx-dots-vertical-rounded"></i>--}}
{{--                            </button>--}}
{{--                            <div class="dropdown-menu">--}}
{{--                                <a class="dropdown-item" href="#"><i class="bx bx-edit-alt--}}
{{--            m-3"></i> Edit</a>--}}
{{--                                <!-- <a href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a> -->--}}
{{--                                <form action="#" method="post">--}}
{{--                                    @csrf--}}
{{--                                    @method('DELETE')--}}
{{--                                    <div class='d-flex align-items-center'>--}}
{{--                                        <i class="bx bx-edit-alt "></i><input type="submit" class="dropdown-item"--}}
{{--                                                                              value="Delete">--}}
{{--                                    </div>--}}
{{--                                </form>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </td>--}}
{{--                </tr>--}}
{{--                @empty--}}
{{--                @endforelse--}}
{{--                </tbody>--}}


{{--        </table>--}}
{{--    </div>--}}
@endsection
@section('scripts')
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#booktable').DataTable();
        });
    </script>

@endsection
