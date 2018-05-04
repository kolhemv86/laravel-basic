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
                @if(session()->has('message'))                            
                    <div class="alert alert-info">
                        {{ session()->get('message') }}
                    </div>
                @endif
            </div>
            <div class="col-md-12">
                <div class="box box-info">
                    {!! Form::open(['route' => ['teamReportSave'], 'enctype' => "multipart/form-data",'method' => 'POST','id'=>'teamReportSave', 'class'=>'']) !!}
                    <div class="box-header with-border">
                        <h3 class="box-title">Add Team Member Report</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <div class="box-body">
                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Q1 : How are you today ?</label>
                                    <textarea class="form-control" id="A1" name="A1"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Q2 : High for the last 2 weeks ?</label>
                                    <textarea class="form-control" id="A2" name="A2"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Q3 : Low for the last 2 weeks ?</label>
                                    <textarea class="form-control" id="A3" name="A3"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Q4 : How I added the value to the team in last 2 weeks ?</label>
                                    <textarea class="form-control" id="A4" name="A4"></textarea>
                                </div>

                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Q5 : How I can improve myself ?</label>
                                    <textarea class="form-control" id="A5" name="A5"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Q6 : My Short/Long term goal(s) ?</label>
                                    <textarea class="form-control" id="A6" name="A6"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Q7 : What I value / appreciate about my job ?</label>
                                    <textarea class="form-control" id="A7" name="A7"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Q8 : How someone else helped me (last 2 weeks) ?</label>
                                    <textarea class="form-control" id="A8" name="A8"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a class="btn btn-default" href="{{route('payPeriod.index')}}" >Back</a>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </section>
</div>
@endsection