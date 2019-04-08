<form action=" {{ route('cart')}}"  method="POST"  class="from-control">
	@csrf
<input type="hidden" name="product_id" value={{ $product->id }} >

	<button type="submit" class="btn btn-sm btn-primary">Add to card </button>
	
	


</form>


