<div class="modal fade deleteSiteModal" id="ModalPay" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	
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
        	<form action="https://wl.walletone.com/checkout/checkout/Index" method="post">
        		<p>
        			Пополните счет вашего аккаунта, после вы сможете активировать тариф "Без ограничений" за 200 рублей.
        		</p>
				
        	
      		</div><!-- /.modal-body -->
      			      		
      		<div class="modal-footer">
			
				<input type="hidden" name="WMI_MERCHANT_ID"    value="113992534835"/>
				  <input type="text" name="WMI_PAYMENT_AMOUNT" value="" placeholder="Введите сумму" style="position: relative;
    right: 17px;
    top: 2px;
    padding: 5px 8px;"/>
				  <input type="hidden" name="WMI_CURRENCY_ID"    value="643"/>
				  <input type="hidden" name="WMI_DESCRIPTION"    value="Оплата подписки на месяц"/>
				  <input type="hidden" name="WMI_SUCCESS_URL"    value="http://oke.su/start/red.php"/>
				  <input type="hidden" name="WMI_FAIL_URL"       value="http://oke.su/start/red.php"/>
				  <?php
						$prtest = $_COOKIE["ci_session"];
						$prtest = unserialize($prtest);
						$prtest = $prtest['user_id'];
				  ?>
				  <input type="hidden" name="usersID" value="<?php echo $prtest; ?>">
				  <input type="submit" class="btn btn-primary" id="deleteSiteButton" value="Пополнить баланс"> 
        		<button type="button" class="btn btn-default" data-dismiss="modal"><span class="fui-cross"></span> <?php echo $this->lang->line('modal_cancelclose')?></button>
        	</form>
				
				
      		</div>
      		
    	</div><!-- /.modal-content -->
    	
  	</div><!-- /.modal-dialog -->
  	
</div><!-- /.modal -->