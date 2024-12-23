<header>
    <nav class="d-flex align-items-center">
        <a href="/" class="logo d-flex align-items-center">
            <img src="{{ asset('img/logo.png') }}" alt="Zestify Logo" class="logo-img"> 
            <span class="logo-text ms-2"> Zestify</span> <!-- Zestify Text -->
        </a>
        
        <ul class="nav ms-auto"> <!-- Pushes the nav to the right -->
        @auth
    @if(auth()->user()->email === 'admin@example.com')
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.dashboard') }}">Admin Dashboard</a>
        </li>
    @else
        <li class="nav-item">
            <a class="nav-link" href="{{ route('home') }}">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('products') }}">Products</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('contact') }}">Contact</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('cart') }}">
                <i class="fas fa-shopping-cart me-2"></i> Cart
            </a>
        </li>
    @endif

    <li class="nav-item">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-link nav-link">Logout</button>
        </form>
    </li>
@else
    <li class="nav-item">
        <a class="nav-link" href="{{ route('login') }}">Login</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('register') }}">Register</a>
    </li>
@endauth

        </ul>
    </nav>
</header>