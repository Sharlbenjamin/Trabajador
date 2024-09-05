<x-app-layout>
    <x-slot name="header">
        Courses
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="grid grid-cols-12">
                    <div class="col-span-12 p-4">
                        <x-table subject="Courses" description="Believe in yourself and you will achieve the impossible" button="Add Course" route="{{route('courses.create')}}">
                            <x-slot name="tableHeader">
                                <x-table-bold-header>Name</x-table-bold-header>
                                <x-table-header>Subject</x-table-header>
                                <x-table-header>Status</x-table-header>
                                <x-table-header>Level</x-table-header>
                                <x-table-header>Chapters</x-table-header>
                                <x-table-header class="text-center">Progress</x-table-header>
                                <x-table-edit-header>edit</x-table-edit-header>
                            </x-slot>
                            @if (isset($courses->first()->id))
                            @foreach ($courses as $course)
                            <tr>
                                <x-table-bold-column>{{$course->name}}</x-table-bold-column>
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
                                <x-table-column>
                                    <div x-data="{bar : false}" @click="bar = true">
                                        <div class="mt-6 cursor-pointer" aria-hidden="true">
                                          <div class="overflow-hidden rounded-full bg-gray-200">
                                            <div class="h-2 rounded-full bg-indigo-600" style="width: {{$course->progressBar()}}"></div>
                                          </div>
                                          <div class="mt-6 hidden grid-cols-3 text-sm text-gray-600 sm:grid">
                                            <div class="text-indigo-600">0%</div>
                                            <div class="{{$course->progressBar() >= 50 ? 'text-indigo-600' : ''}} text-center">50%</div>
                                            <div class="{{$course->progressBar() == 100 ? 'text-indigo-600' : ''}} text-right">100%</div>
                                          </div>
                                        </div>
                                        <div class="" x-show="bar">  
                                          @livewire('progress-bar', ['course' => $course], key($course->id))
                                          </div>
                                      </div>
                                </x-table-column>
                                <x-table-edit-column route="{{route('courses.edit', $course)}}">Edit</x-table-edit-column>
                            </tr>
                            @endforeach
                            @endif
                        </x-table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>