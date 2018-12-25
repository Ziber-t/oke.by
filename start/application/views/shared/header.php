<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?php if( isset($pageTitle) ){ echo $pageTitle; } else { echo $this->lang->line('alternative_page_title'); }?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<!-- Loading Bootstrap -->
	<link href="<?php echo base_url();?>bootstrap/css/bootstrap.css" rel="stylesheet">
	    
	<!--<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">-->
		
	<!-- Loading Flat UI -->
	<link href="<?php echo base_url();?>less/flat-ui.css" rel="stylesheet">
	<link href="<?php echo base_url();?>css/style.css" rel="stylesheet">
	<link href="<?php echo base_url();?>css/login.css" rel="stylesheet">
	
	<link href="<?php echo base_url();?>css/font-awesome.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300italic,300,400italic,700,700italic&amp;subset=latin,latin-ext,cyrillic-ext,cyrillic" rel="stylesheet" type="text/css">
	<?php if( isset($builder) ):?>
	<link href="<?php echo base_url();?>css/builder.css" rel="stylesheet">
	<link href="<?php echo base_url();?>css/spectrum.css" rel="stylesheet">
	<link href="<?php echo base_url();?>css/chosen.css" rel="stylesheet">
	<link href="<?php echo base_url();?>js/redactor/redactor.css" rel="stylesheet">

	<?php endif;?>
	
	<link rel="shortcut icon" href="<?php echo base_url();?>images/favicon.ico">
	
	<!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
	<!--[if lt IE 9]>
	<script src="<?php echo base_url();?>js/html5shiv.js"></script>
	<script src="<?php echo base_url();?>js/respond.min.js"></script>
	<![endif]-->
	<!--[if lt IE 10]>
	<link href="<?php echo base_url();?>css/ie-masonry.css" rel="stylesheet">
	<script src="<?php echo base_url();?>js/masonry.pkgd.min.js"></script>
        
	<![endif]-->
<!-- Yandex.Metrika counter -->
<script type="text/javascript" >
    (function (d, w, c) {
        (w[c] = w[c] || []).push(function() {
            try {
                w.yaCounter45951186 = new Ya.Metrika({
                    id:45951186,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true
                });
            } catch(e) { }
        });

        var n = d.getElementsByTagName("script")[0],
            s = d.createElement("script"),
            f = function () { n.parentNode.insertBefore(s, n); };
        s.type = "text/javascript";
        s.async = true;
        s.src = "https://mc.yandex.ru/metrika/watch.js";

        if (w.opera == "[object Opera]") {
            d.addEventListener("DOMContentLoaded", f, false);
        } else { f(); }
    })(document, window, "yandex_metrika_callbacks");
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/45951186" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
</head>
<!-- Begin Verbox {literal} -->
<script type='text/javascript'>
	(function(d, w, m) {
		window.supportAPIMethod = m;
		var s = d.createElement('script');
		s.type ='text/javascript'; s.id = 'supportScript'; s.charset = 'utf-8';
		s.async = true;
		var id = 'ec4d932ae0db17ffb3fb3e6d4937ef19';
		s.src = '//admin.verbox.ru/support/support.js?h='+id;
		var sc = d.getElementsByTagName('script')[0];
		w[m] = w[m] || function() { (w[m].q = w[m].q || []).push(arguments); };
		if (sc) sc.parentNode.insertBefore(s, sc); 
		else d.documentElement.firstChild.appendChild(s);
	})(document, window, 'Verbox');
</script>
<!-- {/literal} End Verbox -->
