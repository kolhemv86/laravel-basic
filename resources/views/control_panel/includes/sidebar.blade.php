<?php 
 $moduleid=menu_role(Auth::guard('control_panels')->user()->role);


?>



<aside class="main-sidebar ">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

     
      

    
      <ul class="sidebar-menu">
      <li class="header">Menu</li>
<?php  $strm1="";
$Moduleobj=module_type(0);





 ?>

@foreach ($Moduleobj as $Moduleobjlist)
<?php  if(in_array($Moduleobjlist->id, $moduleid)){ 
$Modulesubobj=module_type($Moduleobjlist->id);
$strm1="";
foreach ($Modulesubobj as $ssModuleobjlist){
$strm1.=$ssModuleobjlist->uri.",".$ssModuleobjlist->uri."/*".",";
}
$strm=trim($strm1,","); 
$mainurl=explode(",",$strm);
$strm22=menuactive($mainurl);
?>
         <li class="treeview {{ $strm22 }} ">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span> {{ ucfirst($Moduleobjlist->modulename) }} </span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>

          </a>
      
      <?php   $strm23=menuactive($mainurl,'block'); ?>
      <ul class="treeview-menu" style="display: {{ $strm23 }};">
            
            <?php

          

           
      
      
      ?>
        @foreach ($Modulesubobj as $subModuleobjlist)
          <?php  if(in_array($subModuleobjlist->id, $moduleid)){  ?>
             <li class="{{ menuactive([$subModuleobjlist->uri, $subModuleobjlist->uri.'/*']) }}"><a href="{{ url($subModuleobjlist->uri) }}"><i class="fa fa-link"></i> <span>{{ ucfirst($subModuleobjlist->modulename) }}</span></a></li>
             <?php  } ?>
       
        @endforeach
          
        
      
      
      </ul>
      
    </li>

<?php  } ?>
  @endforeach


       

 
		
		
		
		
		
  
      </ul>
      
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>