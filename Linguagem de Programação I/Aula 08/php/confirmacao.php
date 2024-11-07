<?php
include 'conecta_banco.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'] ?? null;
    $cpf = $_POST['cpf'] ?? null;
    $genero = $_POST['genero'] ?? null;
    $idade = $_POST['idade'] ?? null;
    $email = $_POST['email'] ?? null;

    $cep = $_POST['cep'] ?? null;
    $cidade = $_POST['cidade'] ?? null;
    $rua = $_POST['rua'] ?? null;
    $numero = $_POST['numero'] ?? null;
    $complemento = $_POST['complemento'] ?? null;

    $forma_pagamento = $_POST['forma_pagamento'] ?? 'Não informado';
    $carros = $_POST['carros'] ?? [];

    $carros_selecionados = array_filter($carros, function($carro) {
        return !empty($carro['id']);
    });

    $total = 0;
    foreach ($carros_selecionados as $carro) {
        $total += $carro['preco'] * $carro['quantidade'];
    }

    if (isset($_POST['confirmar_compra'])) {
        if (!empty($nome) && !empty($cpf) && !empty($genero) && !empty($idade) && !empty($email)) {
            
            $query_cliente_existe = "SELECT cpf FROM clientes WHERE cpf = '$cpf'";
            $result = $mysqli->query($query_cliente_existe);
    
            if ($result->num_rows == 0) {
                $query_cliente = "INSERT INTO clientes (cpf, nome, genero, idade, email) 
                                  VALUES ('$cpf', '$nome', '$genero', '$idade', '$email')";

                if ($mysqli->query($query_cliente) === FALSE) {
                    echo "Erro ao inserir cliente: " . $mysqli->error . "<br>";
                    echo "Query Executada: " . $query_cliente;
                    exit;
                }
            }

            if (!empty($cep) && !empty($cidade) && !empty($rua) && !empty($numero)) {
                $query_endereco = "INSERT INTO enderecos (cpf_cliente, cep, cidade, rua, numero, complemento) 
                                   VALUES ('$cpf', '$cep', '$cidade', '$rua', '$numero', '$complemento')";

                if ($mysqli->query($query_endereco) === FALSE) {
                    echo "Erro ao inserir o endereço: " . $mysqli->error . "<br>";
                    echo "Query Executada: " . $query_endereco;
                    exit;
                }
            } else {
                echo "Dados de endereço incompletos.";
                exit;
            }

            if (!empty($carros_selecionados)) {
                foreach ($carros_selecionados as $carro_id => $carro_data) {
                    if (!empty($carro_data['id']) && !empty($carro_data['quantidade']) && !empty($carro_data['preco'])) {
                        $query_venda = "INSERT INTO vendas (cpf_cliente, carro_id, quantidade, preco_unitario, forma_pagamento) 
                                        VALUES ('$cpf', '{$carro_data['id']}', '{$carro_data['quantidade']}', '{$carro_data['preco']}', '$forma_pagamento')";

                        if ($mysqli->query($query_venda) === FALSE) {
                            echo "Erro ao inserir a venda do carro ID {$carro_data['id']}: " . $mysqli->error . "<br>";
                            echo "Query Executada: " . $query_venda;
                            exit;
                        }
                    } else {
                        echo "Dados do carro incompletos.";
                        exit;
                    }
                }
            } else {
                echo "Nenhum carro foi selecionado.";
                exit;
            }

            echo "Compra finalizada com sucesso!";
        } else {
            echo "Dados do cliente incompletos.";
            exit;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmação de Compra</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body class="bg-dark text-light">
    <?php include '../header.php'; ?>

    <section class="container mt-5">
        <h2 class="text-primary">Confirmação de Compra</h2>

        <?php if (isset($mensagem_sucesso)): ?>
            <div class="alert alert-success"><?php echo $mensagem_sucesso; ?></div>
        <?php elseif (isset($mensagem_erro)): ?>
            <div class="alert alert-danger"><?php echo $mensagem_erro; ?></div>
        <?php endif; ?>

        <div>
            <h4>Detalhes do Cliente</h4>
            <p><strong>Nome:</strong> <?php echo htmlspecialchars($nome); ?></p>
            <p><strong>CPF:</strong> <?php echo htmlspecialchars($cpf); ?></p>
            <p><strong>Gênero:</strong> <?php echo htmlspecialchars($genero); ?></p>
            <p><strong>Idade:</strong> <?php echo htmlspecialchars($idade); ?></p>
            <p><strong>Email:</strong> <?php echo htmlspecialchars($email); ?></p>
        </div>

        <div>
            <h4>Detalhes da Compra</h4>
            <ul>
                <?php foreach ($carros_selecionados as $carro): ?>
                    <li>
                        <strong>Carro:</strong> <?php echo htmlspecialchars($carro['modelo']); ?> |
                        <strong>Quantidade:</strong> <?php echo htmlspecialchars($carro['quantidade']); ?> |
                        <strong>Preço Unitário:</strong> R$ <?php echo number_format($carro['preco'], 2, ',', '.'); ?>
                    </li>
                <?php endforeach; ?>
            </ul>
            <p><strong>Total:</strong> R$ <?php echo number_format($total, 2, ',', '.'); ?></p>
        </div>

        <div>
            <h4>Endereço de Entrega</h4>
            <p><strong>CEP:</strong> <?php echo htmlspecialchars($cep); ?></p>
            <p><strong>Cidade:</strong> <?php echo htmlspecialchars($cidade); ?></p>
            <p><strong>Rua:</strong> <?php echo htmlspecialchars($rua); ?></p>
            <p><strong>Número:</strong> <?php echo htmlspecialchars($numero); ?></p>
            <p><strong>Complemento:</strong> <?php echo htmlspecialchars($complemento); ?></p>
        </div>

        <div>
            <h4>Forma de Pagamento</h4>
            <p><strong>Método:</strong> <?php echo htmlspecialchars($forma_pagamento); ?></p>
        </div>

        <form method="POST">
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

            <input type="hidden" name="cep" value="<?php echo htmlspecialchars($cep); ?>">
            <input type="hidden" name="cidade" value="<?php echo htmlspecialchars($cidade); ?>">
            <input type="hidden" name="rua" value="<?php echo htmlspecialchars($rua); ?>">
            <input type="hidden" name="numero" value="<?php echo htmlspecialchars($numero); ?>">
            <input type="hidden" name="complemento" value="<?php echo htmlspecialchars($complemento); ?>">
            <input type="hidden" name="forma_pagamento" value="<?php echo htmlspecialchars($forma_pagamento); ?>">

            <input type="hidden" name="confirmar_compra" value="1">

            <button type="submit" class="btn btn-lg btn-primary mt-5">Confirmar Compra</button>
        </form>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
