<div class="card mb-3">
    <div class="card-header">{{ __('Overview') }}</div>

    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
            <div class="alert alert-info" role="alert">
                {{ $info['desc'] ?? '-' }}
            </div>
        <dl>
        <!-- <dt>{{ __('fields.id') }}</dt><dd>{{ $info['id'] ?? '-' }}</dd> -->
        <!-- <dt>{{ __('fields.name') }}</dt><dd>{{ $info['name'] ?? '-' }}</dd> -->
        <!-- <dt>{{ __('fields.desc') }}</dt><dd>{{ $info['desc'] ?? '-' }}</dd> -->
        <dt>{{ __('fields.members') }}</dt><dd>{{ $info['members'] ?? '-' }}</dd>
        <!-- <dt>{{ __('fields.status') }}</dt><dd>{{ $info['status'] ?? '-' }}</dd> -->
        <dt>{{ __('fields.required') }}</dt><dd>{{ $info['required'] ?? '-' }}</dd>
        <!-- <dt>{{ __('fields.bannerColor') }}</dt><dd>{{ $info['bannerColor'] ?? '-' }}</dd> -->
        <!-- <dt>{{ __('fields.bannerLogo') }}</dt><dd>{{ $info['bannerLogo'] ?? '-' }}</dd> -->
        <dt>{{ __('fields.message') }}</dt><dd>{{ $info['message'] ?? '-' }}</dd>
        <dt>{{ __('fields.gp') }}</dt><dd>{{ number_format($info['gp'] ?? 0) }}</dd>
        <dt>{{ __('fields.raid') }}</dt><dd>{{ implode(', ', $info['raid'] ?? []) }}</dd>
        <dt>{{ __('fields.updated') }}</dt><dd>{{ timezone()->formatDateLong($info['updated'] ?? 0) }}</dd>
        </dl>
    </div>
</div>
