<x-app-layout>
    <x-slot name="header">
        Accounts
    </x-slot>
    <div class="py-12">
        <div class="w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                @if (isset($mission->id))
                @livewire('mission-create', ['mission' => $mission])
                @else
                @livewire('mission-create')
                @endif
            </div>
        </div>
    </div>
</x-app-layout>