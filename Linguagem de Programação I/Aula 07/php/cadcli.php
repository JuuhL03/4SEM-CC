<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Cliente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body class="bg-dark text-light">

    <?php include '../header.php'; ?>

    <section class="container mt-5">
        <h2 class="text-primary text-center">Cadastro de Cliente</h2>
        <form action="cadpro.php" method="POST">
            <div class="mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome Completo" required>
            </div>
            <div class="mb-3">
                <label for="cpf" class="form-label">CPF</label>
                <input type="text" class="form-control" id="cpf" name="cpf" placeholder="000.000.000-00" required>
            </div>
            <div class="mb-3">
                <label for="genero" class="form-label">Gênero</label>
                <select id="genero" name="genero" class="form-select" required>
                    <option value="" disabled selected>Selecione</option>
                    <option value="Masculino">Masculino</option>
                    <option value="Feminino">Feminino</option>
                    <option value="Outro">Outro</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="idade" class="form-label">Idade</label>
                <input type="number" class="form-control" id="idade" name="idade" placeholder="18" required>
            </div>
            <div class="mb-3">
                <label for="tradelink" class="form-label">TradeLink da Steam</label>
                <input type="text" class="form-control" id="tradelink" name="tradelink" placeholder="Cole o seu TradeLink da Steam aqui" required>
            </div>
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
