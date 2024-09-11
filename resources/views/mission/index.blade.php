<x-app-layout>
    <x-slot name="header">
        Missions Dashboard
    </x-slot>
    <div class="py-12">
        <div class="w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                @livewire('mission-index')
            </div>
        </div>
    </div>
</x-app-layout>