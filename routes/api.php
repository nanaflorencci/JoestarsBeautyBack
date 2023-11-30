<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProfissionalController;
use App\Http\Controllers\ServicoController;

//Serviços
Route::post('servico',[ServicoController::class, 'Servico']);
Route::post('servico/nome',[ServicoController::class, 'pesquisarPorNome']);
Route::post('servico/descricao',[ServicoController::class, 'pesquisarPoDescricao']);
Route::delete('servico/delete/{id}',[ServicoController::class, 'excluir']);
Route::put('servico/update',[ServicoController::class, 'update']);
route::get('servico/visualizar', [ServicoController::class, 'retornarTodos']);
Route::get('servico/pesquisar/{id}',[ServicoController::class, 'pesquisarPorId']);

//Clientes
route::post('clientes', [ClienteController::class, 'clientes']);
route::post('clientes/nome', [ClienteController::class, 'pesquisarPorNome']);
route::post('clientes/cpf', [ClienteController::class, 'pesquisarPorCpf']);
route::post('clientes/celular', [ClienteController::class, 'pesquisarPorCelular']);
route::post('clientes/email', [ClienteController::class, 'pesquisarPorEmail']);
route::delete('clientes/delete/{id}', [ClienteController::class, 'excluir']);
route::put('clientes/update', [ClienteController::class, 'update']);
route::get('clientes/visualizar', [ClienteController::class, 'retornarTodos']);
Route::get('clientes/pesquisar/{id}',[ClienteController::class, 'pesquisarPorId']);
Route::post('clientes/senha/redefinir',[ClienteController::class, 'redefinirSenha']);

//Profissionais
route::post('Profissional', [ProfissionalController::class, 'Profissional']);
route::post('Profissional/nome', [ProfissionalController::class, 'pesquisarPorNome']);
route::post('Profissional/cpf', [ProfissionalController::class, 'pesquisarPorCpf']);
route::post('Profissional/celular', [ProfissionalController::class, 'pesquisarPorCelular']);
route::post('Profissional/email', [ProfissionalController::class, 'pesquisarPorEmail']);
route::delete('Profissional/delete/{id}', [ProfissionalController::class, 'excluir']);
route::put('Profissional/update', [ProfissionalController::class, 'update']);
route::get('Profissional/visualizar', [ProfissionalController::class, 'retornarTodos']);
Route::get('Profissional/pesquisar/{id}',[ProfissionalController::class, 'pesquisarPorId']);
Route::post('Profissional/senha/redefinir',[ProfissionalController::class, 'redefinirSenha']);

//Agendamento
route::post('agendamento', [AgendaProfissionaiscontroller::class, 'cadastroAgenda']);
route::post('nome/agendamento', [AgendaProfissionaiscontroller::class, 'pesquisarPorServico']);
route::delete('delete/agendamento/{id}', [AgendaProfissionaiscontroller::class, 'excluir']);
route::put('update/agendamento', [AgendaProfissionaiscontroller::class, 'update']);
route::get('visualizar/agendamento', [AgendaProfissionaiscontroller::class, 'retornarTodos']);
route::get('find/agendamento/{id}', [AgendaProfissionaiscontroller::class, 'pesquisarPorId']);