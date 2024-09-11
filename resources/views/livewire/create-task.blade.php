<tr class="">
    <x-table-column></x-table-column>
    <x-table-column>
        <input type="checkbox" wire:model.live="status" class="rounded-lg border-gray-300">
    </x-table-column>
    <x-table-column colspan="2">
        <div class="relative">
            <input type="text" wire:model.live="name" id="name" class="peer block w-full border-0 bg-gray-50 py-1.5 text-gray-900 focus:ring-0 sm:text-sm sm:leading-6" placeholder="Task Name">
            <div class="absolute inset-x-0 bottom-0 border-t border-gray-300 peer-focus:border-t-2 peer-focus:border-sky-600" aria-hidden="true"></div>
          </div>
    </x-table-column>
    <x-table-column></x-table-column>
    <x-table-column colspan="2">
        <input type="date" wire:model.live="time" class="rounded-md border-gray-300 border-2 p-1 hover:border-sky-600">
    </x-table-column>
    <x-table-column colspan="2">
        <x-green-button wire:click="CreateTask">Create Task</x-green-button>
    </x-table-column>
</tr>
<script>
    window.addEventListener('refreshComponent', event => {
       window.location.reload(false); 
    })
  </script>