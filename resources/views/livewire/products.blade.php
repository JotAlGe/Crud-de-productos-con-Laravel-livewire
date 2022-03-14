
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

    {{-- delete messages --}}
    @if(session()->has('deleted'))
        <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-5" role="alert">
        <div class="flex">
        <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
            <div>
                <p class="font-bold">{{ session('deleted') }} </p>
                </div>
            </div>
        </div>
    @endif

    {{--success messages --}}
    @if(session()->has('created'))
        <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-5" role="alert">
        <div class="flex">
        <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
            <div>
                <p class="font-bold">{{ session('created') }}</p>
                </div>
            </div>
        </div>
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
                    <button wire:click="delete({{$product->id}})" class="bg-blue-500 hover:bg-red-700 text-white font-bold py-2 px-4 border border-red-700 rounded mx-2 bg-red-700">
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
