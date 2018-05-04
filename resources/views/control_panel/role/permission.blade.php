@extends('control_panel.layouts.app')

@section('content')

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
  

    <!-- Main content -->
    <section class="content">
      
     
<?php // echo "<pre>"; print_r($editpermission->toArray()); exit; ?>
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
              <h3 class="box-title">Add Permission</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
			<div id="msg" class="alert alert-danger" style="display:none;"></div>
         {!! Form::open(array('route' => 'per_store', 'class' => 'form')) !!}
		<input type="hidden" name="roleid" value="<?php echo $id; ?>"/>
              <div class="box-body">

              
			 <div class="form-group">
				 <label for="inputEmail3" class="col-sm-2 control-label">Permission:</label>
				 <div class="row">
				 <div class="col-md-12">

         


				 <?php $i=0;   $module=module_type(0);

          $moduleid=menu_role($id);

         foreach($module as $modules) 
				 { 
				  
				 
				  
         ?>

          <div class="col-md-12" style="margin-top: 20px;border-bottom: 1px solid #cfcfcf;margin-bottom: 10px;    padding-bottom: 10px;">
         <label class="checkbox-inline"><input type="checkbox" class="main" name="mod[]" value="<?php echo $modules->id; ?>" <?php if(in_array($modules->id, $moduleid)) { echo "checked"; } ?>/> &nbsp;&nbsp; <b><?php echo $modules->modulename; ?></b></label> 
         
         </div>
         <hr>

         <?php 


				$Modulesubobj=module_type($modules->id);
$strm1="";
foreach ($Modulesubobj as $ssModuleobjlist){
				 ?>
				 

				 <div class="col-md-3">
				 <label class="checkbox-inline">
				 <input type="checkbox" class="module<?php echo $modules->id?>" name="mod[]" value="<?php echo $ssModuleobjlist->id; ?>" <?php if(in_array($ssModuleobjlist->id, $moduleid)) { echo "checked"; } ?>/> &nbsp;&nbsp; <?php echo $ssModuleobjlist->modulename; ?></label> &nbsp;&nbsp;
				 
				 <?php if(in_array($ssModuleobjlist->id, $moduleid))
				 { ?>
				 <a href="#" data-toggle="modal" id="<?php echo $ssModuleobjlist->id?>" class="module_permission" data-target="#myModal">[Actions]</a>
				 <?php } ?>
				 </div>
				 
                
				
				
				 <?php $i++; } } ?>
				 
				 </div>
				</div>
			 </div>

			 
			 <div class="modal fade" id="myModal" role="dialog">
					<div class="modal-dialog modal-sm">
					  <div class="modal-content">
					  
						<div class="modal-header">
						  <button type="button" class="close" data-dismiss="modal">&times;</button>
						  <h4 class="modal-title">Access Permission </h4>
						</div>
						<div class="modal-body" style="height:200px;">
						  <div id="success"></div>
						  <div class="checkbox">
							<label><input type="checkbox" id="add" name="add_action" value="1">Add</label>
						  </div>
						  <div class="checkbox">
							<label><input type="checkbox" id="edit" value="1">Edit </label>
						  </div>
						  <div class="checkbox">
						    <label><input type="checkbox" id="delete" name="delete_action" value="1">Delete </label>
						  </div>
						  <button type="button"  class="btn btn-primary save" name="save">Save</button>
						</div>
						
					  </div>
					</div>
				  </div>
                
                
                <div class="box-footer text-center col-sm-8">
                <a class="btn btn-primary" href="{{route('role.index')}}" >Back</a>
                <button type="submit" class="btn btn-info">Save</button>
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
<?php

?>
<script type="text/javascript">
  $( document ).ready(function() {
	  var con_id;
	  var $permissions;
	  var role_id = <?php echo $id; ?>
	  
	 $(".module_permission").click(function(){
		 
		 
		 
		  con_id = $(this).prop("id");
		  console.log(con_id);
		
			   
		$.get('../ajax-getaction/' + con_id +'/' + role_id, function($permissions){
		
			   console.log($permissions);
			   add = parseInt($permissions.add_action);
			   edit = parseInt($permissions.edit_action);
			   deleted = parseInt($permissions.delete_action);
			   
			   $('#add').prop("checked",add);
			   $('#edit').prop("checked",edit);
			   $('#delete').prop("checked",deleted);
			
			});	   
			   
			   
		
	  });
	  
	  $( ".save" ).click(function() {
		  
		  
		   if ($('#add').is(":checked"))
			{
                var add_action = $('#add').val();
			}else{
				var add_action = 0;
			}
			
			
			
			
			if ($('#delete').is(":checked"))
			{
                var delete_action = $('#delete').val();
			}else{
				var delete_action = 0;
			}
			
			if ($('#edit').is(":checked"))
			{
                var edit_action = $('#edit').val();
			}else{
				var edit_action = 0;
			}
			
			
			
			
			
			
			$.get('../ajax-action/' + con_id +'/' + add_action +'/' + edit_action +'/' + delete_action + '/' + role_id, function(data){
		
			 $("#myModal").modal('hide');
			    $('#msg').show();
				$('#msg').html("Successfully Updated..");
				$('#msg').fadeOut(5000); 
			
				
			
			
			});
	  });
	  
	  
	  
  
   });

</script>
@endsection


