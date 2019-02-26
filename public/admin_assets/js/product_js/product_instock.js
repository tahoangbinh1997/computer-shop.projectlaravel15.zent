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
	$('.kv-fileinput-upload').remove();
	$('input[name="resolution[0][import_price]"]').mask('000.000.000.000.000 VNĐ', {reverse: true});
	$('input[name="resolution[0][price]"]').mask('000.000.000.000.000 VNĐ', {reverse: true});
	$('input[name="resolution[0][sale_price]"]').mask('000.000.000.000.000 VNĐ', {reverse: true});
	$('input[name="resolution[0][stock]"]').mask('000.000.000.000.000 cái', {reverse: true});
});

var rowNum = 0;
var resolution_check = [];
function addRow(frm) {
	if (rowNum >= 4) {
		return false;
	}
	jQuery('#product_stock_add_'+rowNum).hide();
	jQuery('#product_stock_remove_'+rowNum).hide();
	resolution_check[resolution_check.length] = jQuery('#select_'+rowNum+' option:selected').val();
	rowNum++;
	var row = '<div class="row" style="margin-bottom: 5px;" id="rowNum'+rowNum+'"><div class="col-md-2 response-notice"><select id="select_'+rowNum+'" name="resolution['+rowNum+'][resolution_id]" class="form-control"><option value="1">1366 x 768</option><option value="2">1920 x 1080</option><option value="3">2560 x 1440</option><option value="4">3840 x 2160</option><option value="5">4096 x 2160</option></select><p  class="product_add_errors_text" style="color: red;"></p><span class="glyphicon glyphicon-ok form-control-feedback" style="left:75.5%;top:-2px;"></span><span class="glyphicon glyphicon-remove form-control-feedback" style="left:75.5%;top:-2px;"></span></div><div class="col-md-2 response-notice"><input type="text" name="resolution['+rowNum+'][import_price]" class="form-control" placeholder="Giá nhập khẩu"><p  class="product_add_errors_text" style="color: red;"></p><span class="glyphicon glyphicon-ok form-control-feedback" style="left:75.5%;top:-2px;"></span><span class="glyphicon glyphicon-remove form-control-feedback" style="left:75.5%;top:-2px;"></span></div><div class="col-md-2 response-notice"><input type="text" name="resolution['+rowNum+'][price]" class="form-control" placeholder="Giá bán"><p  class="product_add_errors_text" style="color: red;"></p><span class="glyphicon glyphicon-ok form-control-feedback" style="left:75.5%;top:-2px;"></span><span class="glyphicon glyphicon-remove form-control-feedback" style="left:75.5%;top:-2px;"></span></div><div class="col-md-2 response-notice"><input type="text" name="resolution['+rowNum+'][sale_price]" class="form-control" placeholder="Giá sale"><p  class="product_add_errors_text" style="color: red;"></p><span class="glyphicon glyphicon-ok form-control-feedback" style="left:75.5%;top:-2px;"></span><span class="glyphicon glyphicon-remove form-control-feedback" style="left:75.5%;top:-2px;"></span></div><div class="col-md-2 response-notice"><input type="text" name="resolution['+rowNum+'][stock]" class="form-control" placeholder="Số lượng"><p  class="product_add_errors_text" style="color: red;"></p><span class="glyphicon glyphicon-ok form-control-feedback" style="left:75.5%;top:-2px;"></span><span class="glyphicon glyphicon-remove form-control-feedback" style="left:75.5%;top:-2px;"></span></div><div class="col-md-2"><button type="button" class="btn btn-primary" style="margin-right: 5px;" id="product_stock_add_'+rowNum+'" onclick="addRow(this.form);"">Add</button><button type="button" class="btn btn-primary" id="product_stock_remove_'+rowNum+'" onclick="removeRow('+rowNum+');"">Remove</button></div></div>';
	jQuery('#product_attribute_base').append(row);
	jQuery('input[name="resolution['+rowNum+'][import_price]"]').mask('000.000.000.000.000 VNĐ', {reverse: true});
	jQuery('input[name="resolution['+rowNum+'][price]"]').mask('000.000.000.000.000 VNĐ', {reverse: true});
	jQuery('input[name="resolution['+rowNum+'][sale_price]"]').mask('000.000.000.000.000 VNĐ', {reverse: true});
	jQuery('input[name="resolution['+rowNum+'][stock]"]').mask('000.000.000.000.000 cái', {reverse: true});
	for (var i = resolution_check.length - 1; i >= 0; i--) {
		jQuery('#select_'+rowNum).find('option[value="'+resolution_check[i]+'"]').remove();
	}
	if (rowNum == 4) {
		jQuery('#product_stock_add_'+rowNum).hide();
	}
}

function removeRow(rnum) {
	add_button = rnum - 1;
	jQuery('#rowNum'+rnum).remove();
	jQuery('#product_stock_add_'+add_button).show();
	jQuery('#product_stock_remove_'+add_button).show();
	rowNum = rnum - 1;
	resolution_check.length = rowNum;
}


