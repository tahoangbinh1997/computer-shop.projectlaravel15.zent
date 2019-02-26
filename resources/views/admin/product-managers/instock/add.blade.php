<div class="modal fade" id="product_add">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Thêm mới sản phẩm</h4>
			</div>
			<div class="modal-body" style="background: #f9f9ee;">
				<div class="panel-body">
					<div class="row">
						<div class="col-lg-12" style="padding: 0px;">

							<form class="form-horizontal" id="form_add_product" enctype="multipart/form-data" method="POST" data-url="{{route('admin.product.instock.store')}}">
								@csrf
								{{-- {{method_field('POST')}} --}}
								<div class="panel panel-default tabs">
									<ul class="nav nav-tabs" role="tablist">
										<li class="active"><a href="#tab-first" role="tab" data-toggle="tab">Thông tin chung</a></li>
										<li><a href="#tab-second" role="tab" data-toggle="tab">Thông tin chi tiết</a></li>
									</ul>
									<div class="panel-body tab-content">
										<div class="tab-pane active" id="tab-first">
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
																	<textarea name="content" id="content" rows="10" cols="80"></textarea>
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
																<div id="update_profile_image">
																	<img id="add_product_thumbnail" src="{{asset('')}}/admin_assets/default.png" style="width: 200px;height: 200px;border-radius: 4px;border: 2px solid green;transition: all .5s;">
																	<div class="btn_file_layout">
																		<div class="btn btn-danger btn-file"> <i class="glyphicon glyphicon-folder-open"></i><input type="file" name="thumbnail" id="add_product_file_input"></div>
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
															<div class="categories_base">
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
													</div>
													<div class="row">
														<div class="col-12 tags" style="padding: 15px 10px 15px 10px;margin-bottom: 15px;border: 1px dashed #D5D5D5;">
															<label class="control-label" style="text-align: center;margin-bottom: 10px;padding-top: 0px;">Tags</label>
															<div class="col-12 tags_base" style="position: relative;">
																<select multiple name="tags[]" data-role="tagsinput" class="form-control"></select>
																<span class="glyphicon glyphicon-ok form-control-feedback" style="left:86%;top:-1.5px;"></span>
																<span class="glyphicon glyphicon-remove form-control-feedback" style="left:86%;top:-1.5px;"></span>
															</div>
															<p style="margin-bottom: 0px;color: red;"></p>
														</div>
													</div>
												</div>
											</div>

										</div>
										<div class="tab-pane" id="tab-second">
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
											<div class="row" style="margin-top: 15px;">
												<div class="col-md-12" style="padding-left: 15px;">
													<div class="row form-group-separated" style="border-bottom: 1px dashed #D5D5D5;">
														<label class="col-md-1 col-xs-12 control-label">Resolutions</label>
														<div class="col-md-11 col-xs-12" style="padding-bottom: 10px;padding-top: 10px;border-left: 1px dashed #D5D5D5;">
															<div class="row">
																<div class="col-12" id="product_attribute_base">
																	<div class="row" style="margin-bottom: 5px;">
																		<div class="col-md-2 response-notice">
																			<select name="resolution[0][resolution_id]" id="select_0" class="form-control">
																				
																			</select>
																			<p class="product_add_errors_text" style="color: red;"></p>
																			<span class="glyphicon glyphicon-ok form-control-feedback" style="left:75.5%;top:-2px;"></span>
																			<span class="glyphicon glyphicon-remove form-control-feedback" style="left:75.5%;top:-2px;"></span>
																		</div>
																		<div class="col-md-2 response-notice">
																			<input type="text" name="resolution[0][import_price]" class="form-control" placeholder="Giá nhập khẩu">
																			<p class="product_add_errors_text" style="color: red;"></p>
																			<span class="glyphicon glyphicon-ok form-control-feedback" style="left:75.5%;top:-2px;"></span>
																			<span class="glyphicon glyphicon-remove form-control-feedback" style="left:75.5%;top:-2px;"></span>
																		</div>
																		<div class="col-md-2 response-notice">
																			<input type="text" name="resolution[0][price]" class="form-control" placeholder="Giá bán">
																			<p class="product_add_errors_text" style="color: red;"></p>
																			<span class="glyphicon glyphicon-ok form-control-feedback" style="left:75.5%;top:-2px;"></span>
																			<span class="glyphicon glyphicon-remove form-control-feedback" style="left:75.5%;top:-2px;"></span>
																		</div>
																		<div class="col-md-2 response-notice">
																			<input type="text" name="resolution[0][sale_price]" class="form-control" placeholder="Giá sale">
																			<p class="product_add_errors_text" style="color: red;"></p>
																			<span class="glyphicon glyphicon-ok form-control-feedback" style="left:75.5%;top:-2px;"></span>
																			<span class="glyphicon glyphicon-remove form-control-feedback" style="left:75.5%;top:-2px;"></span>
																		</div>
																		<div class="col-md-2 response-notice">
																			<input type="text" name="resolution[0][stock]" class="form-control" placeholder="Số lượng">
																			<p class="product_add_errors_text" style="color: red;"></p>
																			<span class="glyphicon glyphicon-ok form-control-feedback" style="left:75.5%;top:-2px;"></span>
																			<span class="glyphicon glyphicon-remove form-control-feedback" style="left:75.5%;top:-2px;"></span>
																		</div>
																		<div class="col-md-2 response-notice">
																			<button type="button" class="btn btn-primary" id="product_stock_add_0" onclick="addRow(this.form);"">Add</button>
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
														<label class="col-md-2 col-xs-12 control-label">Ảnh chi tiết sản phẩm</label>
														<div class="col-md-10 col-xs-12" style="padding-bottom: 10px;border-left: 1px dashed #D5D5D5;">
															<input type="file" multiple name="product_image[]" class="file" data-preview-file-type="any"/>
															<p class="product_text product_add_errors_text" style="color: red;"></p>
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
		CKEDITOR.replace( 'content' );

		$('#update_profile_image').hover(function() {
			$(this).find('.btn_file_layout').addClass('update_img_show');
		}, function() {
			$(this).find('.btn_file_layout').removeClass('update_img_show');
		});

		$('#add_product_file_input').change(function(event) {
			var input = this;
			var url = $(this).val();
			var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
			if (input.files && input.files[0]&& (ext == "png" || ext == "jpeg" || ext == "jpg")) 
			{
				var reader = new FileReader();

				reader.onload = function (e) {
					$('img#add_product_thumbnail').attr('src', e.target.result);
				}
				reader.readAsDataURL(input.files[0]);
			}
			else
			{
				$('img#add_product_thumbnail').attr('src', 'http://computer-shop.projectlaravel15.zent/admin_assets/default.png');
			}
		});
		$('.kv-fileinput-upload').remove();
		$('#form_add_product input[name="resolution[0][import_price]"]').mask('000.000.000.000.000 VNĐ', {reverse: true});
		$('#form_add_product input[name="resolution[0][price]"]').mask('000.000.000.000.000 VNĐ', {reverse: true});
		$('#form_add_product input[name="resolution[0][sale_price]"]').mask('000.000.000.000.000 VNĐ', {reverse: true});
		$('#form_add_product input[name="resolution[0][stock]"]').mask('000.000.000.000.000 cái', {reverse: true});
	});

	var rowNum = 0;
	var resolution_check = [];
	var resolutions = new Array();

	$('.btn-product-add').on('click', function(event) {
		event.preventDefault();

		$.ajax({
			url: '{{route('admin.product.instock.add')}}',
			type: 'GET',
		})
		.done(function(response) {
			console.log("success");
			resolutions = [''];
			$('#select_0').empty();
			$('.categories_base').empty();
			$.each(response.resolutions, function(index, val) {
				 $('#form_add_product #select_0').append('<option value="'+val['id']+'">'+val['resolution_name']+'</option>');
				 resolutions[index] = {"id": val['id'],"resolution_name": val['resolution_name']}; // add các dữ liệu của trường id và trường resolution_name vào mảng 2 chiều resolutions
			});
			$.each(response.categories, function(index, val) {
				 if (val["parent_id"] == null) {
				 	$('.categories_base').append('<div class="category"><label class="check"><input type="radio" name="category_check" />'+val['name']+'</label><ul id="category_'+val['id']+'"></ul></div>');
				 }else{
				 	$('.categories_base #category_'+val["parent_id"]).append('<li><label class="check"><input type="radio" name="category_check_lap" value="'+val['id']+'" /> '+val['name']+'</label></li>');
				 }
			});
			console.log(resolutions);

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
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});

	});

	function addRow(frm) {
		if (rowNum >= resolutions.length) {
			return false;
		}
		jQuery('#form_add_product #product_stock_add_'+rowNum).hide();
		jQuery('#form_add_product #product_stock_remove_'+rowNum).hide();
		resolution_check[resolution_check.length] = jQuery('#form_add_product #select_'+rowNum+' option:selected').val();
		rowNum++;
		var row = '<div class="row" style="margin-bottom: 5px;" id="rowNum'+rowNum+'"><div class="col-md-2 response-notice"><select id="select_'+rowNum+'" name="resolution['+rowNum+'][resolution_id]" class="form-control"></select><p  class="product_add_errors_text" style="color: red;"></p><span class="glyphicon glyphicon-ok form-control-feedback" style="left:75.5%;top:-2px;"></span><span class="glyphicon glyphicon-remove form-control-feedback" style="left:75.5%;top:-2px;"></span></div><div class="col-md-2 response-notice"><input type="text" name="resolution['+rowNum+'][import_price]" class="form-control" placeholder="Giá nhập khẩu"><p  class="product_add_errors_text" style="color: red;"></p><span class="glyphicon glyphicon-ok form-control-feedback" style="left:75.5%;top:-2px;"></span><span class="glyphicon glyphicon-remove form-control-feedback" style="left:75.5%;top:-2px;"></span></div><div class="col-md-2 response-notice"><input type="text" name="resolution['+rowNum+'][price]" class="form-control" placeholder="Giá bán"><p  class="product_add_errors_text" style="color: red;"></p><span class="glyphicon glyphicon-ok form-control-feedback" style="left:75.5%;top:-2px;"></span><span class="glyphicon glyphicon-remove form-control-feedback" style="left:75.5%;top:-2px;"></span></div><div class="col-md-2 response-notice"><input type="text" name="resolution['+rowNum+'][sale_price]" class="form-control" placeholder="Giá sale"><p  class="product_add_errors_text" style="color: red;"></p><span class="glyphicon glyphicon-ok form-control-feedback" style="left:75.5%;top:-2px;"></span><span class="glyphicon glyphicon-remove form-control-feedback" style="left:75.5%;top:-2px;"></span></div><div class="col-md-2 response-notice"><input type="text" name="resolution['+rowNum+'][stock]" class="form-control" placeholder="Số lượng"><p  class="product_add_errors_text" style="color: red;"></p><span class="glyphicon glyphicon-ok form-control-feedback" style="left:75.5%;top:-2px;"></span><span class="glyphicon glyphicon-remove form-control-feedback" style="left:75.5%;top:-2px;"></span></div><div class="col-md-2"><button type="button" class="btn btn-primary" style="margin-right: 5px;" id="product_stock_add_'+rowNum+'" onclick="addRow(this.form);"">Add</button><button type="button" class="btn btn-primary" id="product_stock_remove_'+rowNum+'" onclick="removeRow('+rowNum+');"">Remove</button></div></div>';
		jQuery('#product_attribute_base').append(row);
		$.each(resolutions, function(index, val) {
			 jQuery('#form_add_product #select_'+rowNum).append('<option value="'+val['id']+'">'+val['resolution_name']+'</option>'); //add lại các trường của mảng 2 chiều resolutions vào select
		});
		jQuery('#form_add_product input[name="resolution['+rowNum+'][import_price]"]').mask('000.000.000.000.000 VNĐ', {reverse: true});
		jQuery('#form_add_product input[name="resolution['+rowNum+'][price]"]').mask('000.000.000.000.000 VNĐ', {reverse: true});
		jQuery('#form_add_product input[name="resolution['+rowNum+'][sale_price]"]').mask('000.000.000.000.000 VNĐ', {reverse: true});
		jQuery('#form_add_product input[name="resolution['+rowNum+'][stock]"]').mask('000.000.000.000.000 cái', {reverse: true});
		for (var i = resolution_check.length - 1; i >= 0; i--) {
			jQuery('#form_add_product #select_'+rowNum).find('option[value="'+resolution_check[i]+'"]').remove();
		}
		if (rowNum == resolutions.length-1) {
			jQuery('#form_add_product #product_stock_add_'+rowNum).hide();
		}
	}

	function removeRow(rnum) {
		add_button = rnum - 1;
		jQuery('#form_add_product #rowNum'+rnum).remove();
		jQuery('#form_add_product #product_stock_add_'+add_button).show();
		jQuery('#form_add_product #product_stock_remove_'+add_button).show();
		rowNum = rnum - 1;
		resolution_check.length = rowNum;
	}

	$(document).ready(function() {
		$('#form_add_product').on('submit', function(event) {
			event.preventDefault();
			for (var i = 0; i <= rowNum; i++) {
				$('#form_add_product input[name="resolution['+i+'][import_price]"]').unmask();
				$('#form_add_product input[name="resolution['+i+'][price]"]').unmask();
				$('#form_add_product input[name="resolution['+i+'][sale_price]"]').unmask();
				$('#form_add_product input[name="resolution['+i+'][stock]"]').unmask();
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
						$('#form_add_product textarea[name="content"]').parent('.content_base').addClass('has-error has-feedback-error')
						$('#form_add_product textarea[name="content"]').parent('.content_base').removeClass('has-success has-feedback-success')
						$('#form_add_product textarea[name="content"]').parent('.content_base').find('p').text(response.errors["content"])
					} else {
						$('#form_add_product textarea[name="content"]').parent('.content_base').removeClass('has-error has-feedback-error')
						$('#form_add_product textarea[name="content"]').parent('.content_base').addClass('has-success has-feedback-success')
						$('#form_add_product textarea[name="content"]').parent('.content_base').find('p').text('')
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
						$('#form_add_product select[name="tags[]"]').parent('.tags_base').addClass('has-error has-feedback-error')
						$('#form_add_product select[name="tags[]"]').parent('.tags_base').removeClass('has-success has-feedback-success')
						$('#form_add_product select[name="tags[]"]').parents('.tags').find('p').text(response.errors["tags"])
					} else {
						$('#form_add_product select[name="tags[]"]').parent('.tags_base').removeClass('has-error has-feedback-error')
						$('#form_add_product select[name="tags[]"]').parent('.tags_base').addClass('has-success has-feedback-success')
						$('#form_add_product select[name="tags[]"]').parents('.tags').find('p').text('')
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
					$("#form_add_product").find('.response-notice').removeClass('has-error has-feedback-error');
					$("#form_add_product").find('.content_base').removeClass('has-error has-feedback-error');
					$("#form_add_product").find('.image_base').removeClass('image-error');
					$("#form_add_product").find('.categories').removeClass('categories-error');
					$("#form_add_product").find('.tags_base').removeClass('has-error has-feedback-error');
					$("#form_add_product").find('.response-notice').addClass('has-success has-feedback-success');
					$("#form_add_product").find('.content_base').addClass('has-success has-feedback-success');
					$("#form_add_product").find('.image_base').addClass('image-success');
					$("#form_add_product").find('.categories').addClass('categories-success');
					$("#form_add_product").find('.tags_base').addClass('has-success has-feedback-success');
					$("#form_add_product").find('.product_add_errors_text').text('');
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
							table.ajax.reload();
							$("#form_add_product").find('.response-notice').removeClass('has-success has-feedback-success');
							$("#form_add_product").find('.content_base').removeClass('has-success has-feedback-success');
							$("#form_add_product").find('.image_base').removeClass('image-success');
							$("#form_add_product").find('.categories').removeClass('categories-success');
							$("#form_add_product").find('.tags_base').removeClass('has-success has-feedback-success');
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
</script>