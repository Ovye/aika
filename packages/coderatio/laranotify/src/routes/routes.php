<?php

use Coderatio\Laranotify\Facades\Notify;
use Illuminate\Support\Facades\Route;

Route::get('notify', function ()
{
    $d = true;


    if ($d) {
        Notify::info('Please provide your password to continue.')
            ->title('Last step required')->align('center')
            ->asModal()->updateAfterInterval('#title', "New title", 2000)
            ->delay(4000)->progress(true);
    }

    return view('frontend/wrapper', ['body' => 'notify::demo']);
});