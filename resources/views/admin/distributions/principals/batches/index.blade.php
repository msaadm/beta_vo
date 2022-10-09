<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{ route('admin.distributions.index') }}">{{ __('Distributions') }}</a> /
            {{$distribution->name}} /
            <a href="{{ route('admin.distributions.principals.index', [$distribution, $principal]) }}">{{ __('Connected Principals') }}</a> /
            Batches
        </h2>
        <a href="{{ route('admin.distributions.principals.batches.create', [$distribution, $principal]) }}">
            <button class="btn btn-primary">+ Add Batch</button>
        </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-x-auto shadow-sm sm:rounded-lg p-5">
                <table class="table table-compact w-full">
                    <thead>
                    <tr>
                        <th>Batch #</th>
                        <th>Product</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($batches as $batch)
                    <tr>
                        <td>{{ $batch->serial }}</td>
                        <td>{{ $batch->created_at }}</td>
                        <td>
                            <a href="{{ route('admin.distributions.principals.index', [$distribution, $principal]) }}">
                                <button class="btn btn-sm btn-accent">Connected Principals</button>
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
