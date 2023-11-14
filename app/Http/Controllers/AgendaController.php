<?php

namespace App\Http\Controllers;

use App\Http\Requests\AgendaFormRequest;
use App\Models\AgendaModel;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    public function agenda(AgendaFormRequest $request){
        $agendas= AgendaModel::create([
        'profissional_id'=> $request ->profissional_id,
        'cliente_id'=> $request ->cliente_id,
        'servico_id'=> $request ->servico_id,
        'data_hora'=> $request ->data_hora,
        'tipo_pagamento'=> $request ->tipo_pagamento,
        'valor'=> $request ->valor,
        ]);

        return response()->json([
            "success" => true,
            "message" => "serviço agendado com êxito",
            "data" => $agendas
        ], 200);
}
public function retornarTodos(){
    $agendas = AgendaModel::all();
    return response()->json([
        'status'=> true,
        'data'=> $agendas
    ]);
}
public function excluir($id){
    $agendas = AgendaModel::find($id);
    if(!isset($agendas)){
        return response()->json([
            "status" => false,
            "message" => "Agendamento não encontrado"
        ]);
    }
    $agendas->delete();

    return response()->json([
        'status' => false,
        'message' => 'Agendamento excluído com êxito'
    ]);
}

public function update(AgendaFormRequest $request){
    $agendas = AgendaModel::find($request->id);

    if(!isset($agendas)){
        return response()->json([
            "status" => false,
            "message" => "Agendamento não encontrado"
        ]);
    }

    if(isset($request->profissional_id)){
        $agendas->profissional_id = $request->profissional_id;
    }
    if(isset($request->cliente_id)){
        $agendas->cliente_id = $request->cliente_id;
    }
    if(isset($request->servico_id)){
        $agendas->servico_id = $request->servico_id;
    }
    if(isset($request->data_hora)){
        $agendas->data_hora = $request->data_hora;
    }
    if(isset($request->tipo_pagamento)){
        $agendas->tipo_pagamento = $request->tipo_pagamento;
    }
    if(isset($request->valor)){
        $agendas->valor = $request->valor;
    }
    $agendas->update();
    
        return response()->json([
            "status" => false,
            "message" => "Cliente atualizado com êxito"
        ]);
}
}