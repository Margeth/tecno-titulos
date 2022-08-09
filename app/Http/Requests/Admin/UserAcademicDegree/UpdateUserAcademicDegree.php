<?php

namespace App\Http\Requests\Admin\UserAcademicDegree;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateUserAcademicDegree extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.user-academic-degree.edit', $this->userAcademicDegree);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'no_request' => ['sometimes', 'integer'],
            'code_academic_degree' => ['sometimes', Rule::unique('user_academic_degree', 'code_academic_degree')->ignore($this->userAcademicDegree->getKey(), $this->userAcademicDegree->getKeyName()), 'string'],
            
        ];
    }

    /**
     * Modify input data
     *
     * @return array
     */
    public function getSanitized(): array
    {
        $sanitized = $this->validated();


        //Add your code for manipulation with request data here

        return $sanitized;
    }
}
