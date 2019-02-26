<?php

namespace App\Http\Controllers;

use App\Models\Admin;
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
use Auth;

class AdminDeactiveManagerController extends Controller
{
	/**
     * Displays datatables front end view
     *
     * @return \Illuminate\View\View
     */
	public function index() {
		return view('admin.admin-managers.deactive.index');
	}

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getUserData() {
    	$admin_active = Admin::where([
            ['active','=',0],
            ['delete_at','=',1]
        ])->orderBy('id','Desc');
    	return Datatables::of($admin_active)
    	->addColumn('action', function ($admin) {
    		return '
            <a href="#user_detail" class="btn_detail" data-url="'.route('admin.admins.deactive.detail',$admin->id).'" style="margin-right: 5px;" data-toggle="modal" title="Detail"><button class="btn btn-warning" id="user-detail" title="Detail" data-toggle="tooltip"><i class="glyphicon glyphicon-eye-open"></i></button></a>
            <a href="#user_edit" class="btn_edit" style="margin-right: 5px;" data-url="'.route('admin.admins.deactive.edit',$admin->id).'" data-update="'.route('admin.admins.deactive.update',$admin->id).'" data-updatepassword="'.route('admin.admins.deactive.update.password',$admin->id).'" data-toggle="modal" title="Edit"><button class="btn btn-info" id="user-edit" title="Edit" data-toggle="tooltip"><i class="glyphicon glyphicon-edit"></i></button></a>
            <form method="POST" style="display: initial;" class="form_deactive_user">'.csrf_field().''.method_field('put').'<a href="#" class="btn_active" style="margin-right: 5px;" data-url="'.route('admin.admins.deactive.active',$admin->id).'" title="Active"><button class="user-active btn btn-success" title="Active" data-toggle="tooltip"><i class="fa fa-unlock"></i></button></a></form>
            <form method="POST" style="display: initial;" class="form_delete_user">'.csrf_field().''.method_field('delete').'<a href="#" class="btn_delete" data-url="'.route('admin.admins.deactive.delete',$admin->id).'" title="Delete"><button class="user-delete btn btn-primary" title="Delete" data-toggle="tooltip"><i class="glyphicon glyphicon-trash"></i></button></a></form>';
    	})
        ->editColumn('id', 'ID: {{$id}}')
        ->editColumn('email', function(Admin $admin){
            return '<a href="mailto:'.$admin->email.'">'.$admin->email.'</a>';
        })
    	->editColumn('phone_number', function(Admin $admin){
            return '<a href="tel:'.$admin->phone_number.'">'.$admin->phone_number.'</a>';
        })
    	->editColumn('permission', function(Admin $admin){
    		if ($admin->permission == 0) {
    			return 'Quản trị viên';
    		}
    		if ($admin->permission == 1) {
    			return 'Nhân viên';
    		}
            if ($admin->permission == 2) {
                return 'Nhân viên kho';
            }
        })
        ->rawColumns(['action','email','phone_number'])
    	->toJson();
    }

    public function adminDeactiveShow($id) {
        $user_active_show = Admin::find($id);
        return response()->json([
            'data' => $user_active_show,
        ]);
    }

    public function adminDeactiveEdit($id) {
        $user = Admin::find($id);

        return response()->json([
            'data' => $user,
        ]);
    }

    public function adminDeactiveUploadImage(Request $request) {
        $path = request()->add_user_pic->storeAs('images/admin',request()->add_user_pic->getClientOriginalName());
        return response()->json([
            'data_image_create' => $path,
            'notice' => 'Thêm ảnh thành công!!!'
        ]);
    }

    public function adminDeactiveDeleteImage(Request $request) {
        $user_pic_isset = Admin::where('admin_pic','=',$request->add_user_pic_url)->first();
        if (isset($user_pic_isset)) {
            return response()->json([
                'notice' => 'Xóa thành công!!!'
            ]);
        } else {
            Storage::disk('admin_file')->delete($request->add_user_pic);
            return response()->json([
                'notice' => 'Xóa thành công!!!'
            ]);
        }
    }

    public function adminDeactiveStore(Request $request) {
        if ($request->add_user_pic != null) {
            if (Storage::exists($request->add_user_pic)) {
                // dd($request->all());
                $validate = Validator::make(
                    $request->all(),
                    [
                        'add_user_pic' => 'required|unique:admins,admin_pic',
                        'add_name' => 'required|min:8|max:255',
                        'add_username' => 'required|unique:admins,username',
                        'add_email' => 'required|email|unique:admins,email',
                        'add_gender' => [
                            'required',
                            Rule::in(['Nam', 'Nữ']),
                        ],
                        'add_phone' => 'required|numeric',
                        'add_birthday' => 'required|date',
                        'add_password' => 'required|min:6|max:25',
                        'add_password_confirmation' => 'required_with:add_password|same:add_password|min:6|max:25',
                        'add_active' => [
                            'required',
                            'numeric',
                            Rule::in([1, 0]),
                        ],
                        'add_permission' => [
                            'required',
                            'numeric',
                            Rule::in([1, 0, 2]),
                        ]
                    ],

                    [
                        'unique' => ':attribute không được trùng với dữ liệu trong database',
                        'required' => ':attribute không được để trống',
                        'min' => ':attribute không được nhỏ hơn :min',
                        'max' => ':attribute không được lớn hơn :max',
                        'email' => ':attribute phải là email',
                        'date' => ':attribute phải là ngày tháng',
                        'numeric' => ':attribute phải là kiểu số',
                        'required_with' => 'bạn chưa nhập mật khẩu',
                        'same' => ':attribute phải giống với mật khẩu',
                        'in' => 'Bạn không được thay đổi dữ liệu trong trường :attribute'
                    ],

                    [
                        'add_user_pic' => 'Ảnh nhân viên',
                        'add_name' => 'Tên nhân viên',
                        'add_username' => 'Tên đăng nhập',
                        'add_email' => 'Email',
                        'add_gender' => 'Giới tính',
                        'add_phone' => 'Số điện thoại',
                        'add_birthday' => 'Ngày sinh',
                        'add_password' => 'Mật khẩu',
                        'add_password_confirmation' => 'Mật khẩu nhập lại',
                        'add_active' => 'Trạng thái',
                        'add_permission' => 'Chức vụ'
                    ]
                );

                if ($validate->fails()) {
                    return response()->json(['errors'=>$validate->errors()]);
                }else {
                    $user_add=Admin::create([
                        'name'=>$request->add_name,
                        'email'=>$request->add_email,
                        'gender'=>$request->add_gender,
                        'remember_token'=>$request->_token,
                        'username'=>$request->add_username,
                        'admin_pic'=>$request->add_user_pic,
                        'phone_number'=>$request->add_phone,
                        'birthday'=>$request->add_birthday,
                        'active'=>$request->add_active,
                        'permission'=>$request->add_permission,
                        'password' => Hash::make($request->add_password),
                    ]);
                    return response()->json([
                        'create_success'=>'Thêm mới nhân viên thành công!!!'
                    ]);
                }
            }else {
                return response()->json([
                    'null_error' => 'Ảnh bạn chọn chưa được đẩy lên server, mời bạn thử lại'
                ]);
            }
        } else {
            return response()->json([
                'error' => 'Không được để trống trường ảnh!'
            ]);
        }
    }

    public function adminDeactiveUpdate(Request $request, $id) {
        // dd($request->all());
        $user = Admin::find($id);
        $user_pic_name = explode('/', $user->admin_pic);
        if ($request->edit_user_pic != null) {
            $user_pic_isset = Admin::where('admin_pic','=','images/admin/'.$request->edit_user_pic->getClientOriginalName())->first();
            if (isset($user_pic_isset)) {
            	return response()->json([
            		'image_upload_error' => 'Ảnh bạn chọn đã có nhân viên khác sử dụng'
            	]);
            } else {
            	if (Auth::guard('admin')->user()->username == $user->username) {
            		$validate = Validator::make(
            			$request->all(),
            			[
            				'edit_user_pic' => 'required|image|mimes:jpeg,jpg,png',
            				'edit_name' => 'required|min:8|max:255',
            				'edit_username' => [
            					'required',
            					Rule::unique('admins','username')->ignore($user->id)
            				],
            				'edit_email' => [
            					'required',
            					Rule::unique('admins','email')->ignore($user->id)
            				],
            				'edit_gender' => [
            					'required',
            					Rule::in(['Nam', 'Nữ']),
            				],
            				'edit_phone' => 'required|numeric',
            				'edit_birthday' => 'required|date',
            				'edit_active' => [
            					'required',
            					'numeric',
            					Rule::in([1, 0]),
            				]
            			],

            			[
            				'unique' => ':attribute không được trùng với dữ liệu trong database',
            				'image' => ':attribute phải là ảnh',
            				'mimes' => ':attribute phải đúng định dạng jpeg,jpg,png',
            				'required' => ':attribute không được để trống',
            				'min' => ':attribute không được nhỏ hơn :min',
            				'max' => ':attribute không được lớn hơn :max',
            				'email' => ':attribute phải là email',
            				'date' => ':attribute phải là ngày tháng',
            				'numeric' => ':attribute phải là kiểu số',
            				'in' => 'Bạn không được thay đổi dữ liệu trong trường :attribute'
            			],

            			[
            				'edit_user_pic' => 'Ảnh nhân viên',
            				'edit_name' => 'Tên nhân viên',
            				'edit_username' => 'Tên đăng nhập',
            				'edit_email' => 'Email',
            				'edit_gender' => 'Giới tính',
            				'edit_phone' => 'Số điện thoại',
            				'edit_birthday' => 'Ngày sinh',
            				'edit_active' => 'Trạng thái'
            			]
            		);

            		if ($validate->fails()) {
            			return response()->json(['errors'=>$validate->errors()]);
            		}else {
            			$path = request()->edit_user_pic->storeAs('images/admin',request()->edit_user_pic->getClientOriginalName());
            			Storage::disk('admin_file')->delete($user_pic_name[2]);
            			$user_add=Admin::find($id)->update([
            				'name'=>$request->edit_name,
            				'email'=>$request->edit_email,
            				'gender'=>$request->edit_gender,
            				'remember_token'=>$request->_token,
            				'username'=>$request->edit_username,
            				'admin_pic'=>$path,
            				'phone_number'=>$request->edit_phone,
            				'birthday'=>$request->edit_birthday,
            				'active'=>$request->edit_active,
            			]);
            			return response()->json([
            				'update_success'=>'Cập nhật thông tin nhân viên thành công!!!'
            			]);
            		}
            	} else {
            		$validate = Validator::make(
            			$request->all(),
            			[
            				'edit_user_pic' => 'required|image|mimes:jpeg,jpg,png',
            				'edit_name' => 'required|min:8|max:255',
            				'edit_username' => [
            					'required',
            					Rule::unique('admins','username')->ignore($user->id)
            				],
            				'edit_email' => [
            					'required',
            					Rule::unique('admins','email')->ignore($user->id)
            				],
            				'edit_gender' => [
            					'required',
            					Rule::in(['Nam', 'Nữ']),
            				],
            				'edit_phone' => 'required|numeric',
            				'edit_birthday' => 'required|date',
            				'edit_active' => [
            					'required',
            					'numeric',
            					Rule::in([1, 0]),
            				],
            				'edit_permission' => [
            					'required',
            					'numeric',
            					Rule::in([1, 0, 2]),
            				]
            			],

            			[
            				'unique' => ':attribute không được trùng với dữ liệu trong database',
            				'image' => ':attribute phải là ảnh',
            				'mimes' => ':attribute phải đúng định dạng jpeg,jpg,png',
            				'required' => ':attribute không được để trống',
            				'min' => ':attribute không được nhỏ hơn :min',
            				'max' => ':attribute không được lớn hơn :max',
            				'email' => ':attribute phải là email',
            				'date' => ':attribute phải là ngày tháng',
            				'numeric' => ':attribute phải là kiểu số',
            				'in' => 'Bạn không được thay đổi dữ liệu trong trường :attribute'
            			],

            			[
            				'edit_user_pic' => 'Ảnh nhân viên',
            				'edit_name' => 'Tên nhân viên',
            				'edit_username' => 'Tên đăng nhập',
            				'edit_email' => 'Email',
            				'edit_gender' => 'Giới tính',
            				'edit_phone' => 'Số điện thoại',
            				'edit_birthday' => 'Ngày sinh',
            				'edit_active' => 'Trạng thái',
            				'edit_permission' => 'Chức vụ'
            			]
            		);

            		if ($validate->fails()) {
            			return response()->json(['errors'=>$validate->errors()]);
            		}else {
            			$path = request()->edit_user_pic->storeAs('images/admin',request()->edit_user_pic->getClientOriginalName());
            			Storage::disk('admin_file')->delete($user_pic_name[2]);
            			$user_add=Admin::find($id)->update([
            				'name'=>$request->edit_name,
            				'email'=>$request->edit_email,
            				'gender'=>$request->edit_gender,
            				'remember_token'=>$request->_token,
            				'username'=>$request->edit_username,
            				'admin_pic'=>$path,
            				'phone_number'=>$request->edit_phone,
            				'birthday'=>$request->edit_birthday,
            				'active'=>$request->edit_active,
            				'permission'=>$request->edit_permission,
            			]);
            			return response()->json([
            				'update_success'=>'Cập nhật thông tin nhân viên thành công!!!'
            			]);
            		}
            	}
            }
        } else {
            if (Auth::guard('admin')->user()->username == $user->username) {
            	$validate = Validator::make(
            		$request->all(),
            		[
            			'edit_name' => 'required|min:8|max:255',
            			'edit_username' => [
            				'required',
            				Rule::unique('admins','username')->ignore($user->id)
            			],
            			'edit_email' => [
            				'required',
            				Rule::unique('admins','email')->ignore($user->id)
            			],
            			'edit_gender' => [
            				'required',
            				Rule::in(['Nam', 'Nữ']),
            			],
            			'edit_phone' => 'required|numeric',
            			'edit_birthday' => 'required|date',
            			'edit_active' => [
            				'required',
            				'numeric',
            				Rule::in([1, 0]),
            			]
            		],

            		[
            			'unique' => ':attribute không được trùng với dữ liệu trong database',
            			'required' => ':attribute không được để trống',
            			'min' => ':attribute không được nhỏ hơn :min',
            			'max' => ':attribute không được lớn hơn :max',
            			'email' => ':attribute phải là email',
            			'date' => ':attribute phải là ngày tháng',
            			'numeric' => ':attribute phải là kiểu số',
            			'in' => 'Bạn không được thay đổi dữ liệu trong trường :attribute'
            		],

            		[
            			'edit_name' => 'Tên nhân viên',
            			'edit_username' => 'Tên đăng nhập',
            			'edit_email' => 'Email',
            			'edit_gender' => 'Giới tính',
            			'edit_phone' => 'Số điện thoại',
            			'edit_birthday' => 'Ngày sinh',
            			'edit_active' => 'Trạng thái'
            		]
            	);

            	if ($validate->fails()) {
            		return response()->json(['errors'=>$validate->errors()]);
            	}else {
            		$user_add=Admin::find($id)->update([
            			'name'=>$request->edit_name,
            			'email'=>$request->edit_email,
            			'gender'=>$request->edit_gender,
            			'remember_token'=>$request->_token,
            			'username'=>$request->edit_username,
            			'phone_number'=>$request->edit_phone,
            			'birthday'=>$request->edit_birthday,
            			'active'=>$request->edit_active,
            		]);
            		return response()->json([
            			'update_success'=>'Cập nhật thông tin nhân viên thành công!!!'
            		]);
            	}
            } else {
            	$validate = Validator::make(
            		$request->all(),
            		[
            			'edit_name' => 'required|min:8|max:255',
            			'edit_username' => [
            				'required',
            				Rule::unique('admins','username')->ignore($user->id)
            			],
            			'edit_email' => [
            				'required',
            				Rule::unique('admins','email')->ignore($user->id)
            			],
            			'edit_gender' => [
            				'required',
            				Rule::in(['Nam', 'Nữ']),
            			],
            			'edit_phone' => 'required|numeric',
            			'edit_birthday' => 'required|date',
            			'edit_active' => [
            				'required',
            				'numeric',
            				Rule::in([1, 0]),
            			],
            			'edit_permission' => [
            				'required',
            				'numeric',
            				Rule::in([1, 0, 2]),
            			]
            		],

            		[
            			'unique' => ':attribute không được trùng với dữ liệu trong database',
            			'required' => ':attribute không được để trống',
            			'min' => ':attribute không được nhỏ hơn :min',
            			'max' => ':attribute không được lớn hơn :max',
            			'email' => ':attribute phải là email',
            			'date' => ':attribute phải là ngày tháng',
            			'numeric' => ':attribute phải là kiểu số',
            			'in' => 'Bạn không được thay đổi dữ liệu trong trường :attribute'
            		],

            		[
            			'edit_name' => 'Tên nhân viên',
            			'edit_username' => 'Tên đăng nhập',
            			'edit_email' => 'Email',
            			'edit_gender' => 'Giới tính',
            			'edit_phone' => 'Số điện thoại',
            			'edit_birthday' => 'Ngày sinh',
            			'edit_active' => 'Trạng thái',
            			'edit_permission' => 'Chức vụ'
            		]
            	);

            	if ($validate->fails()) {
            		return response()->json(['errors'=>$validate->errors()]);
            	}else {
            		$user_add=Admin::find($id)->update([
            			'name'=>$request->edit_name,
            			'email'=>$request->edit_email,
            			'gender'=>$request->edit_gender,
            			'remember_token'=>$request->_token,
            			'username'=>$request->edit_username,
            			'phone_number'=>$request->edit_phone,
            			'birthday'=>$request->edit_birthday,
            			'active'=>$request->edit_active,
            			'permission'=>$request->edit_permission
            		]);
            		return response()->json([
            			'update_success'=>'Cập nhật thông tin nhân viên thành công!!!'
            		]);
            	}
            }
        }
    }

    public function adminDeactiveUpdatePassword(Request $request, $id) {
        // dd(Hash::make($request->edit_password));
        $validate = Validator::make(
            $request->all(),
            [
                'edit_password' => 'required|min:6|max:25',
                'edit_password_confirmation' => 'required_with:edit_password|same:edit_password|min:6|max:25'
            ],

            [
                'required' => ':attribute không được để trống',
                'min' => ':attribute không được nhỏ hơn :min',
                'max' => ':attribute không được lớn hơn :max',
                'required_with' => 'bạn chưa nhập mật khẩu',
                'same' => ':attribute phải giống với mật khẩu'
            ],

            [
                'edit_password' => 'Mật khẩu',
                'edit_password_confirmation' => 'Mật khẩu nhập lại'
            ]
        );

        if ($validate->fails()) {
            return response()->json(['errors'=>$validate->errors()]);
        }else {
            if (Hash::check($request->edit_password, Admin::find($id)->password)) {
                return response()->json([
                    'update_error'=>'Mật khẩu nhập vào không được trùng với mật khẩu cũ!!!'
                ]);
            }else {
                $user_edit=Admin::find($id)->update([
                    'password' => Hash::make($request->edit_password),
                ]);
                return response()->json([
                    'update_success'=>'Cập nhật mật khẩu nhân viên thành công!!!'
                ]);
            }
        }
    }

    public function adminDeactiveActive($id) {
        $user_active = Admin::find($id);
        if ($user_active != null && $user_active->active == 0) {
            $user_active->update([
                'active' => 1,
            ]);

            return response()->json([
                'active_success' => 'Kích hoạt thành công nhân viên '.$user_active->name.'. Thông tin nhân viên sẽ được chuyển vào phần đã kích hoạt!!!'
            ]);
        } else {
            return response()->json([
                'active_error' => 'Không thể kích hoạt nhân viên do không tìm thấy thông tin!!!'
            ]);
        }
    }

    public function adminDeactiveDelete($id) {
        $user_delete = Admin::find($id);
        if ($user_delete != null && $user_delete->active == 0) {
            $user_delete->update([
                'delete_at' => 0,
            ]);

            return response()->json([
                'delete_success' => 'Xóa thành công nhân viên '.$user_delete->name.'. Thông tin nhân viên sẽ được chuyển vào phần bị xóa!!!'
            ]);
        } else {
            return response()->json([
                'delete_error' => 'Không thể xóa nhân viên do không tìm thấy thông tin!!!'
            ]);
        }
    }
}
