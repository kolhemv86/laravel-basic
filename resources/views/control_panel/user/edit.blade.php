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
              <h3 class="box-title text-center ">User Details</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            {!! Form::open(array('url' => 'control_panel/user/infoupdate','method'=>'POST','class'=>'form-horizontal')) !!}
        
            <input type="hidden" name="userid" value="{{$userobjs->user_id}}">
            
              <div class="box-body">
               
                
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">User Id</label>

                  <div class="col-sm-6">

                    <input type="text" class="form-control" id="inputEmail3" placeholder="First Name " name="name" value="{{$userobjs->user_id}}" readonly>

                  </div>
                </div>
                 <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Email</label>

                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="inputEmail3" placeholder="Email" name="email" value="{{$userobjs->user_name}}" readonly> 
                   
                  </div>
                </div>
                <div class="form-group hide">
                  <label for="inputEmail3" class="col-sm-2 control-label">Password</label>

                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="inputEmail3" placeholder="Email" name="email" value="{{$userobjs->password}}" readonly> 
                   
                  </div>
                </div>

                 <div class="box-header with-border">
                  <h3 class="box-title">Personal Details</h3>
                </div> 
                
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">First Name</label>

                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="inputEmail3" placeholder="First Name " name="name" value="{{$userobjs->first_name}}" readonly>

                  </div>
                </div>
                 
                 <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Last Name</label>

                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="inputEmail3" placeholder="Last Name" name="lname" value="{{$userobjs->last_name}}" readonly> 
                   
                  </div>
                </div>

               

                
               
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Address 1</label>

                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="inputEmail3" placeholder="Email" name="address1" value="{{$userobjs->address1}}" readonly> 
                   
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Address 2</label>

                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="inputEmail3" placeholder="Email" name="address2" value="{{$userobjs->address2}}" readonly> 
                   
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Country</label>

                  <div class="col-sm-6">
                  <?php foreach ($countryobj as $countryobjvalue) {
                     if($countryobjvalue->id == $userobjs->country_id){ ?>
                    <input type="text" class="form-control" id="inputEmail3" placeholder="country" name="country" value="<?php echo $countryobjvalue->name; ?>" readonly> 
                  <?php } } ?>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">State</label>

                  <div class="col-sm-6">
                  <?php foreach ($stateobj as $stateobjvalue) {
                     if($stateobjvalue->id == $userobjs->state_id){ ?>
                    <input type="text" class="form-control" id="inputEmail3" placeholder="state" name="state" value="<?php echo $stateobjvalue->name; ?>" readonly> 
                  <?php } } ?>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">City</label>

                  <div class="col-sm-6">
                  <?php foreach ($cityobj as $cityobjvalue) {
                     if($cityobjvalue->id == $userobjs->city){ ?>
                    <input type="text" class="form-control" id="inputEmail3" placeholder="city" name="city" value="<?php echo $cityobjvalue->name; ?>" readonly> 
                  <?php } } ?>
                  </div>
                </div>
               
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Phone</label>

                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="inputEmail3" placeholder="Email" name="Phone" value="{{$userobjs->phone}}" readonly> 
                   
                  </div>
                </div>

                

                

                

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Comission Type</label>

                  <div class="col-sm-6">
                    <label class="radio-inline"><input type="radio" value="Add" name="comission_type"  <? if($userobjs->comission_type=='Add') echo "checked";?>>Add</label>
                    <label class="radio-inline"><input type="radio" value="Sub" name="comission_type"  <? if($userobjs->comission_type=='Sub') echo "checked";?>>Sub</label>
                    
                  </div>
                </div>
                <?php if($userapiobj != ""){ ?>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">API</label>

                  <div class="col-sm-6">
                     <label for="inputEmail3" class="col-sm-2 control-label"><?php echo md5($userapiobj->api); ?></label>
                    
                  </div>
                </div>

                <?php  } ?>
                <div class="box-footer text-center col-sm-8">
                <a class="btn btn-primary" href="{{route('user.index')}}" >Back</a>
                <button type="submit" class="btn btn-info">Update</button>
                <?php if($userapiobj != ""){  }else{ ?>
                <a class="btn btn-primary" href="{{ url('/control_panel/user/'.$userobjs->user_id.'/makeapi') }}" >Make API User</a>
               <?php } ?>
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