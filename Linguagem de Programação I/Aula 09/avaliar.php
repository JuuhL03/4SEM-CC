<?php
require("conecta.php");

if (isset($_POST['id_jogo']) && isset($_POST['avaliacao'])) {
    $id_jogo = intval($_POST['id_jogo']);
    $avaliacao = floatval($_POST['avaliacao']);

    $query = $mysqli->query("SELECT avaliacao, num_avaliacoes FROM tb_jogos WHERE id_jogo = '$id_jogo'");
    $jogo = $query->fetch_assoc();

    $num_avaliacoes = $jogo['num_avaliacoes'] + 1;
    $nova_avaliacao = ($jogo['avaliacao'] * $jogo['num_avaliacoes'] + $avaliacao) / $num_avaliacoes;

    $mysqli->query("UPDATE tb_jogos SET avaliacao = '$nova_avaliacao', num_avaliacoes = '$num_avaliacoes' WHERE id_jogo = '$id_jogo'");

    header("Location: index.php");
    exit();
} else {
    echo "Erro: ID do jogo ou avaliação não definidos.";
}
?>
