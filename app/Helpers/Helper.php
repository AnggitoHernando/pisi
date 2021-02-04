<?php
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;

function set_active($route)
{

    //return $request->is($route) ? 'active' : '';
    if(Route::is($route)){
        return 'menu-open active';
    }

    // if( is_array($route) ) {
    //     foreach ($route as $u) {
    //       if (Route::is($u)) {
    //         return $output;
    //       }
    //     }
    //   } else {
    //     if (Route::is($route)){
    //       return $output;
    //     }
    //   }
}

function set_open($route)
{
    if(Route::is($route)){
        return 'menu-open';
    }
}
