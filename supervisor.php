<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['funcao'] !== 'supervisor') {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supervisor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="container">
    <h1 class="mt-5">Bem-vindo, Supervisor!</h1>
    <a href="ordens_servico.php">Ordens de serviço</a> <br>
    <h4>Cadastros</h4> <br>
    <a href="colaboradores.php">Colaboradores</a> <br>
    <a href="maquinas.php">Maquinas</a> <br>
    <a href="produtos.php">Produtos</a> <br>
</div>
</body>
</html>
