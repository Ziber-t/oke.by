<div class="modal fade deleteSiteModal" id="deleteSiteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	
	<div class="modal-dialog">
    	
    	<div class="modal-content">
      		
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only"><?php echo $this->lang->line('modal_close')?></span></button>
        		<h4 class="modal-title" id="myModalLabel"><span class="fui-info"></span> <?php echo $this->lang->line('modal_areyousure')?></h4>
      		</div>
      		      	
      		<div class="modal-body">
      		
      			<div class="modal-alerts"></div>
      			
      			<div class="loader" style="display: none;">
      				<img src="<?php echo base_url();?>images/loading.gif" alt="Loading...">
      				<?php echo $this->lang->line('sites_deletesite_loadertext')?>
      			</div>
        	
        		<p>
        			<?php echo $this->lang->line('sites_deletesite_areyousure')?>
        		</p>
        	
      		</div><!-- /.modal-body -->
      			      		
      		<div class="modal-footer">
        		<button type="button" class="btn btn-default" data-dismiss="modal"><span class="fui-cross"></span> <?php echo $this->lang->line('modal_cancelclose')?></button>
        		<button type="button" class="btn btn-primary" id="deleteSiteButton" onclick="redire();"><span class="fui-check"></span> <?php echo $this->lang->line('sites_deletesite_button_deleteforever')?></button>
      		</div>
      		<script language = 'javascript'>
			function redire(){
				var delay = 2000;
				setTimeout("document.location.href='http://oke.su/start/'", delay);
			}
			
			</script>
    	</div><!-- /.modal-content -->
    	
  	</div><!-- /.modal-dialog -->
  	
</div><!-- /.modal -->