<table  class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Module Name</th>
                  <th>Route</th>
                
                
                 
                  <th class="text-center">Action</th>
                </tr>
                </thead>
                    <tbody>
                   @foreach ($Moduleobj as $cont)
                      <tr>
                     <td>{{ $cont->id }}</td>
                     <td>{{ $cont->modulename }}</td>
                     <td>{{ $cont->uri }}</td>
                     
                     
                  
                  <td class="text-center"><a href="module/{{$cont->id}}" class="btn btn-info"><i class="fa fa-edit"></i> </a> 
                   <a href="module/{{$cont->id}}/delete" onclick="javascript: return confirm('Are You Sure To Delete ?');" class="btn btn-danger"> <i class="fa fa-trash"></i></a>
                  </td>
                </tr>
                 @endforeach
                 </tbody>
                <tfoot>
                <tr>
                  <th>ID</th>
                  
                  <th>Module Name</th>
                 <th>Route</th>
                  <th class="text-center">Action</th>
                </tr>
                </tfoot>
              </table>
			  {{ $Moduleobj->links() }}