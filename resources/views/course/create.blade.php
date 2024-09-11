<x-app-layout>
    <x-slot name="header">
        Add Course
    </x-slot>
    <div class="py-12">
        <div class="w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
                <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                <div class="grid grid-cols-12">
                    <div class="col-span-4"></div>
                    <div class="col-span-4 border-2 rounded p-4">
                        @if (isset($course->id))
                        @livewire('create-course', ['course' => $course])
                        @else
                        @livewire('create-course')
                        @endif
                            @if (isset($course->id))
                                @livewire('delete-course', ['course' => $course], key($course->id))
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>