<?php

declare(strict_types=1);

namespace App\Http\Livewire\Traits;

trait AddressPropertiesRulesTrait
{
    protected $rules = [
        'zipcode' => 'required|string',
        'street' => 'required|string',
        'neighborhood' => 'required|string',
        'city' => 'required|string',
        'state' => 'required|max:2',
    ];
}
