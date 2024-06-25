<?php
$dsn = 'mysql:host=localhost;dbname=sistema_login';
$username = 'root';
$password = '';

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $sql = "SELECT * FROM usuarios WHERE email = :email";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['email' => $email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($senha, $user['senha'])) {
            session_start();
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['funcao'] = $user['funcao'];

            switch ($user['funcao']) {
                case 'supervisor':
                    header("Location: supervisor.php");
                    break;
                case 'tecnico':
                    header("Location: tecnico.php");
                    break;
                case 'almoxarifado':
                    header("Location: almoxarifado.php");
                    break;
            }
            exit;
        } else {
            echo "Email ou senha incorretos!";
        }
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
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2 class="text-center mt-5">Login</h2>
            <form action="login.php" method="post" class="mt-4">
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="senha" class="form-label">Senha</label>
                    <input type="password" class="form-control" id="senha" name="senha" required>
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>
