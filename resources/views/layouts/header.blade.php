<header class="navbar navbar-expand-lg navbar-light sticky-top" id="header">
    <a class="navbar-brand d-flex align-items-center" href="{{ route('jobs.index') }}">
        <!-- Responsive and Lazy Loaded Logo -->
        <img
            src="{{ asset('images/logo.webp') }}"
            srcset="{{ asset('images/logo-small.webp') }} 320w, {{ asset('images/logo-medium.webp') }} 768w, {{ asset('images/logo-large.webp') }} 1200w"
            sizes="(max-width: 320px) 100vw, (max-width: 768px) 50vw, 1200px"
            loading="lazy"
            alt="WiseJobs Logo"
            class="navbar-logo"
            width="200" height="50"
        >
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
        <!-- Show Login or Logout based on authentication -->
        <ul class="navbar-nav ms-auto">
            @guest
                <!-- If the user is not logged in -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                </li>
            @else
                <!-- If the user is logged in -->
                <li class="nav-item">
                    <span class="nav-link">Welcome, {{ Auth::user()->name }}!</span>
                </li>
                <li class="nav-item">
                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger">Logout</button>
                    </form>
                </li>
            @endguest
        </ul>
    </div>
</header>
