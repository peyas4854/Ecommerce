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
                            <form action="{{url('/category_update')}}" method="post" enctype="multipart/form-data">
                                @csrf


                                <h3 class="text-center">Edit Category </h3>

                        <div class="form-group">
                         <label for="usr">Category  Name </label>
                          <input type="hidden"  class="form-control"  name="id" value="{{$old_category->id}}">

                         <input type="text" class="form-control" placeholder="Enter about title" name="name" value="{{ $old_category->name }}">
                        </div>
                              <div class="form-group">
                         <label for="usr">Description </label>

                         <textarea class="form-control" rows="5" placeholder="Enter about description" name="description">{{$old_category->description }}</textarea>

                       
                        </div>

                        
             

                        
                        <div class="form-group">
                         <label for="usr"> Old Image </label>
                         <img src="{{ asset('/storage')}}/{{$old_category->image }}" alt="">
                       

                         <input type="file" class="form-control" name="image">

                        </div>
                        <div class="form-group">
                         <label for="usr" >Primary Category </label>

                         <select name="parent_id" id="" class="form-control">
                          <option value="0"> please select category</option>
                         @foreach ($main_category as $element)
                          
                           <option value="{{$element->id }}" {{$element->id==$old_category->parent_id?'selected':'' }}>{{$element->name }}</option>
                         @endforeach

                          
                         </select>

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
