<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta charset="utf-8" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@isset($title) {{ $title }} - Aika - Courier service app @else Aika - Courier service app @endisset</title>
    <meta name="description" content="Aika is a courier service app">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Google Font -->
{{--<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400i,600" rel="stylesheet">--}}

<!-- Favicon -->
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">

    @includeIf('partials.styles-fonts')

</head>