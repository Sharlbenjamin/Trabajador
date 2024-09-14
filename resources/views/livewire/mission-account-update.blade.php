<div x-data="{mission : false}">
    <div class="" x-on:click="mission=true">
        {{$mission->account->website}}
    </div>
    <div class="" x-show="mission">
        <div class="relative z-10">
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
            <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
              <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                <div x-on:click.outside="mission = false" class="relative transform overflow-hidden rounded-lg bg-white px-4 pb-4 pt-5 text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg sm:p-6">
                    <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                      <h3 class="text-base font-semibold leading-6 text-gray-900" id="modal-title">Accont</h3>
                      <div class="mt-2">
                        <select wire:model.live="account" class="w-full">
                            <option value="">Select Account</option>
                            @foreach ($allAccounts as $account)
                            <option value="{{$account->id}}">{{$account->website}}</option>
                            @endforeach
                        </select>
                    </div>
                  </div>
                  <div class="mt-5 flex justify-end space-x-2">
                    <x-green-button wire:click="AccountUpdate">Update</x-green-button>
                  </div>
                </div>
              </div>
          </div> 
    </div>
</div>
