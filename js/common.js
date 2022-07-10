$(document).ready(function () {

	$(function (e) {
		$(window).on('load', function () {
			//      $('#preloader')
			//        .delay(1500)
			//        .fadeOut('slow', function () {
			//          $(this).remove();
			//        });
			$(".loader").addClass('active');
			setTimeout(function () {
				$(".main").addClass('active');
			}, 29200);
			setTimeout(function () {
				$(".loader").addClass('dn');
			}, 29200);
			setTimeout(function () {
				$(".loading_text1").addClass('show');
			}, 29200);
			setTimeout(function () {
        $(".feedback-form-wrap1 .main-subtext").addClass('active');
			}, 21800);
			setTimeout(function () {
        $(".feedback-form-inner").addClass('active');
			}, 21800);
			setTimeout(function () {
        $(".feedback-form-inner").addClass('show');
			}, 6200);
		});

	});


	//Попап менеджер FancyBox
	// data-fancybox="gallery" создание галереи
	// data-caption="<b>Подпись</b><br>"  Подпись картинки
	// data-width="2048" реальная ширина изображения
	// data-height="1365" реальная высота изображения
	// data-type="ajax" загрузка контента через ajax без перезагрузки
	// data-type="iframe" загрузка iframe (содержимое с другого сайта)
	$(".fancybox").fancybox({
		hideOnContentClick: true,
		protect: false, //защита изображения от загрузки, щелкнув правой кнопкой мыши. 
		loop: true, // Бесконечная навигация по галерее
		arrows: true, // Отображение навигационные стрелки
		infobar: true, // Отображение инфобара (счетчик и стрелки вверху)
		toolbar: true, // Отображение панели инструментов (кнопки вверху)
		buttons: [ // Отображение панели инструментов по отдельности (кнопки вверху)
      // 'slideShow',
      // 'fullScreen',
      // 'thumbs',
      // 'share',
      //'download',
      //'zoom',
      'close'
    ],
		touch: false,
		animationEffect: "zoom", // анимация открытия слайдов "zoom" "fade" "zoom-in-out"
		transitionEffect: 'slide', // анимация переключения слайдов "fade" "slide" "circular" "tube" "zoom-in-out" "rotate'
		animationDuration: 500, // Длительность в мс для анимации открытия / закрытия
		transitionDuration: 1366, // Длительность переключения слайдов
		slideClass: '', // Добавить свой класс слайдам

	});


	// Маска для формы телефона
	$("input[type='tel']").inputmask({
		"mask": "+7 (999) 999-9999"
	});
	// <input type="tel" placeholder="+7 (___) ___-___" name="tel">


	//Аякс отправка форм
	//Документация: http://api.jquery.com/jquery.ajax/
	$(document).ready(function () {
		$("#form1").submit(function () {
			$.ajax({
				type: "POST",
				url: "mail1.php",
				data: $(this).serialize()
			}).done(function () {
				$('.form_container2').hide();
				$('.thank-you2').addClass('show');

				setTimeout(function () {
					$('.thank-you2').css('opacity', '1');
				}, 500);
				//        ym(56623597, 'reachGoal', 'MY_TARGET');
				//        gtag('event', 'Произвольное название события', { 'event_category': 'cat', 'event_action': 'act', });
				//        console.log('Сработала цель MY_TARGET');
				$(this).find("input").val("");
				$("#form1").trigger("reset");
				$.fancybox.open($("#pop1"));
				setTimeout(function () {
					$.fancybox.close();
				}, 1500);
			});
			return false;
		});
		$("#form2").submit(function () {
			$.ajax({
				type: "POST",
				url: "mail2.php",
				data: $(this).serialize()
			}).done(function () {
				$('.form_container').hide();
				$('.thank-you').addClass('show');

				setTimeout(function () {
					$('.thank-you').css('opacity', '1');
				}, 500);
				//        ym(56623597, 'reachGoal', 'MY_TARGET');
				//        gtag('event', 'Произвольное название события', { 'event_category': 'cat', 'event_action': 'act', });
				//        console.log('Сработала цель MY_TARGET');
				$(this).find("input").val("");
				$("#form2").trigger("reset");
				$.fancybox.open($("#pop2"));
				setTimeout(function () {
					$.fancybox.close();
				}, 1500);
			});
			return false;
		});
	});

	$(function () {
		$("#slider1").slider({
			range: "max",
			value: 3,
			min: 1,
			max: 8,
			step: 1,
			slide: function (event, ui) {
				$("#amount1").val(ui.value);
			}
		});
		$("#amount1").val($("#slider1").slider("value"));
	});

	$(function () {
		$("#slider2").slider({
			range: "max",
			value: 60,
			min: 20,
			max: 100,
			step: 20,
			slide: function (event, ui) {
				$("#amount2").val(ui.value);
			}
		});
		$("#amount2").val($("#slider2").slider("value"));
	});

});