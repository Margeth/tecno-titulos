<?php

namespace App\Http\Requests\Admin\ProcedureRequest;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateProcedureRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.procedure-request.edit', $this->procedureRequest);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'no_request' => ['sometimes', Rule::unique('procedure_request', 'no_request')->ignore($this->procedureRequest->getKey(), $this->procedureRequest->getKeyName()), 'integer'],
            'id_academic_degree' => ['sometimes', 'integer'],
            'id_request_state' => ['sometimes', 'integer'],
            'user_student' => ['sometimes', 'integer'],
            'user_transcriber' => ['sometimes', 'integer'],
            
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
