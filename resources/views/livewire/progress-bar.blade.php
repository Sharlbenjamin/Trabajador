<div  x-data="{bar{{$course->id}} : false}" x-on:click="bar{{$course->id}} = true">
  <div class="mt-6" aria-hidden="true">
      <div class="overflow-hidden rounded-full bg-gray-200">
      <div class="h-2 rounded-full bg-indigo-600" style="width: {{$course->progressBar()}}"></div>
      </div>
      <div class="mt-6 hidden grid-cols-3 text-sm text-gray-600 sm:grid">
      <div class="text-indigo-600">0%</div>
      <div class="{{$course->progressBar() >= 50 ? 'text-indigo-600' : ''}} text-center">50%</div>
      <div class="{{$course->progressBar() == 100 ? 'text-indigo-600' : ''}} text-right">100%</div>
      </div>
  </div>
      <div class="" x-show="bar{{$course->id}}"> 
        <div class="relative z-10">
          <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
          <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
            <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
              <div x-on:click.outside="bar{{$course->id}} = false" class="relative transform overflow-hidden rounded-lg bg-white px-4 pb-4 pt-5 text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg sm:p-6">
                  <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                    <h3 class="text-base font-semibold leading-6 text-gray-900" id="modal-title">Progress</h3>
                    <div class="mt-2">
                      <x-input wire:model.live="progress" name="s" class="w-full"></x-input>
                  </div>
                </div>
                <div class="mt-5 flex justify-end space-x-2">
                  <x-green-button wire:click="ProgressUpdate">Update</x-green-button>
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>
  
  