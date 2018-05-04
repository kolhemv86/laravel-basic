




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
              <div class="col-md-6"> <h3 class="box-title">city List</h3></div>
               <div class="col-md-6 text-right"><a href="{{route('city.create')}}" class="btn btn-primary"> Add city</a></div>
            </div>

            <!-- /.box-header -->
            <div class="box-body">

              <table id="example2" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>city Name</th>
                   <th>state Name</th>
                   <th>country Name</th>
                
                 
                  <th class="text-center">Action</th>
                </tr>
                </thead>
                    <tbody>
                   @foreach ($cityobj as $cont)
                      <tr>
                     <td>{{ $cont->id }}</td>
                     <td>{{ $cont->name }}</td>

                <td>{{ $cont->state->name}}</td>
                <td>{{ $cont->country->name}}</td>

                    
                  
                  <td class="text-center"><a href="city/{{$cont->id}}" class="btn btn-info"><i class="fa fa-edit"></i> </a>
                   <a href="city/{{$cont->id}}/delete" class="btn btn-danger" onclick="javascript: return confirm('Are You Sure To Delete ?');"> <i class="fa fa-trash"></i></a>
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
			  {{ $cityobj->links() }}
            </div>



            <!-- /.box-body -->
          </div>
        </div>

       
      </div>


      
    </section>

  </div>


@endsection