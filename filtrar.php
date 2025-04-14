<?php
include 'header.php';
include 'dados.php';
include 'functions.php';

$filtroCategoria = isset($_GET['categoria']) ? $_GET['categoria'] : '';
$filtroTipo = isset($_GET['tipo']) ? $_GET['tipo'] : '';
$noticiasFiltradas = [];

if ($filtroCategoria || $filtroTipo) {
    foreach ($noticias as $noticia) {
        if ((empty($filtroCategoria) || strtolower($noticia['categoria']) == strtolower($filtroCategoria)) &&
            (empty($filtroTipo) || strtolower($noticia['tipo']) == strtolower($filtroTipo))) {
            $noticiasFiltradas[] = $noticia;
        }
    }
} else {
    $noticiasFiltradas = $noticias;
}
?>

<h1>Filtrar Notícias</h1>
<form method="GET" action="filtrar.php" class="mb-4">
  <div class="row">
    <div class="col-md-4">
      <label for="categoria" class="form-label">Categoria</label>
      <input type="text" name="categoria" id="categoria" class="form-control" value="<?php echo htmlspecialchars($filtroCategoria); ?>">
    </div>
    <div class="col-md-4">
      <label for="tipo" class="form-label">Tipo</label>
      <input type="text" name="tipo" id="tipo" class="form-control" value="<?php echo htmlspecialchars($filtroTipo); ?>">
    </div>
    <div class="col-md-4 d-flex align-items-end">
      <button type="submit" class="btn btn-primary">Filtrar</button>
    </div>
  </div>
</form>

<div class="row">
  <?php if (count($noticiasFiltradas) > 0): ?>
    <?php foreach ($noticiasFiltradas as $noticia): ?>
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
  <?php else: ?>
    <div class="alert alert-info">Nenhuma notícia encontrada com os filtros aplicados.</div>
  <?php endif; ?>
</div>

<?php include 'footer.php'; ?>
