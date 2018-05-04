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
              <h3 class="box-title">Add User</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
                   {!! Form::open(['route' => ['account.store'], 'enctype' => "multipart/form-data",'method' => 'POST','id'=>'ratingform', 'class'=>'form-horizontal']) !!}
                        {{ csrf_field() }}
						
						
						<div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Username (Max 10 characters)</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" required autofocus>

                                @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
						
						

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">First Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

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
                                <input id="lname" type="text" class="form-control" name="lname" value="{{ old('lname') }}" required autofocus>

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
                                <input id="cellno" type="text" class="form-control" name="cellno" value="{{ old('cellno') }}" required autofocus>

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
								<?php foreach($carrierobj as $carrier)
								{ ?>
								
								<option value="<?php echo $carrier->id; ?>"><?php echo $carrier->name; ?></option>
								
								<?php } ?>
								
								</select>
                            </div>
                        </div>
						
						
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

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
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>
						
						
						<div class="form-group{{ $errors->has('dept') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Department</label>

                            <div class="col-md-6">
                               <select name="dept[]" multiple class="form-control">
							   <option value="">---Select---</option>
							   @foreach ($Departmentobj as $dep)
							   
							   <option value="{{ $dep->id }}">{{ $dep->name }}</option>
							   
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
                                  <option value="0">---Select---</option>
								  <?php foreach($roleobj as $role) { ?>  
									<option value="<?php echo $role->id; ?>"><?php echo $role->name; ?></option>
                                  <?php } ?>  
                                </select>
                            </div>
                        </div>
						
						<div class="form-group{{ $errors->has('wage') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Wage(hourly rate)</label>

                            <div class="col-md-6">
                                <input id="wage" type="text" class="form-control" name="wage" value="{{ old('wage') }}" required autofocus>

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
                                <input id="basepay" type="text" class="form-control" name="basepay" value="{{ old('basepay') }}" required autofocus>

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
                                
                                <textarea id="notes" class="form-control" name="notes" required autofocus >{{ old('notes') }}</textarea>
								
                                @if ($errors->has('notes'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('notes') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
						
						<?php /*<div class="form-group{{ $errors->has('pin') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Pin (Must be Unique)</label>

                            <div class="col-md-6">
                                <input id="pin" type="text" class="form-control" name="pin" value="{{ old('pin') }}" required autofocus>

                                @if ($errors->has('pin'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('pin') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> */ ?>
						
						
						<div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Status</label>

                            <div class="col-md-6">
                              <select name="status" class="form-control">
							  <option value="Active">ACTIVE</option>
							  <option value="Inactive">INACTIVE</option>
							  </select>
                                @if ($errors->has('status'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('status') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
						
						

                        <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                        <div class="box-footer text-center col-sm-8">
                        <a class="btn btn-primary" href="{{route('account.index')}}" >Back</a>
                        <button type="submit" class="btn btn-info">Save</button>
                        </div>
                        </div>
                        </div>
                     {!! Form::close() !!}
               </div>
               </div>
               </div>
               </section>
               </div>
			   
<script>   
    $(document).ready(function () {
    
	$('#ratingform').validate({ // initialize the plugin
	    rules: {
		password: {
			required: true,
			digits: true,
			maxlength: 5
		},
		username: {
			required: true,
			maxlength: 10
		},
		cellno: {
			required: true,
			maxlength: 10
			
		}
	}
    });
});
</script>			   

@endsection
