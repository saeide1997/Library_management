<form action="{{route('category.update',['category'=>$category->id])}}" method="post">
    <div class="modal fade
    text-left" id="ModalEdit" tabindex="-1" role="dialog" aria-hidden="true"> @csrf @method('PUT')
        <div
            class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">edit category</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="text" name='Name' class="form-control mb-3" placeholder="Category Name"
                           aria-label="Category Name"
                           aria-describedby="button-addon2">
                    <input type="text" name='Details' class="form-control mb-3" placeholder="Category Detail"
                           aria-label="Category Name" aria-describedby="button-addon2">
                    <button type="submit" class="btn btn-outline-success" id="button-addon2">edit</button>

                </div>
            </div>
        </div>
    </div>
</form>
