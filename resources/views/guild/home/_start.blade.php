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
        <!-- <dt>{{ __('app.data_keys.id') }}</dt><dd>{{ $info['id'] ?? '-' }}</dd> -->
        <!-- <dt>{{ __('app.data_keys.name') }}</dt><dd>{{ $info['name'] ?? '-' }}</dd> -->
        <!-- <dt>{{ __('app.data_keys.desc') }}</dt><dd>{{ $info['desc'] ?? '-' }}</dd> -->
        <dt>{{ __('app.data_keys.members') }}</dt><dd>{{ $info['members'] ?? '-' }}</dd>
        <!-- <dt>{{ __('app.data_keys.status') }}</dt><dd>{{ $info['status'] ?? '-' }}</dd> -->
        <dt>{{ __('app.data_keys.required') }}</dt><dd>{{ $info['required'] ?? '-' }}</dd>
        <!-- <dt>{{ __('app.data_keys.bannerColor') }}</dt><dd>{{ $info['bannerColor'] ?? '-' }}</dd> -->
        <!-- <dt>{{ __('app.data_keys.bannerLogo') }}</dt><dd>{{ $info['bannerLogo'] ?? '-' }}</dd> -->
        <dt>{{ __('app.data_keys.message') }}</dt><dd>{{ $info['message'] ?? '-' }}</dd>
        <dt>{{ __('app.data_keys.gp') }}</dt><dd>{{ number_format($info['gp'] ?? 0) }}</dd>
        <dt>{{ __('app.data_keys.raid') }}</dt><dd>{{ implode(', ', $info['raid'] ?? []) }}</dd>
        <dt>{{ __('app.data_keys.updated') }}</dt><dd>{{ date('D, d M Y', intval(substr($info['updated'] ?? '', 0, 10))) }}</dd>
        </dl>
    </div>
</div>
