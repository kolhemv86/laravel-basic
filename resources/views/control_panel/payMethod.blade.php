@extends('control_panel.layouts.app')
@section('content')

<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <div class="col-md-6">
                            <h3 class="box-title">Payment Methods</h3>
                        </div>
                        <div class="col-md-6 text-right"><a href="{{route('paymentMethod.create')}}" class="btn btn-primary"> Add Payment Method</a></div>
                    </div>
                    <div class="box-body">

                    	@if(session()->has('message'))                            
                            <div class="alert alert-info">
                                {{ session()->get('message') }}
                            </div>
                        @endif
                        <table  class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Payment Method</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($paymentMethodList as $paymentMethod)
                                <tr>
                                    <td>{{ $paymentMethod->id}}</td>
                                    <td>{{$paymentMethod->payment_method}}</td>
                                    <td class="text-center">
                                        
                                        <a href="{{route('paymentMethod.edit',$paymentMethod->id)}}" class="btn btn-info"><i class="fa fa-edit"></i> </a> 
                                        <a href="{{ route('deletePayMethod', $paymentMethod->id) }}" onclick="javascript: return confirm('Are You Sure To Delete ?');" class="btn btn-danger"> <i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Id</th>
                                    <th>Payment Method</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </tfoot>
                        </table>
                        {{ $paymentMethodList->links() }}
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

