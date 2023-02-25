<?php

declare(strict_types=1);

namespace App\Http\Livewire\Traits;

trait AddressPropertiesRulesValidationTrait
{
    protected $rules = [
        'data.zipcode' => 'required|string',
        'data.street' => 'required|string',
        'data.neighborhood' => 'required|string',
        'data.city' => 'required|string',
        'data.state' => 'required|max:2',
    ];
}
