<?php
session_start();
if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
    header('Location: index.php');
    exit;
}

// Produtos cadastrados para o estoque
$produtos = [
    ["nome" => "Camisa Branca", "imagem" => "../img/camisa-branca.jpg"],
    ["nome" => "Camisa Preta", "imagem" => "../img/camisa.png"],
    ["nome" => "Camisa Branca", "imagem" => "../img/camisa-branca.jpg"],
    ["nome" => "Camisa Preta", "imagem" => "../img/camisa.png"],
    ["nome" => "Camisa Branca", "imagem" => "../img/camisa-branca.jpg"],
    ["nome" => "Camisa Preta", "imagem" => "../img/camisa.png"],
    ["nome" => "Camisa Branca", "imagem" => "../img/camisa-branca.jpg"],
    ["nome" => "Camisa Preta", "imagem" => "../img/camisa.png"],
    ["nome" => "Camisa Branca", "imagem" => "../img/camisa-branca.jpg"],
    ["nome" => "Camisa Preta", "imagem" => "../img/camisa.png"],
    ["nome" => "Camisa Branca", "imagem" => "../img/camisa-branca.jpg"],
    ["nome" => "Camisa Preta", "imagem" => "../img/camisa.png"],
    ["nome" => "Camisa Branca", "imagem" => "../img/camisa-branca.jpg"],
    ["nome" => "Camisa Preta", "imagem" => "../img/camisa.png"],
    ["nome" => "Camisa Branca", "imagem" => "../img/camisa-branca.jpg"],
    ["nome" => "Camisa Preta", "imagem" => "../img/camisa.png"],
    ["nome" => "Camisa Branca", "imagem" => "../img/camisa-branca.jpg"],
    ["nome" => "Camisa Preta", "imagem" => "../img/camisa.png"],
    ["nome" => "Camisa Branca", "imagem" => "../img/camisa-branca.jpg"],
    ["nome" => "Camisa Preta", "imagem" => "../img/camisa.png"],
    // Adicione mais produtos até atingir 40
];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Estoque</title>
    <style>
        .dashboard.five-columns {
            display: grid;
            grid-template-columns: repeat(5, 1fr); /* 5 colunas */
            gap: 20px; /* Espaço entre os itens */
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
    </style>
</head>
<body>
<?php include 'header.php'; ?>
<div class="container">
    <h2>Estoque</h2>
    <p>Gerencie os itens do estoque aqui.</p>
    <div class="dashboard five-columns"> <!-- Adicionada a classe "five-columns" -->
        <?php foreach ($produtos as $produto): ?>
            <div class="card">
                <img src="images/<?php echo $produto['imagem']; ?>" alt="<?php echo $produto['nome']; ?>">
                <h3><?php echo $produto['nome']; ?></h3>
            </div>
        <?php endforeach; ?>
    </div>
</div>
</body>
</html>