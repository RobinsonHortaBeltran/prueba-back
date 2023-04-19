<?php

namespace Modules\AcceptedPayment\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * En: Validation rules that apply to the application.
 * Es: Reglas de validación que se aplican a la solicitud.
 *
 * @class   HotelValidateRequest
 * @package Modules\AcceptedPayment\Http\Requests
 */
class AcceptedPaymentValidateRequest extends FormRequest
{
    /**
     * En: Get the validation rules that apply to the request.
     * Es: Obtiene las reglas de validación que se aplican a la solicitud.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name'                   => ['required', 'string', 'min:1', 'max:255'],
            'costCenterId'           => ['required', 'string', 'min:1', 'max:255'],
            'rph'                    => ['required', 'string', 'min:1', 'max:255'],
            'guaranteeIndicator'     => ['required', 'boolean'],
            'guaranteeTypeCode'      => ['required', 'string', 'min:1', 'max:255'],
            'guaranteeId'            => ['required', 'string', 'min:1', 'max:255'],
            'remark'                 => ['required', 'string', 'min:1', 'max:255'],
            'status'                 => ['required', 'boolean'],
        ];
    }

    /**
     * En: Determine if the user is authorized to make this request.
     * Es: Determine si el usuario está autorizado a realizar esta solicitud.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }
}