<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sistema_login";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $id_maquina = $_POST['id_maquina'];
    $descricao = $_POST['descricao'];
    $prioridade = $_POST['prioridade'];
    $data_hora = $_POST['data_hora'];

    $sql = "INSERT INTO ordens_servico (id_maquina, descricao, prioridade, data_hora) VALUES (:id_maquina, :descricao, :prioridade, :data_hora)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id_maquina', $id_maquina);
    $stmt->bindParam(':descricao', $descricao);
    $stmt->bindParam(':prioridade', $prioridade);
    $stmt->bindParam(':data_hora', $data_hora);
    $stmt->execute();

    echo "Ordem de serviço criada com sucesso!";
} catch(PDOException $e) {
    echo "Erro: " . $e->getMessage();
}

$conn = null;
?>
