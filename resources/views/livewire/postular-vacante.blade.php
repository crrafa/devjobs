<div class="bg-gray-100 p-5 mt-10 flex flex-col justify-center items-center">
    <h3 class="text-center text-2xl font-bold my-4">
        Postularme a esta vacane
    </h3>
    @if (session('status'))
        <div class="bg-green-100 border-l-4 border-green-600 text-green-600 font-bold p-2 my-2 text-sm">
            {{ session('status') }}
        </div>
    @else
        <form class="w-96 mt-5" wire:submit='postularme'>
            <div class="mb-4">
                <x-input-label for="cv" :value="__('Curriculum o Hoja de vida (PDF)')" />
                <x-text-input id="cv" type="file" accept=".pdf" wire:model="cv" />
            </div>
            <x-input-error :messages="$errors->get('cv')" class="mt-2" />
            <x-primary-button class="my-5">
                {{ __('Postularme') }}
            </x-primary-button>
            <div wire:loading>
                Guardando cv
            </div>
            @if (session()->has('error'))
            <div class="bg-red-100 border-l-4 border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <p class="font-bold">Opps!</p>
                <span class="block sm:inline">{{ session('error') }}</span>
            </div>
            
        @endif
        </form>
    @endif
</div>
