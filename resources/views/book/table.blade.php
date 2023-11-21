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

        .dropdown-menu {
            background: rgb(218, 226, 243);

        }

        table {
            padding-right: 7%;
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
        <table class="m-5" id='booktable'>
            <thead>
            <tr>
                <th>.</th>
                <th>Book Name</th>
                <th>Author</th>
                <th>Shelf-No</th>
                <th>Publish Date</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
            </thead>
            @forelse ($boooks as $boook)
                <tbody class="table-border-bottom-0">
                <tr>
                    <th>{{ $loop->iteration }}</th>
                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <span
                            class="fw-medium">{{$boook->Title}}</span>
                    </td>
                    <td>{{$boook->Author}}</td>
                    <td>{{$boook->Shelf_no}}</td>
                    <td>
                        <i class="fab fa-angular fa-lg text-danger me-3"></i>
                        <span class="fw-medium">{{$boook->Date}}</span>
                    </td>
                    @if($boook->id==$boook->book_id)
                        <td><span class="badge bg-label-warning me-1">Borrowed</span></td>
                    @else
                        <td><span class="badge bg-label-success me-1">Available</span></td>
                    @endif
                    <td>
                        <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                    data-bs-toggle="dropdown">
                                <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                                @if($boook->id==$boook->book_id)
                                    <a class="dropdown-item" href="{{route('return',['borrow'=>$boook->id])}}"> return</a>
                                @else
                                    <a class="dropdown-item" href="#"> Borrow</a>
                                @endif
                                <a class="dropdown-item" href="{{route('book.edit',['book'=>$boook->id])}}"> Edit</a>
                                <!-- <a href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a> -->
                                <form action="{{route('book.destroy',['book'=>$boook->id])}}" method="post">
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
