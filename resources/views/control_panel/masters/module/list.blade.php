@extends('control_panel.layouts.app')

@section('content')




  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
  

    <!-- Main content -->
    <section class="content">
      
     <?php  //$moduleid->id; 
	
	 //print_r($user);
	 ?>

      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header">
              <div class="col-md-6"> <h3 class="box-title">Module List</h3></div>
               <div class="col-md-6 text-right"><a href="{{route('module.create')}}" class="btn btn-primary"> Add Module</a></div>
            </div>

            <!-- /.box-header -->
            <div class="box-body" id="item-lists">

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
            </div>



            <!-- /.box-body -->
          </div>
        </div>

       
      </div>


      
    </section>

  </div>
<script type="text/javascript">


$(window).on('hashchange', function() {
    if (window.location.hash) {
        var page = window.location.hash.replace('#', '');
        if (page == Number.NaN || page <= 0) {
            return false;
        }else{
            getData(page);
        }
    }
});


$(document).ready(function()
{
    $(document).on('click', '.pagination a',function(event)
    {
        $('li').removeClass('active');
        $(this).parent('li').addClass('active');
        event.preventDefault();


        var myurl = $(this).attr('href');
        var page=$(this).attr('href').split('page=')[1];


        getData(page);
    });
});


function getData(page){
        $.ajax(
        {
            url: '?page=' + page,
            type: "get",
            datatype: "html",
        })
        .done(function(data)
        {
            $("#item-lists").empty().html(data);
            location.hash = page;
        })
        .fail(function(jqXHR, ajaxOptions, thrownError)
        {
              alert('No response from server');
        });
}


</script>

@endsection