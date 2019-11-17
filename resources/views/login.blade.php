<!DOCTYPE html>
<html>
<head>
	<title>Login</title>

	<meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
 <h4>Essa página é para fazer login!</h4>

 <form action="{{ url('logar')}}" method='post'>
 	@csrf 
 	<label>Email</label>
 	<input type="text" name="email">
 	<label>Senha</label>
 	<input type="password" name="password">

 	<button>Logar</button>
 </form>
</body>
</html>