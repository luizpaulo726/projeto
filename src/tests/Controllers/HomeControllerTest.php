<?php

use App\Controllers\HomeController;
use App\Models\Cidadao;
use Mockery;

it('cadastro de um cidadão com sucesso!!', function () {
    // Cria o mock para o modelo Cidadao
    $cidadaoMock = Mockery::mock(Cidadao::class);
    $cidadaoMock->shouldReceive('salvar')
        ->once()
        ->with(Mockery::on(function ($dados) {
            return isset($dados['nome']) && $dados['nome'] === 'Teste' && isset($dados['nis']);
        }))
        ->andReturn(true);

    $homeController = new HomeController();
    $homeController->cidadao = $cidadaoMock;

    $_SERVER['REQUEST_METHOD'] = 'POST';
    $_POST['nome'] = 'Teste';  // Dados da requisição

    $output = $homeController->store();  // Agora captura o retorno da função

    // Verifica a resposta
    $responseData = json_decode($output, true);  // Decodifica o JSON
    expect($responseData)->toHaveKey('message');
    expect($responseData['message'])->toEqual('Cidadão criado com sucesso');

    Mockery::close();
});

it('falha ao cadastrar um cidadão com nome vazio!!', function () {
    // Cria o mock para o modelo Cidadao
    $cidadaoMock = Mockery::mock(Cidadao::class);
    $cidadaoMock->shouldReceive('salvar')
        ->never();

    $homeController = new HomeController();
    $homeController->cidadao = $cidadaoMock;

    $_SERVER['REQUEST_METHOD'] = 'POST';
    $_POST['nome'] = ''; // Simula o envio de um nome vazio

    $output = $homeController->store();  // Captura o retorno

    // Verifica a resposta
    $responseData = json_decode($output, true);  // Decodifica o JSON
    expect($responseData)->toHaveKey('error');
    expect($responseData['error'])->toEqual('O nome é obrigatório');

    Mockery::close();
});