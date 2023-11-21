<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProfissionalController;
use App\Http\Controllers\ServicoController;

//Clientes
Route::post('cadastroCliente', [ClienteController::class,  'cadastroCliente']);
Route::delete('excluir/{id}', [ClienteController::class, 'deletar']);
Route::post('buscarNomecliente', [ClienteController::class, 'pesquisarPorCliente']);
Route::post('CPF', [ClienteController::class, 'pesquisarPorCpf']);
Route::post('telefone', [ClienteController::class, 'PesquisarPorCelular']);
Route::post('email', [ClienteController::class, 'PesquisarPorEmail']);
Route::post('cep', [ClienteController::class, 'pesquisarPorCep']);
Route::put('updateCliente', [ClienteController::class,  'updateCliente']);
Route::get('visualizarCadastroCliente', [ClienteController::class, 'visualizarCadastroCliente']);
Route::get('pesquisarPorIdCleinte/{id}', [ClienteController::class, 'pesquisarPorIdCleinte']);

//Profissionais
Route::post('cadastroProfissional', [ProfissionalController::class, 'cadastroProfissional']);
Route::post('pesquisarPorProfissional', [ProfissionalController::class, 'pesquisarPorProfissionalNome']);
Route::get('vizualizarProfi', [ProfissionalController::class, 'visualizarProfissional']);
Route::post('pesquisarPorCpf', [ProfissionalController::class, 'pesquisarPorCpf']);
Route::post('PesquisarPorCelular', [ProfissionalController::class, 'PesquisarPorCelular']);
Route::post('PesquisarPorEmail', [ProfissionalController::class, 'PesquisarPorEmail']);
Route::put('updateProfissional', [ProfissionalController::class,  'updateProfissional']);
Route::delete('deletarProficional/{id}', [ProfissionalController::class, 'deletarProficional']);
Route::get('pesquisarPorIdProficional/{id}', [ProfissionalController::class, 'pesquisarPorIdProficional']);

//Serviços
Route::delete('delete/{id}', [ServicoController::class, 'excluir']);
Route::post('cadastrarServico', [ServicoController::class,  'servico']);
Route::post('buscarNome', [ServicoController::class, 'PesquisarPorNome']);
Route::post('pesquisar', [ServicoController::class, 'pesquisarPorDescricao']);
Route::put('updateServico', [ServicoController::class,  'update']);
Route::get('visualizarServico', [ServicoController::class, 'visualizarServico']);
Route::get('pesquisarPorIdServico/{id}', [ServicoController::class, 'pesquisarPorIdServico']);

//Agendamento
Route::post('cadastroAgenda', [AgendaController::class, 'cadastroClienteAgenda']);
Route::put('atualizarA/{id}', [AgendaController::class,  'updateAgendamento']);
Route::delete('deleteAgenda/{id}', [AgendaController::class, 'excluir']);
Route::get('visualizarAgenda', [AgendaController::class, 'visualizarAgenda']);
Route::put('updateAgenda', [AgendaController::class,  'updateAgenda']);