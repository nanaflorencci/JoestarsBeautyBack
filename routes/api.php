<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProfissionalController;
use App\Http\Controllers\ServicoController;

//serviços
Route::post('servico',[ServicoController::class, 'Servico']);
Route::post('servico/nome',[ServicoController::class, 'pesquisarPorNome']);
Route::post('servico/descricao',[ServicoController::class, 'pesquisarPoDescricao']);
Route::delete('servico/delete/{id}',[ServicoController::class, 'excluir']);
Route::put('servico/update',[ServicoController::class, 'update']);
route::get('servico/visualizar', [ServicoController::class, 'retornarTodos']);
Route::get('servico/{id}',[ServicoController::class, 'pesquisarPorId']);

//Clientes
route::post('clientes', [ClienteController::class, 'clientes']);
route::post('clientes/nome', [ClienteController::class, 'pesquisarPorNome']);
route::post('clientes/cpf', [ClienteController::class, 'pesquisarPorCpf']);
route::post('clientes/celular', [ClienteController::class, 'pesquisarPorCelular']);
route::post('clientes/email', [ClienteController::class, 'pesquisarPorEmail']);
route::delete('clientes/delete/{id}', [ClienteController::class, 'excluir']);
route::put('clientes/update', [ClienteController::class, 'update']);
route::get('clientes/visualizar', [ClienteController::class, 'retornarTodos']);
Route::get('clientes/{id}',[ClienteController::class, 'pesquisarPorId']);


//Profissional
route::post('Profissional', [ProfissionalController::class, 'Profissional']);
route::post('Profissional/nome', [ProfissionalController::class, 'pesquisarPorNome']);
route::post('Profissional/cpf', [ProfissionalController::class, 'pesquisarPorCpf']);
route::post('Profissional/celular', [ProfissionalController::class, 'pesquisarPorCelular']);
route::post('Profissional/email', [ProfissionalController::class, 'pesquisarPorEmail']);
route::delete('Profissional/delete/{id}', [ProfissionalController::class, 'excluir']);
route::put('Profissional/update', [ProfissionalController::class, 'update']);
route::get('Profissional/visualizar', [ProfissionalController::class, 'retornarTodos']);
Route::get('Profissional/{id}',[ProfissionalController::class, 'pesquisarPorId']);


//Agenda
route::post('agenda', [AgendaController::class, 'agenda']);
route::delete('deleteA/{id}', [AgendaController::class, 'excluir']);
route::put('updateA', [AgendaController::class, 'update']);
route::get('visualizar', [AgendaController::class, 'retornarTodos']);