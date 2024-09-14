<div class="grid grid-cols-12">
    <div class="col-span-3 p-4 space-y-2">
        <x-input-label>Name</x-input-label>
        <x-input name="" wire:model.live="name" class="w-full"></x-input>
    </div>
    <div class="col-span-3 p-4 space-y-2">
        <x-input-label>Status</x-input-label>
        <select name="" wire:model.live="status" class="w-full rounded-md border-2 border-gray-200 hover:border-sky-400">
            <option value="">Select Status</option>
            <option value="Waiting">Waiting</option>
            <option value="Received">Received</option>
            <option value="Pending">Pending</option>
            <option value="Submitted">Submitted</option>
            <option value="Accepted">Accepted</option>
        </select>
    </div>
    <div class="col-span-3 p-4 space-y-2">
        <x-input-label>Priority</x-input-label>
        <select name="" wire:model.live="priority" class="w-full rounded-md border-2 border-gray-200 hover:border-sky-400">
            <option value="">Select Priority</option>
            <option value="Low">Low</option>
            <option value="Medium">Medium</option>
            <option value="High">High</option>
            <option value="Important">Important</option>
        </select>
    </div>
    <div class="col-span-3 p-4 space-y-2">
        <x-input-label>Urgency</x-input-label>
        <select name="" wire:model.live="urgency" class="w-full rounded-md border-2 border-gray-200 hover:border-sky-400">
            <option value="">Select Urgency</option>
            <option value="Slow">Slow</option>
            <option value="Medium">Medium</option>
            <option value="Fast">Fast</option>
            <option value="Urgent">Urgent</option>
        </select>
    </div>
    <div class="col-span-12 p-4 space-y-2">
        <x-table subject="Missions" description="You can do it, jsut keep swimming" button="Add a New Mission" route="{{route('missions.create')}}">
            <x-slot name="tableHeader">
                <x-table-header>Company</x-table-header>
                <x-table-bold-header>Name</x-table-bold-header>
                <x-table-header>Account</x-table-header>
                <x-table-header>Priority</x-table-header>
                <x-table-header>Urgency</x-table-header>
                <x-table-header>Submission Date</x-table-header>
                <x-table-header>Status</x-table-header>
                <x-table-header>Income</x-table-header>
                <x-table-edit-header></x-table-edit-header>
            </x-slot>
            @foreach ($missions as $mission)    
            <tr>
                <x-table-column>{{$mission->company}}</x-table-column>
                <x-table-bold-column>
                    <a href="{{route('missions.show', $mission)}}">
                        {{$mission->name}}
                    </a>
                </x-table-bold-column>
                <x-table-column>
                    <livewire:mission-account-update :mission="$mission" wire:key="mission-{{$mission->id}}">
                </x-table-column>
                <x-table-column>{{$mission->priority}}</x-table-column>
                <x-table-column>{{$mission->urgency}}</x-table-column>
                <x-table-column>{{isset($mission->submission_date) ? $mission->submission_date->format('d/m/Y') : ''}}</x-table-column>
                <x-table-column>{{$mission->status}}</x-table-column>
                <x-table-column>{{number_format($mission->income, '0', '.', ',')}}</x-table-column>
                <x-table-edit-column route="{{route('missions.edit', $mission)}}">Edit</x-table-edit-column>
            </tr>
            @if (isset($mission->tasks->first()->id))
            @foreach ($mission->tasks as $task)
            @livewire('task-index', ['task' => $task], key($task->id))
            @endforeach
            @endif
            @endforeach
        </x-table>
    </div>
</div>
