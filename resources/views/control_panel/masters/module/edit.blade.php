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
              <h3 class="box-title">Edit Country</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
           {!! Form::open(['route' => ['module.show',$module->id], 'method' => 'PATCH','id'=>'moduleform','class'=>'form-horizontal']) !!}
            <input type="hidden" name="id" value="{{$module->id}}">
              <div class="box-body">
               
                



                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Module Name</label>

                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="inputEmail3" placeholder="Module Name" name="modulename" value="{{$module->modulename}}">
                  </div>
                </div>

                 <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Module URL:</label>

                  <div class="col-sm-6">
                   <input type="text" class="form-control" id="uri" placeholder="Module URL" name="uri" value="{{$module->uri}}">
                  </div>
                </div>


                 <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Main Menu:</label>

                  <div class="col-sm-6">
                    <select class="form-control" name="subid">
                      <option value="0">-Select Main Menu-</option>
                        @foreach ($subModuleobj as $cont)
                      <option value="{{ $cont->id }}" <?php if($module->subid == $cont->id){ ?> selected <?php } ?>>{{ $cont->modulename }}</option>
                      @endforeach
                    </select>
                  
                  </div>
                </div>
				
				 <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Status:</label>

                  <div class="col-sm-6">
                  <select name="status" class="form-control">
				  <option value="1" <?php if($module->status == 1) { echo "selected"; } ?>>Active</option>
				   <option value="0" <?php if($module->status == 0) { echo "selected"; } ?>>Inactive</option>
				  
				  </select>
                  </div>
                </div>
              
                
                <div class="box-footer text-center col-sm-8">
                <a class="btn btn-primary" href="{{route('module.index')}}" >Back</a>
                <button type="submit" class="btn btn-info">Update</button>
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