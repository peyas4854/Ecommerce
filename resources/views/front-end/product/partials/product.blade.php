<div class="widget margin-top">
                <div class="row">

                 @foreach($products as $product)


    <div class="col-md-4">
                          <div class="card single-item " >

                          
                           
                          @php
                            $i=1;
                          @endphp
                          @foreach ($product->images as $image)
                          @if ($i>0)
                            
            <a href="{{ url('/single_product')}}/{{ $product->slug }}">
                            <img class="card-img-top" src="{{asset('storage')}}/{{ $image->image }}" alt="{{ $product->title }}">
                               
            </a>
                          @endif
                          @php
                            $i--;
                          @endphp
                          @endforeach
                         

                          <div class="card-body">
                            <h5 class="card-title">
                              <a href="{{ url('/single_product')}}/{{ $product->slug }}">{{ $product->title }}</a>
                              
                            </h5>
                            <p class="card-text">
                              {{ $product->description }}
                            </p>
                            <p class="card-text">
                              <label>Tk.</label>{{ $product->price }}
                            </p>

                           @include('front-end.product.partials.cart_button')
                          </div>
                        </div>
          
                   
 </div>
                 @endforeach
           
            
        </div>

       
        

    <div class="pagination">
      {{ $products->links() }}
     
    </div>
    </div>