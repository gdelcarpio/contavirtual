@extends('app')

@section('content')

<div class="row">
	<div id="breadcrumb" class="col-xs-12">
		<ol class="breadcrumb">
			<li><a href="{{ route('users.profile') }}">PERFIL DE USUARIO</a></li>
			<li><a href="{{ route('users.profile.edit') }}">EDITAR PERFIL</a></li>
		</ol>
	</div>
</div> 

<div class="row">
	
	<div class="col-xs-8">
		<div class="box">
			<div class="box-header">
				<div class="box-name">
					<i class="fa fa-user"></i>
					<span>
						@foreach($user->roles as $pos => $role)

							@if($pos != 0 AND $pos % 2 == 0)
								{{ " / " }}
							@endif

							{{ $role->name }}

						@endforeach
					</span>
				</div>
				{{-- <div class="no-move"></div> --}}
			</div>
			<div class="box-content">
				<div class="card">
					<h4 class="page-header">{{ $user->name }} {{ $user->lastname }}</h4>
					<h4 class="page-header">{{ $user->company_name }}</h4>
					<h4 class="page-header"></h4>
					<p>
						<span>{{ $user->phone }}</span> <br>
						<span>{{ $user->office_phone }}</span> <br>
						<a href="mailto:{{ $user->email }}">{{ $user->email }}</a>
					</p>
				</div>
				<div class="card address">
					<h4>Dirección:</h4>
					<p>
						<span>{{ $user->address }}</span> <br>
						<span>{{ $user->department->name or 'No ingresado'}}</span> <br>
						<span>{{ $user->province->name or 'No ingresado'}}</span> <br>
						<span>{{ $user->district->name or 'No ingresado'}}</span> <br>
						<span>C. B: {{ $user->bn_account }}</span>
					</p>
				</div>
			</div>
		</div>
	</div>

</div>

@endsection