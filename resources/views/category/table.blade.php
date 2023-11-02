@extends('layouts.admin')

@section('content')

<table class=" m-5" id='booktable'>
<thead> <tr>
    <th>Name</th>
    <th>Details</th>
    <th>Actions</th>
    </tr>
    </thead>
    @forelse ($categories as $category)
    <tbody class="table-border-bottom-0">
    <tr>
        <td> <i class="fab fa-angular fa-lg text-danger me-3"></i> <span class="fw-medium">{{$category->Name}}</span>
        </td>
        <td>{{$category->Details}}</td>

        <td>
            <div class="dropdown">
                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                    <i class="bx bx-dots-vertical-rounded"></i>
                </button>
                <div class="dropdown-menu">
                    <button type="button" value="{{$category->id}}" class="dropdown-item ModalEdit"  > Edit</button>
                    <!-- <a href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a> -->
                    <form action="{{route('category.destroy',['category'=>$category->id])}}" method="post">
                        @csrf
                        @method('DELETE')
                        <div class='d-flex align-items-center' >
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

    <div class="modal fade text-left" id="ModalEdit" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">edit category</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form action="{{route('category.update',['category'=>$category->id])}}" method="post">
                @csrf
                @method('PUT')
                <input type="hidden" name="id" id="id" value="">

                    <input type="text" name='Name' id="Name" value="" class="form-control mb-3" placeholder="Category Name"
                           aria-label="Category Name"
                           aria-describedby="button-addon2">
                    <input type="text" name='Details' id="Details" value="" class="form-control mb-3" placeholder="Category Detail"
                           aria-label="Category Name" aria-describedby="button-addon2">
                    <button type="submit" class="btn btn-outline-success" id="button-addon2">edit</button>
            </form>
                </div>
            </div>

        </div>
    </div>





@endsection

@push('scripts')
<script>
    $(document).ready(function (){
        $(document).on('click','.ModalEdit', function (){
            const id =$(this).val();
            // alert(id);
                $('#ModalEdit').modal('show');
                $.ajax({
                    type:"GET",
                    url:"/category.edit/"+id,
{{--                    {{route('category.edit',['category'=>$category->id])}}--}}
                    success: function (response){

                        $('#Name').val(response.category.Name);
                        $('#Details').val(response.category.Details);


                    }
                })


        });
    });
</script>
@endpush
