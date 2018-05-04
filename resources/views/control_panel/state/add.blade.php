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
              <h3 class="box-title">Add State</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
           {!! Form::open(['route' => ['state.store'], 'enctype' => "multipart/form-data",'method' => 'POST','id'=>'stateform', 'class'=>'form-horizontal']) !!}
           
              <div class="box-body">

            


                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">State Title:</label>

                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="inputEmail3" placeholder="State Title" name="name" value="">
                  </div>
              </div> 

              <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Tax Rate:</label>

                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="inputEmail3" placeholder="Tax Rate" name="tax_rate" >
                  </div>
              </div> 
              <div class="form-group">
                 <label for="inputEmail3" class="col-sm-2 control-label">Country:</label>
                  <div class="col-sm-6">
                    <select class="form-control" name="cid" >
                    <option>-Select Country-</option>

                    
                     @foreach ($countrys as $cont)
                  <option value="{{ $cont->id }}"> {{ $cont->name }}</option>
                    
                   

                     @endforeach




                    </select>
                  </div>
               </div>   
               
              
                
                <div class="box-footer text-center col-sm-8">
                <a class="btn btn-primary" href="{{route('state.index')}}" >Back</a>
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


@endsection