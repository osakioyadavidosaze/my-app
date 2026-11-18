<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Lincoln student records management">
    <title>@yield('title', 'Lincoln Student Management')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="app-body">
    <div class="app-shell">
        <aside class="sidebar">
            <a class="brand" href="{{ route('home') }}">
                <span class="brand-mark" aria-hidden="true">L</span>
                <span class="brand-copy">
                    <strong>LINCOLN</strong>
                    <small>Student services</small>
                </span>
            </a>

            <div class="sidebar-section-label">Workspace</div>
            <nav class="sidebar-nav" aria-label="Main navigation">
                <a class="nav-link {{ request()->routeIs('students.index') ? 'is-active' : '' }}" href="{{ route('students.index') }}">
                    <svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M4 5.75A1.75 1.75 0 0 1 5.75 4h4.5A1.75 1.75 0 0 1 12 5.75v4.5A1.75 1.75 0 0 1 10.25 12h-4.5A1.75 1.75 0 0 1 4 10.25v-4.5ZM14 5.75A1.75 1.75 0 0 1 15.75 4h2.5A1.75 1.75 0 0 1 20 5.75v2.5A1.75 1.75 0 0 1 18.25 10h-2.5A1.75 1.75 0 0 1 14 8.25v-2.5ZM14 15.75A1.75 1.75 0 0 1 15.75 14h2.5A1.75 1.75 0 0 1 20 15.75v2.5A1.75 1.75 0 0 1 18.25 20h-2.5A1.75 1.75 0 0 1 14 18.25v-2.5ZM4 15.75A1.75 1.75 0 0 1 5.75 14h4.5A1.75 1.75 0 0 1 12 15.75v2.5A1.75 1.75 0 0 1 10.25 20h-4.5A1.75 1.75 0 0 1 4 18.25v-2.5Z" stroke="currentColor" stroke-width="1.6"/></svg>
                    <span>Student directory</span>
                </a>
                <a class="nav-link {{ request()->routeIs('students.create') ? 'is-active' : '' }}" href="{{ route('students.create') }}">
                    <svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M12 5v14M5 12h14" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg>
                    <span>Add a student</span>
                </a>
            </nav>

            <div class="sidebar-bottom">
                <span class="status-dot" aria-hidden="true"></span>
                <span>Lincoln records workspace</span>
            </div>
        </aside>

        <div class="main-column">
            <header class="topbar">
                <a class="mobile-brand" href="{{ route('home') }}">
                    <span class="brand-mark" aria-hidden="true">L</span>
                    <span>Lincoln <strong>Students</strong></span>
                </a>
                <nav class="mobile-nav" aria-label="Mobile navigation">
                    <a href="{{ route('students.index') }}">Directory</a>
                    <a href="{{ route('students.create') }}">Add student</a>
                </nav>
                <div class="topbar-note">
                    <span class="topbar-note-dot" aria-hidden="true"></span>
                    <span>Student records</span>
                </div>
            </header>

            <main class="page-content">
                @yield('content')
            </main>

            <footer class="site-footer">
                <span>Lincoln Student Management</span>
                <span>Student records, made simple.</span>
            </footer>
        </div>
    </div>
</body>
</html>
