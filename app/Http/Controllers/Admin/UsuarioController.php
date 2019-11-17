<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function login(Request $request){
        $users = DB::table('users')->select('id')->where('email', '=', $request->email)->where('password', '=', $request->password)->where('admin', '=', true)->get();

        if ($users != null) {
            return  view('welcome');
        }else{
            return  redirect('login');
        }
    }
    public function index()
    {
        $usuarios = User::all();
        return view('admin.usuarios.usuario',compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.usuarios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $user = new User;

        $user->name = $request->nome; 
        $user->email = $request->email;
        
        if ($request->admin === true) {
            $user->admin = true;            
        }else{
            $user->admin = false;
        }
        
        $user->password = $request->password;

        $user->save();

        return redirect('admin/users');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usuario = User::find($id);

        return view('admin.usuarios.edit', compact('usuario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $usuario = User::find($id);

        $usuario->name = $request->nome;
        $usuario->email = $request->email;
        
        if ($request->admin === true) {
            $usuario->admin = true;            
        }else{
            $usuario->admin = false;
        }
        

        $usuario->save();

        return redirect('admin/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usuario = User::find($id);

        $usuario->delete();

        return redirect('admin/users');

    }
}
