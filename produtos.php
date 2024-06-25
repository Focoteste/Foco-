<?php
// Conexão com o banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sistema_login";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Buscar todos os produtos
    $sql = "SELECT * FROM produtos";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
    <title>Produtos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <h1>Produtos</h1>
        <a href="criar_produto.php" class="btn btn-primary mb-3">Adicionar Produto</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Produto</th>
                    <th>Marca</th>
                    <th>Máquina</th>
                    <th>Número de Série da Peça</th>
                    <th>Quantidade Mínima</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($produtos as $produto): ?>
                    <tr>
                        <td><?php echo $produto['id']; ?></td>
                        <td><?php echo $produto['produto']; ?></td>
                        <td><?php echo $produto['marca']; ?></td>
                        <td><?php echo $produto['maquina']; ?></td>
                        <td><?php echo $produto['numero_serie_peca']; ?></td>
                        <td><?php echo $produto['quantidade_minima']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
