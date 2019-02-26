<div class="modal fade" id="product_detail">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Chi tiết sản phẩm</h4>
			</div>
			<div class="modal-body" style="background: #f9f9ee;">
				<div class="panel-body">
					<div class="row">
						<div class="col-lg-12" style="padding: 0px;">

							<div class="panel panel-default tabs form-horizontal">
								<ul class="nav nav-tabs" role="tablist">
									<li class="active"><a href="#tab-first-1" role="tab" data-toggle="tab">Thông tin chung</a></li>
									<li><a href="#tab-second-1" role="tab" data-toggle="tab">Thông tin chi tiết</a></li>
								</ul>
								<div class="panel-body tab-content">
									<div class="tab-pane active" id="tab-first-1">

										<div class="row">
											<div class="col-md-9">
												<div class="row">
													<div class="col-12 form-group-separated">
														<div class="form-group">
															<label class="col-md-2 col-xs-12 control-label">Tên sản phẩm</label>
															<div class="col-md-10 col-xs-12" style="padding-right: 13px;">
																<div class="panel panel-warning">
																	<div class="panel-body">
																		<p id="detail_product_name"></p>
																	</div>
																</div>
															</div>
														</div>
													</div>

													<div class="col-12 form-group-separated">
														<div class="form-group">
															<label class="col-md-2 col-xs-12 control-label">Sơ lược sản phẩm</label>
															<div class="col-md-10 col-xs-12" style="padding-right: 13px;">
																<div class="panel panel-warning">
																	<div class="panel-body">
																		<p id="detail_product_description"></p>
																	</div>
																</div>
															</div>
														</div>
													</div>

													<div class="col-12 form-group-separated" style="border-bottom: 1px dashed #D5D5D5;">
														<div class="form-group">
															<label class="col-md-2 col-xs-12 control-label">Mô tả sản phẩm</label>
															<div class="col-md-10 col-xs-12" style="padding-right: 13px;position: relative;">
																<div class="panel panel-warning" style="height: 250px;overflow: scroll;">
																	<div class="panel-body">
																		<p id="detail_product_content"></p>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="col-md-3">
												<div class="row">
													<div class="col-12 image_base" style="text-align: center;padding-bottom: 15px;margin-bottom: 15px;border: 1px dashed #D5D5D5;">
														<label class="control-label">Ảnh sản phẩm</label>
														<div class="profile-image">
															<div id="update_profile_image">
																<img id="detail_product_thumbnail" src="" style="width: 200px;height: 200px;border-radius: 4px;border: 2px solid green;transition: all .5s;">
															</div>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-12 categories" style="padding: 15px 10px 15px 10px;margin-bottom: 15px;border: 1px dashed #D5D5D5;overflow: auto;">
														<label class="control-label" style="text-align: center;margin-bottom: 10px;padding-top: 0px;">Loại sản phẩm</label>
														<div class="panel panel-warning">
															<div class="panel-body">
																<p id="detail_product_category"></p>
															</div>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-12" style="padding: 15px 10px 15px 10px;margin-bottom: 15px;border: 1px dashed #D5D5D5;overflow: auto;">
														<label class="control-label" style="text-align: center;margin-bottom: 10px;padding-top: 0px;">Tags</label>
														<div class="panel panel-warning">
															<div class="panel-body">
																<ul class="list-tags push-up-10" id="detail_post_tags"></ul>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>

									</div>
									<div class="tab-pane" id="tab-second-1">

										<div class="row">
											<div class="col-md-6 col-xs-12" style="padding-left: 15px;">
												<div class="row">
													<div class="col-12 form-group-separated">
														<div class="form-group">
															<label class="col-md-2 col-xs-12 control-label">CPU</label>
															<div class="col-md-10 col-xs-12" style="padding-right: 13px;">
																<div class="panel panel-warning">
																	<div class="panel-body">
																		<p id="detail_product_cpu"></p>
																	</div>
																</div>
															</div>
														</div>
													</div>
													<div class="col-12 form-group-separated">
														<div class="form-group">
															<label class="col-md-2 col-xs-12 control-label">RAM</label>
															<div class="col-md-10 col-xs-12" style="padding-right: 13px;">
																<div class="panel panel-warning">
																	<div class="panel-body">
																		<p id="detail_product_ram"></p>
																	</div>
																</div>
															</div>
														</div>
													</div>
													<div class="col-12 form-group-separated">
														<div class="form-group">
															<label class="col-md-2 col-xs-12 control-label">CD_DVD</label>
															<div class="col-md-10 col-xs-12" style="padding-right: 13px;">
																<div class="panel panel-warning">
																	<div class="panel-body">
																		<p id="detail_product_cd_dvd"></p>
																	</div>
																</div>
															</div>
														</div>
													</div>
													<div class="col-12 form-group-separated">
														<div class="form-group">
															<label class="col-md-2 col-xs-12 control-label">Card Audio</label>
															<div class="col-md-10 col-xs-12" style="padding-right: 13px;">
																<div class="panel panel-warning">
																	<div class="panel-body">
																		<p id="detail_product_card_audio"></p>
																	</div>
																</div>
															</div>
														</div>
													</div>
													<div class="col-12 form-group-separated">
														<div class="form-group">
															<label class="col-md-2 col-xs-12 control-label">Webcam</label>
															<div class="col-md-10 col-xs-12" style="padding-right: 13px;">
																<div class="panel panel-warning">
																	<div class="panel-body">
																		<p id="detail_product_webcam"></p>
																	</div>
																</div>
															</div>
														</div>
													</div>
													<div class="col-12 form-group-separated">
														<div class="form-group">
															<label class="col-md-2 col-xs-12 control-label">Wifi</label>
															<div class="col-md-10 col-xs-12" style="padding-right: 13px;">
																<div class="panel panel-warning">
																	<div class="panel-body">
																		<p id="detail_product_communications"></p>
																	</div>
																</div>
															</div>
														</div>
													</div>
													<div class="col-12 form-group-separated">
														<div class="form-group">
															<label class="col-md-2 col-xs-12 control-label">Bluetooth</label>
															<div class="col-md-10 col-xs-12" style="padding-right: 13px;">
																<div class="panel panel-warning">
																	<div class="panel-body">
																		<p id="detail_product_bluetooth"></p>
																	</div>
																</div>
															</div>
														</div>
													</div>
													<div class="col-12 form-group-separated" style="border-bottom: 1px dashed #D5D5D5;">
														<div class="form-group">
															<label class="col-md-2 col-xs-12 control-label">Cân nặng</label>
															<div class="col-md-10 col-xs-12" style="padding-right: 13px;">
																<div class="panel panel-warning">
																	<div class="panel-body">
																		<p id="detail_product_weight"></p>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>


											<div class="col-md-6 col-xs-12" style="padding-left: 15px;">
												<div class="row">
													<div class="col-12 form-group-separated">
														<div class="form-group">
															<label class="col-md-2 col-xs-12 control-label">HĐH</label>
															<div class="col-md-10 col-xs-12" style="padding-right: 13px;">
																<div class="panel panel-warning">
																	<div class="panel-body">
																		<p id="detail_product_operation_system"></p>
																	</div>
																</div>
															</div>
														</div>
													</div>
													<div class="col-12 form-group-separated">
														<div class="form-group">
															<label class="col-md-2 col-xs-12 control-label">Màn hình</label>
															<div class="col-md-10 col-xs-12" style="padding-right: 13px;">
																<div class="panel panel-warning">
																	<div class="panel-body">
																		<p id="detail_product_monitor"></p>
																	</div>
																</div>
															</div>
														</div>
													</div>
													<div class="col-12 form-group-separated">
														<div class="form-group">
															<label class="col-md-2 col-xs-12 control-label">HDD</label>
															<div class="col-md-10 col-xs-12" style="padding-right: 13px;">
																<div class="panel panel-warning">
																	<div class="panel-body">
																		<p id="detail_product_hdd"></p>
																	</div>
																</div>
															</div>
														</div>
													</div>
													<div class="col-12 form-group-separated">
														<div class="form-group">
															<label class="col-md-2 col-xs-12 control-label">Card Video</label>
															<div class="col-md-10 col-xs-12" style="padding-right: 13px;">
																<div class="panel panel-warning">
																	<div class="panel-body">
																		<p id="detail_product_card_video"></p>
																	</div>
																</div>
															</div>
														</div>
													</div>
													<div class="col-12 form-group-separated">
														<div class="form-group">
															<label class="col-md-2 col-xs-12 control-label">Card Reader</label>
															<div class="col-md-10 col-xs-12" style="padding-right: 13px;">
																<div class="panel panel-warning">
																	<div class="panel-body">
																		<p id="detail_product_card_reader"></p>
																	</div>
																</div>
															</div>
														</div>
													</div>
													<div class="col-12 form-group-separated">
														<div class="form-group">
															<label class="col-md-2 col-xs-12 control-label">Finger Print</label>
															<div class="col-md-10 col-xs-12" style="padding-right: 13px;">
																<div class="panel panel-warning">
																	<div class="panel-body">
																		<p id="detail_product_finger_print"></p>
																	</div>
																</div>
															</div>
														</div>
													</div>
													<div class="col-12 form-group-separated">
														<div class="form-group">
															<label class="col-md-2 col-xs-12 control-label">Port</label>
															<div class="col-md-10 col-xs-12" style="padding-right: 13px;">
																<div class="panel panel-warning">
																	<div class="panel-body">
																		<p id="detail_product_port"></p>
																	</div>
																</div>
															</div>
														</div>
													</div>
													<div class="col-12 form-group-separated" style="border-bottom: 1px dashed #D5D5D5;">
														<div class="form-group">
															<label class="col-md-2 col-xs-12 control-label">Pin</label>
															<div class="col-md-10 col-xs-12" style="padding-right: 13px;">
																<div class="panel panel-warning">
																	<div class="panel-body">
																		<p id="detail_product_pin"></p>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="row" style="margin-top: 15px;">
											<div class="col-md-12" style="padding-left: 15px;">
												<div class="row form-group-separated" style="border-bottom: 1px dashed #D5D5D5;">
													<label class="col-md-1 col-xs-12 control-label">Resolutions</label>
													<div class="col-md-11 col-xs-12" style="padding-bottom: 10px;padding-top: 10px;border-left: 1px dashed #D5D5D5;">
														<div class="row">
															<div class="col-12" id="product_attribute_base">
																<div class="row" style="margin-bottom: 5px;">
																	<table class="table">
																		<thead style="text-align: center;">
																			<tr>
																				<th>Resolution_Id</th>
																				<th>Resolution_Name</th>
																				<th>Import_Price</th>
																				<th>Price</th>
																				<th>Sale_Price</th>
																				<th>Stock</th>
																			</tr>
																		</thead>
																		<tbody id="detail_product_attr_table" style="text-align: left;">

																		</tbody>
																		<tfoot style="text-align: center;">
																			<tr>
																				<th>Resolution_Id</th>
																				<th>Resolution_Name</th>
																				<th>Import_Price</th>
																				<th>Price</th>
																				<th>Sale_Price</th>
																				<th>Stock</th>
																			</tr>
																		</tfoot>
																	</table>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="row" style="margin-top: 15px;">
											<div class="col-md-12" style="padding-left: 15px;">
												<div class="row form-group-separated" style="border-bottom: 1px dashed #D5D5D5;">
													<label class="col-md-2 col-xs-12 control-label">Ảnh chi tiết sản phẩm</label>
													<div class="col-md-10 col-xs-12" style="padding-bottom: 10px;border-left: 1px dashed #D5D5D5;">
														<div id="detail_product_images">

														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
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
	$('#products_table').on('click', '.btn_detail', function(event) {
		event.preventDefault();
		
		var url = $(this).data('url');

		$.ajax({
			url: url,
			type: 'GET',
		})
		.done(function(response) {
			console.log("success");
			$('#detail_post_tags').empty();
			$('#detail_product_attr_table').empty();
			$('#detail_product_images').empty();
			$('#detail_product_name').text(response.product.name);
			$('#detail_product_description').text(response.product.description);
			$('#detail_product_content').html(response.product.content);
			$('img#detail_product_thumbnail').attr('src','{{asset('storage')}}/'+response.product.thumbnail);
			$('#detail_product_category').text(response.product.category.name);
			$.each(response.product.tags, function(index, val) {
				$('#detail_post_tags').append('<li><a href="#"><span class="fa fa-tag"></span>'+response.product.tags[index]['name']+'</a></li>')
			});
			$('#detail_product_cpu').text(response.product.cpu);
			$('#detail_product_operation_system').text(response.product.operation_system);
			$('#detail_product_ram').text(response.product.ram);
			$('#detail_product_monitor').text(response.product.monitor);
			$('#detail_product_cd_dvd').text(response.product.cd_dvd);
			$('#detail_product_hdd').text(response.product.hdd);
			$('#detail_product_card_audio').text(response.product.card_audio);
			$('#detail_product_card_video').text(response.product.card_video);
			$('#detail_product_webcam').text(response.product.webcam);
			$('#detail_product_card_reader').text(response.product.card_reader);
			$('#detail_product_communications').text(response.product.communications);
			$('#detail_product_finger_print').text(response.product.finger_print);
			$('#detail_product_bluetooth').text(response.product.bluetooth);
			$('#detail_product_port').text(response.product.port);
			$('#detail_product_weight').text(response.product.weight);
			$('#detail_product_pin').text(response.product.pin);
			$.each(response.product.product_resolutions, function(index, val) {
				if (response.product.product_resolutions[index]['sale_price'] == null) {
					$('#detail_product_attr_table').append('<tr><td>'+response.product.product_resolutions[index]["resolution_id"]+'</td><td>'+response.product.product_resolutions[index]["resolution_name"]+'</td><td class="detail_product_attribute_price">'+response.product.product_resolutions[index]["import_price"]+'</td><td class="detail_product_attribute_price">'+response.product.product_resolutions[index]["price"]+'</td><td class="detail_product_attribute_price"></td><td class="detail_product_attribute_stock">'+response.product.product_resolutions[index]["stock"]+'</td></tr>');
				} else {
					$('#detail_product_attr_table').append('<tr><td>'+response.product.product_resolutions[index]["resolution_id"]+'</td><td>'+response.product.product_resolutions[index]["resolution_name"]+'</td><td class="detail_product_attribute_price">'+response.product.product_resolutions[index]["import_price"]+'</td><td class="detail_product_attribute_price">'+response.product.product_resolutions[index]["price"]+'</td><td class="detail_product_attribute_price">'+response.product.product_resolutions[index]["sale_price"]+'</td><td class="detail_product_attribute_stock">'+response.product.product_resolutions[index]["stock"]+'</td></tr>');
				}
			});
			$('.detail_product_attribute_price').mask('000.000.000.000.000 VNĐ', {reverse: true});
			$('.detail_product_attribute_stock').mask('000.000.000.000.000 cái', {reverse: true});
			$.each(response.product.product_images, function(index, val) {
				$('#detail_product_images').append('<img style="width: 160px;height: 160px;border: 2px outset #F2F2F2;margin-right: 10px;" src="{{asset('storage')}}/'+response.product.product_images[index]["product_image"]+'"/>')
			});
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
		
	});
</script>