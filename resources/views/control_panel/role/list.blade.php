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
              <div class="col-md-6"> <h3 class="box-title">Role List</h3></div>
               <div class="col-md-6 text-right"><a href="{{route('role.create')}}" class="btn btn-primary"> Add Role</a></div>
            </div>

            <!-- /.box-header -->
            <div class="box-body">

              <table  class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Role Name</th>
				  <th>Access Permission</th>
                
                
                 
                  <th class="text-center">Action</th>
                </tr>
                </thead>
                    <tbody>
                   @foreach ($Roleobj as $cont)
                      <tr>
                     <td>{{ $cont->id }}</td>
                     <td>{{ $cont->name }}</td>
                     <td><a href="role/{{$cont->id}}/permission"  class="btn btn-success">Permission</a></td>
                  
                  <td class="text-center"><a href="role/{{$cont->id}}" class="btn btn-info"><i class="fa fa-edit"></i> </a> 
                   
				   <?php if($cont->id!=1) { ?>
				   <a href="role/{{$cont->id}}/delete" onclick="javascript: return confirm('Are You Sure To Delete ?');" class="btn btn-danger"> <i class="fa fa-trash"></i></a>
				   <?php } ?>
				  </td>
                </tr>
                 @endforeach
                 </tbody>
                <tfoot>
                <tr>
                  <th>ID</th>
                  
                  <th>Role Name</th>
                  <th>Access Permission</th>
                  <th class="text-center">Action</th>
                </tr>
                </tfoot>
              </table>
			  {{ $Roleobj->links() }}
            </div>



            <!-- /.box-body -->
          </div>
        </div>

       
      </div>


      
    </section>

  </div>


@endsection