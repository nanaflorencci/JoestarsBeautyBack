<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProfissionalController;
use App\Http\Controllers\ServicoController;

//Cadastro de serviço
Route::post('cadastroServico', [ServicoController::class,  'cadastroServico']);
Route::delete('delete/{id}', [ServicoController::class, 'excluirServico']);
Route::post('buscarNome', [ServicoController::class, 'PesquisarPorNomeServico']);
Route::post('pesquisar', [ServicoController::class, 'pesquisarPorDescricaoServico']);
Route::put('updateServico', [ServicoController::class,  'updateServico']);
Route::get('visualizarServico', [ServicoController::class, 'visualizarServico']);
Route::get('pesquisarPorIdServico/{id}', [ServicoController::class, 'pesquisarPorIdServico']);

//Cadastro de cliente
Route::post('cadastroCliente', [ClienteController::class,  'cadastroCliente']);
Route::delete('excluir/{id}', [ClienteController::class, 'deletarCliente']);
Route::post('buscarNomecliente', [ClienteController::class, 'pesquisarPorNomeCliente']);
Route::post('CPF', [ClienteController::class, 'pesquisarPorCpfCliente']);
Route::post('telefone', [ClienteController::class, 'PesquisarPorCelularCliente']);
Route::post('email', [ClienteController::class, 'PesquisarPorEmailCliente']);
Route::post('cep', [ClienteController::class, 'pesquisarPorCepCliente']);
Route::put('updateCliente', [ClienteController::class,  'updateCliente']);
Route::get('visualizarCadastroCliente', [ClienteController::class, 'visualizarCliente']);
Route::get('pesquisarPorIdCleinte/{id}', [ClienteController::class, 'pesquisarPorIdCliente']);
Route::post('senha/clientes',[clientecontroller::class, 'redefinirSenhaCliente']);

//Cadastro de profissional
Route::post('cadastroProfissional', [ProfissionalController::class, 'cadastroProfissional']);
Route::post('senha/profissional',[Profissionalcontroller::class, 'redefinirSenhaProfissional']);
Route::post('pesquisarPorProfissional', [ProfissionalController::class, 'pesquisarPorNomeProfissional']);
Route::get('visualizarProfissional', [ProfissionalController::class, 'visualizarProfissional']);
Route::post('pesquisarPorCpf', [ProfissionalController::class, 'pesquisarPorCpfProfissional']);
Route::post('PesquisarPorCelular', [ProfissionalController::class, 'pesquisarPorCelularProfissional']);
Route::post('PesquisarPorEmail', [ProfissionalController::class, 'pesquisarPorEmailProfissional']);
Route::put('updateProfissional', [ProfissionalController::class,  'updateProfissional']);
Route::delete('deletarProficional/{id}', [ProfissionalController::class, 'deletarProfissional']);
Route::get('pesquisarPorIdProficional/{id}', [ProfissionalController::class, 'pesquisarPorIdProfissional']);

//Cadastro de agendamento
Route::post('cadastroAgenda', [AgendaController::class, 'cadastroAgenda']);
Route::delete('deleteAgenda/{id}', [AgendaController::class, 'excluirAgenda']);
Route::get('visualizarAgenda', [AgendaController::class, 'visualizarAgenda']);
Route::post('buscarPorData/', [AgendaController::class, 'buscarPorDataAgenda']);
Route::post('buscarPorIdProfissional{profissional_id}', [AgendaController::class, 'buscarPorIdProfissional']);
route::get('find/agendamento/{id}', [AgendaController::class, 'pesquisarPorIdAgenda']);
route::put('update/agendamento', [AgendaController::class, 'updateAgenda']);