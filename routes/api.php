<?php

use App\Http\Controllers\BlogController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('blogs','App\Http\Controllers\BlogController@index');
Route::post('blogsComment','App\Http\Controllers\BlogController@commentStore');
Route::post('blogsReply','App\Http\Controllers\BlogController@replyStore');