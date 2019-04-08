@extends('layouts.dashboard')

@section('content')
<div class="container-fluid">
  <div class="row">
        <div class="col-md-12">
         <div class="card" >
  <div class="card-body">
    <h5 class="card-title">Product List</h5>
    @if(session('status'))
      <div class="alert alert-danger">
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
    
    <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Id</th>
     
      <th scope="col">Brand</th>
     
      <th scope="col">Title</th>
     
     
      <th scope="col">Price</th>
      <th scope="col">Status</th>
      <th scope="col">Action</th>

     

    </tr>
  </thead>
  <tbody>
    @foreach ($info as $product )
      
    <tr>
      <th scope="row">{{ $product->id }}</th>
     
      <td>{{ $product->brand_id }}</td>
      
      <td>{{ $product->title }}</td>
     
     
      <td>{{ $product->price}}</td>
      <td>
        @if ($product->status == 1)
          <i class="fas fa-check-square fa-2x" ></i>
        
        @else
        <span class="btn btn-warning">deactive</span>
      
        @endif
        
      </td>
      <td>
        
        
  <a href="{{ url('/product_delete') }}/{{$product->id  }}" ><i class="fa fa-trash-alt"></i></a> | |
  <a href="{{ url('/product_edit') }}/{{$product->id  }}"><i class="fa fa-user-edit"></i></a>| |
  <a href="#"><i class=" fas fa-info-circle"></i></a>

      </td>
     
      
    </tr>
    
    @endforeach
    
  </tbody>
</table>
  </div>
</div>
      </div>
       
      </div>
</div>

@endsection
