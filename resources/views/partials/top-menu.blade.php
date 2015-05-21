<ul class="nav navbar-nav pull-right panel-menu">
	{{--<li class="hidden-xs">
		<a href="index.html" class="modal-link">
			<i class="fa fa-bell"></i>
			<span class="badge">7</span>
		</a>
	</li>
	<li class="hidden-xs">
		<a class="ajax-link" href="ajax/calendar.html">
			<i class="fa fa-calendar"></i>
			<span class="badge">7</span>
		</a>
	</li>
	<li class="hidden-xs">
		<a href="ajax/page_messages.html" class="ajax-link">
			<i class="fa fa-envelope"></i>
			<span class="badge">7</span>
		</a>
	</li>--}}
	<li class="dropdown">
		<a href="#" class="dropdown-toggle account" data-toggle="dropdown">
			<div class="avatar">
				<img src="{{ asset('img/avatar.jpg') }}" class="img-rounded" alt="avatar" />
			</div>
			<i class="fa fa-angle-down pull-right"></i>
			<div class="user-mini pull-right">
				<span class="welcome">Bienvenido,</span>
				<span>{{ Auth::user()->name }}</span>
			</div>
		</a>
		<ul class="dropdown-menu">
			<li>
				<a href="{{ route('users.profile') }}">
					<i class="fa fa-user"></i>
					<span>Perfil</span>
				</a>
			</li>
{{-- 			<li>
				<a href="ajax/page_messages.html" class="ajax-link">
					<i class="fa fa-envelope"></i>
					<span>Messages</span>
				</a>
			</li> --}}
			<li>
				<a href="{{ route('users.password.edit') }}" class="ajax-link">
					<i class="fa fa-key"></i>
					<span>Cambiar contraseña</span>
				</a>
			</li>
			<li>
				<a href="#">
					<i class="fa fa-cog"></i>
					<span>Configuración</span>
				</a>
			</li>
			<li>
				<a href="{{ url('/auth/logout') }}">
					<i class="fa fa-power-off"></i>
					<span>Cerrar sesión</span>
				</a>
			</li>
		</ul>
	</li>
</ul>