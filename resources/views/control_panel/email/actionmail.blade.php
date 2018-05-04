<div class="row">
<div class="col-md-12">
<img src="<?php echo url('uploads/action-item.jpg'); ?>"/>
<div class="col-md-6">
<h3>Hi..</h3>
<p>Helloo <b><?php echo $create_by->name.' '.$create_by->lname; ?></b> given to action for you</p>
<p><b>Vehicle Details</b> : <?php echo $vehicle->make.' '.$vehicle->model.' '.$vehicle->year; ?> </p>
<p><b>Action</b> : <?php echo $action->memo; ?></p>
<p><b>Due Date</b> : <?php echo $action->due_date; ?></p>
<p>Thanks..</p>

</div>

</div>
</div>