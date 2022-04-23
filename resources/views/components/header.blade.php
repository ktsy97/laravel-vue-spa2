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
                    <a class="nav-link" href="" data-bs-toggle="modal" data-bs-target="#logoutModal">
                        {{ __('logout') }}
                    </a>

                    <!-- Modal -->
                    <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-sm">
                            <div class="modal-content p-3">
                                <div class="title d-flex">
                                    <button type="button" class="btn-close ms-auto" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body p-0">
                                    <p class="text-center pb-3">ログアウトしますか？</p>

                                    <a class="btn btn-primary rounded-pill w-100 mb-1" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        OK
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>

                                    <button type="button" class="btn btn-secondary rounded-pill w-100" data-bs-dismiss="modal">
                                        キャンセル
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
            @endguest
        </div>

    </div>
</nav>
