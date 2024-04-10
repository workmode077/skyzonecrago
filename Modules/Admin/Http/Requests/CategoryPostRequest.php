<?php

namespace Modules\Admin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class CategoryPostRequest extends FormRequest
{
    public function rules(Request $request)
    {
        if($request->id){
            return [
                // 'title' => 'required|string|max:255',
                // 'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                // 'top_speed' => 'required|string',
                // 'top_speed_icon' => 'required|string',
                // 'mileage' => 'required|string',
                // 'mileage_icon' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                // 'feature_one' => 'required|string',
                // 'feature_one_icon' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                // 'feature_two' => 'required|string',
                // 'feature_two_icon' =>'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ];
        }else{
            return [
                // 'title' => 'required|string|max:255',
                // 'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                // 'top_speed' => 'required|string',
                // 'top_speed_icon' => 'required|string',
                // 'mileage' => 'required|string',
                // 'mileage_icon' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                // 'feature_one' => 'required|string',
                // 'feature_one_icon' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                // 'feature_two' => 'required|string',
                // 'feature_two_icon' =>'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ];
        }
    }
    public function authorize()
    {
        return true;
    }
}
