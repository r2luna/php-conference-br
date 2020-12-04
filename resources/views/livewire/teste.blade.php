<div class="mx-auto flex flex-col items-center p-20">
    <input class="


    font-bold text-4xl w-20 text-center"  wire:model="number"/>

    @error('number')
        <span class="text-red-500 font-bold">{{ $message }}</span>
    @enderror

    <div>
        <button class="bg-blue-100 px-4 py-2 rounded-lg"
            wire:click="minus">
            -
        </button>

        <button class="bg-blue-100 px-4 py-2 rounded-lg"
            wire:click="plus">
            +
        </button>
    </div>

    <div class="mt-10 text-4xl {{ $number < 0 ? 'text-red-400' : 'text-blue-800'  }} font-medium">
        {{ $number }}
    </div>
</div>
