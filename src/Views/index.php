<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cidadãos</title>
    <link rel="stylesheet" href="/css/style.css">

    <!-- CSS do DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
</head>
<body>

<div class="container">
    <h1>Lista de Cidadãos</h1>

    <!-- Botão para adicionar novo cidadão -->
    <a href="/created">
        <button class="add-btn">Adicionar Novo Cidadão</button>
    </a>

    <!-- Tabela de cidadãos -->
    <table id="cidadao-table" class="display">
        <thead>
        <tr>
            <th class="nome">Nome</th>
            <th class="nis">NIS</th>
        </tr>
        </thead>
        <tbody id="cidadao-table-body">
        </tbody>
    </table>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        // Inicializa o DataTable na tabela
        var table = $('#cidadao-table').DataTable();

        function carregarCidadaos() {
            $.ajax({
                url: '/cidadaos',
                type: 'GET',
                success: function(response) {
                    table.clear();

                    response.forEach(function(cidadao) {
                        table.row.add([
                            cidadao.nome,
                            cidadao.nis
                        ]).draw();
                    });
                },
                error: function() {
                    alert('Erro ao carregar a lista de cidadãos.');
                }
            });
        }

        carregarCidadaos();
    });
</script>
</body>
</html>
