@if (Auth::guard('control_panels')->user())

 <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
     
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; <?php echo date("Y"); ?> <a href="#"><?php echo $sitescon->site_name; ?></a>.</strong> All rights reserved.
  </footer>

@endif    