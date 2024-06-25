<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sistema_login";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $genero = $_POST['genero'];
    $funcao = $_POST['funcao'];
    $salario_hora = $_POST['salario_hora'];

    $sql = "INSERT INTO colaboradores (nome, telefone, email, genero, funcao, salario_hora) 
            VALUES (:nome, :telefone, :email, :genero, :funcao, :salario_hora)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':telefone', $telefone);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':genero', $genero);
    $stmt->bindParam(':funcao', $funcao);
    $stmt->bindParam(':salario_hora', $salario_hora);
    $stmt->execute();

    header("Location: colaboradores.php");
} catch(PDOException $e) {
    echo "Erro: " . $e->getMessage();
}

$conn = null;
?>
