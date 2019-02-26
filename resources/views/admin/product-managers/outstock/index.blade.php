@extends('layouts.admin-temp')

@section('products')
	active
@endsection

@section('products-outstock')
	active
@endsection

@section('header')
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/css/bootstrap-select.min.css">
	<style type="text/css">
		button#product-detail,
		button#product-edit {
			padding: 2px 6px!important;
		}

		button#product-resolution-edit,
		button#product-image-edit {
			padding: 3px 6px !important;
		}
		#product-detail>i,
		#product-edit>i,
		#product-resolution-edit>i,
		#product-image-edit>i {
			height: 20px!important;
			display: inline-flex!important;
			justify-content: center!important;
			align-items: center!important;
			margin-right: 0px!important;
			font-size: 13px!important;
		}
		#product-edit>i,
		#product-image-edit>i {
			left: 1px!important;
		}
		#product-resolution-edit>i {
			position: relative;
			left: 1px!important;
			top: 1px!important;
		}
		.modal-lg {
			width: 95%;
		}
		.resolution_fake_table_header,
		.resolution_fake_table_footer {
			font-size: 12px;
			font-weight: bold;
			background-color: #f1f5f9;
			color: #56688A;
			padding: 8px!important;
		}
		.resolution_fake_table_body {
			font-size: 12px;
			height: inherit;
			color: #56688A;
			padding: 8px!important;
		}
	</style>
@endsection

@section('content')
	<!-- START BREADCRUMB -->
	<ul class="breadcrumb">
		<li><a href="{{route('admin.home')}}">Home</a></li>
		<li class="active">Sản phẩm còn trong kho</li>
	</ul>

	<!-- END BREADCRUMB -->
	<!-- PAGE TITLE -->
	<div class="page-title">                    
		<h2><span class="fa fa-arrow-circle-o-left"></span> Danh sách sản phẩm</h2>
		<a class="btn btn-primary" data-toggle="modal" href='#product_add' style="float: right;">Thêm mới sản phẩm</a>
	</div>
	<!-- END PAGE TITLE -->                
	<!-- PAGE CONTENT WRAPPER -->
	<div class="page-content-wrap">                

		<div class="row">
			<div class="col-md-12">

				<!-- START DEFAULT DATATABLE -->
				<div class="panel panel-default">
					<div class="panel-heading">                                
						<h3 class="panel-title">Danh sách sản phẩm</h3>
						<ul class="panel-controls">
							<li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
							<li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
							<li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
						</ul>                                
					</div>
					<div class="panel-body">
						<table class="table datatable" id="products_table">
							<thead>
								<tr>
									<th>Id</th>
									<th>Name</th>
									<th>Product_Code</th>
									<th>Model</th>
									<th>Thumbnail</th>
									<th>Action</th>
								</tr>
							</thead>
							<tfoot>
								<tr>
									<th>Id</th>
									<th>Name</th>
									<th>Product_Code</th>
									<th>Model</th>
									<th>Thumbnail</th>
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
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/js/bootstrap-select.min.js"></script>
	<script type="text/javascript" src="{{asset('')}}admin_assets/js/plugins/tagsinput/jquery.tagsinput.min.js"></script>
	<script type="text/javascript" src="{{asset('')}}admin_assets/js/plugins/jquery-validation/jquery.validate.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>
	<script type="text/javascript" src="{{asset('')}}admin_assets/js/plugins/maskedinput/jquery.mask.min.js"></script>
	<script src="https://cdn.ckeditor.com/4.11.1/standard/ckeditor.js"></script>
	<script type="text/javascript">
		var table = $('#products_table').DataTable({  //Datatable
			processing: true,
			serverSide: true,
			order: [[ 0, "desc" ]],
			ajax: '{!! route('admin.product.outstock.data') !!}',
			columns: [
			{ data: 'id', name: 'id' },
			{ data: 'name', name: 'name' },
			{ data: 'product_code', name: 'product_code' },
			{ data: 'model', name: 'model' },
			{ data: 'thumbnail', name: 'thumbnail' },
			{ data: 'action', name: 'action' }
			]
		});
	</script>
	@include('admin.product-managers.outstock.edit')
	<!-- END PAGE PLUGINS -->

@endsection