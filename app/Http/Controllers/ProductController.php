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

class ProductController extends Controller
{
    /**
     * Displays datatables front end view
     *
     * @return \Illuminate\View\View
     */
	public function index() {
		return view('admin.product-managers.instock.index');
	}

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getProductData() {
    	$product_instocks = Product::with('product_resolutions')->get();
        foreach ($product_instocks as $key => $value) {
            foreach ($value->product_resolutions as $resolution_key => $resolution_value) {
                if ($value->product_resolutions[$resolution_key]["stock"] == 0) {
                    $product_instocks->forget($key); //xóa phần từ cha có quan hệ con có trường ["stock"] = 0 đi
                }
            }
        }
    	return Datatables::of($product_instocks)
    	->addColumn('action', function ($product) {
    		if (Auth::guard('admin')->user()->permission == 0 || Auth::guard('admin')->user()->permission == 2) {
                return 
                '<a href="#product_detail" class="btn_detail" data-url="'.route('admin.product.instock.detail',$product->id).'" style="margin-right: 5px;" data-toggle="modal" title="Detail"><button class="btn btn-warning" id="product-detail" title="Detail" data-toggle="tooltip"><i class="glyphicon glyphicon-eye-open"></i></button></a>
                <a href="#product_edit" class="btn_edit" style="margin-right: 5px;" data-url="'.route('admin.product.instock.edit',$product->id).'" data-update="'.route('admin.product.instock.update',$product->id).'" data-toggle="modal" title="Edit"><button class="btn btn-info" id="product-edit" title="Edit" data-toggle="tooltip"><i class="glyphicon glyphicon-edit"></i></button></a>
                <a href="#product_resolution_edit" class="btn_resolution_edit" style="margin-right: 5px;" data-url="'.route('admin.product.instock.resolutionedit',$product->id).'" data-update="'.route('admin.product.instock.resolutionupdate',$product->id).'" data-toggle="modal" title="Resolution_Edit"><button class="btn btn-success" id="product-resolution-edit" title="Resolution_Edit" data-toggle="tooltip"><i class="fa fa-window-restore"></i></button></a>
                <a href="#product_image_edit" class="btn_image_edit" style="margin-right: 5px;" data-url="'.route('admin.product.instock.productimageedit',$product->id).'" data-update="'.route('admin.product.instock.dbproductimageupdate',$product->id).'" data-image-update="'.route('admin.product.instock.productimageupdate',$product->id).'" data-toggle="modal" title="Image_Edit"><button class="btn btn-outline-primary" id="product-image-edit" title="Image_Edit" data-toggle="tooltip"><i class="fa fa-picture-o" aria-hidden="true"></i></button></a>';
            } else {
                return 
                '<a href="#product_detail" class="btn_detail" data-url="'.route('admin.product.instock.detail',$product->id).'" style="margin-right: 5px;" data-toggle="modal" title="Detail"><button class="btn btn-warning" id="product-detail" title="Detail" data-toggle="tooltip"><i class="glyphicon glyphicon-eye-open"></i></button></a>
                <a href="#product_edit" class="btn_edit" style="margin-right: 5px;" data-url="'.route('admin.product.instock.edit',$product->id).'" data-update="'.route('admin.product.instock.update',$product->id).'" data-toggle="modal" title="Edit"><button class="btn btn-info" id="product-edit" title="Edit" data-toggle="tooltip"><i class="glyphicon glyphicon-edit"></i></button></a>
                <a href="#product_image_edit" class="btn_image_edit" style="margin-right: 5px;" data-url="'.route('admin.product.instock.productimageedit',$product->id).'" data-update="'.route('admin.product.instock.dbproductimageupdate',$product->id).'" data-image-update="'.route('admin.product.instock.productimageupdate',$product->id).'" data-toggle="modal" title="Image_Edit"><button class="btn btn-outline-primary" id="product-image-edit" title="Image_Edit" data-toggle="tooltip"><i class="fa fa-picture-o" aria-hidden="true"></i></button></a>';
            }
    	})
    	->editColumn('thumbnail', function(Product $product){
            return '<img style="width: 100px;height: 100px;" src="http://computer-shop.projectlaravel15.zent/storage/'.$product->thumbnail.'"/>';
        })
        ->rawColumns(['thumbnail','action'])
    	->toJson();
    }

    public function productAdd() {
        $categories = Category::get();
        $resolutions = Resolution::get();
        return response()->json([
            'categories' => $categories,
            'resolutions' => $resolutions,
        ]);
    }

    public function productDetail($id) {
        $product = Product::find($id)->load('product_resolutions','tags','category','product_images');
        return response()->json([
            'product' => $product,
        ]);
    }

    public function productEdit($id) {
    	$product = Product::find($id)->load('tags');
        return response()->json([
            'product' => $product,
        ]);
    }

    public function productStore(Request $request) {
    	$validate = Validator::make(
    		$request->all(),
    		[
    			'content' => 'required|min:16|max:800',
    			'name' => 'required|min:8|max:255',
    			'description' => 'required|min:8|max:800',
    			'thumbnail' => 'required|image|mimes:jpeg,jpg,png',
    			'category_check_lap' => 'required|numeric',
    			'tags' => 'required|array|between:1,7',
    			'cpu' => 'required',
    			'operation_system' => 'required',
    			'ram' => 'required',
    			'monitor' => 'required',
    			'hdd' => 'required',
    			'card_audio' => 'required',
    			'card_video' => 'required',
    			'webcam' => 'required',
    			'card_reader' => 'required',
    			'communications' => 'required',
    			'bluetooth' => 'required',
    			'port' => 'required',
    			'pin' => 'required',
    			'weight' => 'required',
    			'resolution.*.resolution_id' => [
    				'required',
    				Rule::in([1, 2, 3, 4, 5]),
    			],
    			'resolution.*.import_price' => [
    				'required',
    				'numeric',
    			],
    			'resolution.*.price' => [
    				'required',
    				'numeric',
    			],
    			'resolution.*.sale_price' => [
                    'nullable',
    				'numeric',
    			],
    			'resolution.*.stock' => [
    				'required',
    				'numeric',
    			],
    			'product_image' => 'required|min:2|max:5',
    			'product_image.*' => 'image'
    		],

    		[
    			'unique' => ':attribute không được trùng với dữ liệu trong database',
    			'required' => ':attribute không được để trống',
    			'image' => ':attribute phải là ảnh',
    			'mines' => ':attribute chỉ chọn được ảnh có đuôi .jpeg,.jpg,.png',
    			'min' => ':attribute không được nhỏ hơn :min',
    			'max' => ':attribute không được lớn hơn :max',
    			'between' => ':attribute phải trong khoảng 1 đến 7 tag',
    			'numeric' => ':attribute phải là kiểu số',
    			'required_with' => 'bạn chưa nhập mật khẩu',
    			'same' => ':attribute phải giống với mật khẩu',
    			'in' => 'Bạn không được thay đổi dữ liệu trong trường :attribute'
    		],

    		[
    			'content' => 'Mô tả sản phẩm',
    			'name' => 'Tên sản phẩm',
    			'description' => 'Sơ lược sản phẩm',
    			'thumbnail' => 'Ảnh sản phẩm',
    			'category_check_lap' => 'Loại sản phẩm',
    			'tags' => 'Thẻ tag',
    			'cpu' => 'CPU',
    			'operation_system' => 'Hệ điều hành',
    			'ram' => 'RAM',
    			'monitor' => 'Màn hình',
    			'hdd' => ' Ổ cứng',
    			'card_audio' => 'Card Audio',
    			'card_video' => 'Card Video',
    			'webcam' => 'Webcam',
    			'card_reader' => 'Card Reader',
    			'communications' => 'Cổng Wifi',
    			'bluetooth' => 'Bluetooth',
    			'port' => 'Cổng port',
    			'pin' => 'Pin',
    			'weight' => 'Cân nặng',
    			'resolution.*.resolution_id' => 'Độ phân giải',
    			'resolution.*.import_price' => 'Giá nhập khẩu',
    			'resolution.*.price' => 'Giá bán',
    			'resolution.*.sale_price' => 'Giá khuyến mãi',
    			'resolution.*.stock' => 'Số lượng',
    			'product_image' => 'Ảnh chi tiết sản phẩm',
    			'product_image.*' => 'Ảnh chi tiết sản phẩm'
    		]
    	);

    	if ($validate->fails()) {
    		if (!isset($request->product_image)) {
    			return response()->json(['errors'=>$validate->messages(),'product_image_stock'=>0]);
    		}else {
    			return response()->json(['errors'=>$validate->messages(),'product_image_stock'=>count($request->product_image)]);
    		}
    	} else {
    		$product_name_split = explode(' ', $request->name);
    		$slug = str_slug($request->name)."_@".rand().rand();
    		$product_code = $product_name_split[count($product_name_split)-1]."-".date("d_m_Y-H:i:s");
    		$model = strtoupper($product_name_split[count($product_name_split)-1]);
    		$thumbnail_path = request()->thumbnail->storeAs('images/product',request()->thumbnail->getClientOriginalName());
    		$create_product = Product::create([
    			'name' => $request->name,
    			'thumbnail' => $thumbnail_path,
    			'product_code' => $product_code,
    			'slug' => $slug,
    			'description' => $request->description,
    			'content' => $request->content,
    			'model' => $model,
    			'operation_system' => $request->operation_system,
    			'cpu' => $request->cpu,
    			'monitor' => $request->monitor,
    			'ram' => $request->ram,
    			'hdd' => $request->hdd,
    			'cd_dvd' => $request->cd_dvd,
    			'card_video' => $request->card_video,
    			'card_audio' => $request->card_audio,
    			'card_reader' => $request->card_reader,
    			'webcam' => $request->webcam,
    			'finger_print' => $request->finger_print,
    			'communications' => $request->communications,
    			'port' => $request->port,
    			'bluetooth' => $request->bluetooth,
    			'pin' => $request->pin,
    			'weight' => $request->weight,
    			'category_id' => $request->category_check_lap,
    			'category_id' => $request->category_check_lap,
    			'admin_creator_id' => Auth::guard('admin')->user()->id,
    			'admin_updated_id' => 0,
    		]);
    		for ($i=0; $i < count($request->tags); $i++) { 
    			$check_tag = Tag::where('name',$request->tags[$i])->first();
    			if ($check_tag != NULL) {
    				PostTag::create([
    					'product_id'=>$create_product->id,
    					'tag_id'=>$check_tag->id,
    				]);
    			} else {
    				$create_tag = Tag::create([
    					'name'=> $request->tags[$i],
    					'slug'=> str_slug($request->tags[$i])."_@".rand(),
    				]);
    				PostTag::create([
    					'product_id'=> $create_product->id,
    					'tag_id'=> $create_tag->id,
    				]);
    			}
    		}
    		for ($i=0; $i < count($request->product_image); $i++) { 
    			$product_image_path = $request->product_image[$i]->storeAs('images/product',request()->product_image[$i]->getClientOriginalName());
    			ProductImage::create([
    				'product_id' => $create_product->id,
    				'product_image' => $product_image_path,
    			]);
    		}
    		for ($i=0; $i < count($request->resolution); $i++) { 
    			ProductResolution::create([
    				'product_id' => $create_product->id,
                    'resolution_id' => $request->resolution[$i]['resolution_id'],
    				'resolution_name' => Resolution::find($request->resolution[$i]['resolution_id'])->resolution_name,
    				'import_price' => $request->resolution[$i]['import_price'],
    				'price' => $request->resolution[$i]['price'],
    				'sale_price' => $request->resolution[$i]['sale_price'],
    				'stock' => $request->resolution[$i]['stock'],
    			]);
    		}
    		return response()->json([
    			'create_success' => 'Thêm mới sản phẩm thành công',
    		]);
    	}
    }

    public function productUpdate($id, Request $request) {
        // dd($request->all());
        if ($request->thumbnail != null) {
            $validate = Validator::make(
                $request->all(),
                [
                    'content' => 'required|min:8|max:800',
                    'name' => [
                        'required',
                        Rule::unique('products')->ignore($id),
                        'min:16',
                        'max:255',
                    ],
                    'description' => 'required|min:8|max:800',
                    'thumbnail' => 'required|image|mimes:jpeg,jpg,png',
                    'category_check_lap' => 'required|numeric',
                    'tags' => 'required|array|between:1,7',
                    'cpu' => 'required',
                    'operation_system' => 'required',
                    'ram' => 'required',
                    'monitor' => 'required',
                    'hdd' => 'required',
                    'card_audio' => 'required',
                    'card_video' => 'required',
                    'webcam' => 'required',
                    'card_reader' => 'required',
                    'communications' => 'required',
                    'bluetooth' => 'required',
                    'port' => 'required',
                    'pin' => 'required',
                    'weight' => 'required'
                ],

                [
                    'unique' => ':attribute không được trùng với dữ liệu trong database',
                    'required' => ':attribute không được để trống',
                    'image' => ':attribute phải là ảnh',
                    'mines' => ':attribute chỉ chọn được ảnh có đuôi .jpeg,.jpg,.png',
                    'min' => ':attribute không được nhỏ hơn :min',
                    'max' => ':attribute không được lớn hơn :max',
                    'between' => ':attribute phải trong khoảng 1 đến 7 tag',
                    'numeric' => ':attribute phải là kiểu số',
                    'required_with' => 'bạn chưa nhập mật khẩu',
                    'same' => ':attribute phải giống với mật khẩu',
                    'in' => 'Bạn không được thay đổi dữ liệu trong trường :attribute'
                ],

                [
                    'content' => 'Mô tả sản phẩm',
                    'name' => 'Tên sản phẩm',
                    'description' => 'Sơ lược sản phẩm',
                    'thumbnail' => 'Ảnh sản phẩm',
                    'category_check_lap' => 'Loại sản phẩm',
                    'tags' => 'Thẻ tag',
                    'cpu' => 'CPU',
                    'operation_system' => 'Hệ điều hành',
                    'ram' => 'RAM',
                    'monitor' => 'Màn hình',
                    'hdd' => ' Ổ cứng',
                    'card_audio' => 'Card Audio',
                    'card_video' => 'Card Video',
                    'webcam' => 'Webcam',
                    'card_reader' => 'Card Reader',
                    'communications' => 'Cổng Wifi',
                    'bluetooth' => 'Bluetooth',
                    'port' => 'Cổng port',
                    'pin' => 'Pin',
                    'weight' => 'Cân nặng'
                ]
            );
        } else {
            $validate = Validator::make(
                $request->all(),
                [
                    'content' => 'required|min:8|max:800',
                    'name' => [
                        'required',
                        Rule::unique('products')->ignore($id),
                        'min:8',
                        'max:255',
                    ],
                    'description' => 'required|min:8|max:800',
                    'category_check_lap' => 'required|numeric',
                    'tags' => 'required|array|between:1,7',
                    'cpu' => 'required',
                    'operation_system' => 'required',
                    'ram' => 'required',
                    'monitor' => 'required',
                    'hdd' => 'required',
                    'card_audio' => 'required',
                    'card_video' => 'required',
                    'webcam' => 'required',
                    'card_reader' => 'required',
                    'communications' => 'required',
                    'bluetooth' => 'required',
                    'port' => 'required',
                    'pin' => 'required',
                    'weight' => 'required'
                ],

                [
                    'unique' => ':attribute không được trùng với dữ liệu trong database',
                    'required' => ':attribute không được để trống',
                    'min' => ':attribute không được nhỏ hơn :min',
                    'max' => ':attribute không được lớn hơn :max',
                    'between' => ':attribute phải trong khoảng 1 đến 7 tag',
                    'numeric' => ':attribute phải là kiểu số',
                    'required_with' => 'bạn chưa nhập mật khẩu',
                    'same' => ':attribute phải giống với mật khẩu',
                    'in' => 'Bạn không được thay đổi dữ liệu trong trường :attribute'
                ],

                [
                    'content' => 'Mô tả sản phẩm',
                    'name' => 'Tên sản phẩm',
                    'description' => 'Sơ lược sản phẩm',
                    'category_check_lap' => 'Loại sản phẩm',
                    'tags' => 'Thẻ tag',
                    'cpu' => 'CPU',
                    'operation_system' => 'Hệ điều hành',
                    'ram' => 'RAM',
                    'monitor' => 'Màn hình',
                    'hdd' => ' Ổ cứng',
                    'card_audio' => 'Card Audio',
                    'card_video' => 'Card Video',
                    'webcam' => 'Webcam',
                    'card_reader' => 'Card Reader',
                    'communications' => 'Cổng Wifi',
                    'bluetooth' => 'Bluetooth',
                    'port' => 'Cổng port',
                    'pin' => 'Pin',
                    'weight' => 'Cân nặng'
                ]
            );
        }

        if ($validate->fails()) {
            return response()->json(['errors'=>$validate->messages()]);
        } else {
            $product_name_split = explode(' ', $request->name);
            $slug = str_slug($request->name)."_@".rand().rand();
            $product_code = $product_name_split[count($product_name_split)-1]."-".date("d_m_Y-H:i:s");
            $model = strtoupper($product_name_split[count($product_name_split)-1]);
            if ($request->thumbnail != null) {
                $thumbnail_path = request()->thumbnail->storeAs('images/product',request()->thumbnail->getClientOriginalName());
                $update_product = Product::find($id)->update([
                    'name' => $request->name,
                    'thumbnail' => $thumbnail_path,
                    'product_code' => $product_code,
                    'slug' => $slug,
                    'description' => $request->description,
                    'content' => $request->content,
                    'price' => $request->resolution[0]['price'],
                    'sale_price' => $request->resolution[0]['sale_price'],
                    'model' => $model,
                    'operation_system' => $request->operation_system,
                    'cpu' => $request->cpu,
                    'monitor' => $request->monitor,
                    'ram' => $request->ram,
                    'hdd' => $request->hdd,
                    'cd_dvd' => $request->cd_dvd,
                    'card_video' => $request->card_video,
                    'card_audio' => $request->card_audio,
                    'card_reader' => $request->card_reader,
                    'webcam' => $request->webcam,
                    'finger_print' => $request->finger_print,
                    'communications' => $request->communications,
                    'port' => $request->port,
                    'bluetooth' => $request->bluetooth,
                    'pin' => $request->pin,
                    'weight' => $request->weight,
                    'category_id' => $request->category_check_lap,
                    'category_id' => $request->category_check_lap,
                    'admin_updated_id' => Auth::guard('admin')->user()->id,
                ]);
            } else {
                $update_product = Product::find($id)->update([
                    'name' => $request->name,
                    'product_code' => $product_code,
                    'slug' => $slug,
                    'description' => $request->description,
                    'content' => $request->content,
                    'model' => $model,
                    'operation_system' => $request->operation_system,
                    'cpu' => $request->cpu,
                    'monitor' => $request->monitor,
                    'ram' => $request->ram,
                    'hdd' => $request->hdd,
                    'cd_dvd' => $request->cd_dvd,
                    'card_video' => $request->card_video,
                    'card_audio' => $request->card_audio,
                    'card_reader' => $request->card_reader,
                    'webcam' => $request->webcam,
                    'finger_print' => $request->finger_print,
                    'communications' => $request->communications,
                    'port' => $request->port,
                    'bluetooth' => $request->bluetooth,
                    'pin' => $request->pin,
                    'weight' => $request->weight,
                    'category_id' => $request->category_check_lap,
                    'category_id' => $request->category_check_lap,
                    'admin_updated_id' => Auth::guard('admin')->user()->id,
                ]);
            }
            $product=Product::find($id)->load('tags');
            if ($request->delete_tags == '') {
                for ($i=0; $i < count($request->tags); $i++) { 
                    $check_tag_old = $product->tags->where('name',$request->tags[$i])->first(); //đoạn này là truy vấn vào biến mảng $product_tags để lấy ra bản ghi nếu như mảng tags truyền lên controller có dữ liệu giống với tên của thẻ tag cũ trong bài product đó
                    if ($check_tag_old == NULL) { // nếu như không giống với tag cũ trong cơ sở dữ liệu
                        $check_tag = Tag::where('name',$request->tags[$i])->first();
                        if ($check_tag == NULL) {
                            $create_tag = Tag::create([
                                'name'=> $request->tags[$i],
                                'slug'=> str_slug($request->tags[$i])
                            ]);
                            PostTag::create([
                                'product_id'=> $id,
                                'tag_id'=> $create_tag->id
                            ]);
                        } else {
                            PostTag::create([
                                'product_id'=> $id,
                                'tag_id'=> $check_tag->id
                            ]);
                        }
                    }
                }
            } else {
                $delete_tags = explode(',', $request->delete_tags);
                for ($i=0; $i < count($delete_tags); $i++) { 
                    $check_tag_delete = $product->tags->where('name',$delete_tags[$i])->first();
                    if ($check_tag_delete != NULL) {
                        PostTag::where([
                            ['product_id','=',$product->id],
                            ['tag_id','=',$check_tag_delete->id]
                        ])->delete();
                    }
                }
                for ($i=0; $i < count($request->tags); $i++) { 
                    $check_tag_old = $product->tags->where('name',$request->tags[$i])->first(); //đoạn này là truy vấn vào biến mảng $product_tags để lấy ra bản ghi nếu như mảng tags truyền lên controller có dữ liệu giống với tên của thẻ tag cũ trong bài product đó
                    if ($check_tag_old == NULL) { // nếu như không giống với tag cũ trong cơ sở dữ liệu
                        $check_tag = Tag::where('name',$request->tags[$i])->first();
                        if ($check_tag == NULL) {
                            $create_tag = Tag::create([
                                'name'=> $request->tags[$i],
                                'slug'=> str_slug($request->tags[$i])
                            ]);
                            PostTag::create([
                                'product_id'=> $id,
                                'tag_id'=> $create_tag->id
                            ]);
                        } else {
                            PostTag::create([
                                'product_id'=> $id,
                                'tag_id'=> $check_tag->id
                            ]);
                        }
                    }
                }
            }
        }

        return response()->json([
            'update_success' => "Cập nhật thông tin sản phẩm thành công",
        ]);
    }

    public function productResolutionEdit($id) {
        $product = Product::find($id)->load('product_resolutions','resolutions');
        $resolutions = Resolution::get();
        return response()->json([
            'product' => $product,
            'resolutions' => $resolutions,
        ]);
    }

    public function productResolutionUpdate($id, Request $request) {
        $validate = Validator::make(
            $request->all(),
            [
                'resolution.*.resolution_id' => [
                    'required',
                    Rule::in([1, 2, 3, 4, 5]),
                ],
                'resolution.*.import_price' => [
                    'required',
                    'numeric',
                ],
                'resolution.*.price' => [
                    'required',
                    'numeric',
                ],
                'resolution.*.sale_price' => [
                    'nullable',
                    'numeric',
                ],
                'resolution.*.stock' => [
                    'required',
                    'numeric',
                ]
            ],

            [
                'required' => ':attribute không được để trống',
                'numeric' => ':attribute phải là kiểu số',
                'in' => 'Không được đổi dữ liệu trong trường :attribute'
            ],

            [
                'resolution.*.resolution_id' => 'Độ phân giải',
                'resolution.*.import_price' => 'Giá nhập khẩu',
                'resolution.*.price' => 'Giá bán',
                'resolution.*.sale_price' => 'Giá khuyến mãi',
                'resolution.*.stock' => 'Số lượng'
            ]
        );

        if ($validate->fails()) {
            return response()->json([
                'errors'=>$validate->messages(),
            ]);
        } else {
            for ($i=0; $i < count($request->resolution); $i++) { 
                ProductResolution::create([
                    'product_id' => $id,
                    'resolution_id' => $request->resolution[$i]["resolution_id"],
                    'resolution_name' => Resolution::find($request->resolution[$i]["resolution_id"])->resolution_name,
                    'import_price' => $request->resolution[$i]["import_price"],
                    'price' => $request->resolution[$i]["price"],
                    'sale_price' => $request->resolution[$i]["sale_price"],
                    'stock' => $request->resolution[$i]["stock"],
                ]);
            }
            return response()->json([
                'create_success' => 'Thêm mới độ phân giải thành công!!!',
            ]);
        }
    }

    public function productResolutionDetail($id, Request $request) {
        $product_resolution = ProductResolution::find($id);
        return response()->json([
            'product_resolution' => $product_resolution,
        ]);
    }

    public function productDBResolutionUpdate($id, Request $request) {
        $validate = Validator::make(
            $request->all(),
            [
                'resolution_id' => [
                    'required',
                    'exists:product_resolutions,id',
                ],
                'import_price' => [
                    'required',
                    'numeric',
                ],
                'price' => [
                    'required',
                    'numeric',
                ],
                'sale_price' => [
                    'nullable',
                    'numeric',
                ],
                'stock' => [
                    'required',
                    'numeric',
                ]
            ],

            [
                'required' => ':attribute không được để trống',
                'numeric' => ':attribute phải là kiểu số',
                'in' => 'Không được đổi dữ liệu trong trường :attribute',
                'exists' => ':attribute phải tồn tại trong database',
            ],

            [
                'resolution_id' => 'Độ phân giải',
                'import_price' => 'Giá nhập khẩu',
                'price' => 'Giá bán',
                'sale_price' => 'Giá khuyến mãi',
                'stock' => 'Số lượng'
            ]
        );

        if ($validate->fails()) {
            return response()->json([
                'errors'=>$validate->messages(),
            ]);
        } else {
            ProductResolution::find($id)->update([
                'import_price' => $request->import_price,
                'price' => $request->price,
                'sale_price' => $request->sale_price,
                'stock' => $request->stock,
            ]);
            return response()->json([
                'update_success' => 'Cập nhật độ phân giải thành công',
            ]);
        }
    }
    public function productDBResolutionDelete($id) {
        ProductResolution::find($id)->delete();
        return response()->json([
            'delete_success' => 'Xóa độ phân giải thành công.',
        ]);
    }

    public function productImageEdit($id, Request $request) {
        $product = Product::find($id)->load('product_images');
        return response()->json([
            'product' => $product,
        ]);
    }

    public function productDBImageUpdate($id, Request $request) {
        // dd($request->all());
        foreach ($request->thumbnail as $key => $thumbnail) {
            if (isset($request->thumbnail[$key]["name"])) {
                $thumbnail_path = $request->thumbnail[$key]["name"]->storeAs('images/product',$request->thumbnail[$key]["name"]->getClientOriginalName());
                ProductImage::find($request->thumbnail[$key]["id"])->update([
                    'product_image' => $thumbnail_path,
                ]);
            }
        }

        return response()->json([
            'update_success' => 'Cập nhật ảnh thành công!!!',
        ]);
    }

    public function productImageUpdate($id, Request $request) {
        $validate = Validator::make(
            $request->all(),
            [
                'product_image.*' => 'image'
            ],

            [
                'image' => ':attribute phải là ảnh'
            ],

            [
                'product_image.*' => 'Ảnh chi tiết sản phẩm'
            ]
        );

        if ($validate->fails()) {
            return response()->json(['errors'=>$validate->messages()]);
        } else {
            if (isset($request->product_image)) {
                foreach ($request->product_image as $key => $product_image) {
                    $product_path = $product_image->storeAs('images/product',$product_image->getClientOriginalName());
                    ProductImage::create([
                        'product_id' => $id,
                        'product_image' => $product_path,
                    ]);
                }
                return response()->json([
                    'update_success' => 'Thêm mới ảnh chi tiết thành công.'
                ]);
            } else {
                return response()->json([
                    'update_success' => 'Không có ảnh nào để upload, mời bạn chọn lại.'
                ]);
            }
        }
    }

    public function productDBImageDelete($id) {
        $product_image = ProductImage::find($id);
        $id = $product_image->id;
        $product_image->delete();
        return response()->json([
            'delete_success' => 'Xóa ảnh thành công.',
            'id' => $id,
        ]);
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getProductOutStockData() {
        $product_outstock = Product::whereHas('product_resolutions', function($query){
            $query->whereStock(0);  
        })->get();

        return Datatables::of($product_outstock)
        ->addColumn('action', function ($product) {
            return 
            '<a href="#product_resolution_edit" class="btn_edit" style="margin-right: 5px;" data-url="'.route('admin.product.outstock.edit',$product->id).'" data-update="'.route('admin.product.outstock.update',$product->id).'" data-toggle="modal" title="Resolution_Edit"><button class="btn btn-info" id="product-edit" title="Resolution_Edit" data-toggle="tooltip"><i class="fa fa-window-restore" aria-hidden="true"></i></button></a>';
        })
        ->editColumn('thumbnail', function(Product $product){
            return '<img style="width: 100px;height: 100px;" src="http://computer-shop.projectlaravel15.zent/storage/'.$product->thumbnail.'"/>';
        })
        ->rawColumns(['thumbnail','action'])
        ->toJson();
    }

    public function productOutStockIndex() {
        return view('admin.product-managers.outstock.index');
    }

    public function productOutstockEdit($id, Request $request) {
        $product = Product::find($id)->load(array('product_resolutions'=> function($query) {
            $query->whereStock(0);
        }));
        return response()->json([
            'product' => $product,
        ]);
    }

    public function productOutstockUpdate($id, Request $request) {
        foreach ($request->stock as $key => $value) {
            if ($value['stock'] != 0) {
                $validate = Validator::make(
                    $value,
                    [
                        'stock' => 'numeric'
                    ],

                    [
                        'numeric' => ':attribute phải là kiểu số'
                    ],

                    [
                        'stock' => 'Số lượng sản phẩm'
                    ]
                );

                if ($validate->fails()) {
                    return response()->json(['errors'=>$validate->messages()]);
                } else {
                    ProductResolution::find($value['id'])->update([
                        'stock' => $value['stock'],
                    ]);
                }
            }
            return response()->json([
                'update_success' => 'Cập nhập số lượng thành công.',
            ]);
        }
    }
}
