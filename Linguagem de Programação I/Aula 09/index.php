<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loja de Jogos</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <header>
        <h1>Bem-vindo à Loja de Jogos</h1>
        <p>Descubra os melhores jogos para todos os gostos. Abaixo, você pode gerenciar e explorar nosso catálogo.</p>
    </header>

    <nav class="navigation">
        <a href="adicionar.php" class="button nav-button">Adicionar Jogo</a>
        <a href="pesquisar.php" class="button nav-button">Consultar Jogos</a>
    </nav>

    <section class="featured-games">
        <h2>Jogos em Destaque</h2>
        <div class="game-cards">
            <?php
            require("conecta.php");
            
            $query = $mysqli->query("SELECT * FROM tb_jogos LIMIT 3");

            while ($jogo = $query->fetch_assoc()) {
                $id_jogo = $jogo['id_jogo'];
                $nome_jogo = $jogo['nome_jogo'];
                $preco = number_format($jogo['preco'], 2, ',', '.');
                $categoria = $jogo['categoria'];
                $avaliacao = $jogo['avaliacao'];
                $num_avaliacoes = $jogo['num_avaliacoes'];
                $imagem = file_exists("images/$id_jogo.jpg") ? "images/$id_jogo.jpg" : "images/default.jpg";

                echo "
                <div class='game-card'>
                    <img src='$imagem' alt='$nome_jogo' class='game-image'>
                    <h3>$nome_jogo</h3>
                    <p>Preço: R$ $preco</p>
                    <p>Categoria: $categoria</p>
                    <p>Avaliação: $avaliacao ★ ($num_avaliacoes avaliações)</p>
                    
                    <form method='POST' action='avaliar.php' class='rating-form'>
                        <input type='hidden' name='id_jogo' value='$id_jogo'>
                        <label for='rating'>Avaliar:</label>
                        <select name='avaliacao' required>
                            <option value='1'>1</option>
                            <option value='2'>2</option>
                            <option value='3'>3</option>
                            <option value='4'>4</option>
                            <option value='5'>5</option>
                        </select>
                        <button type='submit' class='button rating-button'>Enviar Avaliação</button>
                    </form>
                </div>
                ";
            }
            ?>
        </div>
    </section>

</body>
</html>
