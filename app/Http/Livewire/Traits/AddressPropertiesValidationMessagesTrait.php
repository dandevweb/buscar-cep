<?php

declare(strict_types=1);

namespace App\Http\Livewire\Traits;

trait AddressPropertiesValidationMessagesTrait
{

    protected $messages = [
        'data.zipcode.required' => 'O campo cep é obrigatório',
        'data.street.required' => 'O campo Logradouro é obrigatório',
        'data.neighborhood.required' => 'O campos Bairro é obrigatório',
        'data.city.required' => 'O campo Cidade é obrigatório',
        'data.state.required' => 'O campo Estado é obrigatório',

    ];
}
