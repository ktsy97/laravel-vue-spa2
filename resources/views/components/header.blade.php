<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm mb-5">
    <div class="container">

        @guest
        <a class="navbar-brand" href="/">{{ config('app.name', 'Vue-Laravel-Weather') }}</a>
        @else
        <span class="navbar-brand mb-0">{{ config('app.name', 'Vue-Laravel-Weather') }}</span>
        <div class="me-auto">
            <link-component></link-component>
        </div>
        @endguest

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbar">
            @guest
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="/login">login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="/register">register</a>
                </li>
            </ul>
            @else
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item d-lg-flex align-items-center">
                    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        {{ __('logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
            @endguest
        </div>

    </div>
</nav>
