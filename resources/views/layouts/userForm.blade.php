@yield('content')
<label for="exampleFormControlInput1" class="form-label">User Name</label>
<input type="text" name='Name'
       value="{{old('Name',optional($user ?? null)->Name)}}" class="form-control mb-3"/>
<label for="exampleFormControlInput1" class="form-label">Email</label>
<input type="email" name='Email'
       value="{{old('Email',optional($user ?? null)->Email)}}" class="form-control mb-3"/>
<label for="exampleFormControlInput1" class="form-label">Password</label>
<input type="password" name='password'
       value="{{old('password',optional($user ?? null)->password)}}" class="form-control mb-3"/>
<label for="exampleFormControlInput1" class="form-label">Phone</label>
<input type="tel" name='Phone'
       value="{{old('Phone',optional($user ?? null)->Phone)}}" class="form-control mb-3"/>

<label for="exampleFormControlSelect1" class="form-label ">Gender</label>
<select class="form-select mb-3" id="exampleFormControlSelect1" name='Gender' aria-label="Default select example">
    <option value="man">Man</option>
    <option value="woman">Woman</option>
</select>
