@extends('control_panel.layouts.app')

@section('content')

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
  

    <!-- Main content -->
    <section class="content">
      
     

      <div class="row">
        <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Site config</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
           {!! Form::open(['route' => ['siteconfig.show',$siteconfigobj->site_config_id], 'method' => 'PATCH','id'=>'Siteconfigform','class'=>'form-horizontal']) !!}
            <input type="hidden" name="site_config_id" value="{{$siteconfigobj->site_config_id}}">
              <div class="box-body">
               
                



                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Site Name</label>

                  <div class="col-sm-6">
                    <input type="text" class="form-control" readonly="readonly" id="inputEmail3" placeholder="Site Name" name="site_name" value="{{$siteconfigobj->site_name}}">
                  </div>
                </div>


                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Site URL</label>

                  <div class="col-sm-6">
                    <input type="text" class="form-control" readonly="readonly" id="inputEmail3" placeholder="Site URL" name="site_URL" value="{{$siteconfigobj->site_URL}}">
                  </div>
                </div>


                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Site Logo</label>

                  <div class="col-sm-6">
                    <img src="{{ url('uploads/'.$siteconfigobj->site_logo) }}">
                  </div>
                </div>


                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Admin Email</label>

                  <div class="col-sm-6">
                    <input type="text" class="form-control" readonly="readonly" id="inputEmail3" placeholder="Admin Email" name="admin_email" value="{{$siteconfigobj->admin_email}}">
                  </div>
                </div>


                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Admin Name</label>

                  <div class="col-sm-6">
                    <input type="text" class="form-control"  readonly="readonly" id="inputEmail3" placeholder="Admin Name" name="admin_name" value="{{$siteconfigobj->admin_name}}">
                  </div>
                </div>


                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">From Email</label>

                  <div class="col-sm-6">
                    <input type="text" class="form-control" readonly="readonly" id="inputEmail3" placeholder="From Email" name="from_email" value="{{$siteconfigobj->from_email}}">
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">From Name</label>

                  <div class="col-sm-6">
                    <input type="text" class="form-control" readonly="readonly" id="inputEmail3" placeholder="From Name" name="from_name" value="{{$siteconfigobj->from_name}}">
                  </div>
                </div>

                  <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Record Per Page</label>

                  <div class="col-sm-6">
                    <input type="text" class="form-control" readonly="readonly" id="inputEmail3" placeholder="Record Per Page" name="record_per_page" value="{{$siteconfigobj->record_per_page}}">
                  </div>
                </div>


               





                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Currency Symbol</label>

                  <div class="col-sm-6">
                    <input type="text" class="form-control" readonly="readonly" id="inputEmail3" placeholder="Currency Symbol" name="currency_symbol" value="{{$siteconfigobj->currency_symbol}}">
                  </div>
                </div>
                               

                
 
                
                <div class="box-footer text-center col-sm-8">
                <a class="btn btn-primary" href="{{route('siteconfig.index')}}" >Back</a>
                <a href="{{ url('/control_panel/siteconfig/'.$siteconfigobj->site_config_id) }}" class="btn btn-info"><i class="fa fa-edit"></i> Update </a> 
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