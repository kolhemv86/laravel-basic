@extends('control_panel.layouts.app')

@section('content')

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
  

    <!-- Main content -->
    <section class="content">
      
     

      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header">
              <div class="col-md-6"> <h3 class="box-title">state List</h3></div>
               <div class="col-md-6 text-right"><a href="{{route('state.create')}}" class="btn btn-primary"> Add state</a></div>
            </div>

            <!-- /.box-header -->
            <div class="box-body">

              <table id="example2" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>state Name</th>
                   <th>Tax Rate</th>
                   <th>Country Name</th>
                
                 
                  <th class="text-center">Action</th>
                </tr>
                </thead>
                    <tbody>
                   @foreach ($stateobj as $cont)
                      <tr>
                     <td>{{ $cont->id }}</td>
                     <td>{{ $cont->name }}</td>
                     <td>{{ $cont->tax_rate }}</td>

                <td>{{ $cont->country->name}}</td>
                    
                  
                  <td class="text-center"><a href="state/{{$cont->id}}" class="btn btn-info"><i class="fa fa-edit "></i> </a>
                   <a href="state/{{$cont->id}}/delete" onclick="javascript: return confirm('Are You Sure To Delete ?');" class="btn btn-danger"> <i class="fa fa-trash"></i></a>
                  </td>
                </tr>
                 @endforeach
                 </tbody>
                <tfoot>
                <tr>
                  <th>ID</th>
                  
                  <th>Title</th>
                  <th class="text-center">Action</th>
                </tr>
                </tfoot>
              </table>
			  
			  {{ $stateobj->links() }}
			  
            </div>



            <!-- /.box-body -->
          </div>
        </div>

       
      </div>


      
    </section>

  </div>


@endsection