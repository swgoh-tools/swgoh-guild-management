<nav class="navbar fixed-bottom justify-content-center navbar-expand-lg navbar-dark bg-dark">
    <span class="navbar-text mr-auto">
        {{ config('app.year') }}
        <small>{{ config('app.version') ? ' v'.config('app.version') : '' }}</small>
        <small>
            (
            <a class="text-lowercase" href="{{ url()->current() }}?lang=en">{{ ($page_locale ?? config('app.locale')) == 'en' ? ' .:en:. ' : 'en' }}</a>
            |
            <a class="text-lowercase" href="{{ url()->current() }}?lang=de">{{ ($page_locale ?? config('app.locale')) == 'de' ? ' .:de:. ' : 'de' }}</a>
            )
            {{ '>> '.$page_guild ?? '' }}
        </small>
    </span>
    <div class="navbar-nav" style="flex-direction: row;">
        <span class="navbar-brand mx-1 mx-lg-0">{{ config('swgoh.CONTACT.USER_NAME') }}</span>
        <a class="nav-link text-lowercase" href="{{ route('contact') }}">{{ __('Contact') }}</a>
        <span class="nav-link">|</span>
        <a class="nav-link text-lowercase" href="{{ route('home') }}">{{ __('Home') }}</a>
    </div>
    <span class="navbar-text ml-auto">
        <small>{{ __('app.disclaimer') }}</small>
    </span>
</nav>
