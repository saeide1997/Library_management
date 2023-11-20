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
    <div class="container">
        <table  id='booktable'>
            <thead>
            <tr>
                <th >.</th>
                <th>username</th>
                <th>email</th>
                <th>fine</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
            </thead>
            @forelse ($users as $user )

                <tbody class="table-border-bottom-0">
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <span class="fw-medium">{{$user->Name}}</span>
                    </td>
                    <td>{{$user->Email}}</td>
                    @if($user->Fine==null)
                    <td>Not Borrow</td>
                    @else
                        <td>{{$user->Fine}}</td>
                    @endif
                    <td><span class="badge bg-label-primary me-1">Active</span></td>
                    <td>
                        <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{route('user.edit',['user'=>$user->id])}}"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                <!-- <a href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a> -->
                                <form action="{{route('user.destroy',['user'=>$user->id])}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" class="dropdown-item" value="Delete"><i
                                        class="bx bx-trash me-1"></i>
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
                </tbody>
            @empty
            @endforelse
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
