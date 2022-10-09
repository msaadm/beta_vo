<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{ route('admin.distributions.index') }}">{{ __('Distributions') }}</a> /
            {{$distribution->name}} / {{ __('Connected Principals') }}
        </h2>
        <a href="{{ route('admin.distributions.principals.create',[$distribution]) }}">
            <button class="btn btn-primary">+ Connect Principal</button>
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
                        <th>Email</th>
                        <th># of Products</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($principals as $principal)
                    <tr>
                        <td>{{ $principal->name }}</td>
                        <td>{{ $principal->email }}</td>
                        <td>{{ $principal->products()->count() }}</td>
                        <td>{{ $principal->created_at }}</td>
                        <td>
                            <a href="{{ route('admin.distributions.principals.batches.index', [$distribution, $principal]) }}">
                            <button class="btn btn-sm btn-accent">Batches</button>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
