<?php
session_start();
if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
    header('Location: index.php');
    exit;
}

// Relatórios pré-cadastrados
$relatorios = [
    ["id" => 1, "titulo" => "Relatório da Empresa", "descricao" => "Faça anotação do seus relatórios."],
];

// Simulação de armazenamento de anotações na sessão
if (!isset($_SESSION['observacoes'])) {
    $_SESSION['observacoes'] = [];
}

// Função para salvar observações
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $relatorioId = $_POST['relatorio_id'];
    $observacao = trim($_POST['observacao']);

    $_SESSION['observacoes'][] = [
        "relatorio_id" => $relatorioId,
        "observacao" => $observacao,
        "relatorio_titulo" => $relatorios[array_search($relatorioId, array_column($relatorios, 'id'))]['titulo']
    ];
}

// Recuperar anotações
$observacoes = $_SESSION['observacoes'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Relatórios</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
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

        .accordion {
            margin-top: 20px;
        }

        .accordion-item {
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
        }

        .accordion-title {
            padding: 15px;
            background-color: #d9ad2c;
            color: white;
            font-size: 18px;
            cursor: pointer;
        }

        .accordion-content {
            display: none;
            padding: 15px;
            background-color: #f9f9f9;
            max-height: 300px;  /* Limita a altura do conteúdo */
            overflow-y: auto;  /* Adiciona rolagem se o conteúdo for muito grande */
        }

        textarea {
            width: 100%;
            height: 50px;
            margin-top: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 2px;
            font-size: 14px;
            resize: none;
        }

        button {
            margin-top: 10px;
            padding: 10px 15px;
            background-color: #d9ad2c;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #636260;
        }

        .kanban {
            margin-top: 30px;
            display: flex;
            gap: 20px;
            flex-wrap: wrap;  /* Garante que o Kanban se ajusta melhor em telas menores */
        }

        .kanban-column {
            flex: 1;
            padding: 15px;
            background-color: #f9f9f9;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            max-height: 500px; /* Limita a altura do Kanban */
            overflow-y: auto; /* Adiciona rolagem caso o conteúdo ultrapasse a altura */
            min-height: 300px; /* Garante que a coluna tenha uma altura mínima */
        }

        .kanban-column h3 {
            font-size: 18px;
            margin-bottom: 10px;
            color: #d9ad2c;
        }

        .kanban-item {
            background-color: #fff;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            word-wrap: break-word; /* Garante que as palavras longas não saiam do box */
        }

        .kanban-item p {
            margin: 5px 0;
            font-size: 14px;
        }
    </style>
</head>
<body>
<?php include 'header.php'; ?>
<div class="container">
    <h2>Relatórios</h2>
    <p>Veja os relatórios da loja e adicione observações.</p>
    <div class="accordion">
        <?php foreach ($relatorios as $relatorio): ?>
            <div class="accordion-item">
                <div class="accordion-title" onclick="toggleAccordion(<?php echo $relatorio['id']; ?>)">
                    <?php echo $relatorio['titulo']; ?>
                </div>
                <div class="accordion-content" id="content-<?php echo $relatorio['id']; ?>">
                    <p><?php echo $relatorio['descricao']; ?></p>
                    <form method="POST">
                        <input type="hidden" name="relatorio_id" value="<?php echo $relatorio['id']; ?>">
                        <textarea name="observacao" placeholder="Adicione suas observações aqui..." required></textarea>
                        <button type="submit">Salvar Observação</button>
                    </form>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="kanban">
        <div class="kanban-column">
            <h3>Anotações</h3>
            <?php foreach ($observacoes as $item): ?>
                <div class="kanban-item">
                    <p><strong><?php echo $item['relatorio_titulo']; ?>:</strong></p>
                    <p><?php echo $item['observacao']; ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<script>
    function toggleAccordion(index) {
        const content = document.getElementById(`content-${index}`);
        const isVisible = content.style.display === 'block';
        content.style.display = isVisible ? 'none' : 'block';
    }
</script>
</body>
</html>