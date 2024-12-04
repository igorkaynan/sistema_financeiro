<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $message = "Um e-mail foi enviado para $email com as instruções para redefinir a senha.";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Redefinir Senha</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #1e90ff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-image: url('img/fundo.png');
        }

        .container {
            background: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
        }

        input[type="text"] {
            width: 90%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #ebbd35;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #d9ad2c;
        }

        a {
            display: block;
            margin-top: 10px;
            color: #ebbd35;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Redefinir Senha</h2>
    <form method="POST">
        <input type="text" name="email" placeholder="Seu e-mail" required>
        <button type="submit">Enviar</button>
        <?php if (isset($message)) { echo "<p style='color:green;'>$message</p>"; } ?>
    </form>
    <a href="index.php">Voltar ao Login</a>
</div>
</body>
</html>