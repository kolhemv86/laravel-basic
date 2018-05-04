
 <section class="navbar-wrapper menu-wrap">
      <div class="container-fluid">
        <div class="row">         
              <div class="col-lg-5 col-md-5 col-sm-4 col-xs-12">
                <div class="logo"> 
                    <a href="{{ url('/') }}"><img src="{{ url('uploads/'.$sitescon->site_logo) }}" class="img-responsive"  alt="Logo"></a> 
                </div>
                <div class="navbar-header resp-div">
                          <button type="button" class="navbar-toggle collapsed resp-btn" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                          </button>
                        </div>
              </div>              
          <div class="col-lg-7 col-md-7 col-sm-8 col-xs-12">
                  <nav class="navbar navbar-default menubar">
                      <div class="container-fluid">
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                          <ul class="nav navbar-nav navbar-right menulinks">                    
                             
                             <li><a href="{{ url('/recentbooks') }}">Recently Added</a></li> 
                             
					  @if (Auth::guest())
						                  

                            <li><a href="login">Sell Books</a></li>

                            
                            <li><a href="{{ route('login') }}"><i class="fa fa-sign-in"></i> &nbsp;Login</a></li>
                            <li><a href="{{ route('register') }}"><i class="fa fa-sign-in"></i> &nbsp;Sign Up</a></li>
                           
                        @else		 
						<?php $id = Auth::user()->user_id ?>	 

                            <li><a href="{{ url('/sellbook') }}">Sell Books</a></li>

                     <li><a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Sign Out</a>
                           
         <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                 </form>                   
                           
        </li>
        <li class="dropdown">
              
				<a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">My Account </a>
        
			  <ul class="dropdown-menu">
          <li><a href="{{ url('/profile') }}">Edit My Profile</a></li>

          <li role="separator" class="divider"></li>
          <li class="dropdown-header">Transaction Detail</li>
          <li><a href="{{ url('/transaction') }}">Transactions</a></li>
          <li><a href="{{ url('/userorder') }}">Orders List</a></li>
          <li><a href="{{ url('soldbooklist') }}">Sold Book List</a></li>

          <li role="separator" class="divider"></li>
          <li class="dropdown-header">Books Information</li>
          
          <li><a href="{{ url('sellbook')}}">Add Book</a></li>
          <li><a href="{{ url('userbooklist')}}">Book List</a></li>
          <li><a href="{{ url('wishlist')}}">Wish List</a></li>
          <li role="separator" class="divider"></li>
        </ul>
			  
			  
            </li>
            <li>
                <a href="{{ url('cart') }}" style="padding-left: 0;">
                    <span class="carticon">
                        <i class="fa fa-shopping-cart"></i>
                        <span class="cartcount"><?php echo $cartuser; ?></span></span></a>
            </li>
			
			 @endif
                             
                          </ul>
                        </div><!-- /.navbar-collapse -->
                      </div><!-- /.container-fluid -->
                  </nav>
                </div>
              
              
            
      	</div>

      </div>
   </section>	
   
<div class="clearfix"></div>
@if (!request()->is('/'))
<section class="banner-wrap"><img src="{{ url('css/user/images/abanner.jpg') }}" class="img-responsive" style="width:100%;"></section>

@else
	

   <section id="homeCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators hidden-xs">
	  
	    <?php 
      for($j=0;$j<count($sliderobj);$j++){

       ?>
	     <li data-target="#homeCarousel" data-slide-to="{{$j}}" class="<?php if($j==0) { ?>active<?php } ?>"></li>
      
	  <?php } ?>
	  
      </ol>
      <div class="carousel-inner" role="listbox">
        
		 <?php $i=0; ?>
         @foreach ($sliderobj as $cont)
          
           <div class="item <?php if($i==0){ ?> active <?php } ?>">
          <img src="{{ asset('uploads/slider/' . $cont->photo) }}" style="width:100%;">
          <div class="container-fluid">
            <div class="carousel-caption hidden-xs">
              <h1>{{ $cont->name }} </h1>   
            </div>
          </div>
        </div>

       <?php $i++; ?>
         @endforeach
	
      </div>
      <a class="left carousel-control hidden" href="#homeCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control hidden" href="#homeCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </section>
    
  

@endif
	
	 




