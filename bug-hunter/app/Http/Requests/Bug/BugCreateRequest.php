<?php
declare(strict_types=1);

namespace App\Http\Requests\Bug;

use App\Constants\Bug\BugSeverityEnum;
use App\Constants\Bug\BugStatusEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

final class BugCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'title' => 'string|required',
            'description' =>'array|nullable',
            'severity' => ['string', 'required', Rule::in(BugSeverityEnum::values())],
            'status' =>['string', 'required', Rule::in(BugStatusEnum::values())],
            'raised_at' => 'date|required',
            'website' => 'nullable|string',
        ];
    }
}