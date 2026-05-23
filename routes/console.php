<?php

use Illuminate\Support\Facades\Artisan;

Artisan::command('about', function () {
    $this->comment('FluxConvert Laravel port');
})->purpose('Show information about this application');
