<div>
    {{-- Name --}}
    <div class="mt-4 space-y-4">
        <x-input-label>Name</x-input-label>
        <x-input wire:model.live="name" name="naame" value="{{isset($course->name) ? $course->name : ''}}" class="w-full"></x-input>
    </div>
    {{-- Link --}}
    <div class="mt-4 space-y-4">
        <x-input-label>Course Link</x-input-label>
        <x-input name="" wire:model.live="link" class="w-full"></x-input>
    </div>
    {{-- Category --}}
    <div class="mt-4 space-y-4">
        <x-input-label>Category</x-input-label>
        <select wire:model.live="category" name="subject_id" class="w-full border-2 hover:border-sky-200 border-gray-200 rounded-md focus:border-sky-600">
            @if (isset($course->category))
            <option value="{{$course->category}}">{{$course->category}}</option>
            @else
            <option value="">Select Category</option>
            @endif
            @foreach($categories as $category)
            <option value="{{$category->category}}">{{$category->category}}</option>
            @endforeach
            <option value="other">Other</option>
        </select>
        <div class="" x-data="{show : false}">
            <x-green-button @click="show = !show">Create Category</x-green-button>
            <div class="" x-show="show">
                @livewire('create-subject')
            </div>
        </div>
    </div>
    {{-- Topic --}}
    <div class="mt-4 space-y-4">
        <x-input-label>Topic</x-input-label>
        <select wire:model.live="topic" name="subject_id" class="w-full border-2 hover:border-sky-200 border-gray-200 rounded-md focus:border-sky-600">
            @if (isset($course->topic))
            <option value="{{$course->topic}}">{{$course->topic}}</option>
            @else
            <option value="">Select Topic</option>
            @endif
            @foreach($topics as $topic)
            <option value="{{$topic->topic}}">{{$topic->topic}}</option>
            @endforeach
            <option value="other">Other</option>
        </select>
        <div class="" x-data="{show : false}">
            <x-green-button @click="show = !show">Create Topic</x-green-button>
            <div class="" x-show="show">
                @livewire('create-subject')
            </div>
        </div>
    </div>
    {{-- Subject --}}
    <div class="mt-4 space-y-4">
        <x-input-label>Subject</x-input-label>
        <select wire:model.live="subject" name="subject_id" class="w-full border-2 hover:border-sky-200 border-gray-200 rounded-md focus:border-sky-600">
            @if (isset($course->subject))
            <option value="{{$course->subject}}">{{$course->subject}}</option>
            @else
            <option value="">Select Subject</option>
            @endif
            @foreach($subjects as $subject)
            <option value="{{$subject->subject}}">{{$subject->subject}}</option>
            @endforeach
            <option value="other">Other</option>
        </select>
        <div class="" x-data="{show : false}">
            <x-green-button @click="show = !show">Create Subject</x-green-button>
            <div class="" x-show="show">
                @livewire('create-subject')
            </div>
        </div>
    </div>
     {{-- Level --}}
     <div class="mt-4 space-y-4">
        <x-input-label>Level</x-input-label>
        <select wire:model.live="level" name="level" class="w-full border-2 hover:border-sky-200 border-gray-200 rounded-md focus:border-sky-600">
            @if (isset($course->level))
            <option value="{{$course->level}}">{{$course->level}}</option>
            @else
            <option value="">Select Level</option>
            @endif
            <option value="Easy">Easy</option>
            <option value="Medium">Medium</option>
            <option value="Hard">Hard</option>
            <option value="Difficult">Difficult</option>
        </select>
        @error('level')
            <p class="text-rose-800 font-medium">{{$message}}</p>
        @enderror
    </div>
    {{-- Status --}}
    <div class="mt-4 space-y-4">
        <x-input-label>Status</x-input-label>
        <select wire:model.live="status" name="status" class="w-full border-2 hover:border-sky-200 border-gray-200 rounded-md focus:border-sky-600">
            @if (isset($course->status))
            <option value="{{$course->status}}">{{$course->status}}</option>
            @else
            <option value="">Select status</option>
            @endif
            <option value="Preparing">Preparing</option>
            <option value="Learning">Learning</option>
            <option value="Finished">Finished</option>
        </select>
        @error('status')
            <p class="text-rose-800 font-medium">{{$message}}</p>
        @enderror
    </div>
    {{-- Chapters --}}
    <div class="mt-4 space-y-4">
        <x-input-label>Chapters</x-input-label>
        <x-input name="chapters" wire:model.live="chapters" value="{{isset($course->chapters) ? $course->chapters : ''}}" class="w-full"></x-input>
    </div>
    {{-- Length --}}
    <div class="mt-4 space-y-4">
        <x-input-label>Length</x-input-label>
        <x-input name="length" wire:model.live="length" value="{{isset($course->length) ? $course->length : ''}}" class="w-full"></x-input>
    </div>
    {{-- Progress --}}
    <div class="mt-4 space-y-4">
        <x-input-label>Progress</x-input-label>
        <x-input name="progress" wire:model.live="progress" value="{{isset($course->progress) ? $course->progress : ''}}" class="w-full"></x-input>
    </div>
    <div class="mt-4 flex space-x-4 justify-end">
        @if(isset($course->id))
        <x-green-button wire:click="UpdateCourse">Update</x-green-button>
        @else
        <x-green-button wire:click="CreateCourse">Create</x-green-button>
        @endif
        <a href="{{url()->previous()}}">
            <x-danger-button>Cancel</x-danger-button>
        </a>
    </div>
</div>
