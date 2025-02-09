<?php
if (! function_exists('locale_route')) {
    function locale_route($name, $parameters = [], $absolute = true)
    {
        // Ensure the locale parameter is set to the current locale.
        $parameters['locale'] = app()->getLocale();
        return route($name, $parameters, $absolute);
    }
}