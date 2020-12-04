@props(['message', 'time'])

<div class="flex mb-2">
    <div class="rounded py-2 px-3" style="background-color: #F2F2F2">
        <p class="text-sm mt-1">
            {{ $message }}
        </p>
        <p class="text-right text-xs text-gray-600 mt-1">
            {{ $time }}
        </p>
    </div>
</div>
