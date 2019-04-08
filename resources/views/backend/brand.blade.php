@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-3">
			
			@include('backend.include.sidebar')
		</div>
		<div class="col-md-9">

			<div class="row">
				
				<div class="col-md-8 offset-2">

                            <div class="card">



                        <div class="card-body">
                            <form action="{{url('/brand_store')}}" method="post" enctype="multipart/form-data">
                                @csrf

                                <h3 class="text-center"> Brand  </h3>
                                
                        <div class="form-group">

                         <label for="usr">Name </label>

                         <input type="text" class="form-control" placeholder="Enter brand name" name="name">
                        </div>


                         <div class="form-group">
                         <label for="usr"> Description </label>
                          <textarea class="form-control" rows="5" placeholder="Enter description" name="description"></textarea>
                        </div>

                        <div class="form-group">

                         <label>Image </label>

                         <input type="file" class="form-control" name="image">
                        </div>

                         <button type="submit" class="btn btn-success">Submit</button>
           </form>
                </div>
                      </div> 
					

				</div>
			</div>
			 
                   


                           
		</div>
	</div>
</div>
@endsection
