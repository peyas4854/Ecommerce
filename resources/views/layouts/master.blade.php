<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>

      @yield('title','Lara E-commerce')
   

  </title>
     @include('partials.style')

    
</head>
<body>

    <div class="wrapper">
       <!--  start navbar -->
        <nav>
          @include('partials.nav')
        </nav>
<!-- end navbar -->


<article>

   @yield('slider')
  
  

</article>    

<!--  start side bar + content  -->
<div class="container">
    
       <!--  side  <-->
         <div class="row">
           
       
       
           @yield('sidebar')
            
         
         
        <!-- content -->

      
          @yield('content')
            
         </div>
<!--  end  side bar + content  -->



    </div>
  </div>
  <footer>
    @include('partials.footer')
</footer>
    
   


 @include('partials.scripts')
 
  @yield('scripts')

    
</body>
</html>