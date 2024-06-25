<?php
// Conexão com o banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sistema_login";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Buscar todas as máquinas
    $sql = "SELECT * FROM maquinas";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $maquinas = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
    <title>Máquinas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <h1>Máquinas</h1>
        <a href="criar_maquina.php" class="btn btn-primary mb-3">Adicionar Máquina</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Número de Série</th>
                    <th>Marca</th>
                    <th>Nome</th>
                    <th>Setor</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($maquinas as $maquina): ?>
                    <tr>
                        <td><?php echo $maquina['id']; ?></td>
                        <td><?php echo $maquina['numero_serie']; ?></td>
                        <td><?php echo $maquina['marca']; ?></td>
                        <td><?php echo $maquina['nome']; ?></td>
                        <td><?php echo $maquina['setor']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
