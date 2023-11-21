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

        table {
            margin: 5%;
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
    <div class="container">
        <table id='booktable'>
            <thead>
            <tr>
                <th>.</th>
                <th>User Name</th>
                <th>Book Name</th>
                <th>Borrow Date</th>
                <th>Return Date</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
            </thead>
            @forelse ($borrows as $borrow)
                <tbody class="table-border-bottom-0">
                <tr>
                    <th>{{ $loop->iteration }}</th>
                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <span
                            class="fw-medium">{{$borrow->user->Name}}</span>
                    </td>
                    <td>{{$borrow->book->Title}}</td>
                    <td>{{$borrow->Date_borrowing}}</td>
                    <td>
                        <i class="fab fa-angular fa-lg text-danger me-3"></i>
                        <span class="fw-medium">{{$borrow->Due_date}}</span>
                    </td>
                    @if($borrow->Due_date < date('Y-m-d'))
                        <td><span class="badge bg-label-success me-1">Active</span></td>
                    @else
                        <td><span class="badge bg-label-danger me-1">expired</span></td>
                    @endif
                    <td>
                        <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                    data-bs-toggle="dropdown">
                                <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{route('borrowEdit',['borrow'=>$borrow->id])}}">
                                    Edit</a>
                                <a class="dropdown-item" href="{{route('return',['borrow'=>$borrow->id])}}">Return</a>
                                <!-- <a href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a> -->
                                <form action="{{route('borrowDelete',['borrow'=>$borrow->id])}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <div class='d-flex align-items-center'>
                                        <input type="submit" class="dropdown-item"
                                               value="Delete">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
                @empty
                @endforelse
                </tbody>


        </table>
    </div>
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
