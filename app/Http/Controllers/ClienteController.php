<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClienteFormRequest;
use App\Http\Requests\ClienteFormRequestUpdate;
use App\Models\ClienteModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ClienteController extends Controller
{
    public function Clientes(ClienteFormRequest $request){
        $Cliente= ClienteModel::create([
            'nome'=> $request ->nome,
            'celular'=> $request ->celular,
            'email'=> $request ->email,
            'cpf'=> $request ->cpf,
            'dataNascimento'=> $request ->dataNascimento,
            'cidade'=> $request ->cidade,
            'estado'=> $request ->estado,
            'pais'=> $request ->pais,
            'rua'=> $request ->rua,
            'numero'=> $request ->numero,
            'bairro'=> $request ->bairro,
            'cep'=> $request ->cep,
            'complemento'=> $request ->complemento,
            'password'=> Hash::make($request->senha),
        ]);

        return response()->json([
            'success' => true,
            'message' => "Cliente cadastrado com êxito",
            'data' => $Cliente
        ], 200);
}
public function pesquisarPorNome(Request $request){
    $Cliente =  ClienteModel::where('nome', 'like', '%'. $request->nome . '%')->get();
    if(count($Cliente) > 0){
    return response()->json([
        'status'=> true,
        'data'=> $Cliente
    ]);
}

return response()->json([
    'status' => false,
    'message' => 'não há resultados para pesquisa.'
]);
}
public function retornarTodos(){
    $Cliente = ClienteModel::all();
    return response()->json([
        'status'=> true,
        'data'=> $Cliente
    ]);
}

public function pesquisarPorId($id){
    $Cliente = ClienteModel::find($id);
    if($Cliente == null){
        return response()->json([
            'status'=> false,
            'message' => "Serviço não encontrado"
        ]);     
    }
    return response()->json([
        'status'=> true,
        'data'=> $Cliente
    ]);
}

public function pesquisarPorCpf(Request $request){
    $Cliente =  ClienteModel::where('cpf', 'like', '%'. $request->cpf . '%')->get();
    if(count($Cliente) > 0){
    return response()->json([
        'status'=> true,
        'data'=> $Cliente 
    ]);
}
return response()->json([
    'status' => false,
    'message' => 'não há resultados para pesquisa.'
]);
}
public function pesquisarPorCelular(Request $request){
    $Cliente =  ClienteModel::where('celular', 'like', '%'. $request->celular . '%')->get();
    if(count($Cliente) > 0){
    return response()->json([
        'status'=> true,
        'data'=> $Cliente
    ]);
}
return response()->json([
    'status' => false,
    'message' => 'não há resultados para pesquisa.'
]);
}

public function pesquisarPorEmail(Request $request){
    $Cliente =  ClienteModel::where('email', 'like', '%'. $request->email . '%')->get();
    if(count($Cliente) > 0){
    return response()->json([
        'status'=> true,
        'data'=> $Cliente
    ]);
}
return response()->json([
    'status' => false,
    'message' => 'não há resultados para pesquisa.'
]);
}

public function excluir($id){
    $Cliente = ClienteModel::find($id);
    if(!isset($Cliente)){
        return response()->json([
            'status' => false,
            'message' => "Cliente não encontrado"
        ]);
    }
    $Cliente->delete();

    return response()->json([
        'status' => false,
        'message' => 'Cliente excluído com êxito'
    ]);
}

public function update(ClienteFormRequestUpdate $request){
    $Cliente = ClienteModel::find($request->id);

    if(!isset($Cliente)){
        return response()->json([
            'status' => false,
            'message' => "Cliente não encontrado"
        ]);
    }

    if(isset($request->nome)){
        $Cliente->nome = $request->nome;
    }
    if(isset($request->celular)){
        $Cliente->celular = $request->celular;
    }
    if(isset($request->email)){
        $Cliente->email = $request->email;
    }
    if(isset($request->cpf)){
        $Cliente->cpf= $request->cpf;
    }
    if(isset($request->dataNascimento)){
        $Cliente->dataNascimento = $request->dataNascimento;
    }
    if(isset($request->cidade)){
        $Cliente->cidade = $request->cidade;
    }
    if(isset($request->estado)){
        $Cliente->estado = $request->estado;
    }
    if(isset($request->pais)){
        $Cliente->pais = $request->pais;
    }
    if(isset($request->rua)){
        $Cliente->rua = $request->rua;
    }
    if(isset($request->numero)){
        $Cliente->numero = $request->numero;
    }
    if(isset($request->bairro)){
        $Cliente->bairro = $request->bairro;
    }
    if(isset($request->cep)){
        $Cliente->cep = $request->cep;
    }
    if(isset($request->complemento)){
        $Cliente->complemento = $request->complemento;
    }
    if(isset($request->password)){
        $Cliente->senha = $request->senha;
    }

    $Cliente->update();

    return response()->json([
        'status' => false,
        'message' => "Cliente atualizado com êxito"
    ]);
}
}