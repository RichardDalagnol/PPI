@extends('admin/base')

@section('content')
<div class="container">
	<div class="row mt-4">
		<div class="col">
			<h1>Usuários</h1>
		</div>
		<div class="col text-right">
			<a class="btn btn-secondary" href="{{ url('admin/users/create')}}">Novo Usuário</a>
		</div>
	</div>
<div class="row mt-4">
<table class=table>
	<thead>
		<th>#</th>
		<th>Nome</th>
		<th>Criado em</th>
		<th>Ações</th>
	</thead>
	<tbody>
		@foreach($usuarios as $user)
		<tr>
			<td>{{$user->id}}</td>
			<td>{{$user->name}}</td>
			<td>{{$user->created_at}}</td>
			<td> <a href="{{url('admin/users/'.$user->id.'/edit')}}">Editar</a>
				<form action="{{url('admin/users/'.$user->id)}}" method="post">
					@csrf
					<input type="hidden" name="_method" value="DELETE">
					<button type="submit">Excluir</button>
				</form>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
</div>
</div>
@endsection