{{-- Attach our header --}}
@includeIf("frontend.partials.header")

{{-- Dynamic body view file --}}
@isset($body)
    @includeIf($body)
@endisset

{{-- Attach our footer --}}
@includeIf("frontend.partials.footer")