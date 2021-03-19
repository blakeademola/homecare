<?php

/**
 * Checks if given route name is active.
 *
 * @param $route_name
 * @param $extra
 * @return bool
 */
function active($route_name, $extra = null)
{
    if (!\Illuminate\Support\Facades\Route::has($route_name)) {
        return false;
    }

    if ($extra == '*') {
        return \Illuminate\Support\Facades\Route::currentRouteName() == $route_name;
    }

    return url(request()->path()) == route($route_name, $extra);
}

/**
 * Scans module directory for all modules' menu
 *
 * @return array
 */
function provMenu()
{
    $menu = [];
    $menu['user'] = ['name' => 'Shop', 'icon' => 'fas fa-user', 'link' => 'dashboard'];
    if (auth()->check() && auth()->user()->user_type == 'ADMIN') {
        $menu['admin'] = ['name' => 'Admin', 'icon' => 'fas fa-pencil-alt', 'link' => 'adminDashboard'];
    }
    return $menu;
}




