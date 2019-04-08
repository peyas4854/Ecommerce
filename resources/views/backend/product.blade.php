@extends('layouts.app')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-3">
			
			@include('backend.include.sidebar')
		</div>
		<div class="col-md-9">

			<div class="row">
				<div class="col-md-5">
					<div class="card">
						


					

                        <div class="card-body">
                            <form action="{{url('/product_store')}}" method="post" enctype="multipart/form-data">
                                @csrf

                                <h3 class="text-center">Add product </h3>

                        <div class="form-group">
                         <label for="usr">Product  title </label>

                         <input type="text" class="form-control" placeholder="Enter about title" name="title">
                        </div>

                        <div class="form-group">
                         <label for="usr">Description </label>
                          <textarea class="form-control" rows="5" placeholder="Enter about description" name="description"></textarea>
                        </div>
             

                        
                        <div class="form-group">
                         <label for="usr">Price </label>

                         <input type="number" class="form-control" id="usr" placeholder="Enter about quantity" name="price">

                        </div>
                        
                        
                        <div class="form-group">

                         <label for="usr"> image </label>

                         <input type="file" class="form-control" id="usr" placeholder="Enter about point" name="image">
                        </div>

                         <button type="submit" class="btn btn-success">Submit</button>
           </form>
                </div>
					
					
				</div>
			</div>
				<div class="col-md-7">
                    <h2>Product List</h2>
                    <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Larry</td>
      <td>the Bird</td>
      <td>@twitter</td>
    </tr>
  </tbody>
</table>


					

				</div>
			</div>
			 
                   


                           
		</div>
	</div>
</div>
@endsection
