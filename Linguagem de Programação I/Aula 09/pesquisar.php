<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Consultar Jogos</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h2>Consulta de Jogos</h2>
    </header>

    <nav class="navigation">
        <a href="adicionar.php" class="button nav-button">Adicionar Novo Jogo</a>
        <a href="index.php" class="button nav-button">Voltar ao Início</a>
    </nav>

    <section class="search-section">
        <form method="POST" action="pesquisar.php" class="search-form">
            <input type="text" name="nome_jogo" maxlength="50" placeholder="Digite o nome do jogo">
            <button type="submit" name="botao" class="button search-button">Pesquisar</button>
        </form>
    </section>

    <section class="table-section">
        <table>
            <tr>
                <th>Imagem</th>
                <th>ID</th>
                <th>Nome</th>
                <th>Preço</th>
                <th>Categoria</th>
                <th>Ano</th>
                <th>Loja</th>
                <th>Quantidade</th>
                <th>Idade</th>
                <th>Avaliação</th>
                <th>Ações</th>
            </tr>

            <?php 
            require("conecta.php");

            $queryStr = "SELECT * FROM tb_jogos";
            if(isset($_POST["botao"]) && !empty($_POST["nome_jogo"])) {
                $nome_jogo = htmlentities($_POST["nome_jogo"]);
                $queryStr = "SELECT * FROM tb_jogos WHERE nome_jogo LIKE '%$nome_jogo%'";
            }

            $query = $mysqli->query($queryStr);
            while ($jogo = $query->fetch_assoc()) {
                $id_jogo = $jogo['id_jogo'];
                $imagem = file_exists("images/$id_jogo.jpg") ? "images/$id_jogo.jpg" : "images/default.jpg";
                echo "
                <tr>
                    <td><img src='$imagem' alt='{$jogo['nome_jogo']}' class='table-image'></td>
                    <td>{$jogo['id_jogo']}</td>
                    <td>{$jogo['nome_jogo']}</td>
                    <td>R$ {$jogo['preco']}</td>
                    <td>{$jogo['categoria']}</td>
                    <td>{$jogo['ano_lancamento']}</td>
                    <td>{$jogo['loja']}</td>
                    <td>{$jogo['quantidade']}</td>
                    <td>{$jogo['idade_indicada']}+</td>
                    <td>{$jogo['avaliacao']} ★</td>
                    <td>
                        <a href='alterar.php?alterar=$id_jogo' class='button action-button'>Alterar</a>
                        <a href='excluir.php?excluir=$id_jogo' class='button action-button delete-button'>Excluir</a>
                    </td>
                </tr>
                ";
            }
            ?>
        </table>
    </section>
</body>
</html>
