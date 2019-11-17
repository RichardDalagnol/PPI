@extends('admin/base')

@section('content')
<div class="container">
	<div class="row mt-4">
		<div class="col">
			<h1>Arquivos</h1>
		</div>
		<div class="col text-right">
			<a class="btn btn-secondary" href="{{ url('admin/documentos/create')}}">Novo Arquivo</a>
		</div>
	</div>
<div class="row mt-4">
<table class=table>
	<thead>
		<th>#</th>
		<th>Titulo</th>
		<th>Descrição</th>
		<th>Criado em</th>
		<th>Ações</th>
	</thead>
	<tbody>
		@foreach($documentos as $documento)
		<tr>
			<td>{{$documento->id}}</td>
			<td>{{$documento->titulo}}</td>
			<td>{{$documento->descricao}}</td>
			<td>{{$documento->created_at}}</td>
			<td> 
				<a href="{{url('documentos/'.$documento->arquivo)}}">Downalod</a>
				<a href="{{url('admin/documentos/'.$documento->id.'/edit')}}">Editar</a>
				<form action="{{url('admin/documentos/'.$documento->id)}}" method="post">
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