<?php if(canDelete() == 0) { ?>
	
	<style>
	.btn-danger{
		
		/*display:none !important;*/
	}
	</style>
	
<?php } ?>



<?php if(getallpermission() == 0) { ?>
	
	<script>window.location.href = "<?php echo url('control_panel/access'); ?>";</script>
	
<?php } ?>


<?php if(!isAllowed()) { ?>
	
	<script>window.location.href = "<?php echo url('control_panel/access'); ?>";</script>

<?php } ?>