<?php
    $id = 'item'.preg_replace('/[^\w\d]/', '-', $key ?? '');
?>

@push('sidebar-items')
    <a class="nav-link{{ ($active ?? false) ? ' active' : ''}}" id="{{ $id }}-tab" data-toggle="pill" href="#{{ $id }}" role="tab"
        aria-controls="{{ $id }}" aria-selected="{{ ($active ?? false) ? 'true' : 'false'}}">{{ ucwords($title ?? $key ?? 'unknown') }}</a>
@endpush

@push('content-items')
    <div class="tab-pane fade{{ ($active ?? false) ? ' active show' : ''}}" id="{{ $id }}" role="tabpanel" aria-labelledby="{{ $id }}-tab">
    @include($inc ?? $key)
    </div>
@endpush
