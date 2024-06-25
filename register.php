<?php
$dsn = 'mysql:host=localhost;dbname=sistema_login';
$username = 'root';
$password = '';

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
        $funcao = $_POST['funcao'];

        $sql = "INSERT INTO usuarios (nome, email, senha, funcao) VALUES (:nome, :email, :senha, :funcao)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['nome' => $nome, 'email' => $email, 'senha' => $senha, 'funcao' => $funcao]);

        echo "Usuário registrado com sucesso!";
    }
} catch (PDOException $e) {
    echo "Erro: " . $e->getMessage();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2 class="text-center mt-5">Registro de Usuário</h2>
            <form action="register.php" method="post" class="mt-4">
                <div class="mb-3">
                    <label for="nome" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="nome" name="nome" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="senha" class="form-label">Senha</label>
                    <input type="password" class="form-control" id="senha" name="senha" required>
                </div>
                <div class="mb-3">
                    <label for="funcao" class="form-label">Função</label>
                    <select class="form-control" id="funcao" name="funcao" required>
                        <option value="supervisor">Supervisor</option>
                        <option value="tecnico">Técnico</option>
                        <option value="almoxarifado">Almoxarifado</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Registrar</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>
