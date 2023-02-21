<?php

declare(strict_types=1);

namespace App\Http\Livewire\Traits;

trait AddressPropertiesMessagesTrait
{

    protected $messages = [
        'zipcode.required' => 'O campo cep é obrigatório',
        'street.required' => 'O campos Logradouro é obrigatório',
        'neighborhood.required' => 'O campos Bairro é obrigatório',
        'city.required' => 'O campos Cidade é obrigatório',
        'state.required' => 'O campos Estado é obrigatório',

    ];
}
