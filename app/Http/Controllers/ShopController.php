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

class ShopController extends Controller
{
    public function index() {
    	$products = Product::with('category','product_images','product_resolutions')->orderBy('id', "Desc")->paginate(6);
    	$product_lasts = Product::with('category','product_images','product_resolutions')->orderBy('id', "Desc")->limit(3)->get();
    	return view('shop.index', compact('products','product_lasts'));
    }

    public function productDetail($slug) {
    	$product = Product::where('slug',$slug)->firstOrFail()->load('tags','category','product_resolutions','product_images');
    	return view('shop.detail', compact('product'));
    }

    public function productResolutionDetail($id) {
    	$product_resolution = ProductResolution::find($id);
    	$price = number_format($product_resolution["price"]);
    	$sale_price = number_format($product_resolution["sale_price"]);
    	return response()->json([
    		'product_resolution' => $product_resolution,
    		'price' => $price,
    		'sale_price' => $sale_price,
    	]);
    }
}
