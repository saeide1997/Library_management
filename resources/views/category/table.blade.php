@extends('layouts.admin')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <style>
        .container {

            padding: 2%;
            width: 93%;
            margin: 3%;
            margin-top: 0%;
            background: rgba(76, 128, 246, 0.06);
            color: black;
        }
        table{
            padding-right: 7%;
        }
        td {
            text-wrap: normal;
            text-align: center;
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
    <a href="{{route('category.create')}}" class="btn btn-primary m-5 mt-2 p-3 ">Create New Category</a>

<div class="container">
    <table class=" m-5 mt-0" id='booktable'>
        <thead>
        <tr>
            <th>Name</th>
            <th>Details</th>
            <th>Actions</th>
        </tr>
        </thead>
        @forelse ($categories as $category)
            <tbody class="table-border-bottom-0">
            <tr>
                <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <span
                        class="fw-medium">{{$category->Name}}</span>
                </td>
                <td>{{$category->Details}}</td>

                <td>
                    <div class="dropdown">
                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                            <i class="bx bx-dots-vertical-rounded"></i>
                        </button>
                        <div class="dropdown-menu">
                            <button type="button" value="{{$category->id}}" class="dropdown-item ModalEdit"
                                    data-bs-toggle="modal" data-bs-target="#ModalEdit{{$category->id}}"> Edit
                            </button>
                            <!-- <a href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a> -->
                            <form action="{{route('category.destroy',['category'=>$category->id])}}" method="post">
                                @csrf
                                @method('DELETE')
                                <div class='d-flex align-items-center'>
                                    <i class="bx bx-edit-alt "></i><input type="submit" class="dropdown-item"
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




    @forelse ($categories as $category)
        <div class="modal fade text-left" id="ModalEdit{{$category->id}}" tabindex="-1" role="dialog"
             aria-labelledby="ModalEditLabel{{$category->id}}" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <form action="{{route('update')}}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="modal-header">
                            <h4 class="modal-title" id="ModalEditLabel{{$category->id}}">edit category</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">


                            <input type="hidden" name="id" value="{{$category->id}}">

                            <input type="text" name='Name' id="Name" value="{{$category->Name}}"
                                   class="form-control mb-3" placeholder="Category Name"
                                   aria-label="Category Name"
                                   aria-describedby="button-addon2">
                            <input type="text" name='Details' id="Details" value="{{$category->Details}}"
                                   class="form-control mb-3" placeholder="Category Detail"
                                   aria-label="Category Name" aria-describedby="button-addon2">
                            <button type="submit" class="btn btn-outline-success" id="button-addon2">edit</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>

    @empty
    @endforelse

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

