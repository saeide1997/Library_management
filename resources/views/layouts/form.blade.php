@yield('content')
<label for="exampleFormControlInput1" class="form-label">Book's Title</label>
      <input type="text" name='Title' 
      value="{{old('Title',optional($book ?? null)->Title)}}" class="form-control mb-3" />
  
  
    <label for="exampleFormControlInput1" class="form-label">Book's Author</label>
    <input type="text" name='Author' 
    value="{{old('Author',optional($book ?? null)->Author)}}" class="form-control mb-3" />
    <input type="number" name='Shelf_no' 
    value="{{old('Shelf_no',optional($book ?? null)->Shelf_no)}}" class="form-control mb-3" />
  

    <label for="exampleFormControlInput1" class="form-label">Book's publish date</label>
    <input type="date" name='Date' 
    value="{{old('Date',optional($book ?? null)->Date)}}" class="form-control mb-3" />


    <label for="exampleFormControlSelect1" class="form-label ">Book's category</label>
    <select class="form-select mb-3" id="exampleFormControlSelect1"  name='Category' aria-label="Default select example">
      <option selected></option>
      <option value="1">One</option>
      <option value="2">Two</option>
      <option value="3">Three</option>
    </select>