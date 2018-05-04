@extends('control_panel.layouts.app')

@section('content')

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
  

    <!-- Main content -->
    <section class="content">
      
     

      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header">
              <div class="col-md-6"> <h3 class="box-title">Transaction List</h3></div>
               <!-- <div class="col-md-6 text-right"><a href="{{route('user.create')}}" class="btn btn-primary"> Add country</a></div> -->
            </div>

            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                  <div class="col-md-3 col-md-offset-3">
                    <div class="form-group">
                      <label for="name" class="control-label"><i class="fa fa-calendar" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;From Date</label>
                      <input id="datepicker" type="text" class="form-control" placeholder="From Date" name="min">
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="name" class="control-label"><i class="fa fa-calendar" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;To Date</label>
                      <input id="datepicker1" type="text" class="form-control" placeholder="To Date" name="max">
                    </div>
                  </div>
              </div>
              
            <div class="row">
              <div class="col-md-12">
              <table id="example4" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Transaction Date</th>
                  <th>Detail</th>
                  <th>Deposit</th>
                  <th>Withdraw </th>
                  <th>Balance </th>
                  
                </tr>
                </thead>
                    <tbody>

                   @foreach ($userobjs  as $cont)

                      <tr>
                     <td>{{ date('d-m-Y', strtotime($cont->date_added)) }}</td>
                     <td>{{ $cont['comment'] }}</td>
                     <td>{{ $cont['DR_CR']=='CR' ? $cont['amount'] : '' }}</td>
                     <td>{{ $cont['DR_CR']=='DR' ? $cont['amount'] : '' }}</td>
                     <td>{{ $cont['balance_after'] }}</td>
                     
                     
                </tr>
                 @endforeach
                 </tbody>
               
              </table>
            </div>
            </div>
            </div>


            <!-- /.box-body -->
          </div>
        </div>

       
      </div>


      
    </section>

  </div>
 <script>

  




  $( function() {
    $( "#datepicker" ).datepicker({ dateFormat: 'dd-mm-yy' }).val();
  } );
  $( function() {
    $( "#datepicker1" ).datepicker({ dateFormat: 'dd-mm-yy' }).val();

  } );



 $( function() {

  var table =  $('#example4').DataTable({
    "ordering": false,
     "pageLength": 100
            
  });

$.fn.dataTable.ext.search.push(
    function( settings, data, dataIndex ) {
        var dateFrom = $('#datepicker').val();
        var dateTo = $('#datepicker1').val();
        var search = $('input[type="search"]').val();
         
if(dateFrom || dateTo){

        var dateCheck = data[0] || 0; // use data for the age column


        

var d1 = dateFrom.split("-");
var d2 = dateTo.split("-");
var c = dateCheck.split("-");

var from = new Date(d1[2], parseInt(d1[0])-1, d1[1]);  // -1 because months are from 0 to 11
var to   = new Date(d2[2], parseInt(d2[0])-1, d2[1]);
var check = new Date(c[2], parseInt(c[0])-1, c[1]);

		if(check >= from && check <= to)
		{
		    return true;
		}

        return false;
}else{
   return true;
}

    }
);
 



    

    $('#datepicker, #datepicker1').change( function() {
        table.draw();
    } );

     $('input[type="search"]').keyup( function() {
table.draw();
    
    } );

   



  } );
  </script>

@endsection