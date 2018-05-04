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
              <h3 class="box-title">Add Fund</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
           {!! Form::open(['route' => ['user.store'], 'enctype' => "multipart/form-data",'method' => 'POST','id'=>'fundstore', 'class'=>'form-horizontal']) !!}
           
              <div class="box-body">

            
                <input type="hidden"  id="user_id"  name="user_id" value="{{ $userobjs->user_id }}">


        
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">User Name:</label>

                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="inputEmail3" placeholder="Country Title" name="name" value="{{ $userobjs->user_name }}" readonly="readonly">

                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Current Balance:</label>

                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="inputEmail3" placeholder="Enter Balance" name="name" value="{{ $userobjs->balance }}" readonly="readonly">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Amount:</label>

                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="amount" placeholder="Enter Amount" name="amount" value="">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Transaction Type:</label>
                 
                  <div class="col-sm-6">
                  <select name="cmbTransactionType" class="form-control">
                    <option value="CR" {{ $type=='CR' ? 'selected' : '' }}>CR</option>
                    <option value="DR" {{ $type=='DR' ? 'selected' : '' }}>DR</option>
                  </select>
                </div>
              </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Comment:</label>

                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="comment" placeholder="Enter comment" name="comment" value="">
                  </div>
                </div>
                <input type="hidden" name="oid" value="">
                <input type="hidden" name="odid" value="">
                <input type="hidden" name="wid" value="">
                <div class="box-footer text-center col-sm-8">
                <a class="btn btn-primary" href="{{route('user.index')}}" >Back</a>
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