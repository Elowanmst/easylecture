<header class="header">
    <div class="container">
        <nav class="header__nav">
            <a href="{{ url('/') }}" class="header__nav__logo">EasyLecture</a>
            <div class="header__nav-links">

                <div id="menuToggle">
                    <div class="burger-button">
                        <input type="checkbox" id="menuCheckbox" />
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>

                    <ul id="menu">
                        <li>
                            <a href="{{ url('/boutique') }}">
                                <label for="menuCheckbox" onclick="this.parentNode.click();">Boutique</label>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/contact') }}">
                                <label for="menuCheckbox" onclick="this.parentNode.click();">Contact</label>
                            </a>
                        </li>
                        <li><label for="menuCheckbox"><a href="{{ url('/cart') }}">Panier</a></label></li>
                        <li><label for="menuCheckbox"><a href="{{ url('/login') }}">Login</a></label></li>
                        <li>
                            <a href="{{ url('/register') }}" target="_blank">Sign Up</a>
                        </li>
                    </ul>
                </div>

                <ul class="header__nav-links menubase">
                    <li><a href="{{ url('/boutique') }}" class="header__nav-link">Boutique</a></li>
                    <li><a href="{{ url('/contact') }}" class="header__nav-link">Contact</a></li>
                    @guest
                        <li><a href="{{ route('login') }}" class="header__nav-link">Login</a></li>
                        <li>
                            <a href="{{ route('register') }}" class="button button--primary button--big">
                                Sign Up
                            </a>
                        </li>
                    @endguest

                    @auth
                    <li class="header__user-menu">
                        <input type="checkbox" id="user-toggle" class="user-toggle">

                        <label for="user-toggle" class="header__user-button">
                            👤 {{ auth()->user()->name }}
                        </label>

                        <div class="header__dropdown">

                            <a href="{{ url('/mon-compte') }}" class="header__dropdown-item">
                                Compte
                            </a>

                            
                            @if(auth()->user()->isAdmin())
                                <a href="{{ route('admin.books.index') }}" class="header__dropdown-item">
                                    Admin
                                </a>
                            @endif

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
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
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