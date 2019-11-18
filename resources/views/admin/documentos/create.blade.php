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
<form method='post' action="{{url('admin/documentos')}}" enctype="multipart/form-data">
	@csrf
	<label>Titulo</label>
	<input type="text" name="titulo">

	<label>Descricao</label>
	<textarea name='descricao'></textarea>

	<label>Data</label>
	<input type="date" name="data">

	<!--<label>Data</label>
	<input type="text" name="user" value="">-->

	<input type="file" name="doc">

	<button type='submit'>Salvar</button>

</form>
</div>
</div>
@endsection