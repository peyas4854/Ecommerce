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
                            <form action="{{url('/store_category')}}" method="post" enctype="multipart/form-data">
                                @csrf

                                <h3 class="text-center">Add Category </h3>

                        <div class="form-group">
                         <label for="usr">Name </label>

                         <input type="text" class="form-control" placeholder="Enter about title" name="name">
                        </div>

                        <div class="form-group">
                         <label for="usr">Description </label>
                          <textarea class="form-control" rows="5" placeholder="Enter about description" name="description"></textarea>
                        </div>

                        <div class="form-group">
                         <label for="usr">Parent Category </label>
                          <select name="parent_id" id="" class="form-control">

                          <option value="">none</option>

                          @foreach($category as $info)
                            <option value="{{ $info->id}}" class="form-control">{{ $info->name}}</option>

                          @endforeach
                            
                          </select>
                        </div>
             

                        
                        
                        
                        
                        <div class="form-group">

                         <label for="usr"> image </label>

                         <input type="file" class="form-control" id="usr" placeholder="" name="image">
                        </div>

                         <button type="submit" class="btn btn-success">Submit</button>
           </form>
                </div>
          
          
        </div>
      </div>
       
      </div>
</div>

@endsection
