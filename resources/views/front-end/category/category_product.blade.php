@extends('layouts.master')

@section('sidebar')

<div class="col-md-3">
	
			@include('partials.sidebar')
</div>


@endsection

@section('content')
<div class="col-md-9">
	





<div class="text">

	<h4 class="text-center">  Category  : <span class="badge badge-info">{{$category->name}} </span></h4>
</div>


@php
	$products=$category->products()->paginate(9);
@endphp

@if ($products->count()>0)
 @include('front-end.product.partials.product')
	{{-- expr --}}
	@else
	<div class="alert alert-warning">
		<p>Sorry!  No product found</p>
	</div>			
	
@endif
</div>





@endsection



