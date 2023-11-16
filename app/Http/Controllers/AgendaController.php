<?php

namespace App\Http\Controllers;

use App\Http\Requests\AgendaFormRequest;
use App\Models\AgendaModel;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    //Cadastro de cliente - Agenda
    public function cadastroClienteAgenda(AgendaFormRequest $request)
    {
        $agendas = AgendaModel::create([

            'profissional_id' => $request->profissional_id,

            'data_hora' => $request->data_hora,

        ]);
        return response()->json([
            "success" => true,
            "message" => "Agenda cadastrado com sucesso",
            "data" => $agendas
        ], 200);
    }

    //Vizualização de serviço
    public function VisualisarServico(Request $request)
    {
        $agendas = AgendaModel::where('servico', 'like', '%' . $request->servico . '%')->get();

        if (count($agendas) > 0) {
            return response()->json([
                'status' => true,
                'data' => $agendas
            ]);
        }
        return response()->json([
            'status' => false,
            'data' => "Servico não encontrado"
        ]);
    }

    //Editar agendamento
    public function updateAgenda(AgendaFormRequest $request)
    {
        $agendas = AgendaModel::find($request->id);

        if (!isset($agendas)) {
            return response()->json([
                'status' => false,
                'message' => 'Agenda não encontrado'
            ]);
        }
        if (isset($request->profissional_id)) {
            $agendas->profissional_id = $request->profissional_id;
        }
        if (isset($request->data_hora)) {
            $agendas->data_hora = $request->data_hora;
        }
        $agendas->update();
        return response()->json([
            'status' => true,
            'message' => 'Agenda ataulizado'
        ]);
    }

    //Deletando agendamento
    public function excluir($id)
    {
        $agendas = AgendaModel::find($id);
        if (!isset($agendas)) {
            return response()->json([
                'status' => false,
                'message' => "Agendamento não encontrado"
            ]);
        }
        $agendas->delete();

        return response()->json(([
            'status' => true,
            'message' =>  "Agendamento excluido com sucesso"
        ]));
    }
    public function visualizarAgenda()
    {
        $agendas = AgendaModel::all();

        if (!isset($agendas)) {

            return response()->json([
                'status' => false,
                'message' => 'não há registros registrados'
            ]);
        }
        return response()->json([
            'status' => true,
            'data' => $agendas
        ]);
    }
}