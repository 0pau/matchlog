<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-xl">
        <a class="navbar-brand" href="/" wire:navigate>
            <img src="/favicon.svg" height="32px" width="32px" class="d-inline-block align-content-center">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse gap-3" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" wire:navigate wire:current.exact="active" aria-current="page" href="/">Versenyek</a>
                </li>
                <li class="nav-item">
                    <a href="/competitors" wire:navigate class="nav-link" wire:current="active" aria-current="page">Versenyzőkatalógus</a>
                </li>
            </ul>
            <ul class="navbar-nav d-flex align-items-center">
                <i class="bi bi-person user_icon"></i>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown">{{ \Illuminate\Support\Facades\Auth::user()->email }}</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/logout">Kijelentkezés</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
