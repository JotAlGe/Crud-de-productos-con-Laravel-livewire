
<div class="px-8 w-11/12 mx-auto shadow">
    {{-- modal --}}
    {{--f --}}

    <button wire:click="$toggle('modal')" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 border border-green-700 rounded mx-2 bg-green-700 mt-3 mb-0">
    Create
    </button>
    @if($modal)

        @include('livewire.create')

    @endif
    @if($showEdit)

        @include('livewire.edit')

    @endif

    <table class="table-fixed w-full mb-8">
        <thead>
            <tr>
            <th class="w-1/2 px-4 py-2">Name</th>
            <th class="w-1/4 px-4 py-2">Amount</th>
            <th class="w-1/4 px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($products as $product)
            <tr>
                <td class="border px-4 py-2">{{ $product->title }}</td>
                <td class="border px-4 py-2">{{ $product->amount}}</td>
                <td class="border px-4 py-2 flex">
                    <button wire:click="edit('{{$product->id}}')" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded mx-2">
                    Edit
                    </button>
                    |
                    <button class="bg-blue-500 hover:bg-red-700 text-white font-bold py-2 px-4 border border-red-700 rounded mx-2 bg-red-700">
                    Delete
                    </button>
                </td>
            </tr>
            @empty
                <h2>No hay productos almacenados</h2>
            @endforelse
  </tbody>
</table>
</div>
