<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServicoFormRequest;
use App\Http\Requests\ServicoFormRequestUpdate;
use App\Models\ServicoModel;
use Illuminate\Http\Request;

class ServicoController extends Controller
{
    public function Servico(ServicoFormRequest $request)
    {
        $servico = ServicoModel::create([
            'nome' => $request->nome,
            'descricao' => $request->descricao,
            'duracao' => $request->duracao,
            'preco' => $request->preco,

        ]);
        return response()->json([
            'sucess' => true,
            'message' => "Servico Cadastrado com êxito",
            'data' => $servico
        ]);
    }
    public function pesquisarPorNome(Request $request)
    {
        $servico = ServicoModel::where('nome', 'like', '%' . $request->nome . '%')->get();

        if (count($servico) > 0) {

            return response()->json([
                'status' => true,
                'data' => $servico
            ]);
        }
        

        return response()->json([
            'status' => false,
            'message' => 'Não há resultados para pesquisa.'
        ]);
    }
    
    public function pesquisarPoDescricao(Request $request)
    {
        $servico = ServicoModel::where('descricao', 'like', '%' . $request->descricao . '%')->get();

        if (count($servico) > 0) {

            return response()->json([
                'status' => true,
                'data' => $servico
            ]);
        }

        return response()->json([
            'status' => false,
            'message' => 'Não há resultados para pesquisa.'
        ]);
    }
    public function retornarTodos(){
        $servico = ServicoModel::all();
        return response()->json([
            'status'=> true,
            'data'=> $servico
        ]);
    }

    public function pesquisarPorId($id){
        $servico = ServicoModel::find($id);
        if($servico == null){
            return response()->json([
                'status'=> false,
                'message' => "Serviço não encontrado"
            ]);     
        }
        return response()->json([
            'status'=> true,
            'data'=> $servico
        ]);
    }

    public function excluir($id)
    {
        $servico = ServicoModel::find($id);
        if (!isset($servico)) {
            return response()->json([
                'status' => false,
                'message' => "Serviço não encontrado"
            ]);
        }

        $servico->delete();

        return response()->json([
            'status' => true,
            'message' => "serviço excluído com êxito"
        ]);
    }

    public function update(ServicoFormRequestUpdate $request){
        $servico = ServicoModel::find($request->id);
    
        if(!isset($servico)){
            return response()->json([
                'status' => false,
                'message' => "Serviço não encontrado"
            ]);
        }
    
        if(isset($request->nome)){
            $servico->nome = $request->nome;
        }
        if(isset($request->descricao)){
            $servico->descricao = $request->descricao;
        }
        if(isset($request->duracao)){
            $servico->duracao = $request->duracao;
        }
        if(isset($request->preco)){
            $servico->preco = $request->preco;
        }
    
        $servico->update();
    
        return response()->json([
            'status' => false,
            'message' => "Serviço atualizado êxito"
        ]);
    
    }
    }