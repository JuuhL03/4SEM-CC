<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loja de Carros - Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body class="bg-dark text-light">

    <header>
        <h1>Loja de Carros</h1>
    </header>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Loja de Carros</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="php/cadcli.php">Comprar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="php/cadcli.php">Cadastro</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link">Contato</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <section class="container mt-5">
        <h1 class="text-center text-primary">Bem-vindo à Loja de Carros</h1>
        <p class="text-center">Encontre os melhores carros com ofertas exclusivas e financiamento facilitado!</p>

        <div class="row mt-4">
            <div class="col-md-4">
                <div class="card text-secondary">
                    <img src="image/sedan.jpg" class="card-img-top" alt="Sedan">
                    <div class="card-body">
                        <h5 class="card-title">Sedan Luxo</h5>
                        <p class="card-text">Experimente o conforto e elegância de um sedan de luxo. Ideal para toda a família!</p>
                        <a href="php/cadcli.php" class="btn btn-primary">Comprar</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card text-secondary">
                    <img src="image/suv.jpg" class="card-img-top" alt="SUV">
                    <div class="card-body">
                        <h5 class="card-title">SUV Esportivo</h5>
                        <p class="card-text">Aventure-se com estilo e potência. O SUV perfeito para qualquer terreno.</p>
                        <a href="php/cadcli.php" class="btn btn-primary">Comprar</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card text-secondary">
                    <img src="image/esportivo.webp" class="card-img-top" alt="Esportivo">
                    <div class="card-body">
                        <h5 class="card-title">Esportivo Turbo</h5>
                        <p class="card-text">Desempenho e design incomparáveis. Sinta a emoção de um carro esportivo turbo!</p>
                        <a href="php/cadcli.php" class="btn btn-primary">Comprar</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-md-12">
                <h3 class="text-center text-primary">Por que comprar na nossa Loja de Carros?</h3>
                <p class="text-center">Oferecemos veículos de qualidade com garantia e opções de financiamento. Compre com confiança e dirija com estilo!</p>
            </div>
        </div>
    </section>

    <footer class="bg-dark text-light text-center py-4">
        <p>&copy; 2024 Loja de Carros. Todos os direitos reservados.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
