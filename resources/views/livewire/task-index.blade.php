<tr>
    <x-table-column></x-table-column>
    <x-table-column>
        <input type="checkbox" wire:model.live="status" wire:click="UpdateTask" class="rounded-full border-gray-300">
    </x-table-column>
    <x-table-bold-header>{{$task->name}}</x-table-bold-header>
    <x-table-column></x-table-column>
    <x-table-column></x-table-column>
    <x-table-column>{{isset($task->time) ? $task->time->format('d/m/Y') : ''}}</x-table-column>
    <x-table-column>
        @if ($task->status == 1)
        <div class="inline-flex items-baseline rounded-full bg-green-100 px-2.5 py-0.5 text-sm font-bold text-green-800 md:mt-2 lg:mt-0">
            Done
        </div>
        @else
        <div class="inline-flex items-baseline rounded-full bg-rose-100 px-2.5 py-0.5 text-sm font-bold text-rose-800 md:mt-2 lg:mt-0">
            Not Done
        </div>
        @endif
    </x-table-column>
    <x-table-column class="text-rose-600 cursor-pointer font-bold" wire:click="DeleteTask">Delete this Task</x-table-column>
</tr>