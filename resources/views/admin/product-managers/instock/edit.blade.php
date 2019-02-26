<div class="modal fade" id="product_edit">
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

							<form class="form-horizontal" id="form_edit_product" enctype="multipart/form-data" method="POST" data-url="">
								@csrf
								{{method_field('POST')}}
								<div class="panel panel-default tabs">
									<ul class="nav nav-tabs" role="tablist">
										<li class="active"><a href="#tab-first-2" role="tab" data-toggle="tab">Thông tin chung</a></li>
										<li><a href="#tab-second-2" role="tab" data-toggle="tab">Thông tin chi tiết</a></li>
									</ul>
									<div class="panel-body tab-content">
										<div class="tab-pane active" id="tab-first-2">
											<p>Vui lòng điền đầy đủ thông tin chung về sản phẩm.</p>

											<div class="row">
												<div class="col-md-9">
													<div class="row">
														<div class="col-12 form-group-separated">
															<div class="form-group">
																<label class="col-md-2 col-xs-12 control-label">Tên sản phẩm</label>
																<div class="col-md-10 col-xs-12" style="padding-right: 13px;">
																	<div class="input-group response-notice">
																		<span class="input-group-addon"><span class="fa fa-pencil"></span></span>
																		<input type="text" class="form-control" name="name" placeholder="Điều vào tên sản phẩm" />
																		<span class="glyphicon glyphicon-ok form-control-feedback" style="left:94%;top:-2px;"></span>
																		<span class="glyphicon glyphicon-remove form-control-feedback" style="left:94%;top:-2px;"></span>
																	</div>
																	<p class="product_add_errors_text" style="margin-bottom: 0px;color: red;"></p>
																</div>
															</div>
														</div>

														<div class="col-12 form-group-separated">
															<div class="form-group">
																<label class="col-md-2 col-xs-12 control-label">Sơ lược sản phẩm</label>
																<div class="col-md-10 col-xs-12" style="padding-right: 13px;">
																	<div class="input-group response-notice">
																		<span class="input-group-addon" style="line-height: 148px;"><span class="fa fa-file-text"></span></span>
																		<textarea class="form-control" name="description" placeholder="Điền vào sơ lược về sản phẩm" rows="5" style="height: 150px;resize: none;"></textarea>
																		<span class="glyphicon glyphicon-ok form-control-feedback" style="left:94%;top:38%;"></span>
																		<span class="glyphicon glyphicon-remove form-control-feedback" style="left:94%;top:38%;"></span>
																	</div>
																	<p class="product_add_errors_text" style="margin-bottom: 0px;color: red;"></p>
																</div>
															</div>
														</div>

														<div class="col-12 form-group-separated" style="border-bottom: 1px dashed #D5D5D5;">
															<div class="form-group">
																<label class="col-md-2 col-xs-12 control-label">Mô tả sản phẩm</label>
																<div class="col-md-10 col-xs-12 content_base" style="padding-right: 13px;position: relative;">
																	<textarea name="content" id="editContent" rows="10" cols="80"></textarea>
																	<p class="product_add_errors_text" style="margin-bottom: 0px;color: red;margin-top: 15px;"></p>
																	<span class="glyphicon glyphicon-ok form-control-feedback" style="left:92%;top:52%;"></span>
																	<span class="glyphicon glyphicon-remove form-control-feedback" style="left:92%;top:52%;"></span>
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
																<div class="update_profile_image">
																	<img class="edit_product_thumbnail" src="{{asset('')}}/admin_assets/default.png" style="width: 200px;height: 200px;border-radius: 4px;border: 2px solid green;transition: all .5s;">
																	<div class="btn_file_layout">
																		<div class="btn btn-danger btn-file"> <i class="glyphicon glyphicon-folder-open"></i><input type="file" name="thumbnail" class="add_product_file_input"></div>
																	</div>
																</div>
																<p class="product_add_errors_text" style="margin-bottom: 0px;color: red;"></p>
															</div>
														</div>
													</div>
													<div class="row">
														<div class="col-12 categories" style="padding: 15px 10px 15px 10px;margin-bottom: 15px;border: 1px dashed #D5D5D5;height: 270px;">
															<label class="control-label" style="text-align: center;margin-bottom: 10px;padding-top: 0px;">Loại sản phẩm</label>
															<p class="product_add_errors_text" style="margin-bottom: 0px;color: red;"></p>
															<div class="category">
																<label class="check"><input type="radio" name="category_check" />Asus</label>
																<ul>
																	<li><label class="check"><input type="radio" name="category_check_lap" value="4" /> Asus Gaming</label></li>
																	<li><label class="check"><input type="radio" name="category_check_lap" value="5" /> Asus Workstation</label></li>
																</ul>
															</div>
															<div class="category">
																<label class="check"><input type="radio" name="category_check" />Dell</label>
																<ul>
																	<li><label class="check"><input type="radio" name="category_check_lap" value="6" /> Dell Gaming</label></li>
																	<li><label class="check"><input type="radio" name="category_check_lap" value="7" /> Dell Workstation</label></li>
																</ul>
															</div>
															<div class="category">
																<label class="check"><input type="radio" name="category_check" />HP</label>
																<ul>
																	<li><label class="check"><input type="radio" name="category_check_lap" value="8" /> HP Gaming</label></li>
																	<li><label class="check"><input type="radio" name="category_check_lap" value="9" /> HP Workstation</label></li>
																</ul>
															</div>
															<div class="category">
																<label class="check"><input type="radio" name="category_check" />MSI</label>
																<ul>
																	<li><label class="check"><input type="radio" name="category_check_lap" value="11" /> MSI Gaming</label></li>
																	<li><label class="check"><input type="radio" name="category_check_lap" value="12" /> MSI Workstation</label></li>
																</ul>
															</div>
														</div>
													</div>
													<div class="row">
														<div class="col-12 tags" style="padding: 15px 10px 15px 10px;margin-bottom: 15px;border: 1px dashed #D5D5D5;">
															<label class="control-label" style="text-align: center;margin-bottom: 10px;padding-top: 0px;">Tags</label>
															<div class="col-12 tags_base" style="position: relative;">
																<select multiple name="tags[]" data-role="tagsinput" size="100%"></select>
																<input type="hidden" name="delete_tags" id="delete_tags" value=""/>
																<span class="glyphicon glyphicon-ok form-control-feedback" style="left:86%;top:-1.5px;"></span>
																<span class="glyphicon glyphicon-remove form-control-feedback" style="left:86%;top:-1.5px;"></span>
															</div>
															<p style="margin-bottom: 0px;color: red;"></p>
														</div>
													</div>
												</div>
											</div>

										</div>
										<div class="tab-pane" id="tab-second-2">
											<p>Vui lòng điền đầy đủ thông tin chi tiết cho sản phẩm.</p>

											<div class="row">
												<div class="col-md-6 col-xs-12" style="padding-left: 15px;">
													<div class="row">
														<div class="col-12 form-group-separated">
															<div class="form-group">
																<label class="col-md-2 col-xs-12 control-label">CPU</label>
																<div class="col-md-10 col-xs-12" style="padding-right: 13px;">
																	<div class="input-group response-notice">
																		<span class="input-group-addon"><span class="fa fa-microchip"></span></span>
																		<input type="text" class="form-control" name="cpu" placeholder="Điều vào tên CPU" />
																		<span class="glyphicon glyphicon-ok form-control-feedback" style="left:91.5%;top:-2px;"></span>
																		<span class="glyphicon glyphicon-remove form-control-feedback" style="left:91.5%;top:-2px;"></span>
																	</div>
																	<p class="product_add_errors_text" style="color: red;padding-left: 51px;"></p>
																</div>
															</div>
														</div>
														<div class="col-12 form-group-separated">
															<div class="form-group">
																<label class="col-md-2 col-xs-12 control-label">RAM</label>
																<div class="col-md-10 col-xs-12" style="padding-right: 13px;">
																	<div class="input-group response-notice">
																		<span class="input-group-addon"><span class="fa fa-microchip"></span></span>
																		<input type="text" class="form-control" name="ram" placeholder="Điều vào tên RAM" />
																		<span class="glyphicon glyphicon-ok form-control-feedback" style="left:91.5%;top:-2px;"></span>
																		<span class="glyphicon glyphicon-remove form-control-feedback" style="left:91.5%;top:-2px;"></span>
																	</div>
																	<p class="product_add_errors_text" style="color: red;padding-left: 51px;"></p>
																</div>
															</div>
														</div>
														<div class="col-12 form-group-separated">
															<div class="form-group">
																<label class="col-md-2 col-xs-12 control-label">CD_DVD</label>
																<div class="col-md-10 col-xs-12" style="padding-right: 13px;">
																	<div class="input-group response-notice">
																		<span class="input-group-addon"><span class="fa fa-download"></span></span>
																		<input type="text" class="form-control" name="cd_dvd" placeholder="Điều vào tên CD_DVD" />
																		<span class="glyphicon glyphicon-ok form-control-feedback" style="left:91.5%;top:-2px;"></span>
																		<span class="glyphicon glyphicon-remove form-control-feedback" style="left:91.5%;top:-2px;"></span>
																	</div>
																	<p class="product_add_errors_text" style="color: red;padding-left: 51px;"></p>
																</div>
															</div>
														</div>
														<div class="col-12 form-group-separated">
															<div class="form-group">
																<label class="col-md-2 col-xs-12 control-label">Card Audio</label>
																<div class="col-md-10 col-xs-12" style="padding-right: 13px;">
																	<div class="input-group response-notice">
																		<span class="input-group-addon"><i class="fa fa-audio-description" aria-hidden="true"></i></span>
																		<input type="text" class="form-control" name="card_audio" placeholder="Điều vào tên Card audio" />
																		<span class="glyphicon glyphicon-ok form-control-feedback" style="left:91.5%;top:-2px;"></span>
																		<span class="glyphicon glyphicon-remove form-control-feedback" style="left:91.5%;top:-2px;"></span>
																	</div>
																	<p class="product_add_errors_text" style="color: red;padding-left: 51px;"></p>
																</div>
															</div>
														</div>
														<div class="col-12 form-group-separated">
															<div class="form-group">
																<label class="col-md-2 col-xs-12 control-label">Webcam</label>
																<div class="col-md-10 col-xs-12" style="padding-right: 13px;">
																	<div class="input-group response-notice">
																		<span class="input-group-addon"><i class="fa fa-camera" aria-hidden="true"></i></span>
																		<input type="text" class="form-control" name="webcam" placeholder="Điều vào tên webcam" />
																		<span class="glyphicon glyphicon-ok form-control-feedback" style="left:91.5%;top:-2px;"></span>
																		<span class="glyphicon glyphicon-remove form-control-feedback" style="left:91.5%;top:-2px;"></span>
																	</div>
																	<p class="product_add_errors_text" style="color: red;padding-left: 51px;"></p>
																</div>
															</div>
														</div>
														<div class="col-12 form-group-separated">
															<div class="form-group">
																<label class="col-md-2 col-xs-12 control-label">Wifi</label>
																<div class="col-md-10 col-xs-12" style="padding-right: 13px;">
																	<div class="input-group response-notice">
																		<span class="input-group-addon"><i class="fa fa-wifi" aria-hidden="true"></i></span>
																		<input type="text" class="form-control" name="communications" placeholder="Điều vào tên thiết bị wifi" />
																		<span class="glyphicon glyphicon-ok form-control-feedback" style="left:91.5%;top:-2px;"></span>
																		<span class="glyphicon glyphicon-remove form-control-feedback" style="left:91.5%;top:-2px;"></span>
																	</div>
																	<p class="product_add_errors_text" style="color: red;padding-left: 51px;"></p>
																</div>
															</div>
														</div>
														<div class="col-12 form-group-separated">
															<div class="form-group">
																<label class="col-md-2 col-xs-12 control-label">Bluetooth</label>
																<div class="col-md-10 col-xs-12" style="padding-right: 13px;">
																	<div class="input-group response-notice">
																		<span class="input-group-addon"><i class="fa fa-bluetooth" aria-hidden="true"></i></span>
																		<input type="text" class="form-control" name="bluetooth" placeholder="Điều vào tên thiết bị bluetooth" />
																		<span class="glyphicon glyphicon-ok form-control-feedback" style="left:91.5%;top:-2px;"></span>
																		<span class="glyphicon glyphicon-remove form-control-feedback" style="left:91.5%;top:-2px;"></span>
																	</div>
																	<p class="product_add_errors_text" style="color: red;padding-left: 51px;"></p>
																</div>
															</div>
														</div>
														<div class="col-12 form-group-separated" style="border-bottom: 1px dashed #D5D5D5;">
															<div class="form-group">
																<label class="col-md-2 col-xs-12 control-label">Cân nặng</label>
																<div class="col-md-10 col-xs-12" style="padding-right: 13px;">
																	<div class="input-group response-notice">
																		<span class="input-group-addon"><i class="fa fa-balance-scale" aria-hidden="true"></i></span>
																		<input type="text" class="form-control" name="weight" placeholder="Điều vào cân nặng của thiết bị" />
																		<span class="glyphicon glyphicon-ok form-control-feedback" style="left:91.5%;top:-2px;"></span>
																		<span class="glyphicon glyphicon-remove form-control-feedback" style="left:91.5%;top:-2px;"></span>
																	</div>
																	<p class="product_add_errors_text" style="color: red;padding-left: 51px;"></p>
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
																	<div class="input-group response-notice">
																		<span class="input-group-addon"><span class="fa fa-windows"></span></span>
																		<input type="text" class="form-control" name="operation_system" placeholder="Điều vào tên hệ điều hành" />
																		<span class="glyphicon glyphicon-ok form-control-feedback" style="left:91.5%;top:-2px;"></span>
																		<span class="glyphicon glyphicon-remove form-control-feedback" style="left:91.5%;top:-2px;"></span>
																	</div>
																	<p class="product_add_errors_text" style="color: red;padding-left: 51px;"></p>
																</div>
															</div>
														</div>
														<div class="col-12 form-group-separated">
															<div class="form-group">
																<label class="col-md-2 col-xs-12 control-label">Màn hình</label>
																<div class="col-md-10 col-xs-12" style="padding-right: 13px;">
																	<div class="input-group response-notice">
																		<span class="input-group-addon"><span class="fa fa-desktop"></span></span>
																		<input type="text" class="form-control" name="monitor" placeholder="Điều vào tên hệ điều hành" />
																		<span class="glyphicon glyphicon-ok form-control-feedback" style="left:91.5%;top:-2px;"></span>
																		<span class="glyphicon glyphicon-remove form-control-feedback" style="left:91.5%;top:-2px;"></span>
																	</div>
																	<p class="product_add_errors_text" style="color: red;padding-left: 51px;"></p>
																</div>
															</div>
														</div>
														<div class="col-12 form-group-separated">
															<div class="form-group">
																<label class="col-md-2 col-xs-12 control-label">HDD</label>
																<div class="col-md-10 col-xs-12" style="padding-right: 13px;">
																	<div class="input-group response-notice">
																		<span class="input-group-addon"><span class="fa fa-hdd-o"></span></span>
																		<input type="text" class="form-control" name="hdd" placeholder="Điều vào tên hệ điều hành" />
																		<span class="glyphicon glyphicon-ok form-control-feedback" style="left:91.5%;top:-2px;"></span>
																		<span class="glyphicon glyphicon-remove form-control-feedback" style="left:91.5%;top:-2px;"></span>
																	</div>
																	<p class="product_add_errors_text" style="color: red;padding-left: 51px;"></p>
																</div>
															</div>
														</div>
														<div class="col-12 form-group-separated">
															<div class="form-group">
																<label class="col-md-2 col-xs-12 control-label">Card Video</label>
																<div class="col-md-10 col-xs-12" style="padding-right: 13px;">
																	<div class="input-group response-notice">
																		<span class="input-group-addon"><span class="glyphicon glyphicon-hd-video"></span></span>
																		<input type="text" class="form-control" name="card_video" placeholder="Điều vào tên card video" />
																		<span class="glyphicon glyphicon-ok form-control-feedback" style="left:91.5%;top:-2px;"></span>
																		<span class="glyphicon glyphicon-remove form-control-feedback" style="left:91.5%;top:-2px;"></span>
																	</div>
																	<p class="product_add_errors_text" style="color: red;padding-left: 51px;"></p>
																</div>
															</div>
														</div>
														<div class="col-12 form-group-separated">
															<div class="form-group">
																<label class="col-md-2 col-xs-12 control-label">Card Reader</label>
																<div class="col-md-10 col-xs-12" style="padding-right: 13px;">
																	<div class="input-group response-notice">
																		<span class="input-group-addon"><i class="fa fa-hdd-o" aria-hidden="true"></i></span>
																		<input type="text" class="form-control" name="card_reader" placeholder="Điều vào tên card reader" />
																		<span class="glyphicon glyphicon-ok form-control-feedback" style="left:91.5%;top:-2px;"></span>
																		<span class="glyphicon glyphicon-remove form-control-feedback" style="left:91.5%;top:-2px;"></span>
																	</div>
																	<p class="product_add_errors_text" style="color: red;padding-left: 51px;"></p>
																</div>
															</div>
														</div>
														<div class="col-12 form-group-separated">
															<div class="form-group">
																<label class="col-md-2 col-xs-12 control-label">Finger Print</label>
																<div class="col-md-10 col-xs-12" style="padding-right: 13px;">
																	<div class="input-group response-notice">
																		<span class="input-group-addon"><span class="fa fa-print"></span></span>
																		<input type="text" class="form-control" name="finger_print" placeholder="Điều vào tên finder print" />
																		<span class="glyphicon glyphicon-ok form-control-feedback" style="left:91.5%;top:-2px;"></span>
																		<span class="glyphicon glyphicon-remove form-control-feedback" style="left:91.5%;top:-2px;"></span>
																	</div>
																	<p class="product_add_errors_text" style="color: red;padding-left: 51px;"></p>
																</div>
															</div>
														</div>
														<div class="col-12 form-group-separated">
															<div class="form-group">
																<label class="col-md-2 col-xs-12 control-label">Port</label>
																<div class="col-md-10 col-xs-12" style="padding-right: 13px;">
																	<div class="input-group response-notice">
																		<span class="input-group-addon"><i class="fa fa-compress" aria-hidden="true"></i></span>
																		<input type="text" class="form-control" name="port" placeholder="Điều vào tên port" />
																		<span class="glyphicon glyphicon-ok form-control-feedback" style="left:91.5%;top:-2px;"></span>
																		<span class="glyphicon glyphicon-remove form-control-feedback" style="left:91.5%;top:-2px;"></span>
																	</div>
																	<p class="product_add_errors_text" style="color: red;padding-left: 51px;"></p>
																</div>
															</div>
														</div>
														<div class="col-12 form-group-separated" style="border-bottom: 1px dashed #D5D5D5;">
															<div class="form-group">
																<label class="col-md-2 col-xs-12 control-label">Pin</label>
																<div class="col-md-10 col-xs-12" style="padding-right: 13px;">
																	<div class="input-group response-notice">
																		<span class="input-group-addon"><i class="fa fa-battery-full" aria-hidden="true"></i></span>
																		<input type="text" class="form-control" name="pin" placeholder="Điều vào tên loại pin" />
																		<span class="glyphicon glyphicon-ok form-control-feedback" style="left:91.5%;top:-2px;"></span>
																		<span class="glyphicon glyphicon-remove form-control-feedback" style="left:91.5%;top:-2px;"></span>
																	</div>
																	<p class="product_add_errors_text" style="color: red;padding-left: 51px;"></p>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="panel-footer">
										<button class="btn btn-primary pull-right btn_add_product">Lưu <span class="fa fa-floppy-o fa-right"></span></button>
									</div>
								</div>

							</form>

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
		CKEDITOR.replace( 'editContent' );

		$('.update_profile_image').hover(function() {
			$(this).find('.btn_file_layout').addClass('update_img_show');
		}, function() {
			$(this).find('.btn_file_layout').removeClass('update_img_show');
		});

		$('#products_table tbody').on('click', '.btn_edit', function(event) {
			event.preventDefault();

			var url = $(this).data('url');
			var url_update = $(this).attr('data-update');

			$.ajax({
				url: url,
				type: 'GET',
			})
			.done(function(response) {
				console.log("success");
				$("#form_edit_product").find('.response-notice').removeClass('has-success has-feedback-success');
				$("#form_edit_product").find('.content_base').removeClass('has-success has-feedback-success');
				$("#form_edit_product").find('.image_base').removeClass('image-success');
				$("#form_edit_product").find('.categories').removeClass('categories-success');
				$("#form_edit_product").find('.tags_base').removeClass('has-success has-feedback-success');
				$('#form_edit_product select[name="tags[]"]').tagsinput('removeAll');
				$('#delete_tags').attr('value', '');
				$('#form_edit_product input[name="name"]').val(response.product.name);
				$('#form_edit_product textarea[name="description"]').val(response.product.description);
				CKEDITOR.instances['editContent'].setData(response.product.content);
				$('#form_edit_product .edit_product_thumbnail').attr('src', '{{asset('storage')}}/'+response.product.thumbnail);
				$('.add_product_file_input').change(function(event) {
					var input = this;
					var url = $(this).val();
					var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
					if (input.files && input.files[0]&& (ext == "png" || ext == "jpeg" || ext == "jpg")) 
					{
						var reader = new FileReader();

						reader.onload = function (e) {
							$('img.edit_product_thumbnail').attr('src', e.target.result);
						}
						reader.readAsDataURL(input.files[0]);
					}
					else
					{
						$('img.edit_product_thumbnail').attr('src', '{{asset('storage')}}/'+response.product.thumbnail);
					}
				});
				$('#form_edit_product input[name="category_check_lap"][value="'+response.product.category_id+'"]').prop('checked', true);
				$('#form_edit_product input[name="category_check_lap"]').each(function(){
					if (this.checked) {
						$(this).parents('.category').find('input[name="category_check"]').prop('checked',true);
						$(this).parents('.category').find('ul').css('display', 'block');;
					}
				});
				$.each(response.product.tags, function(index, val) {
					$('#form_edit_product select[name="tags[]"]').tagsinput('add', response.product.tags[index]['name']);
				});
				$('#form_edit_product input[name="cpu"]').val(response.product.cpu);
				$('#form_edit_product input[name="operation_system"]').val(response.product.operation_system);
				$('#form_edit_product input[name="ram"]').val(response.product.ram);
				$('#form_edit_product input[name="monitor"]').val(response.product.monitor);
				$('#form_edit_product input[name="cd_dvd"]').val(response.product.cd_dvd);
				$('#form_edit_product input[name="hdd"]').val(response.product.hdd);
				$('#form_edit_product input[name="card_audio"]').val(response.product.card_audio);
				$('#form_edit_product input[name="card_video"]').val(response.product.card_video);
				$('#form_edit_product input[name="webcam"]').val(response.product.webcam);
				$('#form_edit_product input[name="card_reader"]').val(response.product.card_reader);
				$('#form_edit_product input[name="communications"]').val(response.product.communications);
				$('#form_edit_product input[name="finger_print"]').val(response.product.finger_print);
				$('#form_edit_product input[name="bluetooth"]').val(response.product.bluetooth);
				$('#form_edit_product input[name="port"]').val(response.product.port);
				$('#form_edit_product input[name="weight"]').val(response.product.weight);
				$('#form_edit_product input[name="pin"]').val(response.product.pin);

				$('#form_edit_product').attr('data-update', url_update);
				var delete_tags = [];
				$('#form_edit_product select[name="tags[]"] option').on('remove', function(event) {
					delete_tags[delete_tags.length]=$(this).text();
					$('#delete_tags').attr('value', delete_tags);
				});
			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
				console.log("complete");
			});
		});

		$('input[name="category_check"]').change(function(){
			$('.category').find('ul').css('display', 'none');
			$(this).parents('.category').find('ul').css('display', 'block');
			$(this).parents('.category').find('input[name="category_check_lap"]').eq(0).prop('checked', true);
		})
		$('input[name="category_check_lap"]').change(function(){
			$('.category').find('ul').css('display', 'none');
			$(this).parents('.category').find('ul').css('display', 'block');
			$(this).parents('.category').find('input[name="category_check"]').prop('checked', true);
		})

		$('#form_edit_product').submit(function(event) {
			event.preventDefault();

			var url = $(this).attr('data-update');

			var formData = new FormData(this);
			formData.set('content',CKEDITOR.instances.editContent.getData())

			$.ajax({
				url: url,
				type: 'POST',
				data: formData,
				processData: false,
				contentType: false,
			})
			.done(function(response) {
				console.log("success");

				if (response.errors) {
					if (response.errors["name"]) {
						$('#form_edit_product input[name="name"]').parent('.input-group').addClass('has-error has-feedback-error')
						$('#form_edit_product input[name="name"]').parent('.input-group').removeClass('has-success has-feedback-success')
						$('#form_edit_product input[name="name"]').parents('.col-md-10').find('p').text(response.errors["name"])
					} else {
						$('#form_edit_product input[name="name"]').parent('.input-group').removeClass('has-error has-feedback-error')
						$('#form_edit_product input[name="name"]').parent('.input-group').addClass('has-success has-feedback-success')
						$('#form_edit_product input[name="name"]').parents('.col-md-10').find('p').text('')
					}
					if (response.errors["description"]) {
						$('#form_edit_product textarea[name="description"]').parent('.input-group').addClass('has-error has-feedback-error')
						$('#form_edit_product textarea[name="description"]').parent('.input-group').removeClass('has-success has-feedback-success')
						$('#form_edit_product textarea[name="description"]').parents('.col-md-10').find('p').text(response.errors["description"])
					} else {
						$('#form_edit_product textarea[name="description"]').parent('.input-group').removeClass('has-error has-feedback-error')
						$('#form_edit_product textarea[name="description"]').parent('.input-group').addClass('has-success has-feedback-success')
						$('#form_edit_product textarea[name="description"]').parents('.col-md-10').find('p').text('')
					}
					if (response.errors["content"]) {
						$('#form_edit_product textarea[name="content"]').parent('.content_base').addClass('has-error has-feedback-error')
						$('#form_edit_product textarea[name="content"]').parent('.content_base').removeClass('has-success has-feedback-success')
						$('#form_edit_product textarea[name="content"]').parent('.content_base').find('p').text(response.errors["content"])
					} else {
						$('#form_edit_product textarea[name="content"]').parent('.content_base').removeClass('has-error has-feedback-error')
						$('#form_edit_product textarea[name="content"]').parent('.content_base').addClass('has-success has-feedback-success')
						$('#form_edit_product textarea[name="content"]').parent('.content_base').find('p').text('')
					}
					if (response.errors["thumbnail"]) {
						$('#form_edit_product input[name="thumbnail"]').parents('.image_base').addClass('image-error')
						$('#form_edit_product input[name="thumbnail"]').parents('.image_base').removeClass('image-success')
						$('#form_edit_product input[name="thumbnail"]').parents('.image_base').find('p').text(response.errors["thumbnail"])
					} else {
						$('#form_edit_product input[name="thumbnail"]').parents('.image_base').removeClass('image-error')
						$('#form_edit_product input[name="thumbnail"]').parents('.image_base').addClass('image-success')
						$('#form_edit_product input[name="thumbnail"]').parents('.image_base').find('p').text('')
					}
					if (response.errors["category_check_lap"]) {
						$('#form_edit_product input[name="category_check_lap"]').parents('.categories').addClass('categories-error')
						$('#form_edit_product input[name="category_check_lap"]').parents('.categories').removeClass('categories-success')
						$('#form_edit_product input[name="category_check_lap"]').parents('.categories').find('p').text(response.errors["category_check_lap"])
					} else {
						$('#form_edit_product input[name="category_check_lap"]').parents('.categories').removeClass('categories-error')
						$('#form_edit_product input[name="category_check_lap"]').parents('.categories').addClass('categories-success')
						$('#form_edit_product input[name="category_check_lap"]').parents('.categories').find('p').text('')
					}
					if (response.errors["tags"]) {
						$('#form_edit_product select[name="tags[]"]').parent('.tags_base').addClass('has-error has-feedback-error')
						$('#form_edit_product select[name="tags[]"]').parent('.tags_base').removeClass('has-success has-feedback-success')
						$('#form_edit_product select[name="tags[]"]').parents('.tags').find('p').text(response.errors["tags"])
					} else {
						$('#form_edit_product select[name="tags[]"]').parent('.tags_base').removeClass('has-error has-feedback-error')
						$('#form_edit_product select[name="tags[]"]').parent('.tags_base').addClass('has-success has-feedback-success')
						$('#form_edit_product select[name="tags[]"]').parents('.tags').find('p').text('')
					}
					if (response.errors["cpu"]) {
						$('#form_edit_product input[name="cpu"]').parent('.input-group').addClass('has-error has-feedback-error')
						$('#form_edit_product input[name="cpu"]').parent('.input-group').removeClass('has-success has-feedback-success')
						$('#form_edit_product input[name="cpu"]').parents('.col-md-10').find('p').text(response.errors["cpu"])
					} else {
						$('#form_edit_product input[name="cpu"]').parent('.input-group').removeClass('has-error has-feedback-error')
						$('#form_edit_product input[name="cpu"]').parent('.input-group').addClass('has-success has-feedback-success')
						$('#form_edit_product input[name="cpu"]').parents('.col-md-10').find('p').text('')
					}
					if (response.errors["operation_system"]) {
						$('#form_edit_product input[name="operation_system"]').parent('.input-group').addClass('has-error has-feedback-error')
						$('#form_edit_product input[name="operation_system"]').parent('.input-group').removeClass('has-success has-feedback-success')
						$('#form_edit_product input[name="operation_system"]').parents('.col-md-10').find('p').text(response.errors["operation_system"])
					} else {
						$('#form_edit_product input[name="operation_system"]').parent('.input-group').removeClass('has-error has-feedback-error')
						$('#form_edit_product input[name="operation_system"]').parent('.input-group').addClass('has-success has-feedback-success')
						$('#form_edit_product input[name="operation_system"]').parents('.col-md-10').find('p').text('')
					}
					if (response.errors["ram"]) {
						$('#form_edit_product input[name="ram"]').parent('.input-group').addClass('has-error has-feedback-error')
						$('#form_edit_product input[name="ram"]').parent('.input-group').removeClass('has-success has-feedback-success')
						$('#form_edit_product input[name="ram"]').parents('.col-md-10').find('p').text(response.errors["ram"])
					} else {
						$('#form_edit_product input[name="ram"]').parent('.input-group').removeClass('has-error has-feedback-error')
						$('#form_edit_product input[name="ram"]').parent('.input-group').addClass('has-success has-feedback-success')
						$('#form_edit_product input[name="ram"]').parents('.col-md-10').find('p').text('')
					}
					if (response.errors["monitor"]) {
						$('#form_edit_product input[name="monitor"]').parent('.input-group').addClass('has-error has-feedback-error')
						$('#form_edit_product input[name="monitor"]').parent('.input-group').removeClass('has-success has-feedback-success')
						$('#form_edit_product input[name="monitor"]').parents('.col-md-10').find('p').text(response.errors["monitor"])
					} else {
						$('#form_edit_product input[name="monitor"]').parent('.input-group').removeClass('has-error has-feedback-error')
						$('#form_edit_product input[name="monitor"]').parent('.input-group').addClass('has-success has-feedback-success')
						$('#form_edit_product input[name="monitor"]').parents('.col-md-10').find('p').text('')
					}
					if (response.errors["hdd"]) {
						$('#form_edit_product input[name="hdd"]').parent('.input-group').addClass('has-error has-feedback-error')
						$('#form_edit_product input[name="hdd"]').parent('.input-group').removeClass('has-success has-feedback-success')
						$('#form_edit_product input[name="hdd"]').parents('.col-md-10').find('p').text(response.errors["hdd"])
					} else {
						$('#form_edit_product input[name="hdd"]').parent('.input-group').removeClass('has-error has-feedback-error')
						$('#form_edit_product input[name="hdd"]').parent('.input-group').addClass('has-success has-feedback-success')
						$('#form_edit_product input[name="hdd"]').parents('.col-md-10').find('p').text('')
					}
					if (response.errors["card_audio"]) {
						$('#form_edit_product input[name="card_audio"]').parent('.input-group').addClass('has-error has-feedback-error')
						$('#form_edit_product input[name="card_audio"]').parent('.input-group').removeClass('has-success has-feedback-success')
						$('#form_edit_product input[name="card_audio"]').parents('.col-md-10').find('p').text(response.errors["card_audio"])
					} else {
						$('#form_edit_product input[name="card_audio"]').parent('.input-group').removeClass('has-error has-feedback-error')
						$('#form_edit_product input[name="card_audio"]').parent('.input-group').addClass('has-success has-feedback-success')
						$('#form_edit_product input[name="card_audio"]').parents('.col-md-10').find('p').text('')
					}
					if (response.errors["card_video"]) {
						$('#form_edit_product input[name="card_video"]').parent('.input-group').addClass('has-error has-feedback-error')
						$('#form_edit_product input[name="card_video"]').parent('.input-group').removeClass('has-success has-feedback-success')
						$('#form_edit_product input[name="card_video"]').parents('.col-md-10').find('p').text(response.errors["card_video"])
					} else {
						$('#form_edit_product input[name="card_video"]').parent('.input-group').removeClass('has-error has-feedback-error')
						$('#form_edit_product input[name="card_video"]').parent('.input-group').addClass('has-success has-feedback-success')
						$('#form_edit_product input[name="card_video"]').parents('.col-md-10').find('p').text('')
					}
					if (response.errors["webcam"]) {
						$('#form_edit_product input[name="webcam"]').parent('.input-group').addClass('has-error has-feedback-error')
						$('#form_edit_product input[name="webcam"]').parent('.input-group').removeClass('has-success has-feedback-success')
						$('#form_edit_product input[name="webcam"]').parents('.col-md-10').find('p').text(response.errors["webcam"])
					} else {
						$('#form_edit_product input[name="webcam"]').parent('.input-group').removeClass('has-error has-feedback-error')
						$('#form_edit_product input[name="webcam"]').parent('.input-group').addClass('has-success has-feedback-success')
						$('#form_edit_product input[name="webcam"]').parents('.col-md-10').find('p').text('')
					}
					if (response.errors["card_reader"]) {
						$('#form_edit_product input[name="card_reader"]').parent('.input-group').addClass('has-error has-feedback-error')
						$('#form_edit_product input[name="card_reader"]').parent('.input-group').removeClass('has-success has-feedback-success')
						$('#form_edit_product input[name="card_reader"]').parents('.col-md-10').find('p').text(response.errors["card_reader"])
					} else {
						$('#form_edit_product input[name="card_reader"]').parent('.input-group').removeClass('has-error has-feedback-error')
						$('#form_edit_product input[name="card_reader"]').parent('.input-group').addClass('has-success has-feedback-success')
						$('#form_edit_product input[name="card_reader"]').parents('.col-md-10').find('p').text('')
					}
					if (response.errors["communications"]) {
						$('#form_edit_product input[name="communications"]').parent('.input-group').addClass('has-error has-feedback-error')
						$('#form_edit_product input[name="communications"]').parent('.input-group').removeClass('has-success has-feedback-success')
						$('#form_edit_product input[name="communications"]').parents('.col-md-10').find('p').text(response.errors["communications"])
					} else {
						$('#form_edit_product input[name="communications"]').parent('.input-group').removeClass('has-error has-feedback-error')
						$('#form_edit_product input[name="communications"]').parent('.input-group').addClass('has-success has-feedback-success')
						$('#form_edit_product input[name="communications"]').parents('.col-md-10').find('p').text('')
					}
					if (response.errors["bluetooth"]) {
						$('#form_edit_product input[name="bluetooth"]').parent('.input-group').addClass('has-error has-feedback-error')
						$('#form_edit_product input[name="bluetooth"]').parent('.input-group').removeClass('has-success has-feedback-success')
						$('#form_edit_product input[name="bluetooth"]').parents('.col-md-10').find('p').text(response.errors["bluetooth"])
					} else {
						$('#form_edit_product input[name="bluetooth"]').parent('.input-group').removeClass('has-error has-feedback-error')
						$('#form_edit_product input[name="bluetooth"]').parent('.input-group').addClass('has-success has-feedback-success')
						$('#form_edit_product input[name="bluetooth"]').parents('.col-md-10').find('p').text('')
					}
					if (response.errors["port"]) {
						$('#form_edit_product input[name="port"]').parent('.input-group').addClass('has-error has-feedback-error')
						$('#form_edit_product input[name="port"]').parent('.input-group').removeClass('has-success has-feedback-success')
						$('#form_edit_product input[name="port"]').parents('.col-md-10').find('p').text(response.errors["port"])
					} else {
						$('#form_edit_product input[name="port"]').parent('.input-group').removeClass('has-error has-feedback-error')
						$('#form_edit_product input[name="port"]').parent('.input-group').addClass('has-success has-feedback-success')
						$('#form_edit_product input[name="port"]').parents('.col-md-10').find('p').text('')
					}
					if (response.errors["weight"]) {
						$('#form_edit_product input[name="weight"]').parent('.input-group').addClass('has-error has-feedback-error')
						$('#form_edit_product input[name="weight"]').parent('.input-group').removeClass('has-success has-feedback-success')
						$('#form_edit_product input[name="weight"]').parents('.col-md-10').find('p').text(response.errors["weight"])
					} else {
						$('#form_edit_product input[name="weight"]').parent('.input-group').removeClass('has-error has-feedback-error')
						$('#form_edit_product input[name="weight"]').parent('.input-group').addClass('has-success has-feedback-success')
						$('#form_edit_product input[name="weight"]').parents('.col-md-10').find('p').text('')
					}
					if (response.errors["pin"]) {
						$('#form_edit_product input[name="pin"]').parent('.input-group').addClass('has-error has-feedback-error')
						$('#form_edit_product input[name="pin"]').parent('.input-group').removeClass('has-success has-feedback-success')
						$('#form_edit_product input[name="pin"]').parents('.col-md-10').find('p').text(response.errors["pin"])
					} else {
						$('#form_edit_product input[name="pin"]').parent('.input-group').removeClass('has-error has-feedback-error')
						$('#form_edit_product input[name="pin"]').parent('.input-group').addClass('has-success has-feedback-success')
						$('#form_edit_product input[name="pin"]').parents('.col-md-10').find('p').text('')
					}
					if (response.errors["product_image"]) {
						$('#form_edit_product input[name="product_image[]"]').parents('.input-group').addClass('has-error has-feedback-error')
						$('#form_edit_product input[name="product_image[]"]').parents('.input-group').removeClass('has-success has-feedback-success')
						$('#form_edit_product input[name="product_image[]"]').parents('.col-md-10').find('.product_text').text(response.errors["product_image"])
					} else {
						$('#form_edit_product input[name="product_image[]"]').parents('.input-group').removeClass('has-error has-feedback-error')
						$('#form_edit_product input[name="product_image[]"]').parents('.input-group').addClass('has-success has-feedback-success')
						$('#form_edit_product input[name="product_image[]"]').parents('.col-md-10').find('.product_text').text('')
					}
				} else {
					$("#form_edit_product").find('.response-notice').removeClass('has-error has-feedback-error');
					$("#form_edit_product").find('.content_base').removeClass('has-error has-feedback-error');
					$("#form_edit_product").find('.image_base').removeClass('image-error');
					$("#form_edit_product").find('.categories').removeClass('categories-error');
					$("#form_edit_product").find('.tags_base').removeClass('has-error has-feedback-error');
					$("#form_edit_product").find('.response-notice').addClass('has-success has-feedback-success');
					$("#form_edit_product").find('.content_base').addClass('has-success has-feedback-success');
					$("#form_edit_product").find('.image_base').addClass('image-success');
					$("#form_edit_product").find('.categories').addClass('categories-success');
					$("#form_edit_product").find('.tags_base').addClass('has-success has-feedback-success');
					$("#form_edit_product").find('.product_add_errors_text').text('');
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
							$('#product_edit').modal('hide');
							table.ajax.reload();
						},2000);
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