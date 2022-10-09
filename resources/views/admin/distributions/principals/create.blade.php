<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{ route('admin.distributions.index') }}">{{ __('Distributions') }}</a> /
            {{$distribution->name}} / {{ __('Connected Principals') }} / Add
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-x-auto shadow-sm sm:rounded-lg p-5">
                @include('admin.distributions.principals._form')
            </div>
        </div>
    </div>
</x-app-layout>
