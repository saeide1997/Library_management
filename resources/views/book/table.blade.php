@extends('layouts.admin')

@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css"> @endsection
    @section('content') <table class="m-5" id='booktable'> <thead>
<tr>
    <th>Book Name</th>
    <th>Author </th> 
    <th>Shelf-No </th> 
    <th>Publish Date</th> 
    <th>Status</th>
    <th>Actions</th>
 </tr> 
</thead>
    @forelse ($books as $book)
    <tbody class="table-border-bottom-0">
<tr>
    <td> <i class="fab fa-angular fa-lg text-danger me-3"></i> <span class="fw-medium">{{$book->Title}}</span>
    </td> 
    <td>{{$book->Author}}</td> 
    <td>{{$book->Shelf_no}}</td>
    <td>
    <i class="fab fa-angular fa-lg text-danger me-3"></i>
    <span class="fw-medium">{{$book->Date}}</span>
    </td>
    <td><span class="badge bg-label-primary me-1">Active</span></td>
    <td>
    <div class="dropdown">
    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
        <i class="bx bx-dots-vertical-rounded"></i>
        </button>
        <div class="dropdown-menu">
            <a class="dropdown-item" href="{{route('book.edit',['book'=>$book->id])}}"><i class="bx bx-edit-alt
            m-3"></i> Edit</a>
            <!-- <a href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a> -->
            <form action="{{route('book.destroy',['book'=>$book->id])}}" method="post">
                @csrf
                @method('DELETE')
                <div class='d-flex align-items-center'>
                    <i class="bx bx-edit-alt "></i><input type="submit" class="dropdown-item" value="Delete">
                </div>
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