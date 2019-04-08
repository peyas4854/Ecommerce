@extends('layouts.master')


@section('sidebar')

<div class="col-md-3">
	
            @include('partials.sidebar')
</div>


@endsection

@section('content')
<div class="col-md-9">
	

<p class="text-center">
	
	


<h4>Search by : <span class="badge badge-info"> {{$search}}</span></h4>

</p>

 @if ($products->count()>0)
 @include('front-end.product.partials.product')
	{{-- expr --}}
	@else
	<div class="alert alert-warning">
		<p>no product found</p>
	</div>			
	
@endif
</div>

@endsection



