<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {

    return redirect('admin');
    // return view('welcome');
});


// Route::get('admin/blank', function () {
//     return Admin::content(function (\OpenAdmin\Admin\Layout\Content $content) {
//         $content->header('Blank Page');
//         $content->description('This is a custom blank page.');
//         $content->body(view('admin.blank')); // Blade file we'll create next
//     });
// })->middleware('admin');
