<x-app-layout>
    <x-slot name="header">
        New Application
    </x-slot>
    <div class="py-12">
        <div class="w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="grid grid-cols-12 p-4">
                    <div class="col-span-4"></div>
                    <div class="col-span-4 p-4 border-2 rounded-md">
                        @if (isset($application->id))
                        <form action="{{route('applications.update', $application)}}" method="POST">
                            @method('PUT')
                        @else
                        <form action="{{route('applications.store')}}" method="POST">
                        @endif
                        @csrf
                        <input type="hidden" value="{{Auth::user()->id}}" name="user_id">
                        {{-- account --}}
                        <div class="mt-4">
                            <x-input-label class="mb-2">Account</x-input-label>
                            <select name="account_id" class="w-full rounded-md border-2 border-gray-200 hover:border-sky-200">
                                <option value="">Select Account</option>
                                @foreach ($accounts as $account)
                                    <option value="{{$account->id}}">{{$account->website}}</option>
                                @endforeach
                            </select>
                            @error('account_id')
                                <p class="text-rose-800 font-bold">{{$message}}</p>
                            @enderror
                        </div>
                        {{-- company --}}
                        <div class="mt-4">
                            <x-input-label class="mb-2">Company</x-input-label>
                            <x-input class="w-full" name="company"></x-input>
                        </div>
                        {{-- date --}}
                        <div class="mt-4">
                            <x-input-label class="mb-2">Date</x-input-label>
                            <input type="date" class="w-full rounded-md border-2 border-gray-200 hover:border-sky-200" name="date">
                        </div>
                        {{-- priority --}}
                        <div class="mt-4">
                            <x-input-label class="mb-2">Priority</x-input-label>
                            <select name="priority" class="w-full rounded-md border-2 border-gray-200 hover:border-sky-200">
                                <option value="">Select Priority</option>
                                @foreach ($priorities as $priority)
                                <option value="{{$priority}}">{{$priority}}</option>
                                @endforeach
                            </select>
                        </div>
                        {{-- urgency --}}
                        <div class="mt-4">
                            <x-input-label class="mb-2">Job Title</x-input-label>
                            <x-input class="w-full" name="job_title"></x-input>
                        </div>
                        {{-- submission_data --}}
                        <div class="mt-4">
                            <x-input-label class="mb-2">Expected Reply Date</x-input-label>
                            <input type="date" class="w-full rounded-md border-2 border-gray-200 hover:border-sky-200" name="expected_reply_date">
                        </div>
                        {{-- status --}}
                        <div class="mt-4">
                            <x-input-label class="mb-2">status</x-input-label>
                            <select name="status" class="w-full rounded-md border-2 border-gray-200 hover:border-sky-200">
                                <option value="">Select Priority</option>
                                @foreach ($statuses as $status)
                                <option value="{{$status}}">{{$status}}</option>
                                @endforeach
                            </select>
                        </div>
                        {{-- income --}}
                        <div class="mt-4">
                            <x-input-label class="mb-2">Salary</x-input-label>
                            <x-input class="w-full" name="salary"></x-input>
                        </div>
                        <div class="mt-4 flex space-x-2 justify-end">
                            <x-green-button>{{isset($application->id) ? 'Update' : 'Submit'}}</x-green-button>
                            <a href="{{url()->previous()}}">
                                <x-danger-button>Cancel</x-danger-button>
                            </a>
                        </div>
                        @if(isset($application->id))
                            @livewire('delete-application', ['application' => $application], key($application->id))
                        @endif
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>