<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Validator;
use Illuminate\Validation\Rule;
use App\Models\Admin;
use App\Models\Category;
use App\Models\PostTag;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductResolution;
use App\Models\Resolution;
use App\Models\Tag;
use App\Models\User;
use Auth;
use Cart;

class CartController extends Controller
{

    public function productCart() {
    	return view('shop.cart');
    }

    public function productAdd2Cart($id, Request $request) {
    	$product_resolution = ProductResolution::find($request->resolution_id);
    	$product = Product::find($id);
    	if ($product_resolution->stock == 0) {
    		return response()->json([
    			'cart_failed' => 'Sản phẩm đã hết hàng không thể mua!'
    		]);
    	} else {
    		if (!Auth::guard('web')->check()) {
    			return response()->json([
    				'cart_failed' => 'Bạn cần phải đăng nhập trước khi mua hàng!'
    			]);
    		} else {
    			if (!isset($request->stock)) {
                    $cartall = Cart::content();
    				$cartsearch = $cartall->search(function($cartItem, $rowId) use($request, $product) {
    					return $cartItem->options->product_code === $product->product_code && $cartItem->options->resolution_id === $request->resolution_id;
    				});
    				if (empty($cartsearch)) {
    					Cart::add(['id' => $product->id, 'name' => $product->name, 'qty' => 1, 'price' => $product_resolution->price, 'options' => ['resolution_id' => $request->resolution_id, 'product_code' => $product->product_code]]);
    				} else {
                        dd("Hello");
                    }
    			}
    		}
    	}
    }
}
