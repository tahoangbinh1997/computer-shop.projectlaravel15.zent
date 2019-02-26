<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:8|max:255',
            'description' => 'required|min:8|max:255',
            'content' => 'required|min:8|max:255',
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
            'resolution_name' => [
                'array',
            ],
            'resolution_name.*' => [
                'required',
                Rule::in(['1366 x 768', '1920 x 1080', '2560 x 1440', '3840 x 2160', '4096 x 2160']),
            ],
            'import_price' => 'array',
            'import_price.*' => 'required|numeric',
            'price' => 'array',
            'price.*' => 'required|numeric',
            'sale_price' => 'array',
            'sale_price.*' => 'required|numeric',
            'stock' => 'array',
            'stock.*' => 'required|numeric'
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'unique' => ':attribute không được trùng với dữ liệu trong database',
            'required' => ':attribute không được để trống',
            'min' => ':attribute không được nhỏ hơn :min',
            'max' => ':attribute không được lớn hơn :max',
            'between' => ':attribute phải trong khoảng 1 đến 7 tag',
            'numeric' => ':attribute phải là kiểu số',
            'required_with' => 'bạn chưa nhập mật khẩu',
            'same' => ':attribute phải giống với mật khẩu',
            'in' => 'Bạn không được thay đổi dữ liệu trong trường :attribute'
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'name' => 'Tên sản phẩm',
            'description' => 'Sơ lược sản phẩm',
            'content' => 'Mô tả sản phẩm',
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
            'resolution_name' => 'Độ phân giải',
            'resolution_name.*' => 'Độ phân giải',
            'import_price' => 'Giá nhập khẩu',
            'import_price.*' => 'Giá nhập khẩu',
            'price' => 'Giá bán',
            'price.*' => 'Giá bán',
            'sale_price' => 'Giá khuyến mãi',
            'sale_price.*' => 'Giá khuyến mãi',
            'stock' => 'Số lượng sản phẩm',
            'stock.*' => 'Số lượng sản phẩm'
        ];
    }
}
