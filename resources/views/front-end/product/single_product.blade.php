@extends('layouts.master')

@section('title')

{{ $single_product->title}} | Lara E-commerce
          

@endsection


@section('content')
<div class="col-md-12">
	@if(session('status'))
      <div class="alert alert-success">
    {{session('status')}}

</div>

      @endif
</div>


	



<div class="col-md-3">

	<div class="single-image">

		<img class="img" src="{{asset('storage')}}/{{$product_image->image}}" alt="{{ $single_product->title}}">
		<h5 class=""> {{ $single_product->title}}</h5>
		<p> @if($single_product->quantity > 0)
		
			@else Product:
			<span class="badge badge-warning ">
			Not available

		</span>

			@endif</p>

		
			<p>

				@if ($single_product->category->id == NULL )
				

				@else
				Category:
				<span class="badge badge-info ">
			

				{{$single_product->category->name }}
		</span>

					
				@endif

				


			</p>

			<p>

				@if ($single_product->brand->id == NULL )
				

				@else
				Brand:
				<span class="badge badge-info ">
			

				{{$single_product->brand->name }}
		</span>

					
				@endif

				


			</p>
			<form action=" {{ route('cart')}}"  method="POST"  class="from-control">
	@csrf
<input type="hidden" name="product_id" value={{ $single_product->id }} >

	<button type="submit" class="btn btn-sm btn-primary btn-block">Add to card </button>
	
	


</form>
			
			
	
			

	</div>
</div>

<div class="col-md-6 ">
		<div class="widget">








				<table class="table table-bordered">
	<h5 class="text-center">
		Product - {{ $single_product->title}}
	
	</h5>

    <thead>
      <tr>
        <td>Name</td>
        <td>{{ $single_product->title}} </td>
       
       
      </tr>
      <tr>
        <td>Description</td>
        <td>{{ $single_product->description}} </td>
       
       
      </tr><tr>
        <td>Price</td>
        <td>{{ $single_product->price}} </td>
       
       
      </tr><tr>
        <td>Offer Price</td>
        
        <td>{{$single_product->offer_price}}</td>
       
       
      </tr>

    </thead>
   
      
      
   
  </table>
	
			</div>
</div>





	

   
	


@endsection


