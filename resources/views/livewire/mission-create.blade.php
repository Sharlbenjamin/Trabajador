<div class="grid grid-cols-12">
    <div class="col-span-4"></div>
    <div class="col-span-4 border rounded-md p-4 m-4">
        <div class="mt-4 space-y-4">
            <x-input-label>Name</x-input-label>
            <x-input wire:model.live="name" name="" class="w-full"></x-input>
        </div>
        <div class="mt-4 space-y-4">
            <x-input-label>Income</x-input-label>
            <x-input wire:model.live="income" name="" type="number" class="w-full"></x-input>
        </div>
        <div class="mt-4 space-y-4">
            <x-input-label>Company Name</x-input-label>
            <x-input wire:model.live="company" name="" class="w-full"></x-input>
        </div>
        <div class="mt-4 space-y-4">
            <x-input-label>Submission Date</x-input-label>
            <input type="date" wire:model.live="submission_date" class="w-full border-2 border-gray-200 hover:border-sky-400 rounded-md">
        </div>
        <div class="mt-4 space-y-4">
            <x-input-label>Account</x-input-label>
            <select wire:model.live="account_id" class="w-full border-2 border-gray-200 hover:border-sky-400 rounded-md">
                <option value="">Select Account</option>
                @foreach ($accountsDropdown as $item)
                <option value="{{$item->id}}">{{$item->website}}</option>
                @endforeach
            </select>
        </div>
        <div class="mt-4 space-y-4">
            <x-input-label>Priority</x-input-label>
            <select wire:model.live="priority" class="w-full border-2 border-gray-200 hover:border-sky-400 rounded-md">
                <option value="">Select Priority</option>
                <option value="Low">Low</option>
                <option value="Medium">Medium</option>
                <option value="High">High</option>
                <option value="Important">Important</option>
            </select>
        </div>
        <div class="mt-4 space-y-4">
            <x-input-label>Urgency</x-input-label>
            <select wire:model.live="urgency" class="w-full border-2 border-gray-200 hover:border-sky-400 rounded-md">
                <option value="">Select Urgency</option>
                <option value="Slow">Slow</option>
                <option value="Medium">Medium</option>
                <option value="Fast">Fast</option>
                <option value="Urgent">Urgent</option>
            </select>
        </div>
        <div class="mt-4 space-y-4">
            <x-input-label>Status</x-input-label>
            <select wire:model.live="status" class="w-full border-2 border-gray-200 hover:border-sky-400 rounded-md">
                <option value="">Select Status</option>
                <option value="Waiting">Waiting</option>
                <option value="Received">Received</option>
                <option value="Pending">Pending</option>
                <option value="Submitted">Submitted</option>
                <option value="Accepted">Accepted</option>
            </select>
        </div>
        <div class="mt-4 space-x-2 flex justify-end">
            @if ($mission)
            <x-green-button wire:click="UpdateMission">Update</x-green-button>
            @else
            <x-green-button wire:click="CreateMission">Submit</x-green-button>
            @endif
            <a href="{{url()->previous()}}">
                <x-danger-button>Cencel</x-danger-button>
            </a>
        </div>
        <div class="mt-4">
            @if ($mission)
            <x-danger-button class="w-full" wire:click="DeleteMission">Delete</x-danger-button>
            @endif
        </div>
    </div>
</div>