@extends('layouts.dashboard')

@section('content')
<div class="container">
  <div class="row">
        <div class="col-md-8 offset-2">
          @if(session('status'))
      <div class="alert alert-success">
    {{session('status')}}

</div>

      @endif
      @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
          <div class="card">
            


          

                        <div class="card-body">
                            <form action="{{url('/product_store')}}" method="post" enctype="multipart/form-data">
                                @csrf

                                <h3 class="text-center">Add product </h3>

                        <div class="form-group">
                         <label for="usr">Product  title </label>

                         <input type="text" class="form-control" placeholder="Enter about title" name="title">
                        </div>

                        <div class="form-group">
                         <label for="usr">Description </label>
                          <textarea class="form-control" rows="5" placeholder="Enter about description" name="description"></textarea>
                        </div>
             

                        
                        <div class="form-group">
                         <label for="usr">Price </label>

                         <input type="number" class="form-control" id="usr" placeholder="Enter about quantity" name="price">

                        </div>
                        <div class="form-group">
                         <label for="usr"> Sub Category </label>

                         <select name="category_id"class="form-control" >
                           
                           <option value="" >select one</option>
                          @foreach (App\category::orderBy('name','asc')->where('parent_id',NULL)->get() as $parent_category)
                          <option value="{{ $parent_category->id}}">{{ $parent_category->name}}</option>
                          @foreach (App\category::orderBy('name','asc')->where('parent_id',$parent_category->id)->get() as $sub_category )
                           <option value="{{$sub_category->id }}">  --{{$sub_category->name }}--  </option>
                          @endforeach
                         
                           @endforeach
                         </select>

                        </div>
                        <div class="form-group">
                         <label for="usr">Brand </label>

                         <select name="brand_id"class="form-control" >
                           
                           <option value="" >Please select Brand</option>

                          @foreach (App\brand::orderBy('name','asc')->get() as $brand_name);
                          <option value="{{$brand_name->id}}">{{ $brand_name->name}}</option>

                          @endforeach

                         </select>

                        </div>
                        
                        
                        <div class="form-group">

                         <label for="usr"> image </label>

                         <input type="file" class="form-control" id="usr" placeholder="Enter about point" name="image">
                        </div>

                         <button type="submit" class="btn btn-success">Submit</button>
           </form>
                </div>
          
          
        </div>
      </div>
       
      </div>
</div>

@endsection
