<?php

use App\Helpers\Basic\General\TimezoneHelper;

if (! function_exists('timezone')) {
    /**
     * Access the timezone helper.
     */
    function timezone()
    {
        return resolve(TimezoneHelper::class);
    }
}
