@extends('admin/base')

@section('content')
<div class="container">
	<div class="row mt-4">
		<div class="col">
			<h1>POSTS</h1>
		</div>
		<div class="col text-right">
			
		</div>
	</div>
<div class="row mt-4">
<form method='post' action="{{url('admin/documentos/'.$post->id)}}" enctype="multipart/form-data">>
	@csrf

	<input type="hidden" name="_method" value="PUT">
	
	<label>Titulo</label>
	<input type="text" name="nome" value="{{$post->titulo}}">

	<label>Descricao</label>
	<textarea name='descricao'>{{$post->descricao}}</textarea>

	<label>Arquivo</label>
	<input type="file" name="image">
	<a href="{{url('download/'.$documento->arquivo)}}">Download</a>


	<button type='submit'>Salvar</button>

</form>
</div>
</div>
@endsection