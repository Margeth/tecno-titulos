<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="csrf-token" content="{{ csrf_token() }}">

	{{-- TODO translatable suffix --}}
    <title> {{ trans('brackets/admin-ui::admin.page_title_suffix') }}</title>

	@include('brackets/admin-ui::admin.partials.main-styles')

    @yield('styles')
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@500&family=Ubuntu:wght@500&display=swap" rel="stylesheet">
    <style>
        .logo{

            font-family: 'Josefin Sans', sans-serif;
            font-size: 14px;
            padding: 0px 15px 0px 15px;
            font-weight: bold;
            
        }
    </style>

</head>

<body class="app header-fixed sidebar-fixed sidebar-lg-show">
    @yield('header')

    @yield('content')

    @yield('footer')

    @include('brackets/admin-ui::admin.partials.wysiwyg-svgs')
    @include('brackets/admin-ui::admin.partials.main-bottom-scripts')
    @yield('bottom-scripts')
</body>

</html>