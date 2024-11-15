<?php

namespace App\Controllers;

use App\Controller;
use App\Models\Cidadao;

class HomeController extends Controller
{
    public $cidadao;

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

                return json_encode(['message' => 'Cidadão criado com sucesso']);
            } catch (\Exception $e) {
                return json_encode(['error' => $e->getMessage()]);
            }
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

            return $this->formatJsonResponse($cidadaos);
        } catch (\Exception $e) {
            return $this->formatJsonResponse(['error' => $e->getMessage()], 400);
        }
    }
    private function formatJsonResponse(array $data, int $statusCode = 200)
    {
        header('Content-Type: application/json', true, $statusCode);

        // Retorna o JSON
        echo json_encode($data);
    }


}
