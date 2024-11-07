<?php
$skins = [
    ["id" => 1, "nome" => "AK-47 | Case Hardened", "preco" => 900.00, "imagem" => "ak47_casehardened.jpg"],
    ["id" => 2, "nome" => "AWP | Asiimov", "preco" => 1400.00, "imagem" => "awp_asiimov.jpg"],
    ["id" => 3, "nome" => "AWP | Medusa", "preco" => 5500.00, "imagem" => "awp_medusa.jpg"],
    ["id" => 4, "nome" => "Butterfly Knife | Crimson Web", "preco" => 6000.00, "imagem" => "butterfly_crimsonweb.png"],
    ["id" => 5, "nome" => "AK-47 | RedLines", "preco" => 1500.00, "imagem" => "ak47_redline.jpeg"],
    ["id" => 6, "nome" => "Famas | Djinn", "preco" => 500.00, "imagem" => "famas_djinn.png"],
    ["id" => 7, "nome" => "Glock | Fade", "preco" => 470.00, "imagem" => "glock_fade.png"],
    ["id" => 8, "nome" => "Karambit | Doppler", "preco" => 5000.00, "imagem" => "karambit_doppler.jpg"],
    ["id" => 9, "nome" => "M4A4-S | Howl", "preco" => 1200.00, "imagem" => "m4a4_howl.png"],
    ["id" => 10, "nome" => "MP9 | HotRod", "preco" => 200.00, "imagem" => "mp9_hotrod.png"],
    ["id" => 11, "nome" => "P250 | See Ya Later", "preco" => 1800.00, "imagem" => "p250_seeyalater.jpg"],
    ["id" => 12, "nome" => "USP-S | Kill Confirmed", "preco" => 233.00, "imagem" => "usps_killconfirmed.jpg"],
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = isset($_POST['nome']) ? $_POST['nome'] : '';
    $cpf = isset($_POST['cpf']) ? $_POST['cpf'] : '';
    $genero = isset($_POST['genero']) ? $_POST['genero'] : '';
    $idade = isset($_POST['idade']) ? $_POST['idade'] : '';
    $tradelink = isset($_POST['tradelink']) ? $_POST['tradelink'] : '';
} else {
    echo "<p class='text-danger'>Erro: Dados do cliente não recebidos corretamente.</p>";
    exit; 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CS2 Skin Store - Selecione sua Skin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body class="bg-dark text-light">
    <?php include '../header.php'; ?>

    <section class="container mt-5">
        <h2 class="text-primary">Selecione suas Skins</h2>
        <form action="cadastro_endereco.php" method="POST">
            <input type="hidden" name="nome" value="<?php echo htmlspecialchars($nome); ?>">
            <input type="hidden" name="cpf" value="<?php echo htmlspecialchars($cpf); ?>">
            <input type="hidden" name="genero" value="<?php echo htmlspecialchars($genero); ?>">
            <input type="hidden" name="idade" value="<?php echo htmlspecialchars($idade); ?>">
            <input type="hidden" name="tradelink" value="<?php echo htmlspecialchars($tradelink); ?>">

            <div class="row">
                <?php foreach ($skins as $skin): ?>
                    <div class="col-md-4">
                        <div class="card bg-secondary mb-4">
                            <img src="../image/<?php echo $skin['imagem']; ?>" class="card-img-top" alt="<?php echo $skin['nome']; ?>">
                            <div class="card-body">
                                <h5 class="card-title text-warning"><?php echo $skin['nome']; ?></h5>
                                <p class="card-text">R$ <?php echo number_format($skin['preco'], 2, ',', '.'); ?></p>
                                <input type="checkbox" name="skins[<?php echo $skin['id']; ?>][id]" value="<?php echo $skin['id']; ?>"> Selecionar
                                <input type="hidden" name="skins[<?php echo $skin['id']; ?>][nome]" value="<?php echo $skin['nome']; ?>">
                                <input type="hidden" name="skins[<?php echo $skin['id']; ?>][preco]" value="<?php echo $skin['preco']; ?>">
                                <input type="number" name="skins[<?php echo $skin['id']; ?>][quantidade]" value="1" min="1" class="form-control mt-2">
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <button type="submit" class="btn btn-primary">Avançar para Endereço</button>
        </form>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
