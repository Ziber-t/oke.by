<?php $this->load->view("shared/header.php");?>

<body>
  	
  	<?php $this->load->view("shared/nav2.php");?> 
  	  	
    <div class="container-fluid">
    
    	<?php if( $this->session->flashdata('error') !='' ):?>
    	<div class="row margin-top-20">
    		<div class="col-md-12">
    			<div class="alert alert-danger margin-bottom-0">
    	  			<button type="button" class="close fui-cross" data-dismiss="alert"></button>
    	  			<?php echo $this->session->flashdata('error');?>
    			</div>
    		</div><!-- /.col -->
    	</div>
    	<?php endif;?>
    	
    	<div class="row" style="margin-top: 51px;">
		<div class="col-md-3 col-sm-4 text-right">
			
    	</div><!-- /.col -->
    	
    		<div class="col-md-6 col-sm-8">
    	
		    	<h1><span class="fui-windows"></span> Сводка</h1>
				<?php //var_dump($regData);?>
				
				<?php 
					$day = $regData[0]['day'];
					$mes = $regData[0]['mes']+1;
					if($day == 0){
						$itog = "<a href=\"#\" onclick=\"myfunctions();\">Пополнить счет, для перехода на тариф \"Премиум\"</a>";
					}else{
						$itog = "Полный доступ ко всем возможностям сериса истекает ".$day.".".$mes.".2017";
					}
				?>
				<?php// var_dump($day);?>
				<p style="margin-top:20px;"><?=$itog?></p>
				 
				
    		</div><!-- /.col -->
			
    		
    		
			
    	</div><!-- /.row -->
    	
    	<hr class="dashed">
    	
    	<div class="row margin-bottom-30">
    		
			<?php if( $this->ion_auth->is_admin() ):?>
    		<div class="col-md-2 col-sm-6" style="float:right;">
    		
    			<select name="userDropDown" id="userDropDown" class="select-block drop" <?php if( !isset($sites) || count( $sites ) == 0 ):?>disabled<?php endif;?>>
    				<option value=""><?php echo $this->lang->line('sites_filterbyuser')?></option>
    				<option value="All"><?php echo $this->lang->line('sites_filterbyuserall')?></option>
    				<?php foreach( $users as $user ):?>
    			  	<option value="<?php echo $user->first_name;?> <?php echo $user->last_name;?>"><?php echo $user->first_name;?> <?php echo $user->last_name;?></option>
    			  	<?php endforeach?>
    			</select>
    			
    		</div><!-- /.col -->
			<?php endif;?>
    		
    		
    	
    	</div><!-- /.row -->
    	
    	<div class="row">
    	
    		<div class="col-md-9" style="float:right;">
					<div class="col-md-6" style="text-align: center;">
					<?php if($regData[0]['firstsite'] == 0 && $regData[0]['opl'] == 0){ ?>
						<p style="background: #f5f5f5;padding:7px;">Доступно сайтов: 1</p>
					<?php }elseif($regData[0]['firstsite'] == 1 && $regData[0]['opl'] == 0){ ?>
						<p style="background: ##f5f5f5;padding:7px;">Доступно сайтов: 0</p>	
					<?php }else{ ?>
						<p style="background: #f5f5f5;padding:7px;">Доступно сайтов: ∞</p>
					<?php } ?>
					</div>
					<div class="col-md-6" style="text-align: center;">
						<p style="background: #f5f5f5;padding:7px;">Баланс счета: <?=$regData[0]['balans']?></p>
					</div>
					
			</div>
			
			<div class="col-md-9" style="float:right;">
			<h2>Созданные сайты:</h2>
			</br>
			</div>
			</br>
			
			<div class="col-md-9" style="float:right;">
			<table>
				<tr>
					<td style="width: 350px;padding: 5px;border:1px solid;">Имя сайта</td>	
					<td style="width: 350px;padding: 5px;border:1px solid;">Url сайта</td>
				</tr>
				<?php foreach($siteAll as $sit): ?>
					
					<tr>
						<td style="width: 350px;padding: 5px;border:1px solid;"><?=$sit['sites_name'];?></td>
						<td style="width: 350px;padding: 5px;border:1px solid;"><?=$sit['remote_url'];?></td>
					</tr>
					
				<?php endforeach; ?>
			</table>
			</div>
    	
    	</div><!-- /.row -->
    	
    </div><!-- /.container -->
	
	
	
	<!-- modals -->
	
	<?php $this->load->view("shared/modal_sitesettings.php");?>
	
	<?php $this->load->view("shared/modal_account.php");?> 
	
	<?php $this->load->view("shared/modal_deletesite.php");?>
	
	<?php $this->load->view("shared/modal_pay.php");?>
		
	<!-- /modals -->

	

    <!-- Load JS here for greater good =============================-->
    <script src="<?php echo base_url();?>js/jquery-1.8.3.min.js"></script>
    <script src="<?php echo base_url();?>js/jquery-ui-1.10.3.custom.min.js"></script>
    <script src="<?php echo base_url();?>js/jquery.ui.touch-punch.min.js"></script>
    <script src="<?php echo base_url();?>js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>js/bootstrap-select.js"></script>
    <script src="<?php echo base_url();?>js/bootstrap-switch.js"></script>
    <script src="<?php echo base_url();?>js/flatui-checkbox.js"></script>
    <script src="<?php echo base_url();?>js/flatui-radio.js"></script>
    <script src="<?php echo base_url();?>js/jquery.tagsinput.js"></script>
    <script src="<?php echo base_url();?>js/flatui-fileinput.js"></script>
    <script src="<?php echo base_url();?>js/jquery.placeholder.js"></script>
    <script src="<?php echo base_url();?>js/jquery.zoomer.js"></script>
    <script src="<?php echo base_url();?>js/application.js"></script>
    
	<script>
    $(function(){
    
    	$('#sites .site iframe').each(function(){
    	
    		theHeight = $(this).attr('data-height')*0.25;
    	    	
    		$(this).zoomer({
    			zoom: 0.25,
    			height: theHeight,
    			width: $(this).parent().width(),
    			message: "",
    			messageURL: "<?php echo site_url('sites')?>/"+$(this).attr('data-siteid')
    		});
    		
    		$(this).closest('.site').find('.zoomer-cover > a').attr('target', '');
    	
    	})
    	
    	//sites filter by user
    	$('select#userDropDown').change(function(){
	
			if( $(this).val() == 'All' || $(this).val() == '' ) {
		
				$('#sites .site').hide().fadeIn(500);
		
			} else {
	
				$('#sites .site').hide();
	
				$('#sites').find('[data-name="'+$(this).val()+'"]').fadeIn(500);
		
				}
	
				})
	
	
		//sites sorting
		$('select#sortDropDown').change(function(){
	
			if( $(this).val() == 'NoOfPages' ) {
		
				sites = $('#sites .site');
			
				sites.sort( function(a,b){
			
					an = a.getAttribute('data-pages');
					bn = b.getAttribute('data-pages');
				
					if(an > bn) {
						return 1;
					}
				
					if(an < bn) {
						return -1;
					}
				
					return 0;
				
				} )
			
				sites.detach().appendTo( $('#sites') );
		
			} else if( $(this).val() == 'CreationDate' ) {
		
				sites = $('#sites .site');
			
				sites.sort( function(a,b){
			
					an = a.getAttribute('data-created').replace("-", "");
					bn = b.getAttribute('data-created').replace("-", "");
				
					if(an > bn) {
						return 1;
					}
				
					if(an < bn) {
						return -1;
					}
				
					return 0;
				
				} )
			
				sites.detach().appendTo( $('#sites') );
		
			} else if( $(this).val() == 'LastUpdate' ) {
		
				sites = $('#sites .site');
			
				sites.sort( function(a,b){
			
					an = a.getAttribute('data-update').replace("-", "");
					bn = b.getAttribute('data-update').replace("-", "");
				
					if(an > bn) {
						return 1;
					}
				
					if(an < bn) {
						return -1;
					}
				
				return 0;
				
				} )
			
				sites.detach().appendTo( $('#sites') );
		
			}
	
		})
	
	
		/* END SITES */
    
    });
    	    
    </script>
	
    <script>
    <?php $this->load->view("shared/js_sitesettings.php");?>
    </script>
    <script>
    <?php $this->load->view("shared/js_account.php");?>
    </script>
    <!--[if lt IE 10]>
    <script>
    $(function(){
    	var msnry = new Masonry( '#sites', {
	    	// options
	    	itemSelector: '.site',
	    	"gutter": 20
	    });
    
    })
    </script>
    <![endif]-->

</body>
</html>