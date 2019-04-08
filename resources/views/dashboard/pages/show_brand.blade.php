@extends('layouts.dashboard')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      
    
       
         <div class="card" >
  <div class="card-body">
    <h5 class="card-title">brand List</h5>
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
     
      <th scope="col">Name</th>
      <th scope="col">Description</th>
     
      <th scope="col">Image</th>
      <th scope="col">Action</th>

     

    </tr>
  </thead>
  <tbody>
    @foreach ($brand as $info )
      
    <tr>
      <th scope="row">{{ $info->id }}</th>
      <td>{{ $info->name }} </td>
      <td>{{ $info->description }} </td>
     
      

      <td> <img src="{{asset('storage')}}/{{$info->image }}" {{ $info->name }}></td>
      
    
     
     
      
      <td>
        
        
  <a href="{{ url('/brand/delete') }}/{{$info->id}}" ><i class="fa fa-trash-alt"></i></a> | |
  <a href="{{ route('brand.edit',$info->id) }}"><i class="fa fa-user-edit"></i></a>| |
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
