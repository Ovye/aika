<!--Dynamic Page styles-->
<!-- Stylesheet -->
<link rel="stylesheet" href="{{ asset('assets/css/bootstrap-4.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
{{ notify_header() }}
<link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/icomoon.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/icons.css') }}">

@if( isset($styles) )
    {!! $styles !!}
@endif

@if( isset($xcss) )
    {{ $xcss }}
@endif