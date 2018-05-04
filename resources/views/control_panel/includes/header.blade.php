<header class="main-header">
    <?php //echo "<pre>"; print_r($sitescon); exit; ?>
        <!-- Logo -->
        <a class="logo" href="{{ url('/control_panel') }}">
                   <img src="<?php echo $sitescon->site_URL; ?>/uploads/<?php echo $sitescon->site_logo; ?>" height="40"> {{ config('app.name', 'Laravel') }} 
                </a>

        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">

                    <li style="width: 300px;">
                            {!! Form::open(['route' => ['clockout'], 'enctype' => "multipart/form-data",'method' => 'POST', 'id'=> "clock" ,'style'=>'margin-bottom:0px;padding-top:8px;']) !!}
                                <div class="input-group">
                                    <span class="input-group-btn">
                                    <a href="#" id="clockin" class="btn btn-info btn-flat" type="submit">Clock IN</a>
                                    </span>
                                    <input type="text" name="break_time" id="break_time" placeholder="Break Time (Minutes)" class="form-control" required="">
                                    <span class="input-group-btn">
                                    <button class="btn btn-info btn-flat" type="submit">Clock Out</button>
                                    </span>
                                </div>
                            
                            {!! Form::close(); !!}
                    </li>

                    <!-- User Account Menu -->
                    <li class="dropdown user user-menu">
                        <a href="{{ url('/control_panel/profile') }}"  aria-expanded="false">
                            <span class="hidden-xs">{{ Auth::guard('control_panels')->user()->name }}</span>
                        </a>
                        <?php /*
                        <ul class="dropdown-menu">
                            <li class="user-body">
                                {!! Form::open(['route' => ['clockout'], 'enctype' => "multipart/form-data",'method' => 'POST', 'id'=> "clock"]) !!}
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-btn">
                                            <button href="#" id="clockin" class="btn btn-info btn-flat" type="submit">Clock IN</button>
                                            </span>
                                            <input type="text" name="break_time" id="break_time" placeholder="Break Time (Minutes)" class="form-control" required="">
                                            <span class="input-group-btn">
                                            <button class="btn btn-info btn-flat" type="submit">Clock Out</button>
                                            </span>
                                        </div>
                                    </div>
                                {!! Form::close(); !!}
                            </li>                           
                        </ul>
                        */ ?>
                    </li>

                    <li class="dropdown user user-menu">
                        <!-- Menu Toggle Button -->
                        <a href="{{-- url('/control_panel/logout') --}}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            <!-- The user image in the navbar-->

                            <span class="hidden-xs"> Logout</span>
                        </a>

                        <form id="logout-form" action="{{ url('/control_panel/logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>

                    </li>

                </ul>
            </div>
        </nav>
</header>


<script type="text/javascript">
    $(document).ready(function(){
        $('#clock').submit(function(){
            $.ajax({
                url: "{{ route('clockout') }}",
                dataType: "json",
                data: $('#clock').serialize(),
                success: function(data) {
                    alert(data.message);
                    document.getElementById("clock").reset();
                }
            });
            return false;
        });

        $('#clockin').click(function(){
            $.ajax({
                url: "{{ route('clockin') }}",
                success: function(data) {
                    alert(data.message);
                }
            });
            return false;
        });
    });
</script>