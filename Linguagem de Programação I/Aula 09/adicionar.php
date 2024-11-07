<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Adicionar Jogo</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h2>Adicionar Novo Jogo</h2>
    </header>

    <nav class="navigation">
        <a href="index.php" class="button nav-button">Voltar ao Início</a>
    </nav>

    <section class="form-section">
        <form method="POST" action="adicionar.php" enctype="multipart/form-data" class="game-form">
            <label>Nome do Jogo</label>
            <input type="text" name="nome_jogo" maxlength="50" required placeholder="Digite o nome do jogo">
            
            <label>Preço</label>
            <input type="number" step="0.01" name="preco" required placeholder="Digite o preço">
            
            <label>Categoria</label>
            <input type="text" name="categoria" maxlength="20" required placeholder="Digite a categoria">
            
            <label>Descrição</label>
            <textarea name="descricao" maxlength="255" required placeholder="Digite uma breve descrição"></textarea>
            
            <label>Ano de Lançamento</label>
            <input type="number" name="ano_lancamento" required placeholder="ex: 2021">
            
            <label>Loja</label>
            <input type="text" name="loja" maxlength="30" required placeholder="ex: Steam, Epic Games">
            
            <label>Quantidade Disponível</label>
            <input type="number" name="quantidade" required placeholder="Digite a quantidade disponível">
            
            <label>Indicação de Idade</label>
            <input type="number" name="idade_indicada" required placeholder="ex: 18">
            
            <label>Imagem</label>
            <input type="file" name="imagem_jogo">
            
            <button type="submit" name="botao" class="button submit-button">Salvar Jogo</button>
        </form>
    </section>
</body>
</html>
