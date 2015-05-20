@extends('app')

@section('content')

<div class="row">
	<div id="breadcrumb" class="col-xs-12">
		<ol class="breadcrumb">
			<li><a href="index.html">PERFIL DE USUARIO</a></li>
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
					<h4 class="page-header">{{ $user->name }}</h4>
					<h4 class="page-header">{{ $user->lastname }}</h4>
					<h5 class="page-header">Manager</h5>
					<p>
						<span>{{ $user->phone }}</span> <br>
						<span>{{ $user->office_phone }}</span> <br>
						<a href="mailto:{{ $user->email }}">{{ $user->email }}</a>
					</p>
				</div>
				<div class="card address">
					<div class="vcard">
						<a href="#"><i class="fa fa-file"></i>.vCard</a>
					</div>
					<h4>Adress:</h4>
					<p>
						<span>{{ $user->address }}</span> <br>
						<span>str. Nonest. building 33</span>
					</p>
				</div>
			</div>
		</div>
	</div>

</div>

@endsection