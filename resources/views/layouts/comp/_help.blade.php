@php
$help_text = $help_text ?? '';
@endphp
{{-- Bootstrap tooltips might not be activated. Instead using plain css without relying on js for now. Should be way faster anyway. --}}
{{-- Carefull with BS4 class 'table-responsive'. It forces help box overflows into scrollbar mode on x axis. Remove it if possible. --}}
@if ($help_text && "--help" != substr($help_text, -6))
<div class="help">
    {{-- <i aria-hidden="true" data-toggle="tooltip" data-placement="right" data-html="true" title="" class="fa fa-question-circle" data-original-title="{!! $help_text !!}"></i> --}}
    <i aria-hidden="true" title="" class="fa fa-question-circle"><div class="alert alert-dark">{!! $help_text !!}</div></i>
</div>
@endif
