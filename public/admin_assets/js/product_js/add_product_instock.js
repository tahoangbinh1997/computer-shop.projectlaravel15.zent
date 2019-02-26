$(document).ready(function() {
	$('#form_add_product').on('submit', function(event) {
		event.preventDefault();
		for (var i = 0; i <= rowNum; i++) {
			$('input[name="resolution['+i+'][import_price]"]').unmask();
			$('input[name="resolution['+i+'][price]"]').unmask();
			$('input[name="resolution['+i+'][sale_price]"]').unmask();
			$('input[name="resolution['+i+'][stock]"]').unmask();
		}
		$('input[name="product_image[]"]').parents('.input-group').addClass('response-notice');

		var formData = new FormData(this);
		formData.set('content',CKEDITOR.instances.content.getData())
		var url = $(this).data('url');

		$.ajax({
			url: url,
			type: 'POST',
			data: formData,
			processData: false,
			contentType: false,
		})
		.done(function(response) {
			console.log("success");
			console.log(response.errors);
			for (var i = 0; i <= rowNum; i++) {
				$('#form_add_product input[name="resolution['+i+'][import_price]"]').mask('000.000.000.000.000 VNĐ', {reverse: true});
				$('#form_add_product input[name="resolution['+i+'][price]"]').mask('000.000.000.000.000 VNĐ', {reverse: true});
				$('#form_add_product input[name="resolution['+i+'][sale_price]"]').mask('000.000.000.000.000 VNĐ', {reverse: true});
				$('#form_add_product input[name="resolution['+i+'][stock]"]').mask('000.000.000.000.000 cái', {reverse: true});
			}
			if (response.errors) {
				for (var i = 0; i <= rowNum; i++) {
					if (response.errors["resolution."+i+".resolution_id"]) {
						$('#form_add_product select[name="resolution['+i+'][resolution_id]"]').parent('.col-md-2').addClass('has-error has-feedback-error')
						$('#form_add_product select[name="resolution['+i+'][resolution_id]"]').parent('.col-md-2').removeClass('has-success has-feedback-success')
						$('#form_add_product select[name="resolution['+i+'][resolution_id]"]').parent('.col-md-2').find('p').text(response.errors["resolution."+i+".resolution_id"])
					} else {
						$('#form_add_product select[name="resolution['+i+'][resolution_id]"]').parent('.col-md-2').removeClass('has-error has-feedback-error')
						$('#form_add_product select[name="resolution['+i+'][resolution_id]"]').parent('.col-md-2').addClass('has-success has-feedback-success')
						$('#form_add_product select[name="resolution['+i+'][resolution_id]"]').parent('.col-md-2').find('p').text('')
					}
					if (response.errors["resolution."+i+".import_price"]) {
						$('#form_add_product input[name="resolution['+i+'][import_price]"]').parent('.col-md-2').addClass('has-error has-feedback-error')
						$('#form_add_product input[name="resolution['+i+'][import_price]"]').parent('.col-md-2').removeClass('has-success has-feedback-success')
						$('#form_add_product input[name="resolution['+i+'][import_price]"]').parent('.col-md-2').find('p').text(response.errors["resolution."+i+".import_price"])
					} else {
						$('#form_add_product input[name="resolution['+i+'][import_price]"]').parent('.col-md-2').removeClass('has-error has-feedback-error')
						$('#form_add_product input[name="resolution['+i+'][import_price]"]').parent('.col-md-2').addClass('has-success has-feedback-success')
						$('#form_add_product input[name="resolution['+i+'][import_price]"]').parent('.col-md-2').find('p').text('')
					}
					if (response.errors["resolution."+i+".price"]) {
						$('#form_add_product input[name="resolution['+i+'][price]"]').parent('.col-md-2').addClass('has-error has-feedback-error')
						$('#form_add_product input[name="resolution['+i+'][price]"]').parent('.col-md-2').removeClass('has-success has-feedback-success')
						$('#form_add_product input[name="resolution['+i+'][price]"]').parent('.col-md-2').find('p').text(response.errors["resolution."+i+".price"])
					} else {
						$('#form_add_product input[name="resolution['+i+'][price]"]').parent('.col-md-2').removeClass('has-error has-feedback-error')
						$('#form_add_product input[name="resolution['+i+'][price]"]').parent('.col-md-2').addClass('has-success has-feedback-success')
						$('#form_add_product input[name="resolution['+i+'][price]"]').parent('.col-md-2').find('p').text('')
					}
					if (response.errors["resolution."+i+".sale_price"]) {
						$('#form_add_product input[name="resolution['+i+'][sale_price]"]').parent('.col-md-2').addClass('has-error has-feedback-error')
						$('#form_add_product input[name="resolution['+i+'][sale_price]"]').parent('.col-md-2').removeClass('has-success has-feedback-success')
						$('#form_add_product input[name="resolution['+i+'][sale_price]"]').parent('.col-md-2').find('p').text(response.errors["resolution."+i+".sale_price"])
					} else {
						$('#form_add_product input[name="resolution['+i+'][sale_price]"]').parent('.col-md-2').removeClass('has-error has-feedback-error')
						$('#form_add_product input[name="resolution['+i+'][sale_price]"]').parent('.col-md-2').addClass('has-success has-feedback-success')
						$('#form_add_product input[name="resolution['+i+'][sale_price]"]').parent('.col-md-2').find('p').text('')
					}
					if (response.errors["resolution."+i+".stock"]) {
						$('#form_add_product input[name="resolution['+i+'][stock]"]').parent('.col-md-2').addClass('has-error has-feedback-error')
						$('#form_add_product input[name="resolution['+i+'][stock]"]').parent('.col-md-2').removeClass('has-success has-feedback-success')
						$('#form_add_product input[name="resolution['+i+'][stock]"]').parent('.col-md-2').find('p').text(response.errors["resolution."+i+".stock"])
					} else {
						$('#form_add_product input[name="resolution['+i+'][stock]"]').parent('.col-md-2').removeClass('has-error has-feedback-error')
						$('#form_add_product input[name="resolution['+i+'][stock]"]').parent('.col-md-2').addClass('has-success has-feedback-success')
						$('#form_add_product input[name="resolution['+i+'][stock]"]').parent('.col-md-2').find('p').text('')
					}
				}
				if (response.errors["name"]) {
					$('#form_add_product input[name="name"]').parent('.input-group').addClass('has-error has-feedback-error')
					$('#form_add_product input[name="name"]').parent('.input-group').removeClass('has-success has-feedback-success')
					$('#form_add_product input[name="name"]').parents('.col-md-10').find('p').text(response.errors["name"])
				} else {
					$('#form_add_product input[name="name"]').parent('.input-group').removeClass('has-error has-feedback-error')
					$('#form_add_product input[name="name"]').parent('.input-group').addClass('has-success has-feedback-success')
					$('#form_add_product input[name="name"]').parents('.col-md-10').find('p').text('')
				}
				if (response.errors["description"]) {
					$('#form_add_product textarea[name="description"]').parent('.input-group').addClass('has-error has-feedback-error')
					$('#form_add_product textarea[name="description"]').parent('.input-group').removeClass('has-success has-feedback-success')
					$('#form_add_product textarea[name="description"]').parents('.col-md-10').find('p').text(response.errors["description"])
				} else {
					$('#form_add_product textarea[name="description"]').parent('.input-group').removeClass('has-error has-feedback-error')
					$('#form_add_product textarea[name="description"]').parent('.input-group').addClass('has-success has-feedback-success')
					$('#form_add_product textarea[name="description"]').parents('.col-md-10').find('p').text('')
				}
				if (response.errors["content"]) {
					$('#form_add_product textarea[name="content"]').parent('.col-md-10').addClass('has-error has-feedback-error')
					$('#form_add_product textarea[name="content"]').parent('.col-md-10').removeClass('has-success has-feedback-success')
					$('#form_add_product textarea[name="content"]').parent('.col-md-10').find('p').text(response.errors["content"])
				} else {
					$('#form_add_product textarea[name="content"]').parent('.col-md-10').removeClass('has-error has-feedback-error')
					$('#form_add_product textarea[name="content"]').parent('.col-md-10').addClass('has-success has-feedback-success')
					$('#form_add_product textarea[name="content"]').parent('.col-md-10').find('p').text('')
				}
				if (response.errors["thumbnail"]) {
					$('#form_add_product input[name="thumbnail"]').parents('.image_base').addClass('image-error')
					$('#form_add_product input[name="thumbnail"]').parents('.image_base').removeClass('image-success')
					$('#form_add_product input[name="thumbnail"]').parents('.image_base').find('p').text(response.errors["thumbnail"])
				} else {
					$('#form_add_product input[name="thumbnail"]').parents('.image_base').removeClass('image-error')
					$('#form_add_product input[name="thumbnail"]').parents('.image_base').addClass('image-success')
					$('#form_add_product input[name="thumbnail"]').parents('.image_base').find('p').text('')
				}
				if (response.errors["category_check_lap"]) {
					$('#form_add_product input[name="category_check_lap"]').parents('.categories').addClass('categories-error')
					$('#form_add_product input[name="category_check_lap"]').parents('.categories').removeClass('categories-success')
					$('#form_add_product input[name="category_check_lap"]').parents('.categories').find('p').text(response.errors["category_check_lap"])
				} else {
					$('#form_add_product input[name="category_check_lap"]').parents('.categories').removeClass('categories-error')
					$('#form_add_product input[name="category_check_lap"]').parents('.categories').addClass('categories-success')
					$('#form_add_product input[name="category_check_lap"]').parents('.categories').find('p').text('')
				}
				if (response.errors["tags"]) {
					$('#form_add_product select[name="tags[]"]').parent('.col-12').addClass('has-error has-feedback-error')
					$('#form_add_product select[name="tags[]"]').parent('.col-12').removeClass('has-success has-feedback-success')
					$('#form_add_product select[name="tags[]"]').parents('.categories').find('p').text(response.errors["tags"])
				} else {
					$('#form_add_product select[name="tags[]"]').parent('.col-12').removeClass('has-error has-feedback-error')
					$('#form_add_product select[name="tags[]"]').parent('.col-12').addClass('has-success has-feedback-success')
					$('#form_add_product select[name="tags[]"]').parents('.categories').find('p').text('')
				}
				if (response.errors["cpu"]) {
					$('#form_add_product input[name="cpu"]').parent('.input-group').addClass('has-error has-feedback-error')
					$('#form_add_product input[name="cpu"]').parent('.input-group').removeClass('has-success has-feedback-success')
					$('#form_add_product input[name="cpu"]').parents('.col-md-10').find('p').text(response.errors["cpu"])
				} else {
					$('#form_add_product input[name="cpu"]').parent('.input-group').removeClass('has-error has-feedback-error')
					$('#form_add_product input[name="cpu"]').parent('.input-group').addClass('has-success has-feedback-success')
					$('#form_add_product input[name="cpu"]').parents('.col-md-10').find('p').text('')
				}
				if (response.errors["operation_system"]) {
					$('#form_add_product input[name="operation_system"]').parent('.input-group').addClass('has-error has-feedback-error')
					$('#form_add_product input[name="operation_system"]').parent('.input-group').removeClass('has-success has-feedback-success')
					$('#form_add_product input[name="operation_system"]').parents('.col-md-10').find('p').text(response.errors["operation_system"])
				} else {
					$('#form_add_product input[name="operation_system"]').parent('.input-group').removeClass('has-error has-feedback-error')
					$('#form_add_product input[name="operation_system"]').parent('.input-group').addClass('has-success has-feedback-success')
					$('#form_add_product input[name="operation_system"]').parents('.col-md-10').find('p').text('')
				}
				if (response.errors["ram"]) {
					$('#form_add_product input[name="ram"]').parent('.input-group').addClass('has-error has-feedback-error')
					$('#form_add_product input[name="ram"]').parent('.input-group').removeClass('has-success has-feedback-success')
					$('#form_add_product input[name="ram"]').parents('.col-md-10').find('p').text(response.errors["ram"])
				} else {
					$('#form_add_product input[name="ram"]').parent('.input-group').removeClass('has-error has-feedback-error')
					$('#form_add_product input[name="ram"]').parent('.input-group').addClass('has-success has-feedback-success')
					$('#form_add_product input[name="ram"]').parents('.col-md-10').find('p').text('')
				}
				if (response.errors["monitor"]) {
					$('#form_add_product input[name="monitor"]').parent('.input-group').addClass('has-error has-feedback-error')
					$('#form_add_product input[name="monitor"]').parent('.input-group').removeClass('has-success has-feedback-success')
					$('#form_add_product input[name="monitor"]').parents('.col-md-10').find('p').text(response.errors["monitor"])
				} else {
					$('#form_add_product input[name="monitor"]').parent('.input-group').removeClass('has-error has-feedback-error')
					$('#form_add_product input[name="monitor"]').parent('.input-group').addClass('has-success has-feedback-success')
					$('#form_add_product input[name="monitor"]').parents('.col-md-10').find('p').text('')
				}
				if (response.errors["hdd"]) {
					$('#form_add_product input[name="hdd"]').parent('.input-group').addClass('has-error has-feedback-error')
					$('#form_add_product input[name="hdd"]').parent('.input-group').removeClass('has-success has-feedback-success')
					$('#form_add_product input[name="hdd"]').parents('.col-md-10').find('p').text(response.errors["hdd"])
				} else {
					$('#form_add_product input[name="hdd"]').parent('.input-group').removeClass('has-error has-feedback-error')
					$('#form_add_product input[name="hdd"]').parent('.input-group').addClass('has-success has-feedback-success')
					$('#form_add_product input[name="hdd"]').parents('.col-md-10').find('p').text('')
				}
				if (response.errors["card_audio"]) {
					$('#form_add_product input[name="card_audio"]').parent('.input-group').addClass('has-error has-feedback-error')
					$('#form_add_product input[name="card_audio"]').parent('.input-group').removeClass('has-success has-feedback-success')
					$('#form_add_product input[name="card_audio"]').parents('.col-md-10').find('p').text(response.errors["card_audio"])
				} else {
					$('#form_add_product input[name="card_audio"]').parent('.input-group').removeClass('has-error has-feedback-error')
					$('#form_add_product input[name="card_audio"]').parent('.input-group').addClass('has-success has-feedback-success')
					$('#form_add_product input[name="card_audio"]').parents('.col-md-10').find('p').text('')
				}
				if (response.errors["card_video"]) {
					$('#form_add_product input[name="card_video"]').parent('.input-group').addClass('has-error has-feedback-error')
					$('#form_add_product input[name="card_video"]').parent('.input-group').removeClass('has-success has-feedback-success')
					$('#form_add_product input[name="card_video"]').parents('.col-md-10').find('p').text(response.errors["card_video"])
				} else {
					$('#form_add_product input[name="card_video"]').parent('.input-group').removeClass('has-error has-feedback-error')
					$('#form_add_product input[name="card_video"]').parent('.input-group').addClass('has-success has-feedback-success')
					$('#form_add_product input[name="card_video"]').parents('.col-md-10').find('p').text('')
				}
				if (response.errors["webcam"]) {
					$('#form_add_product input[name="webcam"]').parent('.input-group').addClass('has-error has-feedback-error')
					$('#form_add_product input[name="webcam"]').parent('.input-group').removeClass('has-success has-feedback-success')
					$('#form_add_product input[name="webcam"]').parents('.col-md-10').find('p').text(response.errors["webcam"])
				} else {
					$('#form_add_product input[name="webcam"]').parent('.input-group').removeClass('has-error has-feedback-error')
					$('#form_add_product input[name="webcam"]').parent('.input-group').addClass('has-success has-feedback-success')
					$('#form_add_product input[name="webcam"]').parents('.col-md-10').find('p').text('')
				}
				if (response.errors["card_reader"]) {
					$('#form_add_product input[name="card_reader"]').parent('.input-group').addClass('has-error has-feedback-error')
					$('#form_add_product input[name="card_reader"]').parent('.input-group').removeClass('has-success has-feedback-success')
					$('#form_add_product input[name="card_reader"]').parents('.col-md-10').find('p').text(response.errors["card_reader"])
				} else {
					$('#form_add_product input[name="card_reader"]').parent('.input-group').removeClass('has-error has-feedback-error')
					$('#form_add_product input[name="card_reader"]').parent('.input-group').addClass('has-success has-feedback-success')
					$('#form_add_product input[name="card_reader"]').parents('.col-md-10').find('p').text('')
				}
				if (response.errors["communications"]) {
					$('#form_add_product input[name="communications"]').parent('.input-group').addClass('has-error has-feedback-error')
					$('#form_add_product input[name="communications"]').parent('.input-group').removeClass('has-success has-feedback-success')
					$('#form_add_product input[name="communications"]').parents('.col-md-10').find('p').text(response.errors["communications"])
				} else {
					$('#form_add_product input[name="communications"]').parent('.input-group').removeClass('has-error has-feedback-error')
					$('#form_add_product input[name="communications"]').parent('.input-group').addClass('has-success has-feedback-success')
					$('#form_add_product input[name="communications"]').parents('.col-md-10').find('p').text('')
				}
				if (response.errors["bluetooth"]) {
					$('#form_add_product input[name="bluetooth"]').parent('.input-group').addClass('has-error has-feedback-error')
					$('#form_add_product input[name="bluetooth"]').parent('.input-group').removeClass('has-success has-feedback-success')
					$('#form_add_product input[name="bluetooth"]').parents('.col-md-10').find('p').text(response.errors["bluetooth"])
				} else {
					$('#form_add_product input[name="bluetooth"]').parent('.input-group').removeClass('has-error has-feedback-error')
					$('#form_add_product input[name="bluetooth"]').parent('.input-group').addClass('has-success has-feedback-success')
					$('#form_add_product input[name="bluetooth"]').parents('.col-md-10').find('p').text('')
				}
				if (response.errors["port"]) {
					$('#form_add_product input[name="port"]').parent('.input-group').addClass('has-error has-feedback-error')
					$('#form_add_product input[name="port"]').parent('.input-group').removeClass('has-success has-feedback-success')
					$('#form_add_product input[name="port"]').parents('.col-md-10').find('p').text(response.errors["port"])
				} else {
					$('#form_add_product input[name="port"]').parent('.input-group').removeClass('has-error has-feedback-error')
					$('#form_add_product input[name="port"]').parent('.input-group').addClass('has-success has-feedback-success')
					$('#form_add_product input[name="port"]').parents('.col-md-10').find('p').text('')
				}
				if (response.errors["weight"]) {
					$('#form_add_product input[name="weight"]').parent('.input-group').addClass('has-error has-feedback-error')
					$('#form_add_product input[name="weight"]').parent('.input-group').removeClass('has-success has-feedback-success')
					$('#form_add_product input[name="weight"]').parents('.col-md-10').find('p').text(response.errors["weight"])
				} else {
					$('#form_add_product input[name="weight"]').parent('.input-group').removeClass('has-error has-feedback-error')
					$('#form_add_product input[name="weight"]').parent('.input-group').addClass('has-success has-feedback-success')
					$('#form_add_product input[name="weight"]').parents('.col-md-10').find('p').text('')
				}
				if (response.errors["pin"]) {
					$('#form_add_product input[name="pin"]').parent('.input-group').addClass('has-error has-feedback-error')
					$('#form_add_product input[name="pin"]').parent('.input-group').removeClass('has-success has-feedback-success')
					$('#form_add_product input[name="pin"]').parents('.col-md-10').find('p').text(response.errors["pin"])
				} else {
					$('#form_add_product input[name="pin"]').parent('.input-group').removeClass('has-error has-feedback-error')
					$('#form_add_product input[name="pin"]').parent('.input-group').addClass('has-success has-feedback-success')
					$('#form_add_product input[name="pin"]').parents('.col-md-10').find('p').text('')
				}
				if (response.errors["product_image"]) {
					$('#form_add_product input[name="product_image[]"]').parents('.input-group').addClass('has-error has-feedback-error')
					$('#form_add_product input[name="product_image[]"]').parents('.input-group').removeClass('has-success has-feedback-success')
					$('#form_add_product input[name="product_image[]"]').parents('.col-md-10').find('.product_text').text(response.errors["product_image"])
				} else {
					$('#form_add_product input[name="product_image[]"]').parents('.input-group').removeClass('has-error has-feedback-error')
					$('#form_add_product input[name="product_image[]"]').parents('.input-group').addClass('has-success has-feedback-success')
					$('#form_add_product input[name="product_image[]"]').parents('.col-md-10').find('.product_text').text('')
				}
				if (response.errors.product_imagestock >= 1 ) {
					for (var i = 0; i < response.product_image_stock; i++) {
						if (response.errors["product_image."+i]) {
							$('#form_add_product input[name="product_image[]"]').parents('.input-group').addClass('has-error has-feedback-error')
							$('#form_add_product input[name="product_image[]"]').parents('.input-group').removeClass('has-success has-feedback-success')
							$('#form_add_product input[name="product_image[]"]').parents('.col-md-10').find('.product_text').text(response.errors["product_image."+i])
						} else {
							$('#form_add_product input[name="product_image[]"]').parents('.input-group').removeClass('has-error has-feedback-error')
							$('#form_add_product input[name="product_image[]"]').parents('.input-group').addClass('has-success has-feedback-success')
							$('#form_add_product input[name="product_image[]"]').parents('.col-md-10').find('.product_text').text('')
						}
					}
				}
			} else {
				$('#form_add_product').each(function(){
					$(this).find('.response-notice').removeClass('has-error has-feedback-error');
					$(this).find('.response-notice').addClass('has-success has-feedback-success');
					$(this).find('.product_add_errors_text').text('');
				})
				if (response.create_success) {
					Command: toastr["success"](response.create_success),

					toastr.options = {
						"closeButton": false,
						"debug": false,
						"newestOnTop": false,
						"progressBar": false,
						"positionClass": "toast-top-right",
						"preventDuplicates": false,
						"onclick": null,
						"showDuration": "300",
						"hideDuration": "1000",
						"timeOut": "5000",
						"extendedTimeOut": "1000",
						"showEasing": "swing",
						"hideEasing": "linear",
						"showMethod": "fadeIn",
						"hideMethod": "fadeOut"
					}

					setTimeout(function(){
						$('#product_add').modal('hide');
					},1500);
				}
			}
		})
		.fail(function() {
			console.log("error");
			for (var i = 0; i <= rowNum; i++) {
				$('#form_add_product input[name="resolution['+i+'][import_price]"]').mask('000.000.000.000.000 VNĐ', {reverse: true});
				$('#form_add_product input[name="resolution['+i+'][price]"]').mask('000.000.000.000.000 VNĐ', {reverse: true});
				$('#form_add_product input[name="resolution['+i+'][sale_price]"]').mask('000.000.000.000.000 VNĐ', {reverse: true});
				$('#form_add_product input[name="resolution['+i+'][stock]"]').mask('000.000.000.000.000 cái', {reverse: true});
			}
		})
		.always(function() {
			console.log("complete");
		});

	});
});