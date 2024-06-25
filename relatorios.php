<?php
// Conexão com o banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sistema_login";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Busca todas as ordens de serviço concluídas
    $sql = "SELECT * FROM ordens_servico WHERE fim_quebra IS NOT NULL";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $ordens_concluidas = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch(PDOException $e) {
    echo "Erro: " . $e->getMessage();
}

$conn = null;
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatórios</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Relatórios</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Setor</th>
                    <th>Linha</th>
                    <th>Máquina</th>
                    <th>Tempo de Parada (horas)</th>
                    <th>Custo Mão de Obra</th>
                    <th>Custo Peças</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($ordens_concluidas as $ordem): ?>
                    <tr>
                        <td><?php echo $ordem['id']; ?></td>
                        <td><?php echo $ordem['setor']; ?></td>
                        <td><?php echo $ordem['linha']; ?></td>
                        <td><?php echo $ordem['maquina']; ?></td>
                        <td><?php echo $ordem['tempo_parada']; ?></td>
                        <td>R$ <?php echo number_format($ordem['custo_mao_obra'], 2, ',', '.'); ?></td>
                        <td>R$ <?php echo number_format($ordem['custo_pecas'], 2, ',', '.'); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
</body>
</html>
