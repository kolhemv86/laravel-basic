@extends('control_panel.layouts.app')

@section('content')

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
  

    <!-- Main content -->
    <section class="content">
      
     

      <div class="row">
            <div class="col-md-12 text-center"> 
@if (count($errors) > 0)
    <div class="alert alert-danger">
   
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
      
    </div>
@endif
 </div> 
   
	  <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Admin Detail</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
           {!! Form::open(['route' => ['account.show',$control_panelobj->id], 'method' => 'PATCH','id'=>'ratingform','class'=>'form-horizontal']) !!}
            <input type="hidden" name="id" value="{{$control_panelobj->id}}">
              <div class="box-body">
			  
			    <div class="form-group">
                            <label for="email" class="col-md-4 control-label">UserName</label>

                            <div class="col-md-6" style="margin-top:5px;">
                                {{$control_panelobj->username}} 

                                
                            </div>
                        </div>

			  
			  
			  
               
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">First Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ $control_panelobj->name }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
						
						
						<div class="form-group{{ $errors->has('lname') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Last Name</label>

                            <div class="col-md-6">
                                <input id="lname" type="text" class="form-control" name="lname" value="{{ $control_panelobj->lname }}" required autofocus>

                                @if ($errors->has('lname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('lname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
						
						<div class="form-group{{ $errors->has('cellno') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Cell Number</label>

                            <div class="col-md-6">
                                <input id="cellno" type="text" class="form-control" name="cellno" value="{{ $control_panelobj->cellno }}" required autofocus>

                                @if ($errors->has('cellno'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cellno') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
						
						
						<div class="form-group{{ $errors->has('carrier') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Carrier</label>

                            <div class="col-md-6">
                                <select name="carrier" class="form-control">
								<option value="0">---Select---</option>
								<?php foreach($carrierobj12 as $carrier) 
								{ ?>
								
								<option value="<?php echo $carrier->id; ?>" <?php if($control_panelobj->carrier == $carrier->id) { echo "selected"; } ?>><?php echo $carrier->name; ?></option>
								
								<?php } ?>
								
								</select>
                            </div>
                        </div>
				
				
				   
				
				
				
				
				
                       <!-- <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{$control_panelobj->email}}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>  -->
                         
						 <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6" style="margin-top:5px;">
                                {{$control_panelobj->email}} 

                                
                            </div>
                        </div>

						
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" value="">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" value="">
                            </div>
                        </div>

						<div class="form-group{{ $errors->has('dept') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Department</label>

                            <div class="col-md-6">
                               <select name="dept[]" multiple class="form-control">
							   <option value="">---Select---</option>
							   @foreach ($Departmentobj as $dep)
							   <?php $arr = explode(',',$control_panelobj->dept); 
                                
								if(in_array($dep->id,$arr)) 
								{ 
							     $chk = "selected";
								
								}else {
								 
								 $chk = ""; 
							
							     } 
								 ?>
							   
								
   
							   <option value="{{ $dep->id }}" <?php echo $chk; ?>>{{ $dep->name }}</option>
							   
							   @endforeach
							   </select>

                                @if ($errors->has('dept'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('dept') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                           
						

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Role</label>

                            <div class="col-md-6">
                                <select name="role" class="form-control">
                                   <?php foreach($Roleobj as $role) { ?>
								  <option value="<?php echo $role->id; ?>" <?php if($control_panelobj->role == $role->id) { echo "selected"; } ?>><?php echo $role->name; ?></option>
                                   <?php } ?>
                                </select>
                            </div>
                        </div>
						
						<div class="form-group{{ $errors->has('wage') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Wage(hourly rate)</label>

                            <div class="col-md-6">
                                <input id="wage" type="text" class="form-control" name="wage" value="{{ $control_panelobj->wage }}" required autofocus>

                                @if ($errors->has('wage'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('wage') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
						
						<div class="form-group{{ $errors->has('basepay') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Base Pay(base pay for 2 week)</label>

                            <div class="col-md-6">
                                <input id="basepay" type="text" class="form-control" name="basepay" value="{{ $control_panelobj->basepay }}" required autofocus>

                                @if ($errors->has('basepay'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('basepay') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
						
						
						<div class="form-group{{ $errors->has('notes') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Note</label>

                            <div class="col-md-6">
                                
                                <textarea id="notes" class="form-control" name="notes" required autofocus >{{ $control_panelobj->notes }}</textarea>
								
                                @if ($errors->has('notes'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('notes') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
						
						<div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Status</label>

                            <div class="col-md-6">
                              <select name="status" class="form-control">
							  <option value="Active" <?php if($control_panelobj->status == "Active") { echo "selected"; } ?>>ACTIVE</option>
							  <option value="Inactive" <?php if($control_panelobj->status == "Inactive") { echo "selected"; } ?>>INACTIVE</option>
							  </select>
                                @if ($errors->has('status'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('status') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
						
						
						
						<!--<div class="form-group{{ $errors->has('pin') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Pin (Must be Unique)</label>

                            <div class="col-md-6">
                                <input id="pin" type="text" class="form-control" name="pin" value="{{ $control_panelobj->pin }}" required autofocus>

                                @if ($errors->has('pin'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('pin') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> -->


                <div class="box-footer text-center col-sm-8">
                <a class="btn btn-primary" href="{{route('account.index')}}" >Back</a>
                <button type="submit" class="btn btn-info">Update</button>
              </div>
              </div>
              <!-- /.box-body -->
              
              <!-- /.box-footer -->
           {!! Form::close() !!}
          </div>
        </div>


       
      </div>


      
    </section>

  </div>


@endsection