	<nav id="navbar" class="fixed-top navbar navbar-expand-sm">
		<div class="container-fluid d-flex justify-content-between">
			<div>
				<img src="{{ Vite::asset('resources/images/gym-icon.png') }}" alt="Logo" style="width:40px;" class="rounded-pill">
  			</div>
  			<ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0 "> 
				<li>
					<a href="{{ route('dashboard') }}" class="nav-link px-2 @yield('inicio_active')">Inicio</a>
				</li>
				<li>
					<a href="{{ route('socios.index') }}" class="nav-link px-2 @yield('socio_active')">Socios</a>
				</li>
				<li>
					<a href="{{ route('membresias.index') }}" class="nav-link px-2 @yield('membresia_active')">Membresias</a>
				</li>
				<li>
					<a href="#" class="nav-link px-2">Clases</a>
				</li>
				<li>
					<a href="#" class="nav-link px-2">Asistencias</a>
				</li>
				<li>
					<a href="#" class="nav-link px-2">Pagos</a>
				</li>
				<li>
					<a href="#" class="nav-link px-2">Instructores</a>
				</li>
			</ul>
			<div class="ms-auto">
				@guest
				<a href="{{ route('login') }}" class="btn btn-primary- me-2">Iniciar sesión</a>
				<a href="{{ route('register') }}" class="btn btn-light">Registrarse</a>
				@endguest
				@auth
				<div class="d-flex align-items-center me-2 ">
					<h5 class="me-3">Binvenido, {{ Auth::user()->name }}!</h5>
					<form method="POST" action="{{ route('logout') }}" >
						@csrf
						<button class="btn btn-secondary">Cerrar sesión</button>
					</form>
				</div>
				@endauth
        	</div>
			<div class="col-md-3 d-flex justify-content-end">
				<button id="themeSwitch" type ="button" class="btn btn-outline-primary me-2">Cambiar tema</button>
			</div>
		</div>
	</nav>
	<div class="container-fluid" style="margin-top: 100px;">