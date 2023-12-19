<?php

if (!function_exists('calcTime')) {
    function calcTime($date)
    {
        return \Carbon\Carbon::parse($date)->diffForHumans();
    }
}
