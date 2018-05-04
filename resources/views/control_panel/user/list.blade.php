@extends('control_panel.layouts.app')

@section('content')

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
  

    <!-- Main content -->
    <section class="content">
      
     
  {!! Form::open(array('url' => 'control_panel/user/splpkg','method'=>'POST','class'=>'form-horizontal')) !!}
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header">
              <div class="col-md-6"> <h3 class="box-title">Users List</h3></div>
               <!-- <div class="col-md-6 text-right"><a href="{{route('user.create')}}" class="btn btn-primary"> Add country</a></div> -->
            </div>

            <!-- /.box-header -->
            <div class="box-body">

              <table id="example2" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th> User Name</th>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>City </th>
                  <th>Balance </th>
                  <th>Special Category</th>
                  <th>View</th>
                  <th>Fund</th>
                  <th>List</th>	
                  
                	<?php if($userstatusd!='B'){ ?>			
                  <th class="text-center">Action</th>
                  <?php } ?>
                  
                </tr>
                </thead>
                    <tbody>
                   @foreach ($userobj as $cont)
                      <tr>
                     <td>{{ $cont->user_name }} <br> <?php if($cont->status=='suspend'){ ?><b style="color:#FF0000">{{ $cont->status }}</b><?php } ?> <?php if($userstatusd=='B'){ ?><a href="user/{{$cont->user_id}}/useractive" class="btn btn-success btn-xs">Make Active</a>  <?php } ?></td>
                     <td>{{ $cont->first_name }}</td>
                     <td>{{ $cont->last_name }}</td>
                     <td>{{ $cont->citys->name }}</td>
                     <td>{{ $cont->balance }}</td>
                     
                     <td>{{ $cont->comission_code }}</td>
                     <td class="text-center"><a href="user/{{$cont->user_id}}" class="btn btn-info btn-xs"><i class="fa fa-eye "></i> </a>
                     </td>	
                     <td class="text-center">
                     	<a href="user/CR/{{$cont->user_id}}/fund" class="btn btn-info btn-xs">Add Fund</a> <br> 
						<a href="user/DR/{{$cont->user_id}}/fund" class="btn btn-info btn-xs">Pay Fund </a> <br> 
						<a href="user/{{$cont->user_id}}/transaction" class="btn btn-primary btn-xs">Transactions</a>
					</td>
					<td class="text-center">
						<a href="{{ url('control_panel/orders/usersorder/'.$cont->user_id) }}" class="btn btn-success btn-xs">Order List</a>  <br> 
            <a href="book/{{$cont->user_id}}/userbook" class="btn btn-success btn-xs">Book List</a>
					</td>
					
                    
                  
                 <!--  <td class="text-center"><a href="user/{{$cont->user_id}}" class="btn btn-info"><i class="fa fa-edit "></i> </a> -->
                <?php if($userstatusd!='B'){ ?>    	<td>
                   <a href="user/{{$cont->user_id}}/delete" class="btn btn-danger btn-xs"> <i class="fa fa-trash "></i></a>  <input type="checkbox" name="chkspl[]" value="{{$cont->user_id}}">
                  </td>
                   <?php } ?>
                </tr>
                 @endforeach
                 </tbody>
                <?php if($userstatusd!='B'){ ?>  
                 <thead>
                 <tr>

                  <td colspan="5">
                    
                  </td>

                  <td>
                 <select name="selSpecialCategory" id="selSpecialCategory" class="form-control">
              <option value="Normal">Normal</option>


               @foreach ($Spepacklist as $Spepack)
                     
                        
              <option value=" {{ $Spepack->comission_code }}"> {{ $Spepack->title }}</option>
                        
              @endforeach
            
            </select>
                  </td>

                  <td colspan="5">
                    <input type="submit" name="apply" value="Apply" class="btn btn-info">
                  </td>

                 </tr>
               </thead>
               <?php } ?>
              </table>
            </div>



       


            <!-- /.box-body -->
          </div>
        </div>

       
      </div>

         {!! Form::close() !!}
      
    </section>

  </div>


@endsection