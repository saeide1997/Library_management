@extends('layouts.admin')

@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css"> @endsection
    @section('content') <table class="m-5" id='booktable'>
<thead> <tr>
    <th>username</th>
    <th>email Date</th>
    <th>Status</th>
    <th>Actions</th>
    </tr>
    </thead>
    @forelse ($users as $user)
    <tbody class="table-border-bottom-0">
    <tr>
        <td> <i class="fab fa-angular fa-lg text-danger me-3"></i> <span class="fw-medium">{{$user->name}}</span>
        </td> <td>{{$user->email}}</td> 
        <td><span class="badge bg-label-primary me-1">Active</span></td>
        <td>
            <div class="dropdown">
                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                    <i class="bx bx-dots-vertical-rounded"></i>
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                    <!-- <a href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a> -->
                    <form action="#" method="post">
                        @csrf
                        @method('DELETE')
                        <input type="submit" class="dropdown-item" value="Delete"><i class="bx bx-trash me-1"></i>
                    </form>
                </div>
            </div>
        </td>
    </tr>
    </tbody>
    @empty
    @endforelse
    </table>

    @endsection

    @push('scripts')
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#booktable').DataTable();
        })
    </script>
    @endpush