<div class="modal fade" id="product_image_edit">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Cập nhật ảnh sản phẩm</h4>
			</div>
			<div class="modal-body" style="background: #f9f9ee;">
				<div class="panel-body">
					<div class="row">
						<div class="col-lg-12" style="padding: 0px;">

							<div class="panel panel-default">
								<div class="panel-heading">
									<h3 class="panel-title">Sửa ảnh chi tiết</h3>
								</div>
								<div class="panel-body">
									<form method="POST" id="form_db_images">
										@csrf
										{{method_field('POST')}}
										<div class="row product_db_image_base">
											
										</div>
									</form>
								</div>
								<div class="panel-footer">
									<button class="btn btn-warning" form="form_db_images">Lưu Thay Đổi</button>
								</div>
							</div>

						</div>
					</div>
					<div class="row">
						<div class="col-lg-12" style="padding: 0px;">

							<div class="panel panel-default">
								<div class="panel-heading">
									<h3 class="panel-title">Thêm ảnh chi tiết</h3>
								</div>
								<div class="panel-body">
									<form method="POST" id="form_images_update">
										@csrf
										{{method_field('POST')}}
										<div class="row product_image_new_update">
											<input type="file" multiple name="product_image[]" class="file" data-preview-file-type="any"/>
											<p class="product_text product_add_errors_text" style="color: red;"></p>
										</div>
									</form>
								</div>
								<div class="panel-footer">
									<button class="btn btn-warning" form="form_images_update">Lưu Thay Đổi</button>
								</div>
							</div>

						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function() {
		$('#products_table').on('click', '.btn_image_edit', function(event) {
			event.preventDefault();

			var url = $(this).attr('data-url');

			var url_update = $(this).attr('data-update');

			var url_image_update = $(this).attr('data-image-update');

			$.ajax({
				url: url,
				type: 'GET',
			})
			.done(function(response) {
				console.log("success");
				console.log(response);
				$('.product_db_image_base').empty();
				$('.file-preview-thumbnails').empty();

				$.each(response.product.product_images, function(index, val) {
					$('.product_db_image_base').append('<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3" id="product_img_'+val['id']+'" style="margin-bottom: 15px;"><div class="profile-image" style="position: relative;"><div class="update_profile_image" id="img_'+index+'"><img class="edit_product_thumbnail" id="product_db_thumbnail_'+index+'" src="{{asset('storage')}}/'+val["product_image"]+'" style="width: 200px;height: 200px;border-radius: 4px;border: 2px solid green;transition: all .5s;"><div class="btn_file_layout"><div class="btn btn-danger btn-file"> <i class="glyphicon glyphicon-folder-open"></i><input type="file" name="thumbnail['+index+'][name]" class="add_product_file_input" id="img_input_'+index+'"><input type="hidden" name="thumbnail['+index+'][id]" value="'+val['id']+'"/></div></div></div><p class="product_add_errors_text" style="margin-bottom: 0px;color: red;"></p><button style="position: absolute;width: 40px;height: 40px;font-size: 17px;background: #0000ff;color: white;border: 0px;border-radius: 2px;bottom: 80%;left: 11%;" data-id="'+val['id']+'" class="btn_img_del"><i class="fa fa-trash" aria-hidden="true"></i></button></div></div>');

					$('#img_'+index).hover(function() {
						$(this).find('.btn_file_layout').addClass('update_img_show');
					}, function() {
						$(this).find('.btn_file_layout').removeClass('update_img_show');
					});
					$('#img_input_'+index).change(function(event) {
						var input = this;
						var url = $(this).val();
						var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
						if (input.files && input.files[0]&& (ext == "png" || ext == "jpeg" || ext == "jpg")) 
						{
							var reader = new FileReader();

							reader.onload = function (e) {
								$('.product_db_image_base').find('#product_db_thumbnail_'+index).attr('src', e.target.result);
							}
							reader.readAsDataURL(input.files[0]);
						}
						else
						{
							$('#product_db_thumbnail_'+index).attr('src', '{{asset('storage')}}/'+response.product.product_images[index]["product_image"]);
						}
					});
				});

				$('.btn_img_del').on('click', function(event) {
					event.preventDefault();
					var id = $(this).attr('data-id');

					Swal({
						title: 'Bạn có chắc là muốn xóa ảnh này không???',
						text: "Bạn chắc là muốn xóa ảnh này chứ!",
						type: 'warning',
						showCancelButton: true,
						confirmButtonColor: '#3085d6',
						cancelButtonColor: '#d33',
						cancelButtonText: 'Không xóa!',
						confirmButtonText: 'Xóa!'
					}).then((result) => {
						if (result.value) {
							Swal(
								'Xóa ảnh thành công!',
								'Ảnh chi tiết của sản phẩm đã bị xóa khỏi hệ thống',
								'success'
								)
							$('button.swal2-confirm').on('click', function(event) {
								$.ajax({
									url: '{{asset('')}}admin/product-instock-managers/delete/'+id+'/product-database-images',
									type: 'POST',
								})
								.done(function(response) {
									console.log("success");
									if (response) {
										Command: toastr["warning"](response.delete_success),

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

										$('#product_img_'+response.id).remove();
										table.ajax.reload();
									}
								})
								.fail(function() {
									console.log("error");
								})
								.always(function() {
									console.log("complete");
								});
							});
						}
					})
				});

				$('#form_db_images').attr('data-update', url_update);
				$('#form_images_update').attr('data-image-update', url_image_update);
			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
				console.log("complete");
			});
		});

		$('#form_db_images').submit(function(event) {
			event.preventDefault();

			var url = $(this).attr('data-update');
			var formData = new FormData(this);

			$.ajax({
				url: url,
				type: 'POST',
				dataType: 'json',
				data: formData,
				processData: false,
				contentType: false,
			})
			.done(function(response) {
				console.log("success");
				$('#form_db_images')[0].reset();
				if (response.update_success) {
					Command: toastr["success"](response.update_success),

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
						$('#product_image_edit').modal('hide');
						table.ajax.reload();
					},1500);
				}
			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
				console.log("complete");
			});
		});

		$('#form_images_update').submit(function(event) {
			event.preventDefault();

			var url = $(this).attr('data-image-update');
			var formData = new FormData(this);

			$.ajax({
				url: url,
				type: 'POST',
				dataType: 'json',
				data: formData,
				processData: false,
				contentType: false,
			})
			.done(function(response) {
				console.log("success");
				$('#form_images_update')[0].reset();
				if (response.errors) {
					$.each(response.errors, function(index, val) {
						Command: toastr["warning"](val),

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
					});
				} else {
					if (response.update_success) {
						Command: toastr["success"](response.update_success),

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
						$('#product_image_edit').modal('hide');
						table.ajax.reload();
					},1500);
					}
				}
			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
				console.log("complete");
			});
			
		});
	});
</script>