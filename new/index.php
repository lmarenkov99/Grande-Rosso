<?php

// Динамический заголовок

$t1 = ( isset($_GET['t1']) && $_GET['t1'] != '' ) ? htmlspecialchars($_GET['t1']) : 'апартаменты';
$t2 = ( isset($_GET['t2']) && $_GET['t2'] != '' ) ? htmlspecialchars($_GET['t2']) : 'в центре казани';
$t3 = ( isset($_GET['t3']) && $_GET['t3'] != '' ) ? htmlspecialchars($_GET['t3']) : 'успей купить в этом году';

$t1 = str_replace("_", " ", $t1);
$t2 = str_replace("_", " ", $t2);
$t3 = str_replace("_", " ", $t3);

$t2 = str_replace("br", "<br>", $t2);

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>GRANDE ROSSO</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="shortcut icon" href="img/favicon.png" />
	<link rel="stylesheet" href="libs/bootstrap/bootstrap-grid.min.css" />
	<link rel="stylesheet" href="css/fonts.css" />
	<link rel="stylesheet" href="libs/magnific-popup/magnific-popup.css" />
	<link rel="stylesheet" href="css/main.css" />
	
	<!-- Yandex.Metrika counter --> <script type="text/javascript" > (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)}; m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)}) (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym"); ym(56623597, "init", { clickmap:true, trackLinks:true, accurateTrackBounce:true, webvisor:true }); </script> <noscript><div><img src="https://mc.yandex.ru/watch/56623597" style="position:absolute; left:-9999px;" alt="" /></div></noscript> <!-- /Yandex.Metrika counter -->
	
</head>
<body>
	<div class="wrapper" id="wrapper">
		<section class="main sect" id="main">
			<div class="container">
				<div class="content">

					<div class="logo">
						<img src="img/logo.png" alt="">
					</div>
					<div class="phone_top">
						<a href="tel:+78432070717" class="btn-tel roistat-grande-rosso">+7 (843) 207-07-17</a><br>
						<a href="#popup_callback" class="callback modalbox">Заказать обратный звонок</a>
					</div>
					<div class="intro">
						<div class="caption">
							<?php echo $t1; ?>
							<div class="selected1"><?php echo $t2; ?></div>
							<div class="selected2"><?php echo $t3; ?></div>
						</div>
						<a href="#popup_callback" class="button modalbox">Получить предложение</a>
						<div class="note">
							*Гранде Россо. Застройщик ООО "Барс Инвест Групп",<br>
							проектная декларация на сайте: grande-rosso.ru
						</div>
					</div>
				</div>
			</div>
		</section>
		<section class="popup_callback popup sect mfp-hide" id="popup_callback">
			<div class="content">
				<form action="#">
					<div class="fields">
						<div class="field">
							<label for="form_name">Ваше имя*</label>
							<input type="text" name="name" placeholder="Ваше имя*" id="form_name">
						</div>
						<div class="field">
							<label for="form_phone">Ваш телефон*</label>
							<input type="text" name="phone" placeholder="+7 (___) ___-__-__" id="form_phone">
						</div>
					</div>
					<button class="button">Отправить</button>
					<div class="personal">
						<input type="checkbox" name="confirm" id="form_confirm" checked>
						<label for="form_confirm">Даю согласие на обработку <a href="docs/politica.docx" target="_blank">персональных данных</a></label>
					</div>
				</form>
			</div>
		</section>
		<section class="popup_complete popup_callback popup sect mfp-hide" id="popup_complete">
			<div class="content">
				<div class="intro">
					<div class="caption">
						Заявка отправлена!<br>
						Спасибо за обращение.
					</div>
				</div>
			</div>
		</section>
	</div>
	<!--[if lt IE 9]>
		<script src="libs/html5shiv/es5-shim.min.js"></script>
		<script src="libs/html5shiv/html5shiv.min.js"></script>
		<script src="libs/html5shiv/html5shiv-printshiv.min.js"></script>
		<script src="libs/respond/respond.min.js"></script>
	<![endif]-->
	<script src="libs/jquery/jquery-2.1.3.min.js"></script>
	<script src="libs/magnific-popup/jquery.magnific-popup.min.js"></script>
	<script src="libs/inputmask/inputmask.min.js"></script>
	<script src="libs/inputmask/inputmask.extensions.min.js"></script>
	<script src="libs/inputmask/jquery.inputmask.min.js"></script>
	<script src="js/common.js"></script>
	
<script>
(function(w, d, s, h, id) {
    w.roistatProjectId = id; w.roistatHost = h;
    var p = d.location.protocol == "https:" ? "https://" : "http://";
    var u = /^.*roistat_visit=[^;]+(.*)?$/.test(d.cookie) ? "/dist/module.js" : "/api/site/1.0/"+id+"/init";
    var js = d.createElement(s); js.charset="UTF-8"; js.async = 1; js.src = p+h+u; var js2 = d.getElementsByTagName(s)[0]; js2.parentNode.insertBefore(js, js2);
})(window, document, 'script', 'cloud.roistat.com', '5e698b71d8eb835bb4335d9c872e50f0');
</script>
	
</body>
</html>