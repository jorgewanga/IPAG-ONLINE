<?php

include 'conexao.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

 
    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($usuario) {
        
        if (password_verify($senha, $usuario['senha'])) {
            // Iniciar a sessão e armazenar dados do usuário
            session_start();
            $_SESSION['id_usuario'] = $usuario['id'];
            $_SESSION['nome_usuario'] = $usuario['nome'];
            $_SESSION['tipo_usuario'] = $usuario['tipo_usuario'];

            echo "Bem-vindo, " . $_SESSION['nome_usuario'];
            // Redirecionar para a página principal ou de perfil
            header('Location: index.php');
            exit;
        } else {
            echo "Senha incorreta.";
        }
    } else {
        echo "Usuário não encontrado.";
    }
}
?>

<!
<form method="POST" action="conexao.php">
<input type="nome" name="nome" placeholder="Nome" required><br>
    <input type="email" name="email" placeholder="E-mail" required><br>
    <input type="password" name="senha" placeholder="Senha" required><br>
    <button type="submit">Login</button>
</form>
