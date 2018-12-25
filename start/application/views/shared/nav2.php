<style>
    body {
        padding-top: 0px!important;
        font-size: 15px;
    }

    .navbar-collapse {
        box-shadow: none;
        padding-right: 0px!important;
        padding-left: 0px!important;
    }

    .nav .btn-wide {
        color: #fff!important;
    }

    .btn-wide:hover {
        background: #f5f5f5!important;
    }

    .nav a {
        color: #f5f5f5!important;
        font-weight: bold;
    }

    span .text-primary {
        color: #fff!important;
    }

    .dropdown-menu a {
        color: #fff!important;
    }

    .navbar-nav>li {
        float: left;
        width: 100%;
    }

    .navbar-collapse a:hover,
    a:focus {
        color: #fff!important;
        text-decoration: none;
    }

    .margin-top-11 {
        margin-top: 11px;
    }
</style>
<nav class="mainnav navbar navbar-inverse navbar-embossed navbar-fixed-top" role="navigation" id="mainNav" style="background:#3498db;">
    <ul class="nav navbar-nav navbar-right" style="margin-right: 20px;">
        <li class="dropdown">
            <?php
					$u = $this->ion_auth->user()->row();
				?>
                <!-- -->

                <!-- -->
                <a href="#" class="dropdown-toggle" style="color:#fff!important;font-weight:bold;background:transparent;" data-toggle="dropdown">Привет, <?php echo $u->first_name." ".$u->last_name;?> <b class="caret" style="color:#fff!important;"></b></a>
                <span class="dropdown-arrow"></span>
                <ul class="dropdown-menu">
                    <li><a href="#accountModal" data-toggle="modal"><span class="fui-cmd"></span> <?php echo $this->lang->line('nav_myaccount')?></a></li>
                    <li class="divider"></li>
                    <?php
                    $prtest = $_COOKIE["ci_session"];
    				$prtest = unserialize($prtest);
    				$prtest = $prtest['user_id'];
    				$dimaTest = $this->db->from('users')->where('id', $prtest)->get();
    				$testius = $dimaTest->result();
    				$testius = $testius[0];
    				$testius = $testius->firstsite;

    				$testOplata = $this->db->from('users')->where('id', $prtest)->get();
    				$testius2 = $testOplata->result();
    				$testius2 = $testius2[0];
    				$testius2 = $testius2->opl;

    				$testOplata2 = $this->db->from('users')->where('id', $prtest)->get();
    				$testius23 = $testOplata2->result();
    				$testius23 = $testius23[0];
    				$testius23 = $testius23->balans;

					$testOplata299 = $this->db->from('sum')->get();
					$testius239 = $testOplata299->result();
					//var_dump($testius239);
					$testius239 = $testius239[0];

					$testius239 = $testius239->summa;
					//var_dump($testius239);

						if($testius2 == 0){
							if($testius23 >= $testius239){
								echo "<li><a href=\"http://oke.su/start/tarif.php?tID=$prtest\"><span class=\"fui-check\"></span> Активировать тариф</a></li>";
							}else{
					?>

                        <li><a href="#" onclick="alert('Недостаточно средств для активации');"><span class="fui-check"></span> Активировать тариф</a></li>
                        <li class="divider"></li>
                        <?php } ?>
                        <?php }else{ ?>
                        <li><a href="#"><span class="fui-check"></span> Тариф "Без ограничений" Активирован!</a></li>
                        <?php if( $this->ion_auth->is_admin() ):?>
                        <li <?php if( isset($page) && $page=="users" ):?>class="active"
                            <?php endif;?>><a href="<?php echo site_url('users')?>"><span class="fui-user"></span> <?php echo $this->lang->line('nav_users')?></a></li>
                        <li <?php if( isset($page) && $page=="settings" ):?>class="active"
                            <?php endif;?>><a href="<?php echo site_url('settings')?>"><span class="fui-gear"></span> <?php echo $this->lang->line('nav_settings')?></a></li>

                        <?php endif;?>
                        <li class="divider"></li>
                        <?php } ?>
                        <li><a href="http://oke.su/start/index.php/sites/analitic" data-toggle="modal"><span class="fui-eye"></span>   Сводка</a></li>
                        <li><a href="<?php echo site_url('logout')?>"><span class="fui-exit"></span> <?php echo $this->lang->line('nav_logout')?></a></li>

                </ul>
        </li>
    </ul>
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-01">
			<span class="sr-only"><?php echo $this->lang->line('nav_toggle_navigation')?></span>
		</button>
        <a class="navbar-brand" href="<?php echo site_url()?>" style="padding-bottom: 28px;color:#fff;font-weight:bold;">
			<img src="http://oke.su/start/images/logo.png" style="height: 60px; position: relative; top: -19px; margin-right: 5px;">
			
		</a>
    </div>
    <div class="collapse navbar-collapse" id="navbar-collapse-01">

        <div style="display: inline-block;
					position: relative;
					margin-right: 5%;
					top: 17px;
					float:right;
					">

            <?php
				if($testius == 1 && $testius2 == 0){
			?>
                <a style="margin-right:50px;color:#fff;">Тариф FREE доступно создание 1 сайта</a>
                <a style="color:#fff;">Баланс: <?php echo $testius23; ?> руб</a>
                <?php }elseif($testius == 1 && $testius2 == 1){ ?>
                <a style="margin-right:50px;color:#fff;">Тариф без ограничений </a>
                <a style="color:#fff;">Баланс: <?php echo $testius23; ?> руб</a>
                <?php }else{ ?>
                <a style="margin-right:50px;color:#fff;">Тариф FREE доступно создание 1 сайта</a>
                <a style="color:#fff;">Баланс: <?php echo $testius23; ?> руб</a>

                <?php } ?>
        </div>

    </div>
    <!-- /.navbar-collapse -->
</nav>
<!-- /navbar -->

<div class="col-lg-3" style="background:#324150;position: fixed;top: 0px; min-height: 100%;">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-01">
			<span class="sr-only"><?php echo $this->lang->line('nav_toggle_navigation')?></span>
		</button>
        <a class="navbar-brand" href="<?php echo site_url()?>">
			<img src="http://oke.su/start/images/logo.png" style="height: 60px; position: relative; top: -19px; margin-right: 5px;">
			<!--<?php //echo $this->lang->line('nav_name')?>-->
		</a>
    </div>
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-01">
			<span class="sr-only"><?php echo $this->lang->line('nav_toggle_navigation')?></span>
		</button>

    </div>
    <div class="collapse navbar-collapse" id="navbar-collapse-01">
        <ul class="nav navbar-nav" style="padding-top:10px;">

            <?php if( isset($siteData) || ( isset($page) && $page == 'newPage' ) ):?>

            <?php if( isset($siteData) ):?>
            <li class="active">
                <a><span class="fui-home"></span> <span id="siteTitle"><?php echo $siteData['site']->sites_name?></span></a>
            </li>
            <?php endif;?>
            <?php if( isset($page) && $page == 'newPage' ):?>
            <li class="active">
                <a><span class="fui-home"></span> <span id="siteTitle"><?php echo $this->lang->line('newsite_default_title')?></span> </a>
            </li>
            <?php endif;?>

            <?php if( isset($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER'] != '' ):?>

            <?php

						//find out where we came from :)

						$temp = explode("/", $_SERVER['HTTP_REFERER']);

						if( array_pop($temp) == 'users' ) {

							$t = 'nav_goback_users';
							$to = site_url('users');

						} else {

							$t = 'nav_goback_sites';
							$to = site_url('sites');

						}

					?>

                <li><a href="http://oke.su/start/" id="backButton"><span class="fui-arrow-left"></span> <?php echo $this->lang->line( $t )?></a></li>

                <?php else:?>

                <li><a href="<?php echo site_url('sites')?>" id="backButton"><span class="fui-arrow-left"></span> <?php echo $this->lang->line('nav_goback_users')?></a></li>

                <?php endif;?>

                <?php else:?>
                <li><a href="http://oke.su/start/index.php/sites/analitic" data-toggle="modal"><span class="fui-eye"> </span> Сводка</a></li>
                <li <?php if( isset($page) && $page=="sites" ):?>class="active"
                    <?php endif;?>><a href="<?php echo site_url('sites')?>"><span class="fui-windows"></span> <?php echo $this->lang->line('nav_sites')?></a></li>
                <li <?php if( isset($page) && $page=="images" ):?>class="active"
                    <?php endif;?>><a href="<?php echo site_url('assets/images')?>"><span class="fui-image"></span> <?php echo $this->lang->line('nav_imagelibrary')?></a></li>
                <?php if( $this->ion_auth->is_admin() ):?>
                <li <?php if( isset($page) && $page=="users" ):?>class="active"
                    <?php endif;?>><a href="<?php echo site_url('users')?>"><span class="fui-user"></span> <?php echo $this->lang->line('nav_users')?></a></li>
                <li <?php if( isset($page) && $page=="blog" ):?>class="active"
                <?php endif;?>><a href="<?php echo site_url('blogs/blogsAdmin')?>"><span class="fui-book"></span> <?php echo $this->lang->line('nav_blogs')?></a></li>
                <li <?php if( isset($page) && $page=="settings" ):?>class="active"
                    <?php endif;?>><a href="<?php echo site_url('settings')?>"><span class="fui-gear"></span> <?php echo $this->lang->line('nav_settings')?></a></li>

                <?php endif;?>

                <?php endif;?>

                <li class="dropdown">
                    <?php
					$u = $this->ion_auth->user()->row();
				?>
                        <!-- -->

                        <!-- -->



                        <a href="#accountModal" data-toggle="modal"><span class="fui-cmd"></span> <?php echo $this->lang->line('nav_myaccount')?></a>

                        <?php
					$testOplata299 = $this->db->from('sum')->get();
					$testius239 = $testOplata299->result();
					//var_dump($testius239);
					$testius239 = $testius239[0];

					$testius239 = $testius239->summa;
					//var_dump($testius239);

						if($testius2 == 0){
							if($testius23 >= $testius239){
								echo "<a href=\"http://oke.su/start/tarif.php?tID=$prtest\"><span class=\"fui-check\"></span> Активировать тариф</a>";
							}else{
					?>

                            <a href="http://oke.su/start/index.php/sites/tarif"> <span class="fui-tag"></span> Тарифы</a>

                            <?php } ?>
                            <?php }else{ ?>
                            <a href="http://oke.su/start/index.php/sites/tarif"><span class="fui-tag" ></span> Тарифы</a>

                            <?php } ?>
                            <a href="http://oke.su/start/index.php/sites/prodvichenie"><span class="fui-search" >  </span>   Продвижение</a>

                            <a href="<?php echo site_url('logout')?>"><span class="fui-exit"></span> <?php echo $this->lang->line('nav_logout')?></a>

                            <?php
				$prtest = $_COOKIE["ci_session"];
				$prtest = unserialize($prtest);
				$prtest = $prtest['user_id'];
				$dimaTest = $this->db->from('users')->where('id', $prtest)->get();
				$testius = $dimaTest->result();
				$testius = $testius[0];
				$testius = $testius->firstsite;

				$testOplata = $this->db->from('users')->where('id', $prtest)->get();
				$testius2 = $testOplata->result();
				$testius2 = $testius2[0];
				$testius2 = $testius2->opl;

				if($testius == 1 && $testius2 == 0){


			?>

                                <a class="btn btn-lg btn-primary btn-embossed btn-wide margin-top-11" style="width: 100%" onclick="myfunctions();"><span class="fui-money"></span> Пополнить баланс</a>
                                <a class="btn btn-lg btn-primary btn-embossed btn-wide margin-top-11" style="width: 100%" onclick="myfunctions();"><span class="fui-money"></span> <?php echo $this->lang->line('sites_createnewsite')?></a>
                                <?php }elseif($testius == 1 && $testius2 == 1){ ?>

                                <a class="btn btn-lg btn-primary btn-embossed btn-wide margin-top-11" style="width: 100%;" onclick="myfunctions();"><span class="fui-money"></span> Пополнить баланс</a>
                                <a href="<?php echo site_url('sites/create')?>" style="width: 100%" class="btn btn-lg btn-primary btn-embossed btn-wide margin-top-11"><span class="fui-plus"></span> <?php echo $this->lang->line('sites_createnewsite')?></a>
                                <?php }else{ ?>
                                <a class="btn btn-lg btn-primary btn-embossed btn-wide margin-top-11" style="width: 100%;" onclick="myfunctions();"><span class="fui-money"></span> Пополнить баланс</a>
                                <a href="<?php echo site_url('sites/create')?>" style="width: 100%" class="btn btn-lg btn-primary btn-embossed btn-wide margin-top-11"><span class="fui-plus"></span> <?php echo $this->lang->line('sites_createnewsite')?></a>
                                <?php } ?>

                </li>
        </ul>



        <script>
            function myfunctions() {
                $('#ModalPay').modal('show');
            }
        </script>
    </div>
    <!-- /.navbar-collapse -->
</div>
