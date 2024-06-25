<?php
// Conexão com o banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sistema_login";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Buscar todas as ordens de serviço atribuídas ao técnico
    $tecnico_id = 1; // ID do técnico (pode ser obtido de uma sessão de login)
    $sql = "SELECT * FROM ordens_servico WHERE tecnico_responsavel = :tecnico_id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':tecnico_id', $tecnico_id);
    $stmt->execute();

    $ordens_servico_tecnico = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
    <title>Ordens de Serviço - Técnico</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="container mt-5">
        <h1>Ordens de Serviço - Técnico</h1>
        <a href="historico_ordens.php" class="btn btn-primary mb-3">Histórico de Ordens</a>
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
                    <th>Status</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($ordens_servico_tecnico as $ordem): ?>
                    <tr>
                        <td><?php echo $ordem['id']; ?></td>
                        <td><?php echo $ordem['setor']; ?></td>
                        <td><?php echo $ordem['linha']; ?></td>
                        <td><?php echo $ordem['maquina']; ?></td>
                        <td><?php echo $ordem['condicao']; ?></td>
                        <td><?php echo $ordem['tipo_quebra']; ?></td>
                        <td><?php echo $ordem['parada']; ?></td>
                        <td><?php echo $ordem['inicio_quebra']; ?></td>
                        <td><?php echo $ordem['status']; ?></td>
                        <td>
    <?php if ($ordem['status'] != 'Concluída'): ?>
        <form action="aceitar_ocorrencia.php" method="POST">
            <input type="hidden" name="ordem_id" value="<?php echo $ordem['id']; ?>">
            <button type="submit" class="btn btn-primary">Aceitar Ocorrência</button>
        </form>
    <?php endif; ?>
</td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
