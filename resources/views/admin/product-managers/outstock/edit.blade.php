<style type="text/css">
	p {
		margin-bottom: 0px;
	}
</style>
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

							<div class="panel panel-default">
								<div class="panel-heading">
									<h3 class="panel-title">Sửa số Lượng Phân Giải</h3>
								</div>
								<div class="panel-body">
									<form class="form-horizontal" id="form_db_resolutions_0_stock" method="POST">
										@csrf
										{{ method_field('POST')}}
										<div class="row">
											<div class="col-md-2 resolution_fake_table_header">
												Resolution Name
											</div>
											<div class="col-md-3 resolution_fake_table_header">
												Import Price
											</div>
											<div class="col-md-3 resolution_fake_table_header">
												Price
											</div>
											<div class="col-md-3 resolution_fake_table_header">
												Sale Price
											</div>
											<div class="col-md-1 resolution_fake_table_header">
												Stock
											</div>
										</div>
										<div class="row" id="product_resolution_db_table">
											
										</div>
										<div class="row">
											<div class="col-md-2 resolution_fake_table_footer">
												Resolution Name
											</div>
											<div class="col-md-3 resolution_fake_table_footer">
												Import Price
											</div>
											<div class="col-md-3 resolution_fake_table_footer">
												Price
											</div>
											<div class="col-md-3 resolution_fake_table_footer">
												Sale Price
											</div>
											<div class="col-md-1 resolution_fake_table_footer">
												Stock
											</div>
										</div>
									</form>
								</div>
								<div class="panel-footer">
									<button class="btn btn-primary" form="form_db_resolutions_0_stock">Lưu thay đổi</button>
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
	$('#products_table').on('click', '.btn_edit', function(event) {
		event.preventDefault();
		
		var url = $(this).attr('data-url');

		var url_update = $(this).attr('data-update');

		$.ajax({
			url: url,
			type: 'GET',
		})
		.done(function(response) {
			console.log("success");
			console.log(response.product.product_resolutions);
			$('#product_resolution_db_table').empty();
			if (response.product) {
				$.each(response.product.product_resolutions, function(index, val) {
					if (val["sale_price"] == null) {
						$('#product_resolution_db_table').append('<div class="row"><div class="col-md-2 resolution_fake_table_body"><p class="form-control">'+response.product.product_resolutions[index]["resolution_name"]+'</p><p class="product_resolution_errors_text" style="color: red;"></p></div><div class="col-md-3 resolution_fake_table_body"><p class="form-control product_price">'+response.product.product_resolutions[index]["import_price"]+'</p><p class="product_resolution_errors_text" style="color: red;"></p></div><div class="col-md-3 resolution_fake_table_body"><p class="form-control product_price">'+response.product.product_resolutions[index]["price"]+'</p><p class="product_resolution_errors_text" style="color: red;"></p></div><div class="col-md-3 resolution_fake_table_body"><p class="form-control product_price"></p><p class="product_resolution_errors_text" style="color: red;"></p></div><div class="col-md-1 resolution_fake_table_body"><input class="form-control product_stock" type="text" name="stock['+index+'][stock]" value="'+response.product.product_resolutions[index]["stock"]+'" /><input class="form-control" type="hidden" name="stock['+index+'][id]" value="'+response.product.product_resolutions[index]["id"]+'" /><p class="product_resolution_errors_text" style="color: red;"></p></div>');
					} else {
						$('#product_resolution_db_table').append('<div class="row"><div class="col-md-2 resolution_fake_table_body"><p class="form-control">'+response.product.product_resolutions[index]["resolution_name"]+'</p><p class="product_resolution_errors_text" style="color: red;"></p></div><div class="col-md-3 resolution_fake_table_body"><p class="form-control product_price">'+response.product.product_resolutions[index]["import_price"]+'</p><p class="product_resolution_errors_text" style="color: red;"></p></div><div class="col-md-3 resolution_fake_table_body"><p class="form-control product_price">'+response.product.product_resolutions[index]["price"]+'</p><p class="product_resolution_errors_text" style="color: red;"></p></div><div class="col-md-3 resolution_fake_table_body"><p class="form-control product_price">'+response.product.product_resolutions[index]["sale_price"]+'</p><p class="product_resolution_errors_text" style="color: red;"></p></div><div class="col-md-1 resolution_fake_table_body"><input class="form-control product_stock" type="text" name="stock['+index+'][stock]" value="'+response.product.product_resolutions[index]["stock"]+'" /><input class="form-control" type="hidden" name="stock['+index+'][id]" value="'+response.product.product_resolutions[index]["id"]+'" /><p class="product_resolution_errors_text" style="color: red;"></p></div>');
					}
				});
				$('#product_resolution_db_table p.product_price').mask('000.000.000.000.000 VNĐ', {reverse: true});
				$('#product_resolution_db_table input.product_stock').mask('000.000.000.000.000 cái', {reverse: true});

				$('#form_db_resolutions_0_stock').attr('data-update',url_update);

				$('#form_db_resolutions_0_stock').submit(function(event) {
					event.preventDefault();
					$('#product_resolution_db_table input.product_stock').unmask();

					var url = $(this).attr('data-update');
					$.ajax({
						url: url,
						type: 'POST',
						dataType: 'json',
						data: $(this).serialize(),
					})
					.done(function(response) {
						console.log("success");
						$('#product_resolution_db_table input.product_stock').mask('000.000.000.000.000 cái', {reverse: true});
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
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
		
	});
</script>