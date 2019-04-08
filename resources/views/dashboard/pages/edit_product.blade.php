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
                            <form action="{{url('/product_update')}}" method="post" enctype="multipart/form-data">
                                @csrf

                                <h3 class="text-center">Edit product </h3>

                        <div class="form-group">
                         <label for="usr">Product  title </label>
                          <input type="hidden"  class="form-control"  name="id" value="{{$old_product->id}}">

                         <input type="text" class="form-control" placeholder="Enter about title" name="title" value="{{ $old_product->title }}">
                        </div>
<div class="form-group">
                         <label for="usr">Description </label>

                         <input type="text" class="form-control" placeholder="Enter about title" name="description" value="{{ $old_product->description }}">
                        </div>

                        
             

                        
                        <div class="form-group">
                         <label for="usr">Price </label>

                         <input type="number" class="form-control" id="usr" placeholder="Enter about quantity" name="price" value="{{ $old_product->price }}">

                        </div>
                        
                        
                        <!-- <div class="form-group">
                        
                         <label for="usr"> image </label>
                        
                         <input type="file" class="form-control" id="usr" placeholder="Enter about point" name="image">
                        </div> -->

                         <button type="submit" class="btn btn-success">Update</button>
           </form>
                </div>
          
          
        </div>
      </div>
       
      </div>
</div>

@endsection
