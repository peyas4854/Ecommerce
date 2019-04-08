@extends('layouts.master')

@section('sidebar')
<div class="col-md-3">
	
			<h2>sidebar</h2>
</div>

			

		
@endsection

@section('content')
<div class="col-md-9">
	
@include('front-end.product.partials.product')
</div>





@endsection



