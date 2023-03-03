<div>
    <x-notifications />
    <div class="w-1/2 mx-auto py-12">
        <x-card title="Buscador de cep" class="space-y-5 w-4/5 mx-auto">

            <div class="flex flex-col">
                <x-inputs.maskable wire:model.lazy="data.zipcode" label="CEP" placeholder="Informe o seu CEP"
                    mask="#####-####" />
            </div>

            <div class="flex flex-col">
                <x-input wire:model="data.street" label="Rua" placeholder="Informe a Rua" />
            </div>

            <div class="flex flex-col">
                <x-input wire:model="data.neighborhood" label="Bairro" placeholder="Informe a Bairro" />
            </div>

            <div class="flex flex-col">
                <x-input wire:model="data.city" label="Cidade" placeholder="Informe a Cidade" />
            </div>

            <div class="flex flex-col">
                <x-input wire:model="data.state" label="Estado" placeholder="Informe a Estado" />
            </div>

            <x-slot name="footer">
                <div class="flex justify-end items-center">
                    <x-button rounded positive spinner="save" label="Salvar Endereço" wire:click="save" />
                </div>
            </x-slot>
        </x-card>
    </div>


    <div class="my-8 px-5 mx-auto w-full">
        <livewire:address />
        {{-- <table class="table-auto w-full mx-auto">
            <thead>
                <tr>
                    <th class="px-4 py-2">#</th>
                    <th class="px-4 py-2">CEP</th>
                    <th class="px-4 py-2">Logradouro</th>
                    <th class="px-4 py-2">Bairro</th>
                    <th class="px-4 py-2">Cidade</th>
                    <th class="px-4 py-2">Estado</th>
                    <th class="px-4 py-2">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($this->address as $address)
                    <tr>
                        <td class="border px-4 py-2">{{ $address->id }}</td>
                        <td class="border px-4 py-2">{{ $address->zipcode }}</td>
                        <td class="border px-4 py-2">{{ $address->street }}</td>
                        <td class="border px-4 py-2">{{ $address->neighborhood }}</td>
                        <td class="border px-4 py-2">{{ $address->city }}</td>
                        <td class="border px-4 py-2">{{ $address->state }}</td>
                        <td class="border px-4 py-2 flex gap-2">
                            <button wire:click="edit({{ $address->id }})"
                                class="flex items-center px-4 py-2 text-base font-medium text-white bg-orange-500 border border-transparent rounded-md hover:bg-orange-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500"
                                type="button">
                                Editar
                            </button>

                            <button wire:click="remove({{ $address->id }})"
                                class="flex items-center px-4 py-2 text-base font-medium text-white bg-red-500 border border-transparent rounded-md hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500"
                                type="button">
                                Excluir
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table> --}}

        {{-- <div class="flex justify-end py-4">
            {!! $this->address->links() !!}
        </div> --}}
    </div>
</div>
