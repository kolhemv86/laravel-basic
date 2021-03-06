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
              <h3 class="box-title">Edit Role</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
           {!! Form::open(['route' => ['role.show',$role->id], 'method' => 'PATCH','id'=>'roleform','class'=>'form-horizontal']) !!}
            <input type="hidden" name="id" value="{{$role->id}}">
              <div class="box-body">
               
                



                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Role Name</label>

                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="inputEmail3" placeholder="Country Title" name="name" value="{{$role->name}}">
                  </div>
                </div>

               
              
                
                <div class="box-footer text-center col-sm-8">
                <a class="btn btn-primary" href="{{route('role.index')}}" >Back</a>
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