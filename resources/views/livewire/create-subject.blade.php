<div class="relative z-10">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity">
        <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
            <div class="relative transform overflow-hidden rounded-lg bg-white px-4 pb-4 pt-5 text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-sm sm:p-6">
                <div class="rounded border-2 p-4">
                    <div class="mt-4 space-y-4">
                        <x-input-label>Category</x-input-label>
                        <select wire:model.live="categoryDropdown" class="w-full rounded-md border-gray-100">
                            <option value="">Select Category</option>
                            @foreach ($categories as $item)
                            <option value="{{$item->category}}">{{$item->category}}</option>
                            @endforeach
                            <option value="other">Other</option>
                        </select>
                        @if ($categoryDropdown == 'other')
                        <x-input wire:model.live="category" name="" class="w-full"></x-input>
                        @endif
                    </div>
                    <div class="mt-4 space-y-4">
                        <x-input-label>Topic</x-input-label>
                        <select wire:model.live="topicDropdown" class="w-full rounded-md border-gray-100">
                            <option value="">Select Topic</option>
                            @foreach ($topics as $item)
                            <option value="{{$item->topic}}">{{$item->topic}}</option>
                            @endforeach
                            <option value="other">Other</option>
                        </select>
                        @if ($topicDropdown == 'other')
                        <x-input wire:model.live="topic" name="" class="w-full"></x-input>
                        @endif
                    </div>
                    <div class="mt-4 space-y-4">
                        <x-input-label>Subject</x-input-label>
                        <select wire:model.live="subjectDropdown" class="w-full rounded-md border-gray-100">
                            <option value="">Select Subject</option>
                            @foreach ($subjects as $item)
                            <option value="{{$item->subject}}">{{$item->subject}}</option>
                            @endforeach
                            <option value="other">Other</option>
                        </select>
                        @if ($subjectDropdown == 'other')
                        <x-input wire:model.live="subject" name="" class="w-full"></x-input>
                        @endif
                    </div>
                    <div class="mt-4 flex justify-end space-x-2">
                        <x-green-button wire:click="CreateSubject" @click="show = false">Submit</x-green-button>
                        <x-danger-button @click="show=false">Cancel</x-danger-button>
                    </div>
                    <div class="mt-4">
                        @if (isset($mainSubject->id))
                        <x-danger-button wire:click="DeleteSubject" class="w-full">Delete</x-danger-button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>