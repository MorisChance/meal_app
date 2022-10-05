<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class MealRequest extends FormRequest
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
    public function rules(Request $request)
    {
        $route = $this->route()->getName();
        $rule = [
            'title' => 'required|string|max:30',
            'body' => 'required|string|max:200',
            'category_id' => 'required',
        ];
        if ($route === 'meals.store' || ($route === 'meals.update' && $request->file('image'))) {
            $rule['image'] = 'required|file|image|mimes:jpg,png';
        }
        return $rule;
    }
    public function attributes()
    {
        return [
            'title' => '食事名',
            'body' => '詳細',
            'category_id' => 'カテゴリー',
            'image_path' => '写真'
        ];
    }
}
