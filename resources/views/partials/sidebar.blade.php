<div class="list-group margin-top">
	
@foreach (App\category::orderBy('name','asc')->where('parent_id',NULL)->get() as $parent_category)
	
  <a  data-toggle="collapse" class="list-group-item list-group-item-action" href="#main-{{ $parent_category->id}}" role="button" >
  	<img src="{{asset('/storage')}}/{{ $parent_category->image}}" alt="{{ $parent_category->name}}" width="40"> {{ $parent_category->name}}
    
  </a>


  
<div class="collapse sub" id="main-{{ $parent_category->id}}">

	<div class="child-rows">
		@foreach ( App\category::orderBy('name','asc')->where('parent_id',$parent_category->id)->get() as $sub_category)

		

	<a href="{{ url('/category' )}}/{{ $sub_category->id }}"   class="list-group-item list-group-item-action"  >
	
	  	{{ $sub_category->name}}
	  	
	    
	  </a>
	
	@endforeach
		

	</div>
	
  
</div>
@endforeach

<!-- <div class="container">
  
  <ul class="nav flex-column">
    <li class="nav-item">
      <a class="nav-link" href="#">Link</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Link</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Link</a>
    </li>
    <li class="nav-item">
      <a class="nav-link disabled" href="#">Disabled</a>
    </li>
  </ul>
</div> -->
  



</div>