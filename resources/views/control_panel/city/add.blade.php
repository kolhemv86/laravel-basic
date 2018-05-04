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
              <h3 class="box-title">Add City</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
           {!! Form::open(['route' => ['city.store'], 'enctype' => "multipart/form-data",'method' => 'POST','id'=>'cityform', 'class'=>'form-horizontal']) !!}
           
              <div class="box-body">

                <div class="form-group">
                 <label for="inputEmail3" class="col-sm-2 control-label">Country:</label>
                  <div class="col-sm-6">
                    <select class="form-control" name="cid" id="country" >
                    <option>-Select Country-</option>

                    
                     @foreach ($countrys as $cont)
                  <option value="{{ $cont->id }}"> {{ $cont->name }}</option>
                    
                   

                     @endforeach




                    </select>
                  </div>
               </div> 


               <div class="form-group">
                 <label for="inputEmail3" class="col-sm-2 control-label">State:</label>
                  <div class="col-sm-6">
                    <select class="form-control" name="sid" id="state" >
                    <option>-Select State-</option>

                    
                    



                    </select>
                  </div>
               </div>



               

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">City Title:</label>

                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="inputEmail3" placeholder="City Title" name="name" value="">
                  </div>
              </div> 
                
               
              
                
                <div class="box-footer text-center col-sm-8">
                <a class="btn btn-primary" href="{{route('city.index')}}" >Back</a>
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




<script type="text/javascript">
  $( document ).ready(function() {
  $('#country').on('change',function(e){       //state change
        console.log(e);
         var con_id = e.target.value;

        $.get('ajax-country/' + con_id, function(data){
        
var response = $.parseJSON(JSON.stringify(data));
$('#state').empty();




for(var i=0;i<response.data.length;i++){
$('#state').append('<option value="'+response.data[i].id+'">'+response.data[i].name+'</option>');
}

});

    });

   });

</script>


@endsection


