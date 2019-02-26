@extends('layouts.admin-temp')

@section('admins')
	active
@endsection

@section('admins-delete')
	active
@endsection

@section('header')
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
	<style type="text/css">
		button#user-detail,
		button#user-edit,
		button.user-upback,
		button.user-delete {
			padding: 1px 6px!important;
			height: 28px!important;
			width: 28px!important;
		}
		button.user-upback {
			padding: 3px 4px!important;
		}
		#user-detail>i,
		#user-edit>i,
		.user-upback>i,
		.user-delete>i {
			height: 20px!important;
			display: inline-flex!important;
			justify-content: center!important;
			align-items: center!important;
			margin-right: 0px!important;
			font-size: 13px!important;
		}
		.user-upback>i {
			font-size: 16px!important;
		}
		#user-edit>i,
		.user-upback>i {
			left: 1px!important;
		}
		.label {
			font-size: 13px;
		}
		#user_detail_email_base,
		#user_detail_phone_number_base,
		#user_detail_username,
		#user_detail_birthday,
		#user_detail_updated_at {
			margin-top: 10px;
			/*float: right;*/
		}
		#display_show {
			display: block!important;
			transition: .3s;
		}
		#user_detail_email {
			font-size: 14px;
			/*margin-top: 5px;*/
			margin-bottom: 5px;
		}
		.form-group {
			margin-bottom: 7px;
		}
		.dropzone .dz-preview {
			margin: 10px 5px 10px 5px;
		}
		.dz-preview .dz-progress {
			top: 120px!important;
		}
		.dz-preview .dz-error-message {
			left: -5px!important;
		}
		.dz-preview .dz-details {
			width: 120px!important;
			height: initial!important;
		}
		#update_profile_image {
			position: relative;
			width: 130px;
			height: 130px;
			margin: 0 auto;
			overflow: hidden;
		}
		.btn_file_layout {
			position: absolute;
			width: 130px;
			height: 130px;
			top: 0px;
			border-radius: 100%;
			border: 2px solid green;
			box-sizing: border-box;
			overflow: hidden;
			transition: all .5s;
			-moz-transition: all .5s;
			-webkit-transition: all .5s;
		}
		#update_profile_image .btn-file {
			position: absolute;
			padding: 6px 5px 5px 7px;
			border-radius: 100%;
			left: 38%;
			top: 100%;
			transition: all .5s;
			-moz-transition: all .5s;
			-webkit-transition: all .5s;
		}
		#update_profile_image .btn-file-trash {
			position: absolute;
			padding: 6px 5px 5px 8px;
			border-radius: 100%;
			left: 5%;
			top: 100%;
			transition: all .5s;
			-moz-transition: all .5s;
			-webkit-transition: all .5s;
		}
		.update_img_show {
			background-color: rgba(0,0,0,.4);
			transition: all .5s;
			-moz-transition: all .5s;
			-webkit-transition: all .5s;
		}
		.update_img_show .btn-file {
			top: 39%!important;
		}
		.update_btn_trash_show {
			transition: all .5s;
			-moz-transition: all .5s;
			-webkit-transition: all .5s;
			top: 74%!important;
		}
		#update_profile_image .btn-file input[type="file"] {
			width: 33px;
			height: 33px;
		}
	</style>
@endsection

@section('content')
	<!-- START BREADCRUMB -->
	<ul class="breadcrumb">
		<li><a href="{{route('admin.home')}}">Home</a></li>
		<li class="active">Nhân viên đã kích hoạt</li>
	</ul>

	<!-- END BREADCRUMB -->
	<!-- PAGE TITLE -->
	<div class="page-title">                    
		<h2><span class="fa fa-arrow-circle-o-left"></span> Nhân Viên Đã Kích Hoạt</h2>
	</div>
	<!-- END PAGE TITLE -->                
	<!-- PAGE CONTENT WRAPPER -->
	<div class="page-content-wrap">                

		<div class="row">
			<div class="col-md-12">

				<!-- START DEFAULT DATATABLE -->
				<div class="panel panel-default">
					<div class="panel-heading">                                
						<h3 class="panel-title">Danh sách nhân viên</h3>
						<ul class="panel-controls">
							<li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
							<li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
							<li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
						</ul>                                
					</div>
					<div class="panel-body">
						<table class="table datatable" id="users-table">
							<thead>
								<tr>
									<th>Id</th>
									<th>Name</th>
									<th>Username</th>
									<th>Email</th>
									<th>Phone_Number</th>
									<th>Permission</th>
									<th>Action</th>
								</tr>
							</thead>
							<tfoot>
								<tr>
									<th>Id</th>
									<th>Name</th>
									<th>Username</th>
									<th>Email</th>
									<th>Phone_Number</th>
									<th>Permission</th>
									<th>Action</th>
								</tr>
							</tfoot>
						</table>
					</div>
				</div>
				<!-- END DEFAULT DATATABLE -->
			</div>
		</div>                                
	</div>
	<!-- PAGE CONTENT WRAPPER -->                                

	{{-- MODAL CẬP NHẬT THÔNG TIN nhân viên --}}

	<div class="modal fade" id="user_edit">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Cập nhật thông tin nhân viên</h4>
				</div>
				<div class="modal-body">
					<div class="panel-body">
						<div class="row">
							<form class="form-horizontal" enctype="multipart/form-data" role="form" id="form_edit_user" method="POST">
								@csrf
								{{ method_field('POST') }}
								<div class="col-md-4" style="padding-left: 0px;padding-right: 20px;text-align: center;">
									<span class="label label-danger label-form" style="font-size: 12px;margin-bottom: 5px;">Ảnh nhân viên (*)</span>
									<div class="profile-image">
										<div id="update_profile_image">
											<img id="edit_user_thumbnail" src="" style="width: 130px;height: 130px;border-radius: 100%;border: 2px solid green;transition: all .5s;">
											<div class="btn_file_layout">
												<div class="btn btn-danger btn-file"> <i class="glyphicon glyphicon-folder-open"></i><input type="file" name="edit_user_pic" id="edit_user_file_input"></div>
											</div>
											<div class="btn btn-danger btn-file-trash"> <i class="glyphicon glyphicon-trash"></i></div>
										</div>
									</div>
								</div>
								<div class="col-md-8">
									<div class="form-group">
										<span class="label label-danger label-form" style="font-size: 12px;margin-bottom: 5px;">Họ tên</span>
										<div class="input-group">
											<span class="input-group-addon add-on">
												<span class="fa fa-user"></span>
											</span>
											<input type="text" name="edit_name" class="form-control" placeholder = "Nhập vào họ tên...">
										</div>
									</div>
									<div class="form-group">
										<span class="label label-danger label-form" style="font-size: 12px;margin-bottom: 5px;">Username</span>
										<div class="input-group">
											<span class="input-group-addon add-on">
												<span class="glyphicon glyphicon-user"></span>
											</span>
											<input type="text" name="edit_username" class="form-control" placeholder = "Nhập vào username...">
										</div>
									</div>
									<div class="form-group">
										<span class="label label-danger label-form" style="font-size: 12px;margin-bottom: 5px;">Email</span>
										<div class="input-group">
											<span class="input-group-addon add-on">
												@
											</span>
											<input type="email" name="edit_email" class="form-control" placeholder = "Nhập vào email...">
										</div>
									</div>
									<div class="form-group">
										<span class="label label-danger label-form" style="font-size: 12px;margin-bottom: 5px;">Giới tính</span>
										<div class="input-group">
											<span class="input-group-addon add-on">
												<i class="fa fa-venus-mars" aria-hidden="true"></i>
											</span>
											<select class="form-control" name="edit_gender">
												<option value="Nam">Nam</option>
												<option value="Nữ">Nữ</option>
											</select>
										</div>
									</div>
									<div class="form-group">
										<span class="label label-danger label-form" style="font-size: 12px;margin-bottom: 5px;">Số điện thoại</span>
										<div class="input-group">
											<span class="input-group-addon add-on">
												<span class="glyphicon glyphicon-earphone"></span>
											</span>
											<input type="text" name="edit_phone" class="form-control" placeholder = "Nhập vào số điện thoại...">
										</div>
									</div>
									<div class="form-group">
										<span class="label label-danger label-form" style="font-size: 12px;margin-bottom: 5px;">Ngày sinh</span>
										<div class="input-group">
											<span class="input-group-addon add-on">
												<span class="glyphicon glyphicon-calendar"></span>
											</span>
											<input type="text" id="dp-4" name="edit_birthday" class="form-control datepicker" data-date-format="dd-mm-yyyy" data-date-viewmode="years" placeholder="Nhập vào ngày sinh..." />
										</div>
									</div>
									<div class="form-group">
										<span class="label label-danger label-form" style="font-size: 12px;margin-bottom: 5px;">Trạng thái</span>
										<div class="input-group">
											<span class="input-group-addon add-on">
												<i class="fa fa-flag" aria-hidden="true"></i>
											</span>
											<select class="form-control" name="edit_active">
												<option value="1">Đã kích hoạt</option>
												<option value="0">Chưa kích hoạt</option>
											</select>
										</div>
									</div>
									<div class="form-group">
										<span class="label label-danger label-form" style="font-size: 12px;margin-bottom: 5px;">Chức vụ</span>
										<div class="input-group">
											<span class="input-group-addon add-on">
												<i class="fa fa-bookmark" aria-hidden="true"></i>
											</span>
											<select class="form-control" name="edit_permission">
												<option value="0">Quản trị viên</option>
												<option value="1">Nhân viên</option>
												<option value="2">Nhân viên kho</option>
											</select>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
					<a class="btn btn-primary" data-toggle="modal" href='#user_edit_password'>Cập nhật mật khẩu</a>
					<input type="submit" name="edit_user_button" form="form_edit_user" class="btn btn-primary btn_update" id="edit_user_button" value="Cập nhật">
				</div>
			</div>
		</div>
	</div>

	{{-- MODAL CẬP NHẬT MẬT KHẨU --}}

	<div class="modal fade" id="user_edit_password">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Modal title</h4>
				</div>
				<div class="modal-body">
					<div class="panel-body">
						<form class="form-horizontal" role="form" id="form_edit_user_password" method="POST">
							@csrf
							{{ method_field('PUT') }}
							<div class="form-group">
								<span class="label label-danger label-form" style="font-size: 12px;margin-bottom: 5px;">Mật khẩu</span>
								<div class="input-group">
									<span class="input-group-addon add-on">
										<span class="fa fa-lock"></span>
									</span>
									<input type="password" name="edit_password" class="form-control" placeholder = "Nhập vào mật khẩu">
								</div>
							</div>
							<div class="form-group">
								<span class="label label-danger label-form" style="font-size: 12px;margin-bottom: 5px;">Xác nhận mật khẩu</span>
								<div class="input-group">
									<span class="input-group-addon add-on">
										<span class="fa fa-unlock"></span>
									</span>
									<input type="password" name="edit_password_confirmation" class="form-control" placeholder = "Nhập lại mật khẩu">
								</div>
							</div>
						</form>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
					<button type="submit" form="form_edit_user_password" class="btn btn-primary">Cập nhật mật khẩu</button>
				</div>
			</div>
		</div>
	</div>

	{{-- KẾT THÚC MODAL CẬP NHẬT MẬT KHẨU --}}

	{{-- KẾT THÚC MODAL CẬP NHẬT THÔNG TIN nhân viên --}}

	{{-- MODAL XEM CHI TIẾT THÔNG TIN nhân viên --}}

	<div class="modal fade" id="user_detail">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Thông tin nhân viên</h4>
				</div>
				<div class="modal-body">
					<div class="container-fluid" style="padding: 0px;">
						<div class="col-md-12">
							<div class="messages messages-img">
								<div class="item">
									<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3" style="padding-left: 0px;">
										<div class="image" style="width: 108px;">
											<img id="user_detail_img" style="width:120px;height: 120px;" src="" alt=""/>
										</div>
									</div>
									<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9" style="padding: 0px;">
										<div class="text" style="margin-left: 0px;">
											<div class="heading">
												<a href="#" id="user_detail_name" style="font-size: 20px;"></a>
												<span class="date fa fa-plus-square" style="font-size: 17px;">&nbsp;<span class="date" style="font-size: 17px;" id="user_detail_created_at"></span></span>
											</div>
											<div class="container-fluid" style="padding: 0px;">
												<span class="label label-warning label-form" id="user_detail_email_button"><i class="fa fa-envelope-o" aria-hidden="true"></i> Email</span>
												<h5 id="user_detail_email_base"><a href="" id="user_detail_email"></a></h5>
											</div>
											<div class="container-fluid" style="padding: 0px;">
												<span class="label label-warning label-form"><span class="fa fa-user"></span> Username</span>
												<h5 id="user_detail_username"></h5>
											</div>
											<div class="container-fluid" style="padding: 0px;">
												<span class="label label-warning label-form"><span class="fa fa-phone"></span> Phone Number</span>
												<h5 id="user_detail_phone_number_base"><a href="" id="user_detail_phone_number"></a></h5>
											</div>
											<div class="container-fluid" style="padding: 0px;">
												<span class="label label-warning label-form"><span class="glyphicon glyphicon-calendar"></span> BirthDay</span>
												<h5 id="user_detail_birthday"></h5>
											</div>
											<div class="container-fluid" style="padding: 0px;">
												<span class="label label-warning label-form"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Updated_at</span>
												<h5 id="user_detail_updated_at"></h5>
											</div>
											<div class="container-fluid" style="padding: 0px;">
												<span class="label label-warning label-form"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Permission</span>
												<h5 id="user_detail_permission"></h5>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>

	{{-- KẾT THÚC MODAL XEM CHI TIẾT THÔNG TIN nhân viên --}}


@endsection
@section('footer')
	<!-- THIS PAGE PLUGINS -->
	<script type='text/javascript' src='{{asset('')}}admin_assets/js/plugins/icheck/icheck.min.js'></script>
	<script type="text/javascript" src="{{asset('')}}admin_assets/js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>

	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/dropzone.js"></script>
	<script type="text/javascript" src="{{asset('')}}admin_assets/js/plugins/fileinput/fileinput.min.js"></script>        
	<script type="text/javascript" src="{{asset('')}}admin_assets/js/plugins/filetree/jqueryFileTree.js"></script>

	<script type="text/javascript" src="{{asset('')}}admin_assets/js/plugins/datatables/jquery.dataTables.min.js"></script>    
	<script type="text/javascript" src="{{asset('')}}admin_assets/js/plugins/bootstrap/bootstrap-datepicker.js"></script>
	<script type="text/javascript" src="{{asset('')}}admin_assets/js/plugins/bootstrap/bootstrap-timepicker.min.js"></script>
	<script type="text/javascript" src="{{asset('')}}admin_assets/js/plugins/bootstrap/bootstrap-colorpicker.js"></script>
	<script type="text/javascript" src="{{asset('')}}admin_assets/js/plugins/bootstrap/bootstrap-file-input.js"></script>
	<script type="text/javascript" src="{{asset('')}}admin_assets/js/plugins/bootstrap/bootstrap-select.js"></script>
	<script type="text/javascript" src="{{asset('')}}admin_assets/js/plugins/tagsinput/jquery.tagsinput.min.js"></script>
	<!-- END PAGE PLUGINS -->
	<script type="text/javascript">
		$(document).ready(function() {

			var table = $('#users-table').DataTable({  //Datatable
				processing: true,
				serverSide: true,
				ajax: '{!! route('admin.admins.delete.data') !!}',
				columns: [
					{ data: 'id', name: 'id' },
					{ data: 'name', name: 'name' },
					{ data: 'username', name: 'username' },
					{ data: 'email', name: 'email' },
					{ data: 'phone_number', name: 'phone_number' },
					{ data: 'permission', name: 'permission' },
					{ data: 'action', name: 'action' }
				]
			});

			$('#users-table tbody').on('click', '.btn_detail', function () {

				var url = $(this).data('url');

				$.ajax({
					url: url,
					type: 'GET',
				})
				.done(function(response) {
					console.log("success");

					$('#user_detail_img').attr('alt',response.data.name)
					$('#user_detail_img').attr('src','{{asset('storage')}}/'+response.data.admin_pic)
					$('#user_detail_name').text("  "+response.data.name)
					$('#user_detail_created_at').text(response.data.created_at)
					$('#user_detail_email').text(response.data.email)
					$('#user_detail_email').attr('href','mailto:'+response.data.email)
					$('#user_detail_phone_number').text(response.data.phone_number)
					$('#user_detail_phone_number').attr('href','tel:'+response.data.phone_number)
					$('#user_detail_birthday').text(response.data.birthday)
					$('#user_detail_username').text(response.data.username)
					$('#user_detail_updated_at').text(response.data.updated_at)
					if (response.data.permission == 0) {
						$('#user_detail_permission').text("Quản trị viên")
					}
					if (response.data.permission == 1) {
						$('#user_detail_permission').text("Nhân viên")
					}
					if (response.data.permission == 2) {
						$('#user_detail_permission').text("Nhân viên kho")
					}
				})
				.fail(function() {
					console.log("error");
				})
				.always(function() {
					console.log("complete");
				});

			});

			$('#update_profile_image').hover(function() {
				$(this).find('.btn_file_layout').addClass('update_img_show');
			}, function() {
				$(this).find('.btn_file_layout').removeClass('update_img_show');
			});

			var update_old_url_image = null;

			$('#users-table tbody').on('click', '.btn_edit', function () {

				var url = $(this).data('url');

				var url_update = $(this).attr('data-update');

				var url_update_password = $(this).attr('data-updatepassword');

				$.ajax({
					url: url,
					type: 'GET',
				})
				.done(function(response) {
					console.log("success");
					var data = '{{Auth::guard('admin')->user()->username}}';
					console.log(data);
					$('input[name="edit_name"]').val(response.data.name)
					$('img#edit_user_thumbnail').attr('src', '{{asset('storage')}}/'+response.data.admin_pic);
					$('input[name="edit_username"]').val(response.data.username)
					$('input[name="edit_email"]').val(response.data.email)
					$('select[name="edit_gender"]').val(response.data.gender)
					$('select[name="edit_active"]').val(response.data.active)
					$('input[name="edit_phone"]').val(response.data.phone_number)
					$('input[name="edit_birthday"]').val(response.data.birthday)
					if (data == response.data.username) {
						$('select[name="edit_permission"]').parents('div.form-group').hide()
					} else {
						$('select[name="edit_permission"]').parents('div.form-group').show()
						$('select[name="edit_permission"]').val(response.data.permission)
					}
					$('form#form_edit_user').attr('data-update',url_update)
					$('form#form_edit_user_password').attr('data-updatepassword',url_update_password)

					update_old_url_image = '{{asset('storage')}}/'+response.data.admin_pic;

					$('#edit_user_file_input').change(function(event) {
						var input = this;
						var url = $(this).val();
						var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
						if (input.files && input.files[0]&& (ext == "png" || ext == "jpeg" || ext == "jpg")) 
						{
							var reader = new FileReader();

							reader.onload = function (e) {
								$('img#edit_user_thumbnail').attr('src', e.target.result);
							}
							reader.readAsDataURL(input.files[0]);
						}
						else
						{
							$('img#edit_user_thumbnail').attr('src', '{{asset('storage')}}/'+response.data.admin_pic);
						}
					});
				})
				.fail(function() {
					console.log("error");
				})
				.always(function() {
					console.log("complete");
				});
				
			});

			$('#edit_user_file_input').change(function(event) {
				var input_file = $(this)
				if ($(this).has('value') != null) {
					$(this).parents('#update_profile_image').find('.btn-file-trash').addClass('update_btn_trash_show');
				}
				$('.btn-file-trash').click(function(){
					$(this).parent('#update_profile_image').find('img#edit_user_thumbnail').attr('src',update_old_url_image)
					input_file.replaceWith(input_file.val('').clone(true))
					$(this).removeClass('update_btn_trash_show')
				})
			});

			$('#form_edit_user').submit(function(event) {
				event.preventDefault();

				var url = $(this).attr('data-update');

				var formData = new FormData(this);
				// data.append('file', file)

				console.log(formData)

				$.ajax({
					url: url,
					type: 'POST',
					data: formData,
					processData: false,
					contentType: false,
				})
				.done(function(response) {
					console.log("success");
					if (response.error) {
						Command: toastr["warning"](response.error),

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
					}
					else if (response.image_upload_error) {
						Command: toastr["warning"](response.image_upload_error),

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
					}
					else if (response.errors) {
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
						if (response.errors.edit_name) {
							$('input[name="edit_name"]').parent('div.input-group').addClass('has-error has-feedback')
							$('input[name="edit_name"]').parent('div.input-group').removeClass('has-success')
							$('input[name="edit_name"]').parent('div.input-group').append('<span class="glyphicon glyphicon-remove form-control-feedback" style="left:91%;top:-2px;"></span>')
							$('input[name="edit_name"]').parent('div.input-group').find('span.glyphicon-ok').remove()
						}else {
							$('input[name="edit_name"]').parent('div.input-group').removeClass('has-error')
							$('input[name="edit_name"]').parent('div.input-group').addClass('has-success')
							$('input[name="edit_name"]').parent('div.input-group').find('span.glyphicon-remove').remove()
							$('input[name="edit_name"]').parent('div.input-group').append('<span class="glyphicon glyphicon-ok form-control-feedback" style="left:91%;top:-2px;"></span>')
						}
						if (response.errors.edit_username) {
							$('input[name="edit_username"]').parent('div.input-group').addClass('has-error')
							$('input[name="edit_username"]').parent('div.input-group').removeClass('has-success')
							$('input[name="edit_username"]').parent('div.input-group').append('<span class="glyphicon glyphicon-remove form-control-feedback" style="left:91%;top:-2px;"></span>')
							$('input[name="edit_username"]').parent('div.input-group').find('span.glyphicon-ok').remove()
						}else {
							$('input[name="edit_username"]').parent('div.input-group').removeClass('has-error')
							$('input[name="edit_username"]').parent('div.input-group').addClass('has-success')
							$('input[name="edit_username"]').parent('div.input-group').find('span.glyphicon-remove').remove()
							$('input[name="edit_username"]').parent('div.input-group').append('<span class="glyphicon glyphicon-ok form-control-feedback" style="left:91%;top:-2px;"></span>')
						}
						if (response.errors.edit_email) {
							$('input[name="edit_email"]').parent('div.input-group').addClass('has-error')
							$('input[name="edit_email"]').parent('div.input-group').removeClass('has-success')
							$('input[name="edit_email"]').parent('div.input-group').append('<span class="glyphicon glyphicon-remove form-control-feedback" style="left:91%;top:-2px;"></span>')
							$('input[name="edit_email"]').parent('div.input-group').find('span.glyphicon-ok').remove()
						}else {
							$('input[name="edit_email"]').parent('div.input-group').removeClass('has-error')
							$('input[name="edit_email"]').parent('div.input-group').addClass('has-success')
							$('input[name="edit_email"]').parent('div.input-group').find('span.glyphicon-remove').remove()
							$('input[name="edit_email"]').parent('div.input-group').append('<span class="glyphicon glyphicon-ok form-control-feedback" style="left:91%;top:-2px;"></span>')
						}
						if (response.errors.edit_gender) {
							$('select[name="edit_gender"]').parent('div.input-group').addClass('has-error')
							$('select[name="edit_gender"]').parent('div.input-group').removeClass('has-success')
							$('select[name="edit_gender"]').parent('div.input-group').append('<span class="glyphicon glyphicon-remove form-control-feedback" style="left:91%;top:-2px;"></span>')
							$('select[name="edit_gender"]').parent('div.input-group').find('span.glyphicon-ok').remove()
						}else {
							$('select[name="edit_gender"]').parent('div.input-group').removeClass('has-error')
							$('select[name="edit_gender"]').parent('div.input-group').addClass('has-success')
							$('select[name="edit_gender"]').parent('div.input-group').find('span.glyphicon-remove').remove()
							$('select[name="edit_gender"]').parent('div.input-group').append('<span class="glyphicon glyphicon-ok form-control-feedback" style="left:91%;top:-2px;"></span>')
						}
						if (response.errors.edit_phone) {
							$('input[name="edit_phone"]').parent('div.input-group').addClass('has-error')
							$('input[name="edit_phone"]').parent('div.input-group').removeClass('has-success')
							$('input[name="edit_phone"]').parent('div.input-group').append('<span class="glyphicon glyphicon-remove form-control-feedback" style="left:91%;top:-2px;"></span>')
							$('input[name="edit_phone"]').parent('div.input-group').find('span.glyphicon-ok').remove()
						}else {
							$('input[name="edit_phone"]').parent('div.input-group').removeClass('has-error')
							$('input[name="edit_phone"]').parent('div.input-group').addClass('has-success')
							$('input[name="edit_phone"]').parent('div.input-group').find('span.glyphicon-remove').remove()
							$('input[name="edit_phone"]').parent('div.input-group').append('<span class="glyphicon glyphicon-ok form-control-feedback" style="left:91%;top:-2px;"></span>')
						}
						if (response.errors.edit_birthday) {
							$('input[name="edit_birthday"]').parent('div.input-group').addClass('has-error')
							$('input[name="edit_birthday"]').parent('div.input-group').removeClass('has-success')
							$('input[name="edit_birthday"]').parent('div.input-group').append('<span class="glyphicon glyphicon-remove form-control-feedback" style="left:91%;top:-2px;"></span>')
							$('input[name="edit_birthday"]').parent('div.input-group').find('span.glyphicon-ok').remove()
						}else {
							$('input[name="edit_birthday"]').parent('div.input-group').removeClass('has-error')
							$('input[name="edit_birthday"]').parent('div.input-group').addClass('has-success')
							$('input[name="edit_birthday"]').parent('div.input-group').find('span.glyphicon-remove').remove()
							$('input[name="edit_birthday"]').parent('div.input-group').append('<span class="glyphicon glyphicon-ok form-control-feedback" style="left:91%;top:-2px;"></span>')
						}
						if (response.errors.edit_active) {
							$('select[name="edit_active"]').parent('div.input-group').addClass('has-error')
							$('select[name="edit_active"]').parent('div.input-group').removeClass('has-success')
							$('select[name="edit_active"]').parent('div.input-group').append('<span class="glyphicon glyphicon-remove form-control-feedback" style="left:91%;top:-2px;"></span>')
							$('select[name="edit_active"]').parent('div.input-group').find('span.glyphicon-ok').remove()
						}else {
							$('select[name="edit_active"]').parent('div.input-group').removeClass('has-error')
							$('select[name="edit_active"]').parent('div.input-group').addClass('has-success')
							$('select[name="edit_active"]').parent('div.input-group').find('span.glyphicon-remove').remove()
							$('select[name="edit_active"]').parent('div.input-group').append('<span class="glyphicon glyphicon-ok form-control-feedback" style="left:91%;top:-2px;"></span>')
						}
						if (response.errors.edit_permission) {
							$('select[name="edit_permission"]').parent('div.input-group').addClass('has-error')
							$('select[name="edit_permission"]').parent('div.input-group').removeClass('has-success')
							$('select[name="edit_permission"]').parent('div.input-group').append('<span class="glyphicon glyphicon-remove form-control-feedback" style="left:91%;top:-2px;"></span>')
							$('select[name="edit_permission"]').parent('div.input-group').find('span.glyphicon-ok').remove()
						}else {
							$('select[name="edit_permission"]').parent('div.input-group').removeClass('has-error')
							$('select[name="edit_permission"]').parent('div.input-group').addClass('has-success')
							$('select[name="edit_permission"]').parent('div.input-group').find('span.glyphicon-remove').remove()
							$('select[name="edit_permission"]').parent('div.input-group').append('<span class="glyphicon glyphicon-ok form-control-feedback" style="left:91%;top:-2px;"></span>')
						}
					}
					else if (response.update_success) {
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

						$('#user_edit').modal('hide');
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

			$('#form_edit_user_password').submit(function(event) {
				event.preventDefault();

				var url = $(this).attr('data-updatepassword');
				// var file = $(this).find('input[name="edit_user_pic"]')[0].files[0]

				// data.append('file', file)

				$.ajax({
					url: url,
					type: 'PUT',
					data: $(this).serialize(),
				})
				.done(function(response) {
					console.log("success");
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
						if (response.errors.edit_password) {
							$('input[name="edit_password"]').parent('div.input-group').addClass('has-error')
							$('input[name="edit_password"]').parent('div.input-group').removeClass('has-success')
							$('input[name="edit_password"]').parent('div.input-group').append('<span class="glyphicon glyphicon-remove form-control-feedback" style="left:91%;top:-2px;"></span>')
							$('input[name="edit_password"]').parent('div.input-group').find('span.glyphicon-ok').remove()
						}else {
							$('input[name="edit_password"]').parent('div.input-group').removeClass('has-error')
							$('input[name="edit_password"]').parent('div.input-group').addClass('has-success')
							$('input[name="edit_password"]').parent('div.input-group').find('span.glyphicon-remove').remove()
							$('input[name="edit_password"]').parent('div.input-group').append('<span class="glyphicon glyphicon-ok form-control-feedback" style="left:91%;top:-2px;"></span>')
						}
						if (response.errors.edit_password_confirmation) {
							$('input[name="edit_password_confirmation"]').parent('div.input-group').addClass('has-error')
							$('input[name="edit_password_confirmation"]').parent('div.input-group').removeClass('has-success')
							$('input[name="edit_password_confirmation"]').parent('div.input-group').append('<span class="glyphicon glyphicon-remove form-control-feedback" style="left:91%;top:-2px;"></span>')
							$('input[name="edit_password_confirmation"]').parent('div.input-group').find('span.glyphicon-ok').remove()
						}else if (!response.errors.edit_password_confirmation) {
							$('input[name="edit_password_confirmation"]').parent('div.input-group').removeClass('has-error')
							$('input[name="edit_password_confirmation"]').parent('div.input-group').addClass('has-success')
							$('input[name="edit_password_confirmation"]').parent('div.input-group').find('span.glyphicon-remove').remove()
							$('input[name="edit_password_confirmation"]').parent('div.input-group').append('<span class="glyphicon glyphicon-ok form-control-feedback" style="left:91%;top:-2px;"></span>')
						}
					} else {
						if (response.update_error) {
							Command: toastr["warning"](response.update_error),

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
						}
					}
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
						$('#user_edit_password').modal('hide');
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

			$('#users-table tbody').on('click', '.btn_upback', function(event) {
				event.preventDefault();

				var url = $(this).data('url');

				Swal({
					title: 'Bạn có chắc là muốn khôi phục?',
					text: "Bạn chắc là muốn khôi phục nhân viên này chứ!",
					type: 'warning',
					showCancelButton: true,
					confirmButtonColor: '#3085d6',
					cancelButtonColor: '#d33',
					cancelButtonText: 'Không khôi phục!',
					confirmButtonText: 'Khôi phục!'
				}).then((result) => {
					if (result.value) {
						Swal(
							'Khôi phục nhân viên thành công!',
							'nhân viên sẽ được chuyển vào phần nhân viên đã được kích hoạt',
							'success'
							)
						$('button.swal2-confirm').on('click', function(event) {
							$.ajax({
								url: url,
								type: 'PUT',
							})
							.done(function(response) {
								if (response.upback_success) {
									Command: toastr["warning"](""+response.upback_success+""),

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

									table.ajax.reload();
								}
								if (response.upback_error) {
									Command: toastr["warning"](""+response.upback_error+""),

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
								}
							})
							.fail(function() {
								console.log("error");
							})
							.always(function() {
								console.log('complete')
							});
							
						});
					}
				})
				
			});

			$('#users-table tbody').on('click', '.btn_delete', function(event) {
				event.preventDefault();

				var url = $(this).data('url');

				Swal({
					title: 'Bạn có chắc là muốn xóa hẳn chứ?',
					text: "Bạn chắc là muốn xóa hoàn toàn nhân viên này chứ!",
					type: 'warning',
					showCancelButton: true,
					confirmButtonColor: '#3085d6',
					cancelButtonColor: '#d33',
					cancelButtonText: 'Không xóa!',
					confirmButtonText: 'Xóa!'
				}).then((result) => {
					if (result.value) {
						Swal(
							'Xóa nhân viên thành công!',
							'Thông tin của nhân viên đã bị xóa hẳn khỏi hệ thống',
							'success'
							)
						$('button.swal2-confirm').on('click', function(event) {
							$.ajax({
								url: url,
								type: 'delete',
							})
							.done(function(response) {
								if (response.delete_success) {
									Command: toastr["warning"](""+response.delete_success+""),

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

									table.ajax.reload();
								}
								if (response.delete_error) {
									Command: toastr["warning"](""+response.delete_error+""),

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
								}
							})
							.fail(function() {
								console.log("error");
							})
							.always(function() {
								console.log('complete')
							});
							
						});
					}
				})

			});
		});
	</script>

@endsection



					{{-- //Get the text using the value of select
					var text = $('select[name="edit_active"] option[value="'+response.data.active+'"]').text();
					//We need to show the text inside the span that the plugin show
					$('.bootstrap-select .filter-option').text(text);
					//Check the selected attribute for the real select
					$('select[name="edit_active"]').val(response.data.active); --}}