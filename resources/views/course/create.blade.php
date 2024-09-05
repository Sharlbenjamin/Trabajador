<x-app-layout>
    <x-slot name="header">
        Add Course
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
                @if (isset($course->id))
                <form action="{{route('courses.update', $course)}}" method="POST">
                @method('PUT')
                @else
                <form action="{{route('courses.store')}}" method="POST">
                @endif
                @csrf
                <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                    <div class="grid grid-cols-12">
                        <div class="col-span-4"></div>
                        <div class="col-span-4 border-2 rounded p-4">
                    {{-- Name --}}
                            <div class="mt-4 space-y-4">
                                <x-input-label>Name</x-input-label>
                                <x-input name="name" value="{{isset($course->name) ? $course->name : ''}}" class="w-full"></x-input>
                            </div>
                            {{-- Subject --}}
                            <div class="mt-4 space-y-4">
                                <x-input-label>Subject</x-input-label>
                                <x-input name="subject" value="{{isset($course->subject) ? $course->subject : ''}}" class="w-full"></x-input>
                            </div>
                            {{-- Level --}}
                            <div class="mt-4 space-y-4">
                                <x-input-label>Level</x-input-label>
                                <select name="level" class="w-full border-2 hover:border-sky-200 border-gray-200 rounded-md focus:border-sky-600">
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
                                <select name="status" class="w-full border-2 hover:border-sky-200 border-gray-200 rounded-md focus:border-sky-600">
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
                                <x-input name="chapters" value="{{isset($course->chapters) ? $course->chapters : ''}}" class="w-full"></x-input>
                            </div>
                            {{-- Length --}}
                            <div class="mt-4 space-y-4">
                                <x-input-label>Length</x-input-label>
                                <x-input name="length" value="{{isset($course->length) ? $course->length : ''}}" class="w-full"></x-input>
                            </div>
                            {{-- Progress --}}
                            <div class="mt-4 space-y-4">
                                <x-input-label>Progress</x-input-label>
                                <x-input name="progress" value="{{isset($course->progress) ? $course->progress : ''}}" class="w-full"></x-input>
                            </div>
                            <div class="mt-4 flex space-x-4 justify-end">
                                <x-green-button>{{isset($course->id) ? 'Update': 'Submit'}}</x-green-button>
                                <a href="{{url()->previous()}}">
                                    <x-danger-button>Cancel</x-danger-button>
                                </a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>