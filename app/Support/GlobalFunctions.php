<?php


use Illuminate\Support\Carbon;

function carbon(...$args): Carbon
{
    return new Carbon(...$args);
}
