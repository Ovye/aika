{{-- Attach our header --}}
@includeIf("backend.partials.header")

{{-- Dynamic body view file --}}
@isset($body)
    @includeIf("backend." . $body)
@endisset

{{-- Attach our footer --}}
@includeIf("backend.partials.footer")