<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Excluir Jogo</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h2>Excluir Jogo</h2>
    </header>

    <section class="confirm-section">
        <?php 
        if(isset($_GET["excluir"])){
            $id_jogo = htmlentities($_GET["excluir"]);
            require("conecta.php");
            $mysqli->query("DELETE FROM tb_jogos WHERE id_jogo = '$id_jogo'");
            
            if ($mysqli->error == ""){
                echo "<p>Jogo excluído com sucesso.</p>";
                echo "<a href='pesquisar.php' class='button'>Voltar para Consulta</a>";
            }
        }
        ?>
    </section>
</body>
</html>
