<?php

namespace App\Http\Requests\Instructor;

use Illuminate\Foundation\Http\FormRequest;

class CourseRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        $rules = [
            'title'           => 'required',
            'category_id'     => 'required',
            'language_id'     => 'required',
            'level_id'        => 'required',
            'organization_id' => 'required',
            'instructor_ids'  => 'required',
            'duration'        => 'required',
            'price'           => 'nullable|numeric',
            'meta_image'      => 'nullable|integer',
        ];

        if ($this->isMethod('post')) {
            $rules['video'] = 'required_if:video_source,upload';
        }

        return $rules;
    }

    protected function prepareForValidation()
    {
        if (! $this->has('price')) {
            $this->merge([
                'price' => 0,
            ]);
        }
    }
}
