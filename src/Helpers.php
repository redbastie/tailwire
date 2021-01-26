<?php

if (!function_exists('timezone')) {
    function timezone($datetime)
    {
        return \JamesMills\LaravelTimezone\Facades\Timezone::convertToLocal($datetime);
    }
}
