<?php
include 'conecta_banco.php'; // Verifique se a conexão está funcionando corretamente

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'] ?? null;
    $cpf = $_POST['cpf'] ?? null;
    $genero = $_POST['genero'] ?? null;
    $idade = $_POST['idade'] ?? null;
    $tradelink = $_POST['tradelink'] ?? null;

    $cep = $_POST['cep'] ?? null;
    $cidade = $_POST['cidade'] ?? null;
    $rua = $_POST['rua'] ?? null;
    $numero = $_POST['numero'] ?? null;
    $complemento = $_POST['complemento'] ?? null;

    $forma_pagamento = $_POST['forma_pagamento'] ?? 'Não informado';
    $skins = $_POST['skins'] ?? [];

    $skins_selecionadas = array_filter($skins, function($skin) {
        return !empty($skin['id']);
    });

    $total = 0;
    foreach ($skins_selecionadas as $skin) {
        $total += $skin['preco'] * $skin['quantidade'];
    }

    if (isset($_POST['confirmar_compra'])) {
        // Verifica se todos os dados do cliente estão preenchidos
        if (!empty($nome) && !empty($cpf) && !empty($genero) && !empty($idade) && !empty($tradelink)) {
            
            // Verifica se o cliente já existe no banco de dados
            $query_cliente_existe = "SELECT cpf FROM clientes WHERE cpf = '$cpf'";
            $result = $mysqli->query($query_cliente_existe);
    
            // Se o cliente não existir, vamos inseri-lo
            if ($result->num_rows == 0) {
                $query_cliente = "INSERT INTO clientes (cpf, nome, genero, idade, tradelink) 
                                  VALUES ('$cpf', '$nome', '$genero', '$idade', '$tradelink')";

                // Mostrar a query e verificar se ocorre erro
                if ($mysqli->query($query_cliente) === FALSE) {
                    echo "Erro ao inserir cliente: " . $mysqli->error . "<br>";
                    echo "Query Executada: " . $query_cliente;
                    exit;
                }
            }

            // Inserir endereço
            if (!empty($cep) && !empty($cidade) && !empty($rua) && !empty($numero)) {
                $query_endereco = "INSERT INTO enderecos (cpf_cliente, cep, cidade, rua, numero, complemento) 
                                   VALUES ('$cpf', '$cep', '$cidade', '$rua', '$numero', '$complemento')";

                // Mostrar a query e verificar se ocorre erro
                if ($mysqli->query($query_endereco) === FALSE) {
                    echo "Erro ao inserir o endereço: " . $mysqli->error . "<br>";
                    echo "Query Executada: " . $query_endereco;
                    exit;
                }
            } else {
                echo "Dados de endereço incompletos.";
                exit;
            }

            // Inserir as skins selecionadas
            if (!empty($skins_selecionadas)) {
                foreach ($skins_selecionadas as $skin_id => $skin_data) {
                    if (!empty($skin_data['id']) && !empty($skin_data['quantidade']) && !empty($skin_data['preco'])) {
                        $query_venda = "INSERT INTO vendas (cpf_cliente, skin_id, quantidade, preco_unitario, forma_pagamento) 
                                        VALUES ('$cpf', '{$skin_data['id']}', '{$skin_data['quantidade']}', '{$skin_data['preco']}', '$forma_pagamento')";

                        // Mostrar a query e verificar se ocorre erro
                        if ($mysqli->query($query_venda) === FALSE) {
                            echo "Erro ao inserir a venda da skin ID {$skin_data['id']}: " . $mysqli->error . "<br>";
                            echo "Query Executada: " . $query_venda;
                            exit;
                        }
                    } else {
                        echo "Dados de skin incompletos.";
                        exit;
                    }
                }
            } else {
                echo "Nenhuma skin foi selecionada.";
                exit;
            }

            // Compra finalizada com sucesso
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
            <p><strong>TradeLink da Steam:</strong> <?php echo htmlspecialchars($tradelink); ?></p>
        </div>

        <div>
            <h4>Detalhes da Compra</h4>
            <ul>
                <?php foreach ($skins_selecionadas as $skin): ?>
                    <li>
                        <strong>Skin:</strong> <?php echo htmlspecialchars($skin['nome']); ?> |
                        <strong>Quantidade:</strong> <?php echo htmlspecialchars($skin['quantidade']); ?> |
                        <strong>Preço Unitário:</strong> R$ <?php echo number_format($skin['preco'], 2, ',', '.'); ?>
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
            <input type="hidden" name="tradelink" value="<?php echo htmlspecialchars($tradelink); ?>">

            <?php foreach ($skins as $skin_id => $skin_data): ?>
                <input type="hidden" name="skins[<?php echo $skin_id; ?>][id]" value="<?php echo htmlspecialchars($skin_data['id']); ?>">
                <input type="hidden" name="skins[<?php echo $skin_id; ?>][nome]" value="<?php echo htmlspecialchars($skin_data['nome']); ?>">
                <input type="hidden" name="skins[<?php echo $skin_id; ?>][preco]" value="<?php echo htmlspecialchars($skin_data['preco']); ?>">
                <input type="hidden" name="skins[<?php echo $skin_id; ?>][quantidade]" value="<?php echo htmlspecialchars($skin_data['quantidade']); ?>">
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
