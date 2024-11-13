<?php

namespace App\Controllers;

use App\Controller;
use App\Models\Cidadao;

class HomeController extends Controller
{
    private $cidadao;

    public function __construct()
    {
        $this->cidadao = new Cidadao();
    }

    public function index()
    {
        $this->render('index');
    }

    public function created()
    {
        $this->render('created');
    }

    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                $dados = [
                    'nome' => $_POST['nome'],
                    'nis' => $this->gerarNIS(),
                ];

                if (empty($dados['nome'])) {
                    throw new \Exception('O nome é obrigatório.');
                }

                $this->cidadao->salvar($dados);

                echo json_encode(['message' => 'Cidadão criado com sucesso']);
            } catch (\Exception $e) {
                echo json_encode(['error' => $e->getMessage()]);
            }
            exit;
        }
    }


    private function gerarNIS()
    {
        $nis = '';
        for ($i = 0; $i < 11; $i++) {
            $nis .= rand(0, 9);
        }

        return $nis;
    }

    public function getCidadaos()
    {
        try {
            $cidadaos = $this->cidadao->getAllCidadao();

            if (!$cidadaos) {
                throw new \Exception('Nenhum cidadão encontrado.');
            }

            header('Content-Type: application/json');
            echo json_encode($cidadaos);
        } catch (\Exception $e) {
            header('Content-Type: application/json');
            echo json_encode(['error' => $e->getMessage()]);
        }
        exit;
    }

}
