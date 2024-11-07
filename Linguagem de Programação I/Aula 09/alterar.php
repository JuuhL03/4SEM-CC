<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Alterar Jogo</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h2>Alterar Informações do Jogo</h2>
    </header>

    <nav class="navigation">
        <a href="pesquisar.php" class="button nav-button">Voltar para Consulta</a>
    </nav>

    <section class="form-section">
        <?php 
        require("conecta.php");
        $id_jogo = htmlentities($_GET["alterar"]);
        $query = $mysqli->query("SELECT * FROM tb_jogos WHERE id_jogo = '$id_jogo'");
        $jogo = $query->fetch_assoc();
        ?>
        
        <form method="POST" action="alterar.php" enctype="multipart/form-data" class="game-form">
            <input type="hidden" name="id_jogo" value="<?php echo $id_jogo ?>">
            
            <label>Nome do Jogo</label>
            <input type="text" name="nome_jogo" value="<?php echo $jogo['nome_jogo'] ?>" required>
            
            <label>Preço</label>
            <input type="number" step="0.01" name="preco" value="<?php echo $jogo['preco'] ?>" required>
            
            <label>Categoria</label>
            <input type="text" name="categoria" value="<?php echo $jogo['categoria'] ?>" required>
            
            <label>Descrição</label>
            <textarea name="descricao" required><?php echo $jogo['descricao'] ?></textarea>
            
            <label>Ano de Lançamento</label>
            <input type="number" name="ano_lancamento" value="<?php echo $jogo['ano_lancamento'] ?>" required>
            
            <label>Loja</label>
            <input type="text" name="loja" value="<?php echo $jogo['loja'] ?>" required>
            
            <label>Quantidade Disponível</label>
            <input type="number" name="quantidade" value="<?php echo $jogo['quantidade'] ?>" required>
            
            <label>Indicação de Idade</label>
            <input type="number" name="idade_indicada" value="<?php echo $jogo['idade_indicada'] ?>" required>
            
            <label>Imagem (substituir)</label>
            <input type="file" name="imagem_jogo">
            
            <button type="submit" name="botao" class="button submit-button">Salvar Alterações</button>
        </form>
    </section>
</body>
</html>
