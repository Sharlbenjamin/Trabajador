<x-app-layout>
    <x-slot name="header">
        Accounts
    </x-slot>
    <div class="py-12">
        <div class="w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
                @if (isset($account->id))
                <form action="{{route('accounts.update', $account)}}" method="POST">
                @method('PUT')
                @else
                <form action="{{route('accounts.store')}}" method="POST">
                @endif
                    @csrf
                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                <div class="grid grid-cols-12">
                    <div class="col-span-4"></div>
                    <div class="col-span-4 border-2 border-sky-200 rounded-md p-4">
                        <div class="mt-4 space-y-2">
                            <x-input-label>Website</x-input-label>
                            <select name="website" class="rounded-md border-2 w-full border-gray-200 hover:border-sky-200 focus:border-sky-400">
                                @if (isset($account->id))
                                <option value="{{$account->website}}">{{$account->website}}</option>
                                @else
                                <option value="">Select Website</option>
                                @endif
                                @foreach ($websites as $website)
                                <option value="{{$website}}">{{$website}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mt-4 space-y-2">
                            <x-input-label>Username</x-input-label>
                            <x-input name="username" value="{{isset($account->id) ? $account->username : ''}}" class="w-full"></x-input>
                        </div>
                        <div class="mt-4 space-y-2">
                            <x-input-label>Email</x-input-label>
                            <x-input name="email" value="{{isset($account->id) ? $account->email : ''}}" class="w-full"></x-input>
                        </div>
                        <div class="mt-4 flex justify-end space-x-2">
                            <x-green-button>Submit</x-green-button>
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