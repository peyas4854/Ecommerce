@extends('layouts.master')

@section('slider')

@include('partials.slider')


@endsection



@section('sidebar')
<div class="col-md-3">
	
            @include('partials.sidebar')

</div>


@endsection

@section('content')
<div class="col-md-9">
	

@if(session('status'))
      <div class="alert alert-success">
    {{session('status')}}

</div>

      @endif

 @include('front-end.product.partials.product')
</div>


@endsection



