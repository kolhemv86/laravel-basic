<div class="clearfix"></div>
   
   <section class="footer-wrap">
   	<div class="container-fluid">
    	<div class="row">
        	<div class="col-lg-5 col-md-5">
            	<div class="fleft">
                	<ul class="list-inline fbtnlinks">
                    	<li><a href="http://www.thereadersclub.com/">The Readers Club</a></li>
                        <li><a href="http://www.audible.com/urdustudio">Urdu Books</a></li>
                    </ul>
                    
                </div>
            </div>
            <div class="col-lg-7 col-md-7">
            	<div class="fright">
                	<ul class="list-inline flinks">
                    	<li><a href="{{ url('/') }}">Home</a></li>
                       
                        <li><a href="{{ url('/recentbooks') }}">Recently Added</a></li>
                        <li><a href="{{ url('/about') }}">About Us</a></li>
                        <li><a href="{{ url('/contact') }}">Contact Us</a></li>
                        <li><a href="{{ url('/faq') }}">Help</a></li>
                        <div class="clearfix"></div>
                    </ul>
                </div>
            </div>
        </div>
    </div>
   </section>
   
   @stack('scripts')