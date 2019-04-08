@extends('layouts.master')


@section('content')

@if (App\card::total_cards() > 0)

<div class="col-md-12">
	@if(session('status'))
      <div class="alert alert-success">
    {{session('status')}}

</div>

      @endif
	
	<h3>My Card Item</h3>
</div>

<table class="table table-bordered margin-top ">
	
	<thead>
		
		<tr>
			
	<th>#</th>
	<th>Product title</th>
	<th>Image</th>
	<th>Quantity</th>
	<th>Unit Price</th>
	<th> Price</th>

	
	<th>Action</th>
		</tr>
	</thead>
	

	<tbody>
		@php
			$total_amount=0;
		@endphp
		@foreach (App\card::cards() as $card)
			
		

		<tr>
			<td>{{$loop->index + 1 }}</td>
			<td>

			 <a href="{{ url('/single_product')}}/{{ $card->product->slug }}">{{ $card->product->title }}</a>

		</td>
			<td> 
				@if ($card->product->images()->count() > 0 )
					{{-- expr --}}
				
				

					

				<img class="img" src="{{asset('storage')}}/{{ $card->product->images()->first()->image}}" alt="{{ $card->product->title}}" width="60"> 
				@endif

				
			</td>
			<td>
		<form action="{{ url('card_update')}}"  method="POST"  class="from-control">
	@csrf

       <input type="number" name="product_quantity" value="{{ $card->product_quantity}}">
       <input type="hidden" name="id" value="{{ $card->id}}">

	<button type="submit" class="btn btn-sm btn-success">Add</button>
	
	


</form>


			           


			</td>
			<td>{{$card->product->price}} </td>
			<td>{{$card->product->price * $card->product_quantity}} </td>
			@php
				$total_amount +=$card->product->price * $card->product_quantity
			@endphp
			<td> <a href="{{ url('card_delete')}}/{{ $card->id}}" ><i class="fa fa-trash-alt"></i></a> </td>
		</tr>
		@endforeach
		<tr>
			<td colspan="3"></td>
			<td colspan=""><strong> TOTAL AMOUT  </strong></td>
			<td colspan="3"><strong> {{ $total_amount }} TK.</strong></td>
		</tr>

		

	</tbody>
	
</table>

@else

<div class="col-md-12 margin-top">

	<div class="alert alert-warning">

  	<h5 class="text-center"><strong>Your Card is Empty ! Please Select Your Product...for add to card</strong></h5>
  	
  </div>
	

</div>

  

	
@endif


<div class="ml-auto margin-top">


	<a href="{{url('all_product')}}" class="btn btn-lg btn-info"> Contunue Shopping... </a>
	@if (App\card::total_cards() > 0)
		
	<a href="{{url('/checkout_index')}}" class="btn btn-lg btn-warning">Checkout</a>
	@endif


</div>





@endsection



