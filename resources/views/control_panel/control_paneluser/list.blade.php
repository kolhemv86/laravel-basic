@extends('control_panel.layouts.app')

@section('content')

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
  
 <?php //echo "<pre>"; print_r($userobj); exit; ?>
    <!-- Main content -->
    <section class="content">
      
     

      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header">
              <div class="col-md-6"> <h3 class="box-title">User List</h3></div>
               <div class="col-md-6 text-right"><a href="{{route('account.create')}}" class="btn btn-primary"> Add User</a></div>
			   <div class="row">
			   <?php /*<div class="col-md-4">
			   <div class="form-group">
                            <label for="email" class="col-md-4 control-label">Search by department</label>

                            <div class="col-md-6">
                            <select name="dept" id="depart" class="form-control">
							   <option value="">---Select---</option>
							   @foreach ($Departmentobj as $dep)
							   
							   <option value="{{ $dep->id }}" <?php if($depid == $dep->id) { echo "selected"; } ?>>{{ $dep->name }}</option>
							   
							   @endforeach
							   </select>
                            </div>
                        </div>
			   </div> */ ?>
			   
			   <div class="col-md-4" id="radiodiv">
			   <div class="form-group">
			   <label class="radio-inline"><b>Search User</b> : </label>
			   <label class="radio-inline"><input type="radio" name="status" id="status" value="A" <?php if($depid == "A") { echo "checked"; } ?>/>Active</label>
			   <label class="radio-inline"><input type="radio" name="status" id="status" value="D" <?php if($depid == "D") { echo "checked"; } ?>/>Inactive</label>
			   </div>
			   </div>
			   
			   
			   
			   
			   </div> 
			   
            </div>

            <!-- /.box-header -->
            <div class="box-body">

              <table class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
				  <th>Department</th>
                  <th>Role</th>
				  <th>Phone</th>
				  <th>Email</th>
				  <th>Status</th>
                      
                 
                  <th class="text-center">Action</th>
                </tr>
                </thead>
                    <tbody id="sdep">
                   @foreach ($userobj as $rat)
				   
				  
				   
               <tr>
                     <td>{{ $rat->id }}</td>
                     <td><?php echo $rat->name.' '.$rat->lname; ?></td>
                     <td>{{ $rat->Department($rat->dept) }}</td>
			         <td><?php echo $rat->Role->name; ?></td>
					 <td><?php echo $rat->cellno; ?></td>
					 <td><?php echo $rat->email; ?></td>
					 <td><?php echo $rat->status; ?></td>
                    
                  
                  <td class="text-center"><a href="<?php echo url('control_panel/account/'.$rat->id); ?> " class="btn btn-info"><i class="fa fa-edit"></i> </a>
                   <a href="account/{{$rat->id}}/delete" onclick="javascript: return confirm('Are You Sure To Delete ?');" class="btn btn-danger"> <i class="fa fa-trash"></i></a>
                  </td>
				  
				  
                </tr>
                 @endforeach
                 </tbody>
                <tfoot>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
				  <th>Department</th>
                  <th>Role</th>
				  <th>Phone</th>
				  <th>Email</th>
				  <th>Status</th>
                  <th class="text-center">Action</th>
                </tr>
                </tfoot>
              </table>
            </div>

          {{ $userobj->links() }}

            <!-- /.box-body -->
          </div>
        </div>

       
      </div>


      
    </section>

  </div>
<script type="text/javascript">
  $( "#depart" ).change(function() {
   var depval = $("#depart").val();
   
  window.location.href="<?php echo url('control_panel/account/ajax-dep/"+depval'); ?>
   
   
   
   
  /* $.get('account/ajax-dep/' + depval,function(response){
			  var response = $.parseJSON(JSON.stringify(result));
			  
				for(var i=0;i<response.userobj.data.length;i++){
				alert(response.userobj.data[i].name);
				
$("#sdep").replaceWith('<tr><td>'+response.userobj.data[i].id+'</td><td>'+response.userobj.data[i].name+'</td><td>'+response.userobj.data[i].dept+'</td><td>'+response.userobj.data[i].role+'</td></tr>')
				}
				
          });*/
});


  $(document).ready(function () {
            $('#radiodiv input:radio').change(function () {
                var selectedVal = $("#radiodiv input:radio:checked").val();
				window.location.href="<?php echo url('control_panel/account/ajax-dep/"+selectedVal'); ?>
                  
            });
			
      });
 

  
  

 
 
 
 
 
</script>

@endsection