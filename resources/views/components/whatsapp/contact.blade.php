@props([
    'contact',
    'photo',
    'message',
    'time'
])

<div {{ $attributes->merge(['class' => 'px-3 flex items-center cursor-pointer hover:bg-gray-100']) }}>
    <div>
        <img class="h-12 w-12 rounded-full" alt="{{ $contact }}"
             src="{{ $photo }}"/>
    </div>
    <div class="ml-4 flex-1 border-b border-gray-200 py-4">
        <div class="flex items-bottom justify-between">
            <p class="text-gray-600est">
                {{ $contact }}
            </p>
            <p class="text-xs text-gray-600">
                {{ $time }}
            </p>
        </div>
        <p class="text-gray-600 mt-1 text-sm">
            {{ $message }}
        </p>
    </div>
</div>
