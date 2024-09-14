<div class="grid grid-cols-12">
    <div class="mt-4 col-span-3 space-y-2 p-8">
        <p>Category</p>
        <select wire:model.live="category" name="s" class="w-full rounded-md border-2 border-gray-200 hover:border-sky-400">
            <option value="">Select Category</option>
            @foreach ($categoryDropdown as $item)
                <option value="{{$item->category}}">{{$item->category}}</option>
            @endforeach
        </select>
    </div>
    <div class="mt-4 col-span-3 space-y-2 p-8">
        <p>Topic</p>
        <select wire:model.live="topic" name="ssss" class="w-full rounded-md border-2 border-gray-200 hover:border-sky-400">
            <option value="">Select Topic</option>
            @foreach ($topicDropdown->unique('topic') as $category)
                <option value="{{$category->topic}}">{{$category->topic}}</option>
            @endforeach
        </select>
    </div>
    <div class="mt-4 col-span-3 space-y-2 p-8">
        <p>Subject</p>
        <select wire:model.live="subject" name="ss" class="w-full rounded-md border-2 border-gray-200 hover:border-sky-400">
            <option value="">Select Subject</option>
            @foreach ($subjectDropdown as $item)
                <option value="{{$item->subject}}">{{$item->subject}}</option>
            @endforeach
        </select>
    </div>
    <div class="mt-4 col-span-3 space-y-2 p-8">
        <p>Course Name</p>
        <x-input name="sss" wire:model.live="name" class="w-full"></x-input>
    </div>
    <div class="col-span-12 p-4">
        <x-table subject="Courses" description="Believe in yourself and you will achieve the impossible" button="Add Course" route="{{route('courses.create')}}">
        <x-slot name="tableHeader">
            <x-table-header>#</x-table-header>
            <x-table-bold-header>Name</x-table-bold-header>
            <x-table-header>Category</x-table-header>
            <x-table-header>Topic</x-table-header>
            <x-table-header>Subject</x-table-header>
            <x-table-header>Status</x-table-header>
            <x-table-header>Level</x-table-header>
            <x-table-header>Chapters</x-table-header>
            <x-table-header class="text-center">Progress</x-table-header>
            <x-table-edit-header>edit</x-table-edit-header>
        </x-slot>
        @foreach ($courses as $index => $course)
        <tr>
            <x-table-column></x-table-column>
            <x-table-bold-column class="text-sky-800 font-bold">
                <a href="{{$course->link}}">
                    {{$course->name}}
                </a>
            </x-table-bold-column>
            <x-table-column>{{$course->category}}</x-table-column>
            <x-table-column>{{$course->topic}}</x-table-column>
            <x-table-column>{{$course->subject}}</x-table-column>
            <x-table-column>
                @if ($course->status == "Preparing")
                <div class="inline-flex items-baseline rounded-full bg-sky-100 px-2.5 py-0.5 text-sm font-bold text-sky-800 md:mt-2 lg:mt-0">
                @endif
                @if ($course->status == "Learning")
                <div class="inline-flex items-baseline rounded-full bg-yellow-100 px-2.5 py-0.5 text-sm font-bold text-yellow-800 md:mt-2 lg:mt-0">
                @endif
                @if ($course->status == "Finished") 
                <div class="inline-flex items-baseline rounded-full bg-green-100 px-2.5 py-0.5 text-sm font-bold text-green-800 md:mt-2 lg:mt-0">
                @endif
                    {{$course->status}}
                </div>
            </x-table-column>
            <x-table-column>{{$course->level}}</x-table-column>
            <x-table-column>{{$course->chapters}}</x-table-column>
            <x-table-column >
            {{$course->progressBar()}}
            </x-table-column>
            <x-table-edit-column route="{{route('courses.edit', $course)}}">Edit</x-table-edit-column>
        </tr>
        @endforeach
        </x-table>
    </div>
</div>