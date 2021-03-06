<nav class="navbar fixed-bottom justify-content-center navbar-expand-lg navbar-dark bg-dark">
    <span class="navbar-text mr-auto">
        {{ config('app.year') }}
        <small>{{ config('app.version') ? ' v'.config('app.version') : '' }}</small>
        <small>
            (
            @foreach(config('app.locales', []) as $langKey => $langValue)
            @if(!$loop->first) | @endif
            <a class="text-lowercase" href="{{ url()->current() }}?lang={{ $langKey }}">{{ ($page_locale ?? config('app.locale')) == $langKey ? " .:$langValue:. " : $langValue }}</a>
            @endforeach
            )
            {{ '>> '.$page_guild_name ?? '' }}
        </small>
    </span>
    <div class="navbar-nav" style="flex-direction: row;">
        <span class="navbar-brand mx-1 mx-lg-0">{{ config('swgoh.CONTACT.USER_NAME') }}</span>
        <a class="nav-link text-lowercase" href="{{ route('contact') }}">{{ __('Contact') }}</a>
        <span class="nav-link">|</span>
        <a class="nav-link text-lowercase" href="{{ route('home') }}">{{ __('Home') }}</a>
        <span class="nav-link">|</span>
        <a class="nav-link text-lowercase" href="{{ config('swgoh.CONTACT.ISSUES_URL') }}">{{ __('Report Issue') }}</a>
        <span class="nav-link">|</span>
        <a class="nav-link text-lowercase" href="{{ route('changes') }}">{{ __('Changes') }}</a>
    </div>
    <span class="navbar-text ml-auto">
        <small>{{ __('app.disclaimer') }}</small>
    </span>
</nav>
