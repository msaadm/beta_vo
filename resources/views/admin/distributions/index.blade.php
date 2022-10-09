<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Distributions') }}
        </h2>
        <a href="{{ route('admin.distributions.create') }}">
            <button class="btn btn-primary">+ Add Distribution</button>
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
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($distributions as $distribution)
                    <tr>
                        <td>{{ $distribution->name }}</td>
                        <td>{{ $distribution->email }}</td>
                        <td>{{ $distribution->created_at }}</td>
                        <td>
                            <a href="{{ route('admin.distributions.principals.index', [$distribution]) }}">
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
