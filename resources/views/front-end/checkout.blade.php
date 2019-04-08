@extends('layouts.master')


@section('content')
@if (App\card::total_cards() > 0 )
<div class="col-md-12">
  @if(session('status'))
      <div class="alert alert-success">
    {{session('status')}}

</div>

      @endif
  
  
</div>


  <div class="col-md-12">
    <div class="card margin-top">
      <div class="card-header ">
      <h4>Confirm order</h4>
    </div>
    <div class="card-body ">
      


       <table class="table table-striped">
       <thead>
    
    <tr>
      

  <th>Product title</th>
  <th>Quantity</th>
  
  
  
    </tr>

  </thead>
  <tbody>
    @php
      $total_amount=0;
    @endphp
    @foreach (App\card::cards() as $card)
    <tr> 
      <td>{{ $card->product->title }} </td>

      <td>  {{ $card->product_quantity}}</td>
      
      

    


    </tr>

        @php
        $total_amount +=$card->product->price * $card->product_quantity
      @endphp
      @endforeach
      <tr>
      
      <td colspan="1"><strong> TOTAL AMOUT  </strong></td>
      <td colspan=""><strong> {{ $total_amount}} TK.</strong></td>
    </tr>
      
    
  </tbody>
        
       </table>

      


      
      
    

    
      
  
     
    <a href="{{ route('card_index') }}" class="btn btn-warning">Change card item</a>
    </div>
  </div>
  </div>
  
  <div class="col-md-12">
    <div class="card margin-top">
      <div class="card-header ">
      <h4>Shipping Address</h4>
       
    </div>
    <div class="card-body ">
      <form method="post" action="{{ url('order_store')}}">
                        @csrf
                      

                        <div class="form-group row">
                            <label for="First_name" class="col-md-2 col-form-label text-md-left ">{{ __(' First Name') }}</label>

                            <div class="col-md-8">

                                <input type="text" class="form-control" name="name" value="{{ Auth::check() ? Auth::user()->name:'' }}" required autofocus>

                                
                            </div>
                        </div>

                        
                        
                        <div class="form-group row">
                            <label  class="col-md-2 col-form-label text-md-left">{{ __(' Phone_no') }}</label>

                              
                            <div class="col-md-8">
                              

                                <input  type="number" name="phone_no" class="form-control "  value="" required autofocus>


                               
                            </div>
                               
                        </div>


                        <div class="form-group row">
                            <label for="email" class="col-md-2 col-form-label text-md-left">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-8">
                                <input id="email" type="email" class="form-control" name="email" value="{{ Auth::check() ? Auth::user()->email:'' }}" required>

                               
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label  class="col-md-2 col-form-label text-md-left">{{ __(' Shipping_address') }}</label>

                              
                            <div class="col-md-8">

                              

                                <input  type="text" class="form-control" name="shipping_address" value="" required autofocus>
                            


                            </div>
                              
                        </div>

                         <div class="form-group row">
                            <label  class="col-md-2 col-form-label text-md-left">{{ __(' Message') }}</label>

                              
                            <div class="col-md-8">

                              

                              <textarea name="message" class="form-control" rows="5"></textarea>
                            


                            </div>
                              
                        </div> 

          <div class="form-group row ">

             <label  class="col-md-3 col-form-label text-md-left">Select Payment method: </label>

              <div class="col-md-8">
                
  <!-- Nav tabs -->
  <ul class="nav nav-tabs">
    <li class="nav-item">
      <a class="nav-link " data-toggle="tab" href="#home">Bkash</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#menu1">Rocket</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#menu2">Dbbl</a>
    </li>
  </ul>



  <!-- Tab panes -->
  <div class="tab-content">


    <div id="home" class="container tab-pane "><br>
      <h3>HOME</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
    </div>

    <div id="menu1" class="container tab-pane fade"><br>
      <h3>Menu 1</h3>
      <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
    </div>

    <div id="menu2" class="container tab-pane fade"><br>

      <h3>Menu 2</h3>
      <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>

    </div>

  </div>





                  
                </div>

          </div>
              


                        

                      

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-success btn-lg">
                                   Finish Order
                                </button>
                            </div>
                        </div>
                    </form>

                              
                   


      
    </div>
  </div>
    
  </div>

@else

  <div class="col-md-12 margin-top">

  <div class="alert alert-warning">

    <h5 class="text-center"><strong>Your Card is Empty ! Please Select Your Product...for add to card</strong></h5>
    
  </div>
  

</div>
@endif











@endsection

@section('scripts')



	
@endsection




