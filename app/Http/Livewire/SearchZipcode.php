<?php

declare(strict_types=1);

namespace App\Http\Livewire;

use App\Actions\AddressGetPropertiesAction;
use App\Actions\AddressStoreAction;
use App\Models\Address;
use Livewire\Component;
use WireUi\Traits\Actions;
use App\Services\ViaCep\ViaCepService;
use App\Http\Livewire\Traits\AddressPropertiesRulesValidationTrait;
use App\Http\Livewire\Traits\AddressPropertiesValidationMessagesTrait;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class SearchZipcode extends Component
{
    use Actions, AddressPropertiesRulesValidationTrait, AddressPropertiesValidationMessagesTrait;

    public array $data = [];
    public array $addresses = [];

    public function updated(string $key, string $value): void
    {
        if ($key === 'data.zipcode') {
            $this->data = ViaCepService::handle($value);
        }
    }

    public function save(): void
    {
        $this->validate();

        AddressStoreAction::save($this->data);

        $this->showNotification('Salvar Endereço', 'O Endereço foi salvo com sucesso!');

        $this->resetExcept('addresses');
    }

    public function edit(string $id)
    {
        $this->data = AddressGetPropertiesAction::handle($id);
    }

    public function remove(string $id)
    {
        Address::find($id)?->delete();

        $this->showNotification('Excluído', 'Endereço excluído com sucesso!');
    }

    private function showNotification(string $title, string $message): void
    {
        $this->render();

        $this->notification()->success($title, $message);
    }

    public function mount(): void
    {
        $this->data = AddressGetPropertiesAction::getEmptyProperties();
    }

    public function render(): Factory|View|Application
    {
        $this->addresses = Address::all()->toArray();

        return view('livewire.search-zipcode');
    }
}
