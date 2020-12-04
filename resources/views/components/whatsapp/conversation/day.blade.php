@props([ 'day' ])

@php
    if(!$day instanceof \Illuminate\Support\Carbon) {
        $day = carbon($day);
    }
@endphp

<div class="flex justify-center mb-2">
    <div class="rounded py-2 px-4" style="background-color: #DDECF2">
        <p class="text-sm uppercase" title="{{ $day->format('F d, Y') }}">
            {{ $day->format('F d, Y') }}
        </p>
    </div>
</div>
