<?php
$carros = [
    ["id" => 1, "modelo" => "Sedan Luxo", "preco" => 90000.00, "imagem" => "sedan.jpg"],
    ["id" => 2, "modelo" => "SUV Esportivo", "preco" => 140000.00, "imagem" => "suv.jpg"],
    ["id" => 3, "modelo" => "Esportivo Turbo", "preco" => 550000.00, "imagem" => "esportivo.webp"],
    ["id" => 4, "modelo" => "Hatch Compacto", "preco" => 60000.00, "imagem" => "hatch.avif"],
    ["id" => 5, "modelo" => "Picape Off-road", "preco" => 150000.00, "imagem" => "picape.webp"]
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = isset($_POST['nome']) ? $_POST['nome'] : '';
    $cpf = isset($_POST['cpf']) ? $_POST['cpf'] : '';
    $genero = isset($_POST['genero']) ? $_POST['genero'] : '';
    $idade = isset($_POST['idade']) ? $_POST['idade'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
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
    <title>Loja de Carros - Selecione seu Carro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body class="bg-dark text-light">
    <?php include '../header.php'; ?>

    <section class="container mt-5">
        <h2 class="text-primary">Selecione seu Carro</h2>
        <form action="cadastro_endereco.php" method="POST">
            <input type="hidden" name="nome" value="<?php echo htmlspecialchars($nome); ?>">
            <input type="hidden" name="cpf" value="<?php echo htmlspecialchars($cpf); ?>">
            <input type="hidden" name="genero" value="<?php echo htmlspecialchars($genero); ?>">
            <input type="hidden" name="idade" value="<?php echo htmlspecialchars($idade); ?>">
            <input type="hidden" name="email" value="<?php echo htmlspecialchars($email); ?>">

            <div class="row">
                <?php foreach ($carros as $carro): ?>
                    <div class="col-md-4">
                        <div class="card bg-secondary mb-4">
                            <img src="../image/<?php echo $carro['imagem']; ?>" class="card-img-top" alt="<?php echo $carro['modelo']; ?>">
                            <div class="card-body">
                                <h5 class="card-title text-warning"><?php echo $carro['modelo']; ?></h5>
                                <p class="card-text">R$ <?php echo number_format($carro['preco'], 2, ',', '.'); ?></p>
                                <input type="checkbox" name="carros[<?php echo $carro['id']; ?>][id]" value="<?php echo $carro['id']; ?>"> Selecionar
                                <input type="hidden" name="carros[<?php echo $carro['id']; ?>][modelo]" value="<?php echo $carro['modelo']; ?>">
                                <input type="hidden" name="carros[<?php echo $carro['id']; ?>][preco]" value="<?php echo $carro['preco']; ?>">
                                <input type="number" name="carros[<?php echo $carro['id']; ?>][quantidade]" value="1" min="1" class="form-control mt-2">
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
