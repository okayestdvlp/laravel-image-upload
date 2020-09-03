<?php

use Illuminate\Support\Facades\Route;


Route::get('/', 'ImageUploadController@imageUpload')->name('image.upload');
Route::post('image-upload', 'ImageUploadController@imageUploadPost')->name('image.upload.post');