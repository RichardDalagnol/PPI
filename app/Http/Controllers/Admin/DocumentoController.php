<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Documentos;

class DocumentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $documentos = Documentos::all();
        return view('admin.documentos.documento',compact('documentos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.documentos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $documento = new Documentos;
        $documento->idUsuario = $_SESSION['user'];
        $documento->flagAtivo = true;
        $documento->titulo = $request->titulo; 
        $documento->descricao = $request->descricao;
        $documento->data = $request->data;

         // Define o valor default para a variável que contém o nome da imagem 
        $nameFile = null;
     
        // Verifica se informou o arquivo e se é válido
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
             
            // Define um aleatório para o arquivo baseado no timestamps atual
            $name = uniqid(date('HisYmd'));
     
            // Recupera a extensão do arquivo
            $extension = $request->image->extension();
     
            // Define finalmente o nome
            $nameFile = "{$name}.{$extension}";
     
            // Faz o upload:
            $upload = $request->image->store('arquivos', $nameFile);

            if ( !$upload )
                return redirect()
                            ->back()
                            ->with('error', 'Falha ao fazer upload')
                            ->withInput();
     
        }
        $documento->arquivo = $nameFile;


        $documento->save();

        return redirect('admin/documentos');

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
        $documento = Posts::find($id);

        return view('admin.documentos.edit', compact('documentos'));
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
        $documento = Posts::find($id);

        $documento->name = $request->nome;
        $documento->post = $request->post;

        $documento->save();

        return redirect('admin/documentos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $documento = Posts::find($id);

        $documento->delete();

        return redirect('admin/documentos');

    }
}
