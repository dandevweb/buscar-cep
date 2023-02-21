<div>
    <x-notifications />
    <form class="p-8 bg-gray-200 flex flex-col w-1/2 mx-auto gap-4">
        <h1>Buscador de cep</h1>
        <div class="flex flex-col">
            <label for="zipcode">CEP</label>
            <input class="border" id="zipcode" type="text" wire:model.lazy="zipcode">
            @error('zipcode')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>
        <div class="flex flex-col">
            <label for="street">Logradouro</label>
            <input class="border" id="street" type="text" wire:model="street">
            @error('street')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>
        <div class="flex flex-col">
            <label for="neighborhood">Bairro</label>
            <input class="border" id="neighborhood" type="text" wire:model="neighborhood">
            @error('neighborhood')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>
        <div class="flex flex-col">
            <label for="city">Cidade</label>
            <input class="border" id="city" type="text" wire:model="city">
            @error('city')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>
        <div class="flex flex-col">
            <label for="state">Estado</label>
            <input class="border" id="state" type="text" wire:model="state">
            @error('state')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <button class="px-4 py-2 bg-green-500 hover:bg-green-400 text-white rounded-md" type="button"
                wire:click="save">Salvar Endereço</button>
        </div>
    </form>



    <div class="my-8 w-2/3 mx-auto">
        <table class="table-auto w-full mx-auto">
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
                @foreach ($addresses as $address)
                    <tr>
                        <td class="border px-4 py-2">{{ $address['id'] }}</td>
                        <td class="border px-4 py-2">{{ $address['zipcode'] }}</td>
                        <td class="border px-4 py-2">{{ $address['street'] }}</td>
                        <td class="border px-4 py-2">{{ $address['neighborhood'] }}</td>
                        <td class="border px-4 py-2">{{ $address['city'] }}</td>
                        <td class="border px-4 py-2">{{ $address['state'] }}</td>
                        <td class="border px-4 py-2 flex gap-2">
                            <button wire:click="edit({{ $address['id'] }})"
                                class="flex items-center px-4 py-2 text-base font-medium text-white bg-orange-500 border border-transparent rounded-md hover:bg-orange-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500"
                                type="button">
                                Editar
                            </button>

                            <button wire:click="remove({{ $address['id'] }})"
                                class="flex items-center px-4 py-2 text-base font-medium text-white bg-red-500 border border-transparent rounded-md hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500"
                                type="button">
                                Excluir
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>
    </div>
</div>
