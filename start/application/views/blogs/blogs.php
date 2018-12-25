<!DOCTYPE HTML>
<html>


<head>
<title>Конструктор сайтов OKE.SU</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="Создать сайт и продвинуть в топ теперь легко! Бесплатный конструктор сайтов - OKE.SU " />
<meta name="keywords" content="конструктор сайтов, бесплатный конструктор сайтов, landing page, создать landing page, landing page бесплатно, создать одностраничный сайт, создать сайт, создать сайт бесплатно, продвижение сайтов, хостинг, домены" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!-- Custom Theme files -->
<link href="css/style.css" rel='stylesheet' type='text/css' />


<!-- Custom Theme files -->
<!--webfont-->
<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
<!--webfont-->
<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<!-- Add fancyBox main JS and CSS files -->
<script src="js/jquery.magnific-popup.js" type="text/javascript"></script>
<link href="css/popup.css" rel="stylesheet" type="text/css">
		
<!--Animation-->

</head>
<body>
<div class="price_header">
   <div class="container">
      <div class="header_top">
	      <div class="header-left">
					 <div class="logo">
						<a href="index.html"><img src="images/logo.png" alt=""/></a>
					 </div>
					 <div class="menu">
						  <a class="toggleMenu" href="#"><img src="images/nav.png" alt="" /></a>
						    <ul class="nav" id="nav">
						    	<li><a href="index.html">Главная</a></li>
						    	<li><a href="tarif.html">Тарифы</a></li>
						    	<li><a href="hosting.html">Хостинг</a></li>
						    	<li class="active"><a href="domen.html">Доменные имена</a></li>
						    	<li><a href="contacts.html">Контакты</a></li>
						    	<div class="clearfix"></div>
							</ul>
							<script type="text/javascript" src="js/responsive-nav.js"></script>
				    </div>
	       </div>
	      <ul class="phone">
	      	 <a href="http://oke.su/start/index.php/login" class="fa-btn btn-1 btn-1e">Вход</a>
	      </ul>
	      <div class="clearfix"> </div>
	   </div>
	   <div class="clearfix"></div>
	</div>
</div>

    <!-- Main-->
    <div class="wrapper style1">
        <section id="main" class="container">
            <header class="major">
                <h2>Интересная информация для Вас</h2>
            </header>
            <!-- Two -->
            <div class="blogs-wrapper">
                <section class="container 75%">
                    <?php foreach ($blogs as $blog) : ?>
                        <div class="col-lg-12">
                            <a href="<?php echo site_url('blogs/blog/'.$blog->slug)?>">
                                <h3 class="blog-title"><?php echo $blog->title; ?></h3>
                            </a>
                            <div class="blog-description">
                                <?php echo $blog->description_short; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </section>
            </div>

        </section>
    </div>
    <!-- Main-->
    <!-- Three -->
    <div class="wrapper">
        <article>

            <div id="share">
                <div class="like">Понравился конструктор сайтов? Поделитесь с друзьями!</div>
                <div class="social" data-url="http://oke.su/" data-title="<Бесплатный конструктор сайто - OKE.SU">
                    <a class="push facebook" data-id="fb"><i class="fa fa-facebook"></i> Facebook</a>
                    <a class="push twitter" data-id="tw"><i class="fa fa-twitter"></i> Twitter</a>
                    <a class="push vkontakte" data-id="vk"><i class="fa fa-vk"></i> Вконтакте</a>
                    <a class="push google" data-id="gp"><i class="fa fa-google-plus"></i> Google+</a>
                    <a class="push ok" data-id="ok"><i class="fa fa-odnoklassniki"></i> OK</a>
                </div>
            </div>

        </article>
    </div>
    <!-- Footer -->
    <footer id="footer">
        <ul class="menu">
            <li><a href="http://oke.su/index.html">Главная</a></li>
            <li><a href="http://oke.su/tarif.html">Тарифы и продвижение сайтов</a></li>
            <li><a href="http://oke.su/contacts.html">Контакты</a></li>
            <li><a href="http://oke.su/start/index.php/blogs">Статьи</a></li>
        </ul>
        <div class="copyright">
            Copyright © 2017 Бесплатный конструктор сайтов OKE.SU
        </div>
    </footer>
    <!-- Salesform Consultant -->
    <script type='text/javascript'>
        (function() { 
            var b = document; 
            var d = b.createElement('script'); 
            d.type = 'text/javascript';
            d.async = true;
            d.src = 'https://api.salesform.ru/sfc/1506593405418'; 
            var e = b.getElementsByTagName('script')[0]; 
            if (e) e.parentNode.insertBefore(d, e); 
            else b.documentElement.firstChild.appendChild(d);
        })();
    </script>
    <!-- /Salesform Consultant -->

    <!-- Yandex.Metrika counter -->
    <script type="text/javascript">
        (function(d, w, c) {
            (w[c] = w[c] || []).push(function() {
                try {
                    w.yaCounter45951186 = new Ya.Metrika({
                        id: 45951186,
                        clickmap: true,
                        trackLinks: true,
                        accurateTrackBounce: true
                    });
                } catch (e) {}
            });

            var n = d.getElementsByTagName("script")[0],
                s = d.createElement("script"),
                f = function() {
                    n.parentNode.insertBefore(s, n);
                };
            s.type = "text/javascript";
            s.async = true;
            s.src = "https://mc.yandex.ru/metrika/watch.js";

            if (w.opera == "[object Opera]") {
                d.addEventListener("DOMContentLoaded", f, false);
            } else {
                f();
            }
        })(document, window, "yandex_metrika_callbacks");
    </script>
    <noscript><div><img src="https://mc.yandex.ru/watch/45951186" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
    <!-- /Yandex.Metrika counter -->
</body>

</html>
