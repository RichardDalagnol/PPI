@extends('admin/base')

@section('content')
<div class="container">
	<div class="row mt-4">
		<div class="col">
			<h1>Usuários</h1>
		</div>
		<div class="col text-right">
			
		</div>
	</div>
<div class="row mt-4">
<form method='post' action="{{url('admin/users/'.$usuario->id)}}">
	@csrf

	<input type="hidden" name="_method" value="PUT">
	
	<label>Nome</label>
	<input type="text" name="nome" value="{{$usuario->name}}">

	<label>Email</label>
	<input type="email" name="email" value = "{{$usuario->email}}"/>

	
	<label>Password</label>
	<input type="password" name="password" value = "{{$usuario->password}}"/>


	<label>Administrador</label>
	<input type="radio" name="admin" value="true" />
	<label> Usuário</label>
	<input type="radio" name="admin" value="false"/>

	<button type='submit'>Salvar</button>

</form>
</div>
</div>
@endsection