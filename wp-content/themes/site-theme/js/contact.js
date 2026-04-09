/* contact */
(function ($) {

	$(window).ready( function() {
		$('#zip').jpostal({
			postcode : [
				'#zip'
			],
			address : {
				'#address'  : '%3%4%5'
			}
		});
	});

	// define
	var
		$contactForm,
		$cbTextTxt,
		cbTextCb
	;

	function init() {
		create();
		eventify();
		setup();
	}

	function create() {
		$contactForm = $("#contact_form");
		$cbTextTxt   = $('#checkbox_text_txt');
		cbTextCb     = '#checkbox_text_cb01';
	}

	function eventify() {

		/* ajax zip 3 */
		// zip x 1
//		$(document).on('keyup paste', '#zip', function () {
//			AjaxZip3.zip2addr(this,'','form_address','form_address');
//		});
		// zip x 2
//		$(document).on('keyup paste', '#zip02', function () {
//			AjaxZip3.zip2addr('form_zip01','form_zip02','form_pref','form_address01');
//		});


		/* checkbox-text */
		$(document).on('change', cbTextCb, function () {
			if ($(this).is(':checked')) {
				$cbTextTxt.removeAttr('disabled').focus();
			} else {
				$cbTextTxt.attr('disabled','disabled');
			}
		});

		/* disp-nodisp by radio button */
//		$(document).on('click', '.handle_user_01', function () {
//			$('[data-target=handle_user_02]').hide();
//			$('[data-target=handle_user_01]').fadeIn(1000);
//			$('#handle_user').val('handle_user_01');
//		});
//		$(document).on('click', '.handle_user_02', function () {
//			$('[data-target=handle_user_01]').hide();
//			$('[data-target=handle_user_02]').fadeIn(1000);
//			$('#handle_user').val('handle_user_02');
//		});

		/* disp-nodisp by element */
//		$(document).on('click', '.direct_handle_user_01', function () {
//			$('[data-target=direct_handle_user_02]').hide();
//			$('[data-target=direct_handle_user_01]').fadeIn(1000);
//			$('#direct_handle_user').val('direct_handle_user_01');
//			$('#direct_handle_user_01').removeClass('bc_white').addClass('bc_black');
//			$('#direct_handle_user_02').removeClass('bc_black').addClass('bc_white');
//		});
//		$(document).on('click', '.direct_handle_user_02', function () {
//			$('[data-target=direct_handle_user_01]').hide();
//			$('[data-target=direct_handle_user_02]').fadeIn(1000);
//			$('#direct_handle_user').val('direct_handle_user_02');
//			$('#direct_handle_user_01').removeClass('bc_black').addClass('bc_white');
//			$('#direct_handle_user_02').removeClass('bc_white').addClass('bc_black');
//		});
	}

	function setup() {

		$cbTextTxt.attr('disabled','disabled');

		$.validator.addMethod("valueNotEquals", function(value, element, arg){
			return arg != value;
		}, "selectの値が同じだったらエラーを返す");

		/* validate */
		$contactForm.validate({
			rules: {
				"form_kind2[]" : "required",
				"form_select"   : {
					valueNotEquals: "選択してください"
				},
				"form_date"    : "required",
				"form_name"    : "required",
				"form_zip"     : "required",
				"form_address" : "required",
				"form_address2": "required",
				"form_email"   : {
					required: true,
					email   : true
				}
			},
			messages: {
				"form_kind2[]" : "未入力項目があります",
				"form_select"  : "未入力項目があります",
				"form_date"    : "未入力項目があります",
				"form_name"    : "未入力項目があります",
				"form_zip"     : "未入力項目があります",
				"form_address" : "未入力項目があります",
				"form_address2": "未入力項目があります",
				"form_email"   : "メールアドレスをご入力下さい"
			}
			/* validate_group */
			,groups: {
				form_address_gp: "form_zip form_address"
			},
			errorPlacement: function (error, element) {
				if (element.attr("name") === "form_zip" || element.attr("name") === "form_address") {
					error.insertAfter("#address");
				} else {
					error.insertAfter(element);
				}
			}
		});

		/* datepicker */
//		$('.datepicker').datepicker({
//			numberOfMonths : 2,
//			showButtonPanel: true,
//			dateFormat     : 'yy-mm-dd',
//			minDate        : '+1d'
//		});
	}

	function windowload() {
	}

	$(function () {
		init();
	});

	$(window).on('load', function() {
		windowload();
	});

})(jQuery);
