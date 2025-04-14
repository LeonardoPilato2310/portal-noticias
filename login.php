<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$erro = '';

// Usuário e senha fixos:
$usuarioCorreto = 'leonardo';
// Hash gerado previamente para a senha "leonardo"
$senhaHash = '$2y$10$PhwmVUarZ2tvGfyhqFxWFe/9VD6GD3F/jp7POJuqQ9HTFepPrMPTG';

$senhaCorreta = 'leonardo123';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = $_POST['usuario'] ?? '';
    $senha = $_POST['senha'] ?? '';
    
    if (($usuario === $usuarioCorreto) && ($senha == $senhaCorreta)) {
        $_SESSION['usuario'] = $usuario;
        header("Location: protegido.php");
        exit;
    } else {
        
        $erro = 'Usuário ou senha incorretos.';
    }
}
?>

<?php include 'header.php'; ?>
<div class="row justify-content-center">
  <div class="col-md-6">
    <h1>Login</h1>
    <?php if($erro): ?>
      <div class="alert alert-danger"><?php echo $erro; ?></div>
    <?php endif; ?>
    <form method="POST" action="login.php">
      <div class="mb-3">
        <label for="usuario" class="form-label">Usuário</label>
        <input type="text" name="usuario" id="usuario" class="form-control" required>
      </div>
      <div class="mb-3">
        <label for="senha" class="form-label">Senha</label>
        <input type="password" name="senha" id="senha" class="form-control" required>
      </div>
      <button type="submit" class="btn btn-primary">Entrar</button>
    </form>
  </div>
</div>
<?php include 'footer.php'; ?>
