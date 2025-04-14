<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit;
}

include 'header.php';
include 'functions.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $titulo    = $_POST['titulo'] ?? '';
    $imagem    = $_POST['imagem'] ?? '';
    $categoria = $_POST['categoria'] ?? '';
    $tipo      = $_POST['tipo'] ?? '';
    $conteudo  = $_POST['conteudo'] ?? '';

    if ($titulo && $imagem && $categoria && $tipo && $conteudo) {
        $novaNoticia = [
            'titulo'    => $titulo,
            'imagem'    => $imagem,
            'categoria' => $categoria,
            'tipo'      => $tipo,
            'conteudo'  => $conteudo
        ];
        if (!isset($_SESSION['novasNoticias'])) {
            $_SESSION['novasNoticias'] = [];
        }
        $_SESSION['novasNoticias'][] = $novaNoticia;
        echo '<div class="alert alert-success">Notícia adicionada com sucesso!</div>';
    } else {
        echo '<div class="alert alert-danger">Preencha todos os campos.</div>';
    }
}
?>

<h1>Área Restrita - Bem-vindo, <?php echo htmlspecialchars($_SESSION['usuario']); ?></h1>

<h2>Cadastrar Nova Notícia</h2>
<form method="POST" action="protegido.php">
  <div class="mb-3">
    <label for="titulo" class="form-label">Título</label>
    <input type="text" name="titulo" id="titulo" class="form-control" required>
  </div>
  <div class="mb-3">
    <label for="imagem" class="form-label">URL da Imagem</label>
    <input type="text" name="imagem" id="imagem" class="form-control" required>
  </div>
  <div class="mb-3">
    <label for="categoria" class="form-label">Categoria</label>
    <input type="text" name="categoria" id="categoria" class="form-control" required>
  </div>
  <div class="mb-3">
    <label for="tipo" class="form-label">Tipo</label>
    <input type="text" name="tipo" id="tipo" class="form-control" required>
  </div>
  <div class="mb-3">
    <label for="conteudo" class="form-label">Conteúdo</label>
    <textarea name="conteudo" id="conteudo" class="form-control" rows="5" required></textarea>
  </div>
  <button type="submit" class="btn btn-primary">Cadastrar Notícia</button>
</form>

<?php include 'footer.php'; ?>
