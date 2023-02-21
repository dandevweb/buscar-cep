<?php

declare(strict_types=1);

namespace App\Http\Livewire;

use App\Models\Address;
use Livewire\Component;
use WireUi\Traits\Actions;
use Illuminate\Support\Facades\Http;
use App\Http\Livewire\Traits\AddressPropertiesRulesTrait;
use App\Http\Livewire\Traits\AddressPropertiesMessagesTrait;

class SearchZipcode extends Component
{
    use Actions, AddressPropertiesRulesTrait, AddressPropertiesMessagesTrait;

    public string $zipcode = '';
    public string $street = '';
    public string $neighborhood = '';
    public string $city = '';
    public string $state = '';

    public array $addresses = [];

    public function updatedZipcode(string $value)
    {
        $response = Http::get("https://viacep.com.br/ws/{$value}/json/")->json();

        $this->zipcode = $response['cep'];
        $this->street = $response['logradouro'];
        $this->neighborhood = $response['bairro'];
        $this->city = $response['localidade'];
        $this->state = $response['uf'];
    }

    public function save(): void
    {
        $this->validate();

        Address::updateOrCreate(
            [
                'zipcode' => $this->zipcode,
            ],
            [
                'street' => $this->street,
                'neighborhood' => $this->neighborhood,
                'city' => $this->city,
                'state' => $this->state,
            ]
        );

        $this->render();

        $this->notification()->success('Salvar Endereço', 'O Endereço foi salvo com sucesso!');

        $this->resetExcept('addresses');
    }

    public function edit(string $id)
    {
        $address = Address::find($id);

        $this->zipcode = $address->zipcode;
        $this->street = $address->street;
        $this->neighborhood = $address->neighborhood;
        $this->city = $address->city;
        $this->state =  $address->state;
    }

    public function remove(string $id)
    {
        $address = Address::find($id);

        $address?->delete();

        $this->render();

        $this->notification()->success('Excluído', 'Endereço excluído com sucesso!');
    }

    public function render()
    {
        $this->addresses = Address::all()->toArray();

        return view('livewire.search-zipcode');
    }
}
