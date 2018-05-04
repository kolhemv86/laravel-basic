@extends('control_panel.layouts.app')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Version 2.0</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-car" aria-hidden="true"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Total Vehicles</span>
              <span class="info-box-number"><?php echo $totalvehicle; ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <!--<div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-google-plus"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Total Users</span>
              <span class="info-box-number"><?php echo $totaluser; ?></span>
            </div>
            
          </div>
        
        </div>
       
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Sales</span>
              <span class="info-box-number">760</span>
            </div>
           
          </div>
          
        </div> -->
        
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Total Active Users</span>
              <span class="info-box-number"><?php echo $totaluser; ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
		
		
		 <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Total Inactive Users</span>
              <span class="info-box-number"><?php echo $totalinuser; ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
		
		
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row">
        <div class="col-md-12">
		<?php if(Auth::guard('control_panels')->user()->role == 1) { ?>
          
		  <div class="box">
		  @if (count($errors) > 0)
		 <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
		 </div>
		 @endif
		  
            <div class="box-header with-border">
              <h3 class="box-title">Action Items</h3>     
            </div>
			<div class="box-body" style="overflow:scroll;height:300px;">
			<?php if(count($Actionobj)>0) { ?>
			{!! Form::open(['route' => 'action_store', 'enctype' => "multipart/form-data",'method' => 'POST','id'=>'checkform', 'class'=>'form-horizontal']) !!}	 
			  <input type="hidden" name="home" value="H"/>
              <table  class="table table-bordered table-striped">
			  
                <thead>
				
                <tr>
				
				  <th>Complete</th>
                  <th>Priority</th>
				  <th>Car</th>
				  <th>Memo</th>
				  <th>Created by</th>
				  <th>Due date</th>
				   
                </tr>
                </thead>
                    <tbody>
				<?php $comarr = array(); ?>	
                   @foreach ($Actionobj as $cont)
                      <tr>
					<?php 
					
					  $comarr[] = $cont->complete;
					 
					if($cont->complete == "Y") {
						
						$chk = "checked";
						$disbaled = "disabled";
					}else{
						
						$chk = "";
						$disbaled = "";
					}?>
                     <td>
					 
					 <input type="checkbox" name="complete[]" <?php echo $disbaled; ?> value="<?php echo $cont->id; ?>" <?php echo $chk; ?>/>
					 
					 </td>
                     <td><?php echo $cont->priroty; ?></td>
					 <td><a href="#" data-toggle="tooltip" title="<?php echo $cont->Stocks->year.' '.$cont->Stocks->make.' '.$cont->Stocks->model; ?>"><?php echo $cont->stock_id; ?></a>
					 
					 
					 
					 </td>
                     <td><?php echo $cont->memo; ?></td>
					 <td><?php if(isset($cont->Users->name)) { echo $cont->Users->name; }else{ echo "---"; } ?></td>
					 <td><?php echo $cont->due_date; ?></td>
                  
                </tr>
                 @endforeach
                 </tbody>
                <tfoot>
                <tr>
				
                 <th>Complete</th>
                  <th>Priority</th>
				  <th>Car</th>
				  <th>Memo</th>
				  <th>Created by</th>
				  <th>Due date</th>
				  
                </tr>
                </tfoot>
              </table>
			  
			  
			  
			  <?php 
			  
			
			    
				if (array_unique($comarr) === array('Y'))  
				{
				
					$disb = "disabled";
				}else{
					$disb = "";
				}
			  ?>
			  
			  <input type="submit" name="complate" <?php echo $disb; ?> onclick="javascript: return confirm('Are You Sure To Complete this action ?');" value="Complete" class="btn btn-success"/>
			  
			  
			  
			
		       {!! Form::close() !!} 
			<?php }else{
				echo "No Action items found";
			} ?>
			</div>
		</div>	
			
			
		
		<div class="box">	
			<div class="box-header with-border">
              <h3 class="box-title">Activity Log</h3>

              
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="overflow:scroll;height:300px;">
			
			
			
			
             <table class="table table-bordered">
			 <?php 
			 if(count($actionobj)>0)
			 {
			 $i=1; 
			 foreach($actionobj as $action)
			 { 
			   
			 ?>
				 <tr>
				 <td><?php echo $i; ?></td>
				 <td><b><?php echo $action->Stocks->make.' '.$action->Stocks->model; ?></b> is <?php echo $action->mainstatus;?> by <b><?php echo $action->Users->name.' '.$action->Users->lname; ?></b> on <b><?php echo $action->created_at; ?></b></td>
				 <?php if($action->mainstatus == "Inspected") { ?>
				 
				 <?php /*<td><a href="<?php echo url('control_panel/inspection/view/'.$action->inspection_id); ?>" class="btn btn-primary">View</a></td> */ ?>
				 
				 
				 <?php } ?>
				 
				 <!--<td><strong class="btn btn-success"><?php echo $action->status; ?></strong></td> -->
				 
				<?php /* <td><a href="<?php echo url('control_panel/inspection/status/A/'.$action->inspection_id); ?>" class="btn btn-success">Approve</a></td>
				 <td><a href="<?php echo url('control_panel/inspection/status/R/'.$action->inspection_id); ?>" class="btn btn-danger">Reject</a></td>
				 */ ?>
				 
				 </tr>
				 
			   <?php $i++;  } 
			 
			 }else{
				 
				 echo "No Action Log Found";
				 
			 }  ?>
			 
			 </table>
			 
             
            </div>
		</div>
	<?php } ?>	
</div>

</div>

</div>		




@endsection
