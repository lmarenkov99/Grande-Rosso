$(document).ready(function() {
	$(".modalbox").magnificPopup({
		removalDelay: 300,
		mainClass: 'mfp-fade',
	});
	$("form input[name='phone']").inputmask("+7 (999) 999-99-99");
	$("form").on("submit", function(){
		var form = $(this);
		var error = false;
		var button = $(this).find('button');
		if (form.find("input[name='name']").length>0) {
			var nameval = form.find("input[name='name']").val();
			var namelen = nameval.length;
			if(namelen < 1) {
				form.find("input[name='name']").addClass('error');
				error = true;
			}
			else if(namelen >= 1){
				form.find("input[name='name']").removeClass('error');
			}
		}
		if (form.find("input[name='phone']").length>0) {
			var tph = form.find("input[name='phone']").val();
			tph = !tph.match(/^\+[0-9]{1} \([0-9]{3}\) [0-9]{3}-[0-9]{2}\-[0-9]{2}/);
			if(tph == true) {
				form.find("input[name='phone']").addClass("error");
				error = true;
			}
			else if(tph == false){
				form.find("input[name='phone']").removeClass("error");
			}
		}
		if(error == false) {
			if (form.find('input[name="confirm"]').prop('checked')==false) {
				alert('Подтвердите согласие на обработку персональных данных!');
				return false;
			}
			button.prop("disabled", true);
			$.ajax({
				type: 'POST',
				url: 'php/sendmessage.php',
				data: $(this).serialize(),
				success: function(data) {
					if(data == "true") {
						form.trigger('reset');
						$.magnificPopup.open({
							items: {
								src: '#popup_complete'
							},
							type:"inline",
							removalDelay: 300,
							mainClass: 'mfp-fade'
						});
						setTimeout(function () {
							$.magnificPopup.close();
						}, 3000);
						button.prop("disabled", false);
						ym(56623597, 'reachGoal', 'MY_TARGET');
						console.log('Сработала цель MY_TARGET');
					}
				}
			});
		}
		return false;
	});
});