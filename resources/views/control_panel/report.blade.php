@extends('control_panel.layouts.app')

@section('content')

<div class="content-wrapper">
<div class="container">

<?php //echo "<pre>"; print_r($reportobj); exit; ?>



<table class="table table-bordered table-striped dataTable">
<tr>
<td>Order id</td>
<td>User id</td>
<td>Book name</td>
<td>Book Price</td>
<td>Order Date</td>
</tr>

<?php foreach($reportobj as $report)
{ 

 //echo "<pre>"; var_dump($report->user->name); exit;

?>
	<tr>
	<td><?php echo $report->order_id; ?></td>
	<td><?php 
	
	if(isset($report->user->name))
	echo $report->user->name;
	else
	echo "---";
	
		
	?>
	
	</td>
	<td>
    <?php if(isset($report->orderdetail))
	{
	foreach($report->orderdetail as $detail)
	{
		if(isset($detail->book->name))
		echo $detail->book->name.'-'.$detail->book->price.'<br>';
		else
		echo "---";
		
		
	}
	}else{
		
		echo "--";
		
	}
	
	
	//echo $report->bname; ?>
	
	</td>
	<td><?php echo $report->book_price; ?></td>
	<td><?php echo $report->order_date; ?></td>
	
	
	</tr>
	
	
	
<?php  } 



?>


</table>
</div>
<?php echo $reportobj->render(); ?>
</div>






@endsection
