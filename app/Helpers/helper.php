<?php
if (! function_exists('locale_route')) {
    function locale_route($name, $parameters = [], $absolute = true)
    {
        // Ensure the locale parameter is set to the current locale.
        $parameters['locale'] = app()->getLocale();
        return route($name, $parameters, $absolute);
    }
}
if (! function_exists('set_lang')) {
    function set_lang()
    {
        $oApp = new \Illuminate\Support\Facades\App;
        $oAuth = new \Illuminate\Support\Facades\Auth;
        $user = $oAuth::user();
        if ($user) {
            $oApp::setLocale($user->profile_lang);
        }
    }
}
