<?php
session_start();
if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
    header('Location: index.php');
    exit;
}

// Lista de fornecedores
$fornecedores = [
    ["nome" => "Alpha Têxteis", "setor" => "Tecidos", "contato" => "alpha@texteis.com", "descricao" => "Fornecedor de tecidos premium para confecção."],
    ["nome" => "Beta Jeans", "setor" => "Denim", "contato" => "beta@jeans.com", "descricao" => "Especialista em jeans de alta qualidade."],
    ["nome" => "Gamma Couros", "setor" => "Couro", "contato" => "gamma@couros.com", "descricao" => "Fornecedor de couros sintéticos e naturais."],
    ["nome" => "Delta Acessórios", "setor" => "Acessórios", "contato" => "delta@acessorios.com", "descricao" => "Fornece acessórios para roupas e calçados."],
    ["nome" => "Épsilon Fibras", "setor" => "Fibras", "contato" => "epsilon@fibras.com", "descricao" => "Fornecimento de fibras sustentáveis para confecção."],
    ["nome" => "Zeta Estampas", "setor" => "Estampas", "contato" => "zeta@estampas.com", "descricao" => "Especialista em estampas e personalizações."],
    ["nome" => "Eta Zíperes", "setor" => "Fechamentos", "contato" => "eta@ziperes.com", "descricao" => "Fabricante de zíperes e botões personalizados."],
    ["nome" => "Theta Costura", "setor" => "Linhas", "contato" => "theta@costura.com", "descricao" => "Linhas e equipamentos para costura."],
    ["nome" => "Iota Embalagens", "setor" => "Embalagens", "contato" => "iota@embalagens.com", "descricao" => "Soluções de embalagem para produtos têxteis."],
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Fornecedores</title>
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

        .fornecedores-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
        }

        .card {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: left;
        }

        .card h3 {
            font-size: 18px;
            margin-bottom: 10px;
            color: #d9ad2c;
        }

        .card p {
            margin: 5px 0;
            font-size: 14px;
            color: #555;
        }

        .card a {
            display: inline-block;
            margin-top: 10px;
            font-size: 14px;
            color: #d9ad2c;
            text-decoration: none;
        }

        .card a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
<?php include 'header.php'; ?>
<div class="container">
    <h2>Fornecedores</h2>
    <p>Gerencie os fornecedores cadastrados.</p>
    <div class="fornecedores-grid">
        <?php foreach ($fornecedores as $fornecedor): ?>
            <div class="card">
                <h3><?php echo $fornecedor['nome']; ?></h3>
                <p><strong>Setor:</strong> <?php echo $fornecedor['setor']; ?></p>
                <p><strong>Contato:</strong> <?php echo $fornecedor['contato']; ?></p>
                <p><?php echo $fornecedor['descricao']; ?></p>
                <a href="mailto:<?php echo $fornecedor['contato']; ?>">Enviar e-mail</a>
            </div>
        <?php endforeach; ?>
    </div>
</div>
</body>
</html>