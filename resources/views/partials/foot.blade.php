<!-- Main javascsript -->
<script src="{{ asset('assets/js/main.js') }}"></script>
<script src="{{ asset('assets/vendors/jquery-validation/jquery.validate.min.js') }}"></script>
<script src="{{ asset('assets/vendors/blockui/blockui.js') }}"></script>
{{ notify_footer() }}

<!--Custom script-->
<script>
    $.ajaxSetup({
        headers: {
            'x-CSRF-TOKEN': $('meta[name="csrf-token').attr('content')
        }
    });

    var baseUrl = "{{ url('/') }}/";
</script>
<script src="{{ asset('assets/js/custom.js') }}"></script>
<!--Dynamic Page scripts-->

@if( isset($scripts) )
    {!! $scripts !!}
@endif

<script type="text/javascript">
    $(function ()  {
        @if( isset($xjs) )
        {!! $xjs !!}
        @endif
    });

    @if( session()->exists('kNotify') )
        {!! session('kNotify') !!}
    @endif

</script>

@stack ('scripts')
</body>
</html>