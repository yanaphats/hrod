<head>
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="Description" content="{{ config('app.name') }} - @yield('page-title')">
    <meta name="Author" content="{{ config('app.author') }}">
    <meta name="Keywords" content="" />
    <title>{{ config('app.name') }} - @yield('page-title')</title>
    <link rel="icon" href="{{ assets('favicon.png') }}" type="image/x-icon" />
    <link href="{{ assets('app-' . config('app.manifest_path') . '.min.css') }}" rel="stylesheet" />
	<link href="{{ assets('vendor-' . config('app.manifest_path') . '.min.css') }}" rel="stylesheet" />
</head>