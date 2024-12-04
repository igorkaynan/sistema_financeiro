<?php
session_start();
if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
    header('Location: index.php');
    exit;
}

// Simulação de dados dinâmicos
$entradas = 20;
$saidas = 10;
$vendidos = 30;
$estoque_atual = 100; // Total no estoque
$total_relatorios = 10; // Baseado nos relatórios cadastrados

// Novos dados para lucro e despesas
$lucro = 5000;  // Exemplo de valor de lucro
$despesas = 3000;  // Exemplo de valor de despesas
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            display: flex;
        }

        .sidebar {
            width: 200px; /* Sidebar reduzido */
            background-color: #636260;
            padding: 20px;
            height: 100vh;
            color: white;
            position: fixed;
            display: flex;
            flex-direction: column;
        }

        .sidebar img {
            width: 120px; /* Ajuste o tamanho do logo */
            margin-bottom: 20px;
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
        }

        .sidebar ul li {
            margin-bottom: 10px;
        }

        .sidebar ul li a {
            color: white;
            text-decoration: none;
            font-size: 16px;
            display: block;
            padding: 10px;
            border-radius: 5px;
        }

        .sidebar ul li a:hover {
            background-color: #ebbd35;
        }

        .content {
            margin-left: 220px;
            padding: 30px;
            flex: 1;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        h2 {
            margin-bottom: 20px;
            color: #333;
        }

        .cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 15px;
            margin-bottom: 30px;
        }

        .card {
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            padding: 15px;
        }

        .card h3 {
            margin-bottom: 5px;
            color: #ebbd35;
            font-size: 22px;
        }

        .card p {
            font-size: 16px;
            color: #555;
        }

        .charts {
            display: flex;
            justify-content: space-between;
            gap: 20px;
            margin-top: 20px;
        }

        .chart-container {
            background: white;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            flex: 1;
        }

        .chart-container canvas {
            max-width: 100%;
            height: 300px;
        }
    </style>
</head>
<body>
<div class="sidebar">
    <!-- Adicione o logo aqui -->
    <img src="img/urban.png" alt="Logo">
    <ul>
        <li><a href="dashboard.php">Dashboard</a></li>
        <li><a href="produtos.php">Produtos</a></li>
        <li><a href="estoque.php">Estoque</a></li>
        <li><a href="vendas.php">Vendas</a></li>
        <li><a href="entrada_saida.php">Entrada e Saída</a></li>
        <li><a href="fornecedores.php">Fornecedores</a></li>
        <li><a href="relatorios.php">Relatórios</a></li>
    </ul>
</div>
<div class="content">
    <div class="container">
        <h2>Dashboard</h2>
        <p>Analise as métricas de desempenho da loja.</p>

        <!-- Cards para estatísticas -->
        <div class="cards">
            <div class="card">
                <h3><?php echo $entradas; ?></h3>
                <p>Produtos Entrando</p>
            </div>
            <div class="card">
                <h3><?php echo $saidas; ?></h3>
                <p>Produtos Saindo</p>
            </div>
            <div class="card">
                <h3><?php echo $vendidos; ?></h3>
                <p>Produtos Vendidos</p>
            </div>
            <div class="card">
                <h3><?php echo $estoque_atual; ?></h3>
                <p>Estoque Atual</p>
            </div>
            <div class="card">
                <h3><?php echo $total_relatorios; ?></h3>
                <p>Total de Relatórios</p>
            </div>
        </div>

        <!-- Gráficos -->
        <div class="charts">
            <div class="chart-container">
                <h4>Estatísticas Gerais</h4>
                <canvas id="generalChart"></canvas>
            </div>
            <div class="chart-container">
                <h4>Produtos Vendidos</h4>
                <canvas id="salesChart"></canvas>
            </div>
            <div class="chart-container">
                <h4>Lucro e Despesas</h4>
                <canvas id="profitExpenseChart"></canvas>
            </div>
        </div>
    </div>
</div>

<script>
    // Gráfico 1: Estatísticas Gerais
    const generalCtx = document.getElementById('generalChart').getContext('2d');
    new Chart(generalCtx, {
        type: 'bar',
        data: {
            labels: ['Entradas', 'Saídas', 'Vendidos', 'Estoque', 'Relatórios'],
            datasets: [{
                label: 'Estatísticas',
                data: [<?php echo $entradas; ?>, <?php echo $saidas; ?>, <?php echo $vendidos; ?>, <?php echo $estoque_atual; ?>, <?php echo $total_relatorios; ?>],
                backgroundColor: ['#1e90ff', '#ff5733', '#28a745', '#ffc107', '#6f42c1']
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { display: false }
            },
            scales: {
                y: { beginAtZero: true }
            }
        }
    });

    // Gráfico 2: Produtos Vendidos
    const salesCtx = document.getElementById('salesChart').getContext('2d');
    new Chart(salesCtx, {
        type: 'pie',
        data: {
            labels: ['Entradas', 'Saídas', 'Vendidos'],
            datasets: [{
                data: [<?php echo $entradas; ?>, <?php echo $saidas; ?>, <?php echo $vendidos; ?>],
                backgroundColor: ['#1e90ff', '#ff5733', '#28a745']
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { position: 'top' }
            }
        }
    });

    // Gráfico 3: Lucro e Despesas
    const profitExpenseCtx = document.getElementById('profitExpenseChart').getContext('2d');
    new Chart(profitExpenseCtx, {
        type: 'bar',
        data: {
            labels: ['Lucro', 'Despesas'],
            datasets: [{
                label: 'Valores',
                data: [<?php echo $lucro; ?>, <?php echo $despesas; ?>],
                backgroundColor: ['#28a745', '#ff5733']
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { display: false }
            },
            scales: {
                y: { beginAtZero: true }
            }
        }
    });
</script>
</body>
</html>