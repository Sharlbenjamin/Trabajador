<div class="grid grid-cols-12">
    <div class="col-span-3 m-2">
        <p>Select Category</x>    
        <select wire:model.live="category" name="s" class="w-full">
            <option value="">Select Category</option>
            @foreach ($categories as $item)
                <option value="{{$item->category}}">{{$item->category}}</option>
            @endforeach
        </select>
    </div>
    <div class="col-span-3 m-2">
        <p>Select Topic</p>    
        <select wire:model.live="topic" name="s" class="w-full">
            <option value="">Select Topic</option>
            @foreach ($topics as $item)
                <option value="{{$item->topic}}">{{$item->topic}}</option>
            @endforeach
        </select>
    </div>   
    <div class="col-span-3 m-2">
        <p>Select Subject</p>    
        <select wire:model.live="subject" name="s" class="w-full">
            <option value="">Select Subject</option>
            @foreach ($subjects as $item)
                <option value="{{$item->subject}}">{{$item->subject}}</option>
            @endforeach
        </select>
    </div>  
    
    <div class="col-span-12 m-2">
        <x-table subject="Courses" Description="" button="Add a New Course" route="route('courses.create')">
            <x-slot name="tableHeader">
                <x-table-bold-header>Name</x-table-bold-header>
                <x-table-header>Progress</x-table-header>
            </x-slot>
            @foreach($courses as $index => $course)
            <tr>
                <x-table-bold-column>{{$course->name}}</x-table-bold-column>
                <x-table-column>
                    <livewire:progress-bar :course="$course" :index="$index" wire:key="Course{{$course->id}}">
                </x-table-column>
            </tr>
            @endforeach
        </x-table>
    </div>  
</div>
