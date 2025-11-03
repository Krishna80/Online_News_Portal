<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - @yield('title', 'Dashboard')</title>
<script src="https://cdn.tiny.cloud/1/th4giv1pblj98knhp1u47h37m9twp6y65ac2hfym6xp4pyo1/tinymce/8/tinymce.min.js" referrerpolicy="origin" crossorigin="anonymous"></script>
    <!-- Bootstrap & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Custom Admin Styles -->
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar d-flex flex-column justify-content-between">
        <div>
            <h3>🛠 Admin Panel</h3>
            <a href="{{ route('admin.dashboard') }}" class="{{ request()->is('dashboard') ? 'active' : '' }}">
                <i class="bi bi-speedometer2 me-2"></i> Dashboard
            </a>
            <a href="{{ route('articles.index') }}" class="{{ request()->is('articles*') ? 'active' : '' }}">
                <i class="bi bi-newspaper me-2"></i> Articles
            </a>
            <a href="{{ route('categories.index') }}" class="{{ request()->is('categories*') ? 'active' : '' }}">
                <i class="bi bi-tags me-2"></i> Categories
            </a>
        </div>

        <div class="mb-3 px-3">
            <form method="POST" action="{{ route('admin.logout') }}">
                @csrf
                <button type="submit" class="logout-btn">
                    <i class="bi bi-box-arrow-right me-2"></i> Logout
                </button>
            </form>
        </div>
    </div>

    <!-- Main content -->
    <div class="main-content">
        @yield('content')
        <footer>
            <small>© {{ date('Y') }} Admin Panel | Built with Laravel</small>
        </footer>
    </div>
@yield('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.tiny.cloud/1/th4giv1pblj98knhp1u47h37m9twp6y65ac2hfym6xp4pyo1/tinymce/8/tinymce.min.js"
    referrerpolicy="origin"></script>
<script src="{{ asset('js/tinymce-init.js') }}"></script>

</body>
</html>
