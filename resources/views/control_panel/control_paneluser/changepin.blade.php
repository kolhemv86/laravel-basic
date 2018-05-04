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
              <h3 class="box-title">Edit Admin Detail</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
           {!! Form::open(array('route' => 'pin_store', 'class' => 'form')) !!}
            <input type="hidden" name="id" value="{{$control_panelobj->id}}">
              <div class="box-body">
               
               
						<div class="form-group{{ $errors->has('pin') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Pin (Must be Unique)</label>

                            <div class="col-md-6">
                                <input id="pin" type="text" class="form-control" name="pin" value="{{ $control_panelobj->pin }}" required autofocus>

                                @if ($errors->has('pin'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('pin') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> 


                <div class="box-footer text-center col-sm-8">
                <a class="btn btn-primary" href="{{url('control_panel/home')}}" >Back</a>
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