<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Admin - {{ config('app.name', 'laravel') }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Jersey+25&display=swap" rel="stylesheet" />
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite (['resources/css/app.css', 'resources/js/app.js', 'resources/scss/app.scss'])
    @endif
</head>
<body>
    <div class="admin-layout">
        <aside class="admin-sidebar">
            <h2>🔧 Admin</h2>
            <nav>
                <ul class="admin-sidebar-nav">
                    <li>
                        <a
                            href="{{ route('admin.books.index') }}"
                            @if (Route::currentRouteName() === 'admin.books.index' || Route::currentRouteName() === 'books.create' || Route::currentRouteName() === 'books.edit') class="active" @endif
                        >
                            📚 Gestion Livres
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/') }}" target="_blank"> 👁️ Voir le site </a>
                    </li>
                </ul>
            </nav>
        </aside>

        <main class="admin-main">
            <div class="admin-header">
                <h1>@yield ('admin-title', 'Admin')</h1>
                <a href="{{ url('/') }}" class="admin-logout">← Retour site</a>
            </div>

            @if (session('success'))
                <div
                    style="
                        background-color: #2d5f2e;
                        color: #7cff7c;
                        padding: 1rem;
                        border-radius: 8px;
                        margin-bottom: 1rem;
                        border-left: 4px solid #7cff7c;
                    "
                >
                    ✓ {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div
                    style="
                        background-color: #5f2d2d;
                        color: #ff7c7c;
                        padding: 1rem;
                        border-radius: 8px;
                        margin-bottom: 1rem;
                        border-left: 4px solid #ff7c7c;
                    "
                >
                    @foreach ($errors->all() as $error)
                        <div>✗ {{ $error }}</div>
                    @endforeach
                </div>
            @endif

            <div class="admin-content">
                @yield ('admin-content')
            </div>
        </main>
    </div>
</body>
</html>
