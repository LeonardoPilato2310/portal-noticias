<?php


$noticias = [
    [
        'id' => 1,
        'titulo' => 'Nova descoberta científica revoluciona área da saúde',
        'imagem' => 'https://t.ctcdn.com.br/CsvACxYhcNs6DywxGJWhlXT3wi0=/300x300/smart/i899685.jpeg',
        'categoria' => 'Ciência',
        'tipo' => 'Destaque',
        'conteudo' => 'Detalhes completos sobre a descoberta que promete mudar os cuidados médicos...'
    ],
    [
        'id' => 2,
        'titulo' => 'Política em debate: novas propostas para a reforma governamental',
        'imagem' => 'https://www.cnnbrasil.com.br/wp-content/uploads/sites/12/2025/04/2025-04-14T164056Z_1_LYNXMPEL3D0SG_RTROPTP_4_USA-TRUMP-TARIFFS-ISRAEL.jpg?w=327&h=191&crop=1',
        'categoria' => 'Política',
        'tipo' => 'Notícia',
        'conteudo' => 'Informações adicionais sobre as propostas e o impacto esperado na sociedade...'
    ],
    [
        'id' => 3,
        'titulo' => 'Esporte: time local vence campeonato e conquista a torcida',
        'imagem' => 'https://s2-ge.glbimg.com/YUK4xvLIuf9N1nvxkK90kj__vkA=/0x0:1024x576/540x304/smart/filters:max_age(3600)/https://i.s3.glbimg.com/v1/AUTH_bc8228b6673f488aa253bbcb03c80ec5/internal_photos/bs/2025/8/q/cyu9qnSBSLsBWJDM78YA/gettyimages-2209483630.jpg',
        'categoria' => 'Esporte',
        'tipo' => 'Destaque',
        'conteudo' => 'Relato completo sobre a vitória e as reações da cidade...'
    ],

];


if (isset($_SESSION['novasNoticias'])) {

  $maxId = 0;
  foreach ($noticias as $noticia) {
    if ($noticia['id'] > $maxId) {
      $maxId = $noticia['id'];
    }
  }
  foreach ($_SESSION['novasNoticias'] as $novaNoticia) {
    $maxId++;
    $novaNoticia['id'] = $maxId;
    $noticias[] = $novaNoticia;
  }
}
?>
