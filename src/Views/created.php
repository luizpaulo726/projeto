<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Novo Cidadão</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>

<div class="container">
    <h1>Adicionar Novo Cidadão</h1>

    <form id ="form-cidadao" method="POST">
        <div class="form-group">
            <input type="text" name="nome" placeholder="Nome" id="nome" required>
        </div>

        <div class="form-group">
            <button class="add-btn" type="submit">Salvar</button>
        </div>
    </form>

    <a href="/" class="btn">Voltar</a>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {

        $('#form-cidadao').submit(function(event) {
            event.preventDefault();

            var nome = $('#nome').val();

            // Envia via AJAX
            $.ajax({
                url: '/store',
                type: 'POST',
                data: { nome: nome },
                success: function(response) {
                    alert('Cidadão criado com sucesso!');
                    window.location.href = '/';
                },
                error: function(xhr, status, error) {
                    alert('Erro ao criar cidadão!'); // Alerta de erro
                }
            });
        });
    });
</script>
</body>
</html>
