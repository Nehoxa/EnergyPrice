<?php

namespace App\Http\Requests;

use App\Enums\Automate;
use App\Enums\FuelName;
use App\Enums\Population;
use Illuminate\Validation\Rules\Enum;
use Illuminate\Foundation\Http\FormRequest;

class FuelPriceRequest extends FormRequest
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
        return [
            'pump' => ['required', 'integer'],
            'cp' => ['required', 'integer'],
            'pop' => [new Enum(Population::class), 'required'],
            'adresse' => ['required'],
            'ville' => ['required'],
            'geom' => ['required'],
            'prix_maj' => ['required', 'date'],
            'prix_valeur' => ['required'],
            'fuel_type_id' => ['required', 'integer'],
            'com_arm_code' => ['required', 'integer'],
            'com_arm_name' => ['required'],
            'epci_code' => ['required', 'integer'],
            'epci_name' => ['required'],
            'dep_code' => ['required'],
            'dep_name' => ['required'],
            'reg_code' => ['required'],
            'reg_name' => ['required'],
            'com_code' => ['required', 'integer'],
            'com_name' => ['required'],
            'services_service' => ['nullable'],
            'horaires_automate_24_24' => [new Enum(Automate::class), 'required'],
        ];
    }
}
