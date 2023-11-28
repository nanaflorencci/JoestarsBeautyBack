<?php

namespace App\Http\Controllers;

use App\Http\Requests\AgendaFormRequest;
use App\Models\AgendaModel;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    public function cadastroAgenda(AgendaFormRequest $request){
        $agendamento =AgendaProfissionais::create([
           
            'profissional_id' => $request->profissional_id,
            'dataHora' => $request->dataHora
            
        ]);
        return response()->json([
            "success" => true,
            "message" => "Agenda cadastrado com sucesso",
            "data" => $agendamento
        ], 200);
    }


    //visualizar todos
    public function retornarTodos(){
        $agendamento = AgendaProfissionais::all();
        return response()->json([
            'status'=> true,
            'data'=> $agendamento
        ]);
    }


    public function pesquisarPorId($id){
        $agendamento = AgendaProfissionais::find($id);
        if($agendamento == null){
            return response()->json([
                'status'=> false,
                'message' => "agendamento não encontrado"
            ]);     
        }
        return response()->json([
            'status'=> true,
            'data'=> $agendamento
        ]);
    }


    //pesquisar por serviço
    public function pesquisarPorServico(Request $request){
        $agendamento = AgendaProfissionais::where('servico', 'like', '%' . $request->servico . '%')->get();
        if (count($agendamento) > 0) {
            return response()->json([
                'status' => true,
                'data' => $agendamento
            ]);
        }
        return response()->json([
            'status' => false,
            'data' => "Servico não encontrado"
        ]);
    }


    //DELETANDO AGENDAMENTO 
    public function excluir($id){
        $agendamento= AgendaProfissionais::find($id);
        if (!isset($agendamento)) {
            return response()->json([
                'status' => false,
                'message' => "Agendamento não encontrado"
            ]);
        }

        $agendamento->delete();

        return response()->json(([
            'status' => true,
            'message' =>  "Agendamento excluido com sucesso"
        ]));
    }


    //EDITANDO O AGENDAMENTO
    public function update(AgendaFormRequest $request){
        $agendamento = AgendaProfissionais::find($request->id);
    
        if(!isset($agendamento)){
            return response()->json([
                "status" => false,
                "message" => "Agendamento não encontrado"
            ]);
        }
    
        if(isset($request->profissional_id)){
            $agendamento->profissional_id = $request->profissional_id;
        }
        if(isset($request->dataHora)){
            $agendamento->dataHora = $request->dataHora;
        }
        $agendamento->update();
    
        return response()->json([
            "status" => false,
            "message" => "agendamento atualizado"
        ]);
    }
}