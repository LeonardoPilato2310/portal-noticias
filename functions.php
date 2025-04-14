<?php


function limitarTexto($texto, $limite = 100) {
    if (strlen($texto) > $limite) {
        return substr($texto, 0, $limite) . '...';
    }
    return $texto;
}

function buscarNoticiaPorId($id, $noticias) {
    foreach ($noticias as $noticia) {
        if ($noticia['id'] == $id) {
            return $noticia;
        }
    }
    return null;
}
?>
