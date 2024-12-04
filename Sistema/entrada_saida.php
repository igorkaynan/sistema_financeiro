<?php
session_start();
if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
    header('Location: index.php');
    exit;
}

// Dados de entrada de produtos
$entradas = [
    ["nome" => "Camisa Cinza", "imagem" => "../img/camisa_cinza.webp", "tamanho" => "P", "quantidade" => 10],
    ["nome" => "Camisa Amarela", "imagem" => "../img/camisa_amarela.webp", "tamanho" => "38", "quantidade" => 5],
    ["nome" => "Camisa Branca", "imagem" => "../img/camisa_branca.webp", "tamanho" => "39", "quantidade" => 5],
];

// Dados de saída de produtos
$saidas = [
    ["nome" => " Camisa Preta", "imagem" => "../img/camisa.png", "tamanho" => "M", "quantidade" => 6],
    ["nome" => "Calça Beje", "imagem" => "../img/calca.jpg", "tamanho" => "P", "quantidade" => 4],
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Entrada e Saída</title>
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

        .section-title {
            margin-top: 30px;
            font-size: 20px;
            color: #555;
            text-align: left;
            border-bottom: 2px solid #ddd;
            padding-bottom: 5px;
        }
    </style>
</head>
<body>
<?php include 'header.php'; ?>
<div class="container">
    <h2>Entrada e Saída</h2>
    <p>Controle a entrada e saída de produtos.</p>

    <!-- Tabela de Entradas -->
    <div class="section-title">Entradas</div>
    <table>
        <thead>
            <tr>
                <th>Imagem</th>
                <th>Produto</th>
                <th>Tamanho</th>
                <th>Quantidade</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($entradas as $entrada): ?>
                <tr>
                    <td><img src="images/<?php echo $entrada['imagem']; ?>"></td>
                    <td><?php echo $entrada['nome']; ?></td>
                    <td><?php echo $entrada['tamanho']; ?></td>
                    <td><?php echo $entrada['quantidade']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <!-- Tabela de Saídas -->
    <div class="section-title">Saídas</div>
    <table>
        <thead>
            <tr>
                <th>Imagem</th>
                <th>Produto</th>
                <th>Tamanho</th>
                <th>Quantidade</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($saidas as $saida): ?>
                <tr>
                    <td><img src="images/<?php echo $saida['imagem']; ?>"></td>
                    <td><?php echo $saida['nome']; ?></td>
                    <td><?php echo $saida['tamanho']; ?></td>
                    <td><?php echo $saida['quantidade']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>