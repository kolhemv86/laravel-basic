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
              <h3 class="box-title">Edit Site config</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
           {!! Form::open(['route' => ['siteconfig.show',$siteconfigs->site_config_id], 'enctype' => "multipart/form-data", 'method' => 'PATCH','id'=>'Siteconfigform','class'=>'form-horizontal']) !!}
            <input type="hidden" name="site_config_id" value="{{$siteconfigs->site_config_id}}">
              <div class="box-body">
               
                



                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Site Name</label>

                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="inputEmail3" placeholder="Site Name" name="site_name" value="{{$siteconfigs->site_name}}">
                  </div>
                </div>


                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Site URL</label>

                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="inputEmail3" placeholder="Site URL" name="site_URL" value="{{$siteconfigs->site_URL}}">
                  </div>
                </div>


                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Site Logo</label>

                  <div class="col-sm-6">
                    <input type="file" class="form-control" name="site_logo" id="inputEmail3">
                    <img src="{{ url('uploads/'.$siteconfigs->site_logo) }}">

                  </div>
                </div>


                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Admin Email</label>

                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="inputEmail3" placeholder="Admin Email" name="admin_email" value="{{$siteconfigs->admin_email}}">
                  </div>
                </div>


                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Admin Name</label>

                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="inputEmail3" placeholder="Admin Name" name="admin_name" value="{{$siteconfigs->admin_name}}">
                  </div>
                </div>


                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">From Email</label>

                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="inputEmail3" placeholder="From Email" name="from_email" value="{{$siteconfigs->from_email}}">
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">From Name</label>

                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="inputEmail3" placeholder="From Name" name="from_name" value="{{$siteconfigs->from_name}}">
                  </div>
                </div>

                  <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Record Per Page</label>

                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="inputEmail3" placeholder="Record Per Page" name="record_per_page" value="{{$siteconfigs->record_per_page}}">
                  </div>
                </div>
                
                
               <div class="form-group ">
                  <label for="inputEmail3" class="col-sm-2 control-label">Currency Symbol</label>

                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="inputEmail3" placeholder="Currency Symbol" name="currency_symbol" value="{{$siteconfigs->currency_symbol}}">
                  </div>
                </div>
 
                
                <div class="box-footer text-center col-sm-8">
                <a class="btn btn-primary" href="{{route('siteconfig.index')}}" >Back</a>
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