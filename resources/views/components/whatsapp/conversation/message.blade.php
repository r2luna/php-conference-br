@props([
    'message',
     'time',
     'direction',
     'image' => null
])

<div class="flex {{ $direction == 'out' ? 'justify-end' : '' }} mb-2">
    <div class="rounded py-2 px-3" style="background-color: {{ $direction == 'out' ? '#E2F7CB' : '#F2F2F2' }}">
        @if($image)
            <img src="{{ $image }}" alt="" class="w-48 rounded-lg">
        @endif

        <p class="text-sm mt-1">
            {{ $message }}
        </p>
        <p class="text-right text-xs text-gray-600 mt-1">
            {{ $time }}
        </p>
    </div>
</div>

