<?php
session_start();
if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
    header('Location: index.php');
    exit;
}

// Produtos cadastrados com preços e imagens
$produtos = [
    ["nome" => "Camisa Preta", "imagem" => "../img/camisa.png", "preco" => 49.90],
    ["nome" => "Camisa Preta", "imagem" => "../img/camisa.png", "preco" => 49.90],
    ["nome" => "Camisa Preta", "imagem" => "../img/camisa.png", "preco" => 49.90],
    ["nome" => "Camisa Branca", "imagem" => "../img/camisa-branca.jpg", "preco" => 99.90],
    ["nome" => "Camisa Branca", "imagem" => "../img/camisa-branca.jpg", "preco" => 99.90],
    ["nome" => "Camisa Branca", "imagem" => "../img/camisa-branca.jpg", "preco" => 99.90],
    ["nome" => "Camisa Branca", "imagem" => "../img/camisa-branca.jpg", "preco" => 99.90],
    ["nome" => "Camisa Preta", "imagem" => "../img/camisa.png", "preco" => 49.90],
    ["nome" => "Camisa Preta", "imagem" => "../img/camisa.png", "preco" => 49.90],
    ["nome" => "Camisa Preta", "imagem" => "../img/camisa.png", "preco" => 49.90],
    ["nome" => "Camisa Preta", "imagem" => "../img/camisa.png", "preco" => 49.90],
    ["nome" => "Camisa Branca", "imagem" => "../img/camisa-branca.jpg", "preco" => 99.90],
    ["nome" => "Camisa Branca", "imagem" => "../img/camisa-branca.jpg", "preco" => 99.90],
    ["nome" => "Camisa Branca", "imagem" => "../img/camisa-branca.jpg", "preco" => 99.90],
    ["nome" => "Camisa Branca", "imagem" => "../img/camisa-branca.jpg", "preco" => 99.90],
    // Adicione mais produtos conforme necessário
];

// Contador de estoque (quantidade total de produtos cadastrados)
$totalProdutos = count($produtos);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Home</title>
    <style>
        .dashboard.five-columns {
            display: grid;
            grid-template-columns: repeat(5, 1fr); /* 5 colunas */
            gap: 20px; /* Espaçamento entre os cards */
        }

        .card {
            border: 1px solid #ccc;
            border-radius: 5px;
            overflow: hidden;
            text-align: center;
            background-color: #fff;
            padding: 15px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .card img {
            max-width: 100%;
            height: auto;
            display: block;
            margin: 0 auto 10px;
        }

        .card h3 {
            font-size: 16px;
            color: #333;
        }

        .card p {
            font-size: 14px;
            color: #555;
        }
    </style>
</head>
<body>
<?php include 'header.php'; ?>
<div class="container">
    <h2>Dashboard</h2>
    <p><strong>Total de Produtos Cadastrados:</strong> <?php echo $totalProdutos; ?></p>
    <div class="dashboard five-columns"> <!-- Adicionada a classe "five-columns" -->
        <?php foreach ($produtos as $produto): ?>
            <div class="card">
                <img src="images/<?php echo $produto['imagem']; ?>" alt="<?php echo $produto['nome']; ?>">
                <h3><?php echo $produto['nome']; ?></h3>
                <p><strong>Preço:</strong> R$ <?php echo number_format($produto['preco'], 2, ',', '.'); ?></p>
            </div>
        <?php endforeach; ?>
    </div>
</div>
</body>
</html>