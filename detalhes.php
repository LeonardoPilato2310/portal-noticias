<?php
include 'header.php';
include 'dados.php';
include 'functions.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $noticia = buscarNoticiaPorId($id, $noticias);
    if (!$noticia) {
        echo '<div class="alert alert-warning">Notícia não encontrada.</div>';
        include 'footer.php';
        exit;
    }
} else {
    echo '<div class="alert alert-warning">ID inválido.</div>';
    include 'footer.php';
    exit;
}
?>

<div class="card mb-4">
  <img src="<?php echo $noticia['imagem']; ?>" class="card-img-top" alt="<?php echo htmlspecialchars($noticia['titulo']); ?>">
  <div class="card-body">
    <h2 class="card-title"><?php echo htmlspecialchars($noticia['titulo']); ?></h2>
    <p><strong>Categoria:</strong> <?php echo htmlspecialchars($noticia['categoria']); ?></p>
    <p><strong>Tipo:</strong> <?php echo htmlspecialchars($noticia['tipo']); ?></p>
    <p class="card-text"><?php echo htmlspecialchars($noticia['conteudo']); ?></p>
    <a href="index.php" class="btn btn-secondary">Voltar</a>
  </div>
</div>

<?php include 'footer.php'; ?>
