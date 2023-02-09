<?php

return [

	/*
    |--------------------------------------------------------------------------
    | Image 
    |--------------------------------------------------------------------------
    |
    | This option defines the default image that gets used when access
    | image. The name specified in this option should match
    | one of the channels defined in the "image" configuration array.
    |
    */

	'image' => [
		'path' => env('ASSET_IMAGE_PATH', 'image')
	],

	/*
    |--------------------------------------------------------------------------
    | Media 
    |--------------------------------------------------------------------------
    |
    | This option defines the default media that gets used when access
    | media. The name specified in this option should match
    | one of the channels defined in the "media" configuration array.
    |
    */

	'media' => [
		'path' => env('ASSET_IMAGE_PATH', 'media')
	],

	/*
    |--------------------------------------------------------------------------
    | Script 
    |--------------------------------------------------------------------------
    |
    | This option defines the default script that gets used when access
    | script. The name specified in this option should match
    | one of the channels defined in the "script" configuration array.
    |
    */

	'script' => [
		'path' => env('ASSET_SCRIPT_PATH', 'javascript')
	],

	/*
    |--------------------------------------------------------------------------
    | Style 
    |--------------------------------------------------------------------------
    |
    | This option defines the default style that gets used when access
    | style. The name specified in this option should match
    | one of the channels defined in the "style" configuration array.
    |
    */

	'style' => [
		'path' => env('ASSET_STYLE_PATH', 'stylesheet')
	]

];
