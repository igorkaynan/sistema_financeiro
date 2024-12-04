<?php
session_start();
if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
    header('Location: index.php');
    exit;
}

// Produtos vendidos com tamanhos especificados
$vendas = [
    ["nome" => "Camisa Amarela", "imagem" => "../img/camisa_amarela.webp", "tamanho" => "P", "quantidade" => 5],
    ["nome" => "Camisa Branca", "imagem" => "../img/camisa_branca.webp", "tamanho" => "38", "quantidade" => 3],
    ["nome" => "Camisa Cinza", "imagem" => "../img/camisa_cinza.webp", "tamanho" => "39", "quantidade" => 4],
    ["nome" => "Calça Beje", "imagem" => "../img/calca.jpg", "tamanho" => "M", "quantidade" => 6],
    ["nome" => "Camisa Preta", "imagem" => "../img/camisa.png", "tamanho" => "P", "quantidade" => 7],
    ["nome" => "Camisa Branca", "imagem" => "../img/camisa-branca.jpg", "tamanho" => "42", "quantidade" => 5],
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Vendas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
        }

        .container {
            margin: 20px auto;
            padding: 30px;
            max-width: 1000px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        table th, table td {
            padding: 15px;
            text-align: center; /* Centraliza as informações */
            border-bottom: 1px solid #ddd;
        }

        table th {
            background-color: #d9ad2c;
            color: white;
        }

        table img {
            max-width: 100px; /* Ajuste da largura das imagens */
            height: auto;
            border-radius: 4px;
        }

        .total {
            font-weight: bold;
            text-align: right;
            margin-top: 20px;
            color: #555;
        }
    </style>
</head>
<body>
<?php include 'header.php'; ?>
<div class="container">
    <h2>Vendas</h2>
    <table>
        <thead>
            <tr>
                <th>Imagem</th>
                <th>Produto</th>
                <th>Tamanho</th> <!-- Nova coluna para tamanho -->
                <th>Quantidade Vendida</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($vendas as $venda): ?>
                <tr>
                    <td><img src="images/<?php echo $venda['imagem']; ?>"></td> <!-- Removido o atributo alt -->
                    <td><?php echo $venda['nome']; ?></td>
                    <td><?php echo $venda['tamanho']; ?></td> <!-- Coluna de tamanho -->
                    <td><?php echo $venda['quantidade']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <p class="total">Total de Peças Vendidas: 
        <?php 
        $totalVendas = array_sum(array_column($vendas, "quantidade"));
        echo $totalVendas; 
        ?>
    </p>
</div>
</body>
</html>