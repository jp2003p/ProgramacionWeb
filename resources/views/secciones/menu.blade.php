<nav class="navbar navbar-expand-lg nav-color mb-4">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="https://placekitten.com/40/40" alt="Logo" class="d-inline-block align-text-top me-2">
            Programacion web
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                @auth
                    <li class="nav-item">
                        <a class="{{ request()->routeIs('inicio') ? 'active' : '' }} nav-link"
                            href="{{ route('inicio') }}" wire:navigate><i class="bi bi-house"></i> Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="{{ request()->routeIs('perfiles') ? 'active' : '' }} nav-link"
                            href="{{ route('perfiles') }}" wire:navigate><i class="bi bi-person-vcard-fill">
                            </i>Perfiles</a>
                    </li>
                    <li class="nav-item">
                        <a class="{{ request()->routeIs('clientes') ? 'active' : '' }} nav-link" href="{{ route('clientes') }}" wire:navigate><i class="bi bi-people-fill"></i>
                            Clientes</a>
                    </li>
                    <li class="nav-item">
                        <a class="{{ request()->routeIs('facturas') ? 'active' : '' }} nav-link" href="{{ route('facturas') }}" wire:navigate><i
                                class="bi bi-plus-slash-minus"></i> Facturas</a>
                    </li>
                    <li class="nav-item">
                        <a class="{{ request()->routeIs('productos') ? 'active' : '' }} nav-link" href="{{ route('productos') }}" wire:navigate><i class="bi bi-cart4"></i>
                            Productos</a>
                    </li>
                    <li class="nav-item">
                        <a class="{{ request()->routeIs('carrito') ? 'active' : '' }} nav-link" href="{{ route('carrito') }}" wire:navigate><i class="bi bi-card-list"></i>
                            Orden</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Cerrar
                                    sesión</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}" wire:navigate>Iniciar sesión</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}" wire:navigate>Registrarse</a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
