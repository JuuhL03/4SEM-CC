<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CS2 Skin Store - Seleção de Pagamento</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body class="bg-dark text-light">
    <?php include '../header.php'; ?>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nome = isset($_POST['nome']) ? $_POST['nome'] : '';
        $cpf = isset($_POST['cpf']) ? $_POST['cpf'] : '';
        $genero = isset($_POST['genero']) ? $_POST['genero'] : '';
        $idade = isset($_POST['idade']) ? $_POST['idade'] : '';
        $tradelink = isset($_POST['tradelink']) ? $_POST['tradelink'] : '';
        $cep = isset($_POST['cep']) ? $_POST['cep'] : '';
        $cidade = isset($_POST['cidade']) ? $_POST['cidade'] : '';
        $rua = isset($_POST['rua']) ? $_POST['rua'] : '';
        $numero = isset($_POST['numero']) ? $_POST['numero'] : '';
        $complemento = isset($_POST['complemento']) ? $_POST['complemento'] : '';
    } else {
        echo "<p class='text-danger'>Erro: Dados do endereço não recebidos corretamente.</p>";
        exit; 
    }
    ?>

    <section class="container mt-5">
        <h2 class="text-warning">Selecione a Forma de Pagamento</h2>
        <form action="confirmacao.php" method="POST" class="mt-4">
            <input type="hidden" name="nome" value="<?php echo htmlspecialchars($nome); ?>">
            <input type="hidden" name="cpf" value="<?php echo htmlspecialchars($cpf); ?>">
            <input type="hidden" name="genero" value="<?php echo htmlspecialchars($genero); ?>">
            <input type="hidden" name="idade" value="<?php echo htmlspecialchars($idade); ?>">
            <input type="hidden" name="tradelink" value="<?php echo htmlspecialchars($tradelink); ?>">
            <input type="hidden" name="cep" value="<?php echo htmlspecialchars($cep); ?>">
            <input type="hidden" name="cidade" value="<?php echo htmlspecialchars($cidade); ?>">
            <input type="hidden" name="rua" value="<?php echo htmlspecialchars($rua); ?>">
            <input type="hidden" name="numero" value="<?php echo htmlspecialchars($numero); ?>">
            <input type="hidden" name="complemento" value="<?php echo htmlspecialchars($complemento); ?>">

            <div class="mb-3">
                <label for="forma_pagamento" class="form-label">Forma de Pagamento</label>
                <select class="form-select bg-secondary text-light" id="forma_pagamento" name="forma_pagamento" required>
                    <option value="Cartão">Cartão</option>
                    <option value="Boleto">Boleto</option>
                    <option value="Pix">Pix</option>
                </select>
            </div>

            <button type="submit" class="btn btn-warning">Próximo</button>
        </form>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
