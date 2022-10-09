<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{ route('admin.principals.index') }}">
            {{ __('Principals') }}
            </a>/ {{ $principal->name }} / {{ __('Products') }}
        </h2>
        <a href="{{ route('admin.principals.products.create', [$principal]) }}">
            <button class="btn btn-primary">+ Add Products</button>
        </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-x-auto shadow-sm sm:rounded-lg p-5">
                <table class="table table-compact w-full">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Generic Name</th>
                        <th>Strength</th>
                        <th>Pack Size</th>
                        <th>Carton Size</th>
                        <th>Created At</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->generic_name }}</td>
                        <td>{{ $product->strength }}</td>
                        <td>{{ $product->pack_size }}</td>
                        <td>{{ $product->pack_size }} x {{ $product->carton_size }}</td>
                        <td>{{ $product->created_at }}</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
