<header class="header">
    <div class="container">
        <nav class="header__nav">
            <a href="{{ url('/') }}" class="header__nav__logo">EasyLecture</a>
            <div class="header__nav-links">
                <div id="menuToggle">
                    <button type="button" class="burger-button" id="burgerButton" aria-label="Ouvrir le menu">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>

                    <ul id="mobileMenu" class="mobile-menu__list">
                        <li>
                            <a href="{{ url('/boutique') }}">Boutique</a>
                        </li>

                        <li>
                            <a href="{{ url('/contact') }}">Contact</a>
                        </li>

                        <li>
                            <a href="{{ url('/cart') }}">Panier</a>
                        </li>

                        @guest
                            <li>
                                <a href="{{ route('login') }}">Login</a>
                            </li>

                            <li>
                                <a href="{{ route('register') }}">Sign Up</a>
                            </li>
                        @endguest

                        @auth
                            <li>
                                <a href="{{ route('mon-compte') }}">Compte</a>
                            </li>

                            <li>
                                <a href="{{ route('library.index') }}">Mes livres</a>
                            </li>

                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit">Logout</button>
                                </form>
                            </li>
                        @endauth
                    </ul>
                </div>

                <ul class="header__nav-links menubase">
                    <li>
                        <a href="{{ url('/boutique') }}" class="header__nav-link">
                            Boutique
                        </a>
                    </li>

                    <li>
                        <a href="{{ url('/contact') }}" class="header__nav-link">
                            Contact
                        </a>
                    </li>

                    @guest
                        <li>
                            <a href="{{ route('login') }}" class="header__nav-link">
                                Login
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('register') }}" class="button button--primary button--big">
                                Sign Up
                            </a>
                        </li>
                    @endguest

                    @auth
                        <li class="header__user-menu">
                            <input type="checkbox" id="user-toggle" class="user-toggle">

                            <label for="user-toggle" class="button button--secondary button--big">
                                {{ auth()->user()->name }}
                            </label>

                            <div class="header__dropdown">
                                <a href="{{ route('mon-compte') }}" class="header__dropdown-item">
                                    Compte
                                </a>

                                <a href="{{ route('library.index') }}" class="header__dropdown-item">
                                    Mes livres
                                </a>

                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="header__dropdown-item header__logout">
                                        Logout
                                    </button>
                                </form>
                            </div>
                        </li>
                    @endauth

                    <li>
                        <a href="{{ url('/cart') }}" class="header__nav-link" aria-label="Mon Panier">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                width="32"
                                height="32"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round">
                                <circle cx="9" cy="21" r="1"></circle>
                                <circle cx="20" cy="21" r="1"></circle>
                                <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                            </svg>
                        </a>
                    </li>
                </ul>

            </div>
        </nav>
    </div>
</header>
<script>
document.addEventListener('DOMContentLoaded', () => {
    const burgerButton = document.getElementById('burgerButton');
    const mobileMenu = document.getElementById('mobileMenu');

    if (!burgerButton || !mobileMenu) return;

    burgerButton.addEventListener('click', () => {
        burgerButton.classList.toggle('is-open');
        mobileMenu.classList.toggle('is-open');
    });

    mobileMenu.querySelectorAll('a, button').forEach((item) => {
        item.addEventListener('click', () => {
            burgerButton.classList.remove('is-open');
            mobileMenu.classList.remove('is-open');
        });
    });

    document.addEventListener('click', (e) => {
        if (!document.getElementById('menuToggle').contains(e.target)) {
            burgerButton.classList.remove('is-open');
            mobileMenu.classList.remove('is-open');
        }
    });
});
</script>