<?php

namespace App\Http\Livewire;

use App\Models\Activation;
use App\Models\Pincode;
use App\Models\PostalCode;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class PincodeBox extends Component
{
    use LivewireAlert;

    public $currentStep = 1;
    public $pincodeLength = 12;
    public $choosePostalCode = [];
    public $pincode, $postalCode, $locality;

    public function rules()
    {
        return [
            'pincode' => ['required', 'max:' . $this->pincodeLength, 'min:' . $this->pincodeLength],
            'postalCode' => ['required', 'exists:postal_codes,postal_code'],
            'locality' => ['required', 'exists:postal_codes,id'],

        ];
    }

    public function messages()
    {
        return [
            'pincode.max' => __('El pincode introducido no es válido'),
            'pincode.min' => __('El pincode introducido no es válido'),
            'pincode.required' => __('Tienes que introducir un pincode'),
            'postalCode.required' => __('Tienes que introducir tu código postal'),
            'postalCode.exists' => __('No parece un código postal válido.'),
        ];
    }
    public function render()
    {
        return view('livewire.pincode-box');
    }

    public function firstStepSubmit()
    {
        $this->validateOnly('pincode');
        $this->checkPincode();
    }

    public function secondStepSubmit()
    {

        $this->validateOnly('postalCode');
        $this->checkPostalCode();
    }

    public function thirdStepSubmit()
    {
        $this->validateOnly('locality');
        $this->currentStep = 4;
    }

    public function checkPincode()
    {
        $check = Pincode::query()
            ->doesntHave('activation')
            ->where('code', $this->pincode)
            ->first();

        if (!$check) {

            // El pincode no es válido
            $this->alert('error', __('¡Vaya!'), [
                'text' => __('El pincode que has introducido no es válido. Inténtalo de nuevo, por favor.'),
                'position' => 'center',
                'timer' => 4000,
                'toast' => false,
                'showCancelButton' => true,
                'cancelButtonText' => 'Cerrar',
            ]);

            // UX: descomentar si se prefiere que al fallar se resetee el pincode introducido.
            //$this->reset('pincode');
        } else {
            $this->currentStep = 2;
        }
    }

    public function checkPostalCode()
    {
        $check = PostalCode::where('postal_code', $this->postalCode)->get();

        if ($check->count() == 0) {

            // El código postal no es válido
            $this->alert('error', __('¡Vaya!'), [
                'text' => __('El código postal que has introducido no es válido. Inténtalo de nuevo, por favor.'),
                'position' => 'center',
                'timer' => 4000,
                'toast' => false,
                'showCancelButton' => true,
                'cancelButtonText' => 'Cerrar',
            ]);
        } elseif ($check->count() > 1) {
            $this->choosePostalCode = $check;
            $this->currentStep = 3;
        } else {
            $this->locality = $check[0]->id;
            $this->currentStep = 4;
        }
    }
}
