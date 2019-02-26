@if(Auth::guard('admin')->user()->permission == 0 || Auth::guard('admin')->user()->permission == 2)
	<div class="modal fade" id="product_resolution_edit">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Cập nhật thông tin sản phẩm</h4>
				</div>
				<div class="modal-body" style="background: #f9f9ee;">
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12" style="padding: 0px;">

								<form class="form-horizontal" id="form_other_resolutions" enctype="multipart/form-data" method="POST" data-url="">
									@csrf
									{{method_field('POST')}}
									<div class="panel panel-default">
										<div class="panel-heading">
											<h3 class="panel-title">Thêm Độ Phân Giải</h3>
										</div>
										<div class="panel-body">
											<table class="table table-hover">
												<thead>
													<tr>
														<th>Resolution Name</th>
														<th>Import Price</th>
														<th>Price</th>
														<th>Sale Price</th>
														<th>Stock</th>
														<th>Action</th>
													</tr>
												</thead>
												<tbody id="product_resolution_table">
													
												</tbody>
												<tfoot>
													<tr>
														<th>Resolution Name</th>
														<th>Import Price</th>
														<th>Price</th>
														<th>Sale Price</th>
														<th>Stock</th>
														<th>Action</th>
													</tr>
												</tfoot>
											</table>
										</div>
										<div class="panel-footer">
											<button class="btn btn-warning">Lưu Thay Đổi</button>
										</div>
									</div>
								</form>

							</div>
						</div>
						<div class="row">
							<div class="col-lg-12" style="padding: 0px;">

								<div class="panel panel-default">
									<div class="panel-heading">
										<h3 class="panel-title">Sửa Độ Phân Giải</h3>
									</div>
									<div class="panel-body">
										<form class="form-horizontal" id="form_db_resolutions" method="POST">
											@csrf
											{{ method_field('POST')}}
											<div class="row">
												<div class="col-md-2 resolution_fake_table_header">
													Resolution Name
												</div>
												<div class="col-md-2 resolution_fake_table_header">
													Import Price
												</div>
												<div class="col-md-2 resolution_fake_table_header">
													Price
												</div>
												<div class="col-md-2 resolution_fake_table_header">
													Sale Price
												</div>
												<div class="col-md-2 resolution_fake_table_header">
													Stock
												</div>
												<div class="col-md-2 resolution_fake_table_header">
													Action
												</div>
											</div>
											<div class="row" id="product_resolution_db_table">
												
											</div>
											<div class="row">
												<div class="col-md-2 resolution_fake_table_footer">
													Resolution Name
												</div>
												<div class="col-md-2 resolution_fake_table_footer">
													Import Price
												</div>
												<div class="col-md-2 resolution_fake_table_footer">
													Price
												</div>
												<div class="col-md-2 resolution_fake_table_footer">
													Sale Price
												</div>
												<div class="col-md-2 resolution_fake_table_footer">
													Stock
												</div>
												<div class="col-md-2 resolution_fake_table_footer">
													Action
												</div>
											</div>
										</form>
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
		var product_resolutions = [];

		var rowRslNum = 0;
		var resolution_check = [];
		var resolution_num = 0;
		var resolutions = new Array();

		$(document).ready(function() {
			$('#products_table').on('click', '.btn_resolution_edit', function(event) {
				event.preventDefault();
				
				var url = $(this).attr('data-url');
				var url_update = $(this).attr('data-update');

				$.ajax({
					url: url,
					type: 'get',
				})
				.done(function(response) {

					console.log("success");
					console.log(response.product);
					product_resolutions = [''];
					rowRslNum = 0;
					resolution_check = [''];
					resolutions = [''];
					resolution_num = response.resolutions.length;
					$('#product_resolution_table').find('select').removeClass('resolution_success');
					$('#product_resolution_table').find('input').removeClass('resolution_success');
					$('#product_resolution_table').empty();
					$('#product_resolution_db_table').empty();
					$('#product_resolution_table').append('<tr><td style="width:160px;"><select name="resolution[0][resolution_id]" id="select_0" class="form-control"></select><p class="product_resolution_errors_text" style="color: red;"></p></td><td><input type="text" name="resolution[0][import_price]" class="form-control" placeholder="Giá nhập khẩu"><p class="product_resolution_errors_text" style="color: red;"></p></td><td><input type="text" name="resolution[0][price]" class="form-control" placeholder="Giá bán"><p class="product_resolution_errors_text" style="color: red;"></p></td><td><input type="text" name="resolution[0][sale_price]" class="form-control" placeholder="Giá sale"><p class="product_resolution_errors_text" style="color: red;"></p></td><td><input type="text" name="resolution[0][stock]" class="form-control" placeholder="Số lượng"><p class="product_resolution_errors_text" style="color: red;"></p></td><td><button type="button" class="btn btn-primary" style="padding: 4px 1px 2px 7px;" id="product_stock_add_0" onclick="addResolutionRow(this)""><i class="fa fa-plus-square" aria-hidden="true"></i></button></td></tr>');
					$.each(response.resolutions, function(index, val) {
						 $('#product_resolution_table #select_0').append('<option value="'+val['id']+'">'+val['resolution_name']+'</option>');
						 resolutions[index] = {"id": val['id'],"resolution_name": val['resolution_name']}; // add các dữ liệu của trường id và trường resolution_name vào mảng 2 chiều resolutions
					});
					console.log(resolutions); //console ra mảng resolution chứa các dạng độ phân giải hiện có
					$('#product_resolution_table input[name="resolution[0][import_price]"]').mask('000.000.000.000.000 VNĐ', {reverse: true});
					$('#product_resolution_table input[name="resolution[0][price]"]').mask('000.000.000.000.000 VNĐ', {reverse: true});
					$('#product_resolution_table input[name="resolution[0][sale_price]"]').mask('000.000.000.000.000 VNĐ', {reverse: true});
					$('#product_resolution_table input[name="resolution[0][stock]"]').mask('000.000.000.000.000 cái', {reverse: true});
					$.each(response.product.resolutions, function(index, val) {
						$('#product_resolution_table select[name="resolution[0][resolution_id]"] option[value="'+response.product.resolutions[index]["id"]+'"]').remove();
						product_resolutions[product_resolutions.length] = response.product.resolutions[index]["id"];
					});
					$('#form_other_resolutions').attr('data-update', url_update);
					$('#product_resolution_db_table').append('<div class="col-md-2 resolution_fake_table_body"><select name="resolution_id" class="form-control"></select><p class="product_resolution_errors_text" style="color: red;"></p></div><div class="col-md-2 resolution_fake_table_body"><input type="text" name="import_price" class="form-control" placeholder="Giá Nhập Khẩu"><p class="product_resolution_errors_text" style="color: red;"></p></div><div class="col-md-2 resolution_fake_table_body"><input type="text" name="price" class="form-control" placeholder="Giá Bán"><p class="product_resolution_errors_text" style="color: red;"></p></div><div class="col-md-2 resolution_fake_table_body"><input type="text" name="sale_price" class="form-control" placeholder="Giá Khuyến Mãi"><p class="product_resolution_errors_text" style="color: red;"></p></div><div class="col-md-2 resolution_fake_table_body"><input type="text" name="stock" class="form-control" placeholder="Số lượng"><p class="product_resolution_errors_text" style="color: red;"></p></div><div class="col-md-2 resolution_fake_table_body"><button type="button" class="btn btn-primary product_db_resolution_update" style="padding: 4px 1px 2px 7px;margin-right: 5px;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button><button type="button" class="btn btn-primary product_db_resolution_delete" style="padding: 4px 1px 2px 7px;"><i class="fa fa-trash-o" aria-hidden="true"></i></button></div>');
					for (var i = 0; i < response.product.product_resolutions.length; i++) {
						$('#product_resolution_db_table select[name="resolution_id"]').append('<option value="'+response.product.product_resolutions[i]['id']+'">'+response.product.product_resolutions[i]['resolution_name']+'</option>');
					}
					$('#product_resolution_db_table input[name="import_price"]').val(response.product.product_resolutions[0]['import_price']).mask('000.000.000.000.000 VNĐ', {reverse: true});
					$('#product_resolution_db_table input[name="price"]').val(response.product.product_resolutions[0]['price']).mask('000.000.000.000.000 VNĐ', {reverse: true});
					$('#product_resolution_db_table input[name="sale_price"]').val(response.product.product_resolutions[0]['sale_price']).mask('000.000.000.000.000 VNĐ', {reverse: true});
					$('#product_resolution_db_table input[name="stock"]').val(response.product.product_resolutions[0]['stock']).mask('000.000.000.000.000 cái', {reverse: true});


					$('#product_resolution_db_table select[name="resolution_id"]').change(function(){

						$.ajax({
							url: '{{asset('')}}admin/product-instock-managers/detail/'+$(this).children('option:selected').val()+'/database-resolution',
							type: 'POST',
						})
						.done(function(response) {
							console.log("success");
							if (response.product_resolution) {
								$('#product_resolution_db_table input[name="import_price"]').val(response.product_resolution['import_price']);
								$('#product_resolution_db_table input[name="price"]').val(response.product_resolution['price']);
								$('#product_resolution_db_table input[name="sale_price"]').val(response.product_resolution['sale_price']);
								$('#product_resolution_db_table input[name="stock"]').val(response.product_resolution['stock']);
							}
						})
						.fail(function() {
							console.log("error");
						})
						.always(function() {
							console.log("complete");
						});
					});

					$('.product_db_resolution_delete').click(function(event) {
						event.preventDefault();
						var id = $('select[name="resolution_id"] option:selected').attr('value');
						Swal({
							title: 'Bạn có chắc là muốn xóa không???',
							text: "Bạn chắc là muốn xóa chứ!",
							type: 'warning',
							showCancelButton: true,
							confirmButtonColor: '#3085d6',
							cancelButtonColor: '#d33',
							cancelButtonText: 'Không xóa!',
							confirmButtonText: 'Xóa!'
						}).then((result) => {
							if (result.value) {
								Swal(
									'Xóa độ phân giải thành công!',
									'Độ phân giải của sản phẩm đã bị xóa khỏi hệ thống',
									'success'
									)
								$('button.swal2-confirm').on('click', function(event) {
									$.ajax({
										url: '{{asset('')}}admin/product-instock-managers/delete/'+id+'/database-resolution',
										type: 'POST',
									})
									.done(function(response) {
										console.log("success");
										if (response.delete_success) {
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

											setTimeout(function(){
												$('#product_resolution_edit').modal('hide');
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
							}
						})
					});

					$('.product_db_resolution_update').click(function(event){
						event.preventDefault();
						var id = $('select[name="resolution_id"] option:selected').attr('value');
						$('#product_resolution_db_table input[name="import_price"]').unmask();
						$('#product_resolution_db_table input[name="price"]').unmask();
						$('#product_resolution_db_table input[name="sale_price"]').unmask();
						$('#product_resolution_db_table input[name="stock"]').unmask();

						$.ajax({
							url: '{{asset('')}}admin/product-instock-managers/edit/'+id+'/database-resolution',
							type: 'POST',
							dataType: 'json',
							data: $(this).parents('#form_db_resolutions').serialize(),
						})
						.done(function(response) {
							console.log("success");
							$('#product_resolution_db_table input[name="import_price"]').mask('000.000.000.000 VNĐ',{reverse: true});
							$('#product_resolution_db_table input[name="price"]').mask('000.000.000.000 VNĐ',{reverse: true});
							$('#product_resolution_db_table input[name="sale_price"]').mask('000.000.000.000 VNĐ',{reverse: true});
							$('#product_resolution_db_table input[name="stock"]').mask('000.000.000.000 cái',{reverse: true});
							if (response.errors) {
								if (response.errors.resolution_id) {
									$('#product_resolution_db_table select[name="resolution_id"]').addClass('resolution_error');
									$('#product_resolution_db_table select[name="resolution_id"]').removeClass('resolution_success');
									$('select[name="resolution_id"]').parent('.resolution_fake_table_body').find('.product_resolution_errors_text').text(response.errors.resolution_id);
								} else {
									$('#product_resolution_db_table select[name="resolution_id"]').addClass('resolution_success');
									$('#product_resolution_db_table select[name="resolution_id"]').removeClass('resolution_error');
									$('select[name="resolution_id"]').parent('.resolution_fake_table_body').find('.product_resolution_errors_text').text('');
								}
								if (response.errors.import_price) {
									$('#product_resolution_db_table input[name="import_price"]').addClass('resolution_error');
									$('#product_resolution_db_table input[name="import_price"]').removeClass('resolution_success');
									$('input[name="import_price"]').parent('.resolution_fake_table_body').find('.product_resolution_errors_text').text(response.errors.import_price);
								} else {
									$('#product_resolution_db_table input[name="import_price"]').addClass('resolution_success');
									$('#product_resolution_db_table input[name="import_price"]').removeClass('resolution_error');
									$('input[name="import_price"]').parent('.resolution_fake_table_body').find('.product_resolution_errors_text').text('');
								}
								if (response.errors.price) {
									$('#product_resolution_db_table input[name="price"]').addClass('resolution_error');
									$('#product_resolution_db_table input[name="price"]').removeClass('resolution_success');
									$('input[name="price"]').parent('.resolution_fake_table_body').find('.product_resolution_errors_text').text(response.errors.price);
								} else {
									$('#product_resolution_db_table input[name="price"]').addClass('resolution_success');
									$('#product_resolution_db_table input[name="price"]').removeClass('resolution_error');
									$('input[name="price"]').parent('.resolution_fake_table_body').find('.product_resolution_errors_text').text('');
								}
								if (response.errors.sale_price) {
									$('#product_resolution_db_table input[name="sale_price"]').addClass('resolution_error');
									$('#product_resolution_db_table input[name="sale_price"]').removeClass('resolution_success');
									$('input[name="sale_price"]').parent('.resolution_fake_table_body').find('.product_resolution_errors_text').text(response.errors.sale_price);
								} else {
									$('#product_resolution_db_table input[name="sale_price"]').addClass('resolution_success');
									$('#product_resolution_db_table input[name="sale_price"]').removeClass('resolution_error');
									$('input[name="sale_price"]').parent('.resolution_fake_table_body').find('.product_resolution_errors_text').text('');
								}
								if (response.errors.stock) {
									$('#product_resolution_db_table input[name="stock"]').addClass('resolution_error');
									$('#product_resolution_db_table input[name="stock"]').removeClass('resolution_success');
									$('input[name="stock"]').parent('.resolution_fake_table_body').find('.product_resolution_errors_text').text(response.errors.stock);
								} else {
									$('#product_resolution_db_table input[name="stock"]').addClass('resolution_success');
									$('#product_resolution_db_table input[name="stock"]').removeClass('resolution_error');
									$('input[name="stock"]').parent('.resolution_fake_table_body').find('.product_resolution_errors_text').text('');
								}
							} else {
								$('#product_resolution_db_table').find('input').removeClass('resolution_error');
								$('#product_resolution_db_table').find('select').removeClass('resolution_error');
								$('#product_resolution_db_table').find('input').addClass('resolution_success');
								$('#product_resolution_db_table').find('select').addClass('resolution_success');
								$('#product_resolution_db_table').find('.product_resolution_errors_text').text('');
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
										$('#product_resolution_edit').modal('hide');
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
	})

	})
	.fail(function() {
		console.log("error");
	})
	.always(function() {
		console.log("complete");
	});
	});

	$('#form_other_resolutions').submit(function(event) {
		event.preventDefault();

		for (var i = 0; i <= rowRslNum; i++) {
			$('#product_resolution_table input[name="resolution['+i+'][import_price]"]').unmask();
			$('#product_resolution_table input[name="resolution['+i+'][price]"]').unmask();
			$('#product_resolution_table input[name="resolution['+i+'][sale_price]"]').unmask();
			$('#product_resolution_table input[name="resolution['+i+'][stock]"]').unmask();
		}

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
			for (var i = 0; i <= rowRslNum; i++) {
				$('#product_resolution_table input[name="resolution['+i+'][import_price]"]').mask('000.000.000.000.000 VNĐ', {reverse: true});
				$('#product_resolution_table input[name="resolution['+i+'][price]"]').mask('000.000.000.000.000 VNĐ', {reverse: true});
				$('#product_resolution_table input[name="resolution['+i+'][sale_price]"]').mask('000.000.000.000.000 VNĐ', {reverse: true});
				$('#product_resolution_table input[name="resolution['+i+'][stock]"]').mask('000.000.000.000.000 cái', {reverse: true});
			}

			if (response.errors) {
				for (var i = 0; i <= rowRslNum; i++) {
					if (response.errors["resolution."+i+".resolution_id"]) {
						$('#product_resolution_table select[name="resolution['+i+'][resolution_id]"]').addClass('resolution_error')
						$('#product_resolution_table select[name="resolution['+i+'][resolution_id]"]').removeClass('resolution_success')
						$('#product_resolution_table select[name="resolution['+i+'][resolution_id]"]').parent('td').find('.product_resolution_errors_text').text(response.errors["resolution."+i+".resolution_id"])
					} else {
						$('#product_resolution_table select[name="resolution['+i+'][resolution_id]"]').addClass('resolution_success')
						$('#product_resolution_table select[name="resolution['+i+'][resolution_id]"]').removeClass('resolution_error')
						$('#product_resolution_table select[name="resolution['+i+'][resolution_id]"]').parent('td').find('.product_resolution_errors_text').text('')
					}
					if (response.errors["resolution."+i+".import_price"]) {
						$('#product_resolution_table input[name="resolution['+i+'][import_price]"]').addClass('resolution_error')
						$('#product_resolution_table input[name="resolution['+i+'][import_price]"]').removeClass('resolution_success')
						$('#product_resolution_table input[name="resolution['+i+'][import_price]"]').parent('td').find('.product_resolution_errors_text').text(response.errors["resolution."+i+".import_price"])
					} else {
						$('#product_resolution_table input[name="resolution['+i+'][import_price]"]').addClass('resolution_success')
						$('#product_resolution_table input[name="resolution['+i+'][import_price]"]').removeClass('resolution_error')
						$('#product_resolution_table input[name="resolution['+i+'][import_price]"]').parent('td').find('.product_resolution_errors_text').text('')
					}
					if (response.errors["resolution."+i+".price"]) {
						$('#product_resolution_table input[name="resolution['+i+'][price]"]').addClass('resolution_error')
						$('#product_resolution_table input[name="resolution['+i+'][price]"]').removeClass('resolution_success')
						$('#product_resolution_table input[name="resolution['+i+'][price]"]').parent('td').find('.product_resolution_errors_text').text(response.errors["resolution."+i+".price"])
					} else {
						$('#product_resolution_table input[name="resolution['+i+'][price]"]').addClass('resolution_success')
						$('#product_resolution_table input[name="resolution['+i+'][price]"]').removeClass('resolution_error')
						$('#product_resolution_table input[name="resolution['+i+'][price]"]').parent('td').find('.product_resolution_errors_text').text('')
					}
					if (response.errors["resolution."+i+".sale_price"]) {
						$('#product_resolution_table input[name="resolution['+i+'][sale_price]"]').addClass('resolution_error')
						$('#product_resolution_table input[name="resolution['+i+'][sale_price]"]').removeClass('resolution_success')
						$('#product_resolution_table input[name="resolution['+i+'][sale_price]"]').parent('td').find('.product_resolution_errors_text').text(response.errors["resolution."+i+".sale_price"])
					} else {
						$('#product_resolution_table input[name="resolution['+i+'][sale_price]"]').addClass('resolution_success')
						$('#product_resolution_table input[name="resolution['+i+'][sale_price]"]').removeClass('resolution_error')
						$('#product_resolution_table input[name="resolution['+i+'][sale_price]"]').parent('td').find('.product_resolution_errors_text').text('')
					}
					if (response.errors["resolution."+i+".stock"]) {
						$('#product_resolution_table input[name="resolution['+i+'][stock]"]').addClass('resolution_error')
						$('#product_resolution_table input[name="resolution['+i+'][stock]"]').removeClass('resolution_success')
						$('#product_resolution_table input[name="resolution['+i+'][stock]"]').parent('td').find('.product_resolution_errors_text').text(response.errors["resolution."+i+".stock"])
					} else {
						$('#product_resolution_table input[name="resolution['+i+'][stock]"]').addClass('resolution_success')
						$('#product_resolution_table input[name="resolution['+i+'][stock]"]').removeClass('resolution_error')
						$('#product_resolution_table input[name="resolution['+i+'][stock]"]').parent('td').find('.product_resolution_errors_text').text('')
					}
				}
			} else {
				$('#product_resolution_table').find('select').removeClass('resolution_error');
				$('#product_resolution_table').find('select').addClass('resolution_success');
				$('#product_resolution_table').find('input').removeClass('resolution_error');
				$('#product_resolution_table').find('input').addClass('resolution_success');
				$('#product_resolution_table').find('.product_resolution_errors_text').text('');
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
						$('#product_resolution_edit').modal('hide');
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

	function addResolutionRow() {
		if (rowRslNum >= (resolution_num - product_resolutions.length)) {
			return false;
		}
		jQuery('#product_resolution_table #product_stock_add_'+rowRslNum).hide();
		jQuery('#product_resolution_table #product_stock_remove_'+rowRslNum).hide();
		resolution_check[resolution_check.length] = jQuery('#product_resolution_table #select_'+rowRslNum+' option:selected').val();
		rowRslNum++;
		var row = '<tr id="rowRslNum'+rowRslNum+'"><td style="width:160px;"><select id="select_'+rowRslNum+'" name="resolution['+rowRslNum+'][resolution_id]" class="form-control"></select><p class="product_resolution_errors_text" style="color: red;"></p></td><td><input type="text" name="resolution['+rowRslNum+'][import_price]" class="form-control" placeholder="Giá nhập khẩu"><p class="product_resolution_errors_text" style="color: red;"></p></td><td><input type="text" name="resolution['+rowRslNum+'][price]" class="form-control" placeholder="Giá bán"><p class="product_resolution_errors_text" style="color: red;"></p></td><td><input type="text" name="resolution['+rowRslNum+'][sale_price]" class="form-control" placeholder="Giá sale"><p class="product_resolution_errors_text" style="color: red;"></p></td><td><input type="text" name="resolution['+rowRslNum+'][stock]" class="form-control" placeholder="Số lượng"><p class="product_resolution_errors_text" style="color: red;"></p></td><td><button type="button" class="btn btn-primary" style="margin-right: 5px;padding: 4px 1px 2px 7px;" id="product_stock_add_'+rowRslNum+'" onclick="addResolutionRow(this)""><i class="fa fa-plus-square" aria-hidden="true"></i></button><button type="button" class="btn btn-primary" style="padding: 4px 1px 2px 7px;" id="product_stock_remove_'+rowRslNum+'" onclick="removeResolutionRow('+rowRslNum+')""><i class="fa fa-trash" aria-hidden="true"></i></button></td></tr>';
		jQuery('#product_resolution_table').append(row);
		$.each(resolutions, function(index, val) {
			 $('#product_resolution_table #select_'+rowRslNum).append('<option value="'+val['id']+'">'+val['resolution_name']+'</option>'); //add các option lấy value từ các độ phân giải có trong cơ sở dữ liệu
		});
		for (var i = 0; i < product_resolutions.length; i++) {
			jQuery('#product_resolution_table select[name="resolution['+rowRslNum+'][resolution_id]"] option[value="'+product_resolutions[i]+'"]').remove(); //xóa đi các option có độ phân giải đã được chọn trong cơ sở dữ liệu
		}
		jQuery('#product_resolution_table input[name="resolution['+rowRslNum+'][import_price]"]').mask('000.000.000.000.000 VNĐ', {reverse: true});
		jQuery('#product_resolution_table input[name="resolution['+rowRslNum+'][price]"]').mask('000.000.000.000.000 VNĐ', {reverse: true});
		jQuery('#product_resolution_table input[name="resolution['+rowRslNum+'][sale_price]"]').mask('000.000.000.000.000 VNĐ', {reverse: true});
		jQuery('#product_resolution_table input[name="resolution['+rowRslNum+'][stock]"]').mask('000.000.000.000.000 cái', {reverse: true});
		for (var i = 0; i < resolution_check.length; i++) {
			jQuery('#product_resolution_table #select_'+rowRslNum).find('option[value="'+resolution_check[i]+'"]').remove();
		}
		if (rowRslNum == (resolution_num - product_resolutions.length)) {
			jQuery('#product_stock_add_'+rowRslNum).hide();
		}
	}

	function removeResolutionRow(rnum) {
		add_button = rnum - 1;
		jQuery('#product_resolution_table #rowRslNum'+rnum).remove();
		jQuery('#product_resolution_table #product_stock_add_'+add_button).show();
		jQuery('#product_resolution_table #product_stock_remove_'+add_button).show();
		rowRslNum = rnum - 1;
		resolution_check.length = rowRslNum;
	}
	</script>
@endif