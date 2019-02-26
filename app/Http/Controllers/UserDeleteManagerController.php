<?php

namespace App\Http\Controllers;

use App\Models\User;
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

class UserDeleteManagerController extends Controller
{
	/**
     * Displays datatables front end view
     *
     * @return \Illuminate\View\View
     */
	public function index() {
		// dd('Hello');
		return view('admin.user-managers.delete.index');
	}

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getUserData() {
    	$user_Delete = User::where([
            ['delete_at','=',0]
        ])->orderBy('id','Desc');
    	return Datatables::of($user_Delete)
    	->addColumn('action', function ($user) {
    		return '
            <a href="#user_detail" class="btn_detail" data-url="'.route('admin.user.delete.detail',$user->id).'" style="margin-right: 5px;" data-toggle="modal" title="Detail"><button class="btn btn-warning" id="user-detail" title="Detail" data-toggle="tooltip"><i class="glyphicon glyphicon-eye-open"></i></button></a>
            <a href="#user_edit" class="btn_edit" style="margin-right: 5px;" data-url="'.route('admin.user.delete.edit',$user->id).'" data-update="'.route('admin.user.delete.update',$user->id).'" data-updatepassword="'.route('admin.user.delete.update.password',$user->id).'" data-toggle="modal" title="Edit"><button class="btn btn-info" id="user-edit" title="Edit" data-toggle="tooltip"><i class="glyphicon glyphicon-edit"></i></button></a>
            <form method="POST" style="display: initial;" class="form_upback_user">'.csrf_field().''.method_field('put').'<a href="#" class="btn_upback" style="margin-right: 5px;" data-url="'.route('admin.user.delete.upback',$user->id).'" title="Upback"><button class="user-upback btn btn-success" title="Upback" data-toggle="tooltip"><i class="fa fa-cloud-upload"></i></button></a></form>
            <form method="POST" style="display: initial;" class="form_delete_user">'.csrf_field().''.method_field('delete').'<a href="#" class="btn_delete" data-url="'.route('admin.user.delete.realdelete',$user->id).'" title="delete"><button class="user-delete btn btn-primary" title="delete" data-toggle="tooltip"><i class="glyphicon glyphicon-trash"></i></button></a></form>';
    	})
        ->editColumn('id', 'ID: {{$id}}')
        ->editColumn('email', function(User $user){
            return '<a href="mailto:'.$user->email.'">'.$user->email.'</a>';
        })
    	->editColumn('phone_number', function(User $user){
            return '<a href="tel:'.$user->phone_number.'">'.$user->phone_number.'</a>';
        })
        ->rawColumns(['action','email','phone_number'])
    	->toJson();
    }

    public function userDeleteShow($id) {
        $user_Delete_show = User::find($id);
        return response()->json([
            'data' => $user_Delete_show,
        ]);
    }

    public function userDeleteEdit($id) {
        $user = User::find($id);

        return response()->json([
            'data' => $user,
        ]);
    }

    public function userDeleteUploadImage(Request $request) {
        $path = request()->add_user_pic->storeAs('images/user',request()->add_user_pic->getClientOriginalName());
        return response()->json([
            'data_image_create' => $path,
            'notice' => 'Thêm ảnh thành công!!!'
        ]);
    }

    public function userDeleteDeleteImage(Request $request) {
        $user_pic_isset = User::where('user_pic','=',$request->add_user_pic_url)->first();
        if (isset($user_pic_isset)) {
            return response()->json([
                'notice' => 'Xóa thành công!!!'
            ]);
        } else {
            Storage::disk('user_file')->delete($request->add_user_pic);
            return response()->json([
                'notice' => 'Xóa thành công!!!'
            ]);
        }
    }

    public function userDeleteStore(Request $request) {
        if ($request->add_user_pic != null) {
            if (Storage::exists($request->add_user_pic)) {
                // dd($request->all());
                $validate = Validator::make(
                    $request->all(),
                    [
                        'add_user_pic' => 'required|unique:users,user_pic',
                        'add_name' => 'required|min:8|max:255',
                        'add_username' => 'required|unique:users,username',
                        'add_email' => 'required|email|unique:users,email',
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
                        'add_user_pic' => 'Ảnh người dùng',
                        'add_name' => 'Tên người dùng',
                        'add_username' => 'Tên đăng nhập',
                        'add_email' => 'Email',
                        'add_gender' => 'Giới tính',
                        'add_phone' => 'Số điện thoại',
                        'add_birthday' => 'Ngày sinh',
                        'add_password' => 'Mật khẩu',
                        'add_password_confirmation' => 'Mật khẩu nhập lại',
                        'add_active' => 'Trạng thái'
                    ]
                );

                if ($validate->fails()) {
                    return response()->json(['errors'=>$validate->errors()]);
                }else {
                    $user_add=User::create([
                        'name'=>$request->add_name,
                        'email'=>$request->add_email,
                        'gender'=>$request->add_gender,
                        'remember_token'=>$request->_token,
                        'username'=>$request->add_username,
                        'user_pic'=>$request->add_user_pic,
                        'phone_number'=>$request->add_phone,
                        'birthday'=>$request->add_birthday,
                        'active'=>$request->add_active,
                        'password' => Hash::make($request->add_password),
                    ]);
                    return response()->json([
                        'create_success'=>'Thêm mới người dùng thành công!!!'
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

    public function userDeleteUpdate(Request $request, $id) {
        $user = User::find($id);
        $user_pic_name = explode('/', $user->user_pic);
        if ($request->edit_user_pic != null) {
        	$user_pic_isset = User::where('user_pic','=','images/user/'.$request->edit_user_pic->getClientOriginalName())->first();
            if (isset($user_pic_isset)) {
            	return response()->json([
            		'image_upload_error' => 'Ảnh bạn chọn đã có người dùng khác sử dụng'
            	]);
            } else {
            	$validate = Validator::make(
            		$request->all(),
            		[
            			'edit_user_pic' => 'required|image|mimes:jpeg,jpg,png',
            			'edit_name' => 'required|min:8|max:255',
            			'edit_username' => [
            				'required',
            				Rule::unique('users','username')->ignore($id)
            			],
            			'edit_email' => [
            				'required',
            				Rule::unique('users','email')->ignore($id)
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
            			'edit_user_pic' => 'Ảnh người dùng',
            			'edit_name' => 'Tên người dùng',
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
            		$path = request()->edit_user_pic->storeAs('images/user',request()->edit_user_pic->getClientOriginalName());
            		Storage::disk('user_file')->delete($user_pic_name[2]);
            		$user_add=User::find($id)->update([
            			'name'=>$request->edit_name,
            			'email'=>$request->edit_email,
            			'gender'=>$request->edit_gender,
            			'remember_token'=>$request->_token,
            			'username'=>$request->edit_username,
            			'user_pic'=>$path,
            			'phone_number'=>$request->edit_phone,
            			'birthday'=>$request->edit_birthday,
            			'active'=>$request->edit_active,
            		]);
            		return response()->json([
            			'update_success'=>'Cập nhật thông tin người dùng thành công!!!'
            		]);
            	}
            }
        } else {
            $validate = Validator::make(
                $request->all(),
                [
                    'edit_name' => 'required|min:8|max:255',
                    'edit_username' => [
                        'required',
                        Rule::unique('users','username')->ignore($id)
                    ],
                    'edit_email' => [
                        'required',
                        Rule::unique('users','email')->ignore($id)
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
                    'edit_name' => 'Tên người dùng',
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
                $user_add=User::find($id)->update([
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
                    'update_success'=>'Cập nhật thông tin người dùng thành công!!!'
                ]);
            }
        }
    }

    public function userDeleteUpdatePassword(Request $request, $id) {
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
            if (Hash::check($request->edit_password, User::find($id)->password)) {
                return response()->json([
                    'update_error'=>'Mật khẩu nhập vào không được trùng với mật khẩu cũ!!!'
                ]);
            }else {
                $user_edit=User::find($id)->update([
                    'password' => Hash::make($request->edit_password),
                ]);
                return response()->json([
                    'update_success'=>'Cập nhật mật khẩu người dùng thành công!!!'
                ]);
            }
        }
    }

    public function userDeleteUpback($id) {
        $user_active = User::find($id);
        if ($user_active != null && $user_active->delete_at == 0) {
            $user_active->update([
                'delete_at' => 1,
            ]);

            return response()->json([
                'active_success' => 'Khôi phục thành công người dùng '.$user_active->name.' !!!'
            ]);
        } else {
            return response()->json([
                'active_error' => 'Không thể khôi phục người dùng do không tìm thấy thông tin!!!'
            ]);
        }
    }

    public function userDeleteRealDelete($id) {
        $user_delete = User::find($id);
        $user_pic_name = explode('/', $user_delete->user_pic);
        $user_name = $user_delete->name;
        if ($user_delete != null && $user_delete->delete_at == 0) {
        	Storage::disk('user_file')->delete($user_pic_name[2]);
            $user_delete->delete();

            return response()->json([
                'delete_success' => 'Đã xóa toàn bộ dữ liệu của người dùng '.$user_name.'!!!'
            ]);
        } else {
            return response()->json([
                'delete_error' => 'Không thể xóa người dùng do không tìm thấy thông tin!!!'
            ]);
        }
    }
}
