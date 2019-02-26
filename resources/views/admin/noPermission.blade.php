@extends('layouts.admin-temp')

@section('content')
<!-- START BREADCRUMB -->
<ul class="breadcrumb">
    <li><a href="{{asset('')}}admin/home">Home</a></li>                    
    <li class="active">404 Not Found</li>
</ul>
<!-- END BREADCRUMB -->                       

<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">

    <!-- START WIDGETS -->                    
    <div class="row">
    	<div class="col-md-12">

    		<div class="error-container">
    			<div class="error-code">404</div>
    			<div class="error-text">Không tìm thấy trang</div>
    			<div class="error-subtext">Có thể trang web này không tồn tại hoặc bạn không đủ thẩm quyền để truy cập vào đây.</div>
    			<div class="error-actions">                                
    				<div class="row">
    					<div class="col-md-6">
    						<button class="btn btn-info btn-block btn-lg" onClick="document.location.href = '{{asset('')}}/admin/home';">Back to dashboard</button>
    					</div>
    					<div class="col-md-6">
    						<button class="btn btn-primary btn-block btn-lg" onClick="history.back();">Previous page</button>
    					</div>
    				</div>                                
    			</div>
    			<div class="error-subtext">Or you can use search to find anything you need.</div>
    			<div class="row">
    				<div class="col-md-12">
    					<div class="input-group">
    						<input type="text" placeholder="Search..." class="form-control"/>
    						<div class="input-group-btn">
    							<button class="btn btn-primary"><span class="fa fa-search"></span></button>
    						</div>
    					</div>
    				</div>
    			</div>
    		</div>

    	</div>
    </div>

</div>
<!-- END PAGE CONTENT WRAPPER -->                                
@endsection

@section('footer')
    <!-- START THIS PAGE PLUGINS-->        
    <script type='text/javascript' src='{{asset('')}}admin_assets/js/plugins/icheck/icheck.min.js'></script>        
    <script type="text/javascript" src="{{asset('')}}admin_assets/js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>
    <!-- END THIS PAGE PLUGINS-->        

    
@endsection