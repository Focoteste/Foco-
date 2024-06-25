<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['funcao'] !== 'tecnico') {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ordens de Serviço - Técnico</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Ordens de Serviço - Técnico</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Setor</th>
                    <th>Linha</th>
                    <th>Máquina</th>
                    <th>Condição</th>
                    <th>Tipo de Quebra</th>
                    <th>Parada</th>
                    <th>Início da Quebra</th>
                    <th>Aceitar</th>
                </tr>
            </thead>
            <tbody>
                <!-- Aqui serão exibidas as ordens de serviço atribuídas ao técnico -->
            </tbody>
        </table>
    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
</body>
</html>
