<x-app-layout>
    <x-slot name="header">
        Accounts
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="grid grid-cols-12 p-4 divide-y">
                    <div class="col-span-12">
                        <x-table subject="Applications" description="" button="Add Application" route="{{route('applications.create')}}">
                            <x-slot name="tableHeader">
                                <x-table-bold-header>Company</x-table-bold-header>
                                <x-table-header>date</x-table-header>
                                <x-table-header>Job Title</x-table-header>
                                <x-table-header>status</x-table-header>
                                <x-table-header>priority</x-table-header>
                                <x-table-header>Salary</x-table-header>
                                <x-table-edit-header>edit</x-table-edit-header>
                            </x-slot>
                            @if (isset($applications->first()->id))
                            @foreach ($applications as $application)
                            <tr>
                                <x-table-bold-column>{{$application->company}}</x-table-bold-column>
                                <x-table-column>{{$account->date}}</x-table-column>
                                <x-table-column>{{$account->job_title}}</x-table-column>
                                <x-table-column>
                                    <x-label>
                                        {{$account->status}}
                                    </x-label>
                                </x-table-column>
                                <x-table-column>{{$account->priority}}</x-table-column>
                                <x-table-column>{{$account->salay}}</x-table-column>
                                <x-table-edit-column route="{{route('accounts.edit', $account)}}">Edit</x-table-edit-column>
                            </tr>
                            @endforeach
                            @endif
                        </x-table> 
                        <div class="border-2 rounded-b-md text-center bg-rose-950 text-white font-medium">
                            <h4>Not Finished Yet</h4>
                        </div>
                    </div>
                    <div class="col-span-12 pt-4">
                        <x-table subject="Accounts" description="" button="Add Account" route="{{route('accounts.create')}}">
                            <x-slot name="tableHeader">
                                <x-table-bold-header>Website</x-table-bold-header>
                                <x-table-header>Email</x-table-header>
                                <x-table-header>Username</x-table-header>
                                <x-table-edit-header>Password</x-table-edit-header>
                            </x-slot>
                            @if (isset($accounts->first()->id))
                            @foreach ($accounts as $account)
                            <tr>
                                <x-table-bold-column>{{$account->website}}</x-table-bold-column>
                                <x-table-column>{{$account->email}}</x-table-column>
                                <x-table-column>{{$account->username}}</x-table-column>
                                <x-table-edit-column route="{{route('accounts.edit', $account)}}">Edit</x-table-edit-column>
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