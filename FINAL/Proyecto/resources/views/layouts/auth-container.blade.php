@vite(['resources/js/login.js','resources/css/login.css'])
<body class="min-vh-100 d-flex justify-content-center align-items-center">
    <canvas id="background"></canvas>
    <main class="container position-relative">
        <div class="row justify-content-center">
            <div class="col-11 col-sm-8 col-md-6 col-lg-4 col-xl-3">
                <div class="card shadow-lg border-0">
                    <div class="card-body p-4">
                        <h2 class="text-center mb-4">Gym Manager</h2>
                        <h3 class="text-center mb-4">@yield('auth_subtitle')</h3>
                       @yield('auth_content')
                        <div class="text-center mt-4">
                            <small class="text-muted">&copy; Gym 2026</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
