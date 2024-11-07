<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loja de Carros - Cadastro de Endereço</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body class="bg-dark text-light">
    <?php include '../header.php'; ?>

    <section class="container mt-5">
        <h2 class="text-primary">Cadastro de Endereço</h2>

        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nome = isset($_POST['nome']) ? $_POST['nome'] : 'Nome não informado';
            $cpf = isset($_POST['cpf']) ? $_POST['cpf'] : 'CPF não informado';
            $genero = isset($_POST['genero']) ? $_POST['genero'] : 'Gênero não informado';
            $idade = isset($_POST['idade']) ? $_POST['idade'] : 'Idade não informada';
            $email = isset($_POST['email']) ? $_POST['email'] : 'Email não informado';

            $carros = array_filter($_POST['carros'], function($carro) {
                return isset($carro['id']);
            });
        } else {
            echo "<p class='text-danger'>Erro: Dados não foram recebidos corretamente.</p>";
            exit;
        }
        ?>

        <form action="confirmacao.php" method="POST">
            <input type="hidden" name="nome" value="<?php echo htmlspecialchars($nome); ?>">
            <input type="hidden" name="cpf" value="<?php echo htmlspecialchars($cpf); ?>">
            <input type="hidden" name="genero" value="<?php echo htmlspecialchars($genero); ?>">
            <input type="hidden" name="idade" value="<?php echo htmlspecialchars($idade); ?>">
            <input type="hidden" name="email" value="<?php echo htmlspecialchars($email); ?>">

            <?php foreach ($carros as $carro_id => $carro_data): ?>
                <input type="hidden" name="carros[<?php echo $carro_id; ?>][id]" value="<?php echo htmlspecialchars($carro_data['id']); ?>">
                <input type="hidden" name="carros[<?php echo $carro_id; ?>][modelo]" value="<?php echo htmlspecialchars($carro_data['modelo']); ?>">
                <input type="hidden" name="carros[<?php echo $carro_id; ?>][preco]" value="<?php echo htmlspecialchars($carro_data['preco']); ?>">
                <input type="hidden" name="carros[<?php echo $carro_id; ?>][quantidade]" value="<?php echo htmlspecialchars($carro_data['quantidade']); ?>">
            <?php endforeach; ?>


            <div class="mb-3">
                <label for="cep" class="form-label">CEP</label>
                <input type="text" class="form-control bg-secondary text-light" id="cep" name="cep" required>
            </div>
            <div class="mb-3">
                <label for="cidade" class="form-label">Cidade</label>
                <input type="text" class="form-control bg-secondary text-light" id="cidade" name="cidade" required>
            </div>
            <div class="mb-3">
                <label for="rua" class="form-label">Rua</label>
                <input type="text" class="form-control bg-secondary text-light" id="rua" name="rua" required>
            </div>
            <div class="mb-3">
                <label for="numero" class="form-label">Número</label>
                <input type="text" class="form-control bg-secondary text-light" id="numero" name="numero" required>
            </div>
            <div class="mb-3">
                <label for="complemento" class="form-label">Complemento</label>
                <input type="text" class="form-control bg-secondary text-light" id="complemento" name="complemento">
            </div>

            <div class="mb-3">
                <label for="forma_pagamento" class="form-label">Forma de Pagamento</label>
                <select class="form-select bg-secondary text-light" id="forma_pagamento" name="forma_pagamento" required>
                    <option value="Cartão">Cartão</option>
                    <option value="Boleto">Boleto</option>
                    <option value="Pix">Pix</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Avançar para Confirmação</button>
        </form>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
