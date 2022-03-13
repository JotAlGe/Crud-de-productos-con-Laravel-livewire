
<div class="p-6 sm:px-20 bg-white border-b border-gray-200">
    <div>
        <x-jet-application-logo class="block h-12 w-auto" />
    </div>

    <div class="mt-8 text-2xl">
        Crud de productos con laravel livewire!
    </div>

</div>

<div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2 px-8 py-8">
    {{-- vista del componente "productos" --}}
    {{-- <livewire:products /> --}}
    <a href="{{ route('products') }}" class="text-green-600 hover:text-green-700">See products</a>
</div>
