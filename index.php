<?php
include 'header.php';
include 'dados.php';
include 'functions.php';
?>

<h1>Portal de Notícias</h1>
<div class="row">
  <?php foreach ($noticias as $noticia): ?>
    <div class="col-md-4 mb-4">
      <div class="card">
        <img src="<?php echo $noticia['imagem']; ?>" class="card-img-top" alt="<?php echo htmlspecialchars($noticia['titulo']); ?>">
        <div class="card-body">
          <h5 class="card-title"><?php echo htmlspecialchars($noticia['titulo']); ?></h5>
          <p class="card-text">
            <strong>Categoria:</strong> <?php echo htmlspecialchars($noticia['categoria']); ?>
          </p>
          <a href="detalhes.php?id=<?php echo $noticia['id']; ?>" class="btn btn-primary">Ver mais</a>
        </div>
      </div>
    </div>
  <?php endforeach; ?>
</div>

<?php include 'footer.php'; ?>
