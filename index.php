<?php
include 'conexao.php';

// Buscar as últimas notícias
$stmt = $pdo->prepare("SELECT * FROM noticias ORDER BY data_publicacao DESC LIMIT 5");
$stmt->execute();
$noticias = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($noticias as $noticia) {
    echo '<h2>' . htmlspecialchars($noticia['titulo']) . '</h2>';
    echo '<p>' . nl2br(htmlspecialchars($noticia['conteudo'])) . '</p>';
    echo '<small>Publicado em: ' . $noticia['data_publicacao'] . '</small><br>';
    echo '<a href="artigo.php?id=' . $noticia['id'] . '">Leia mais</a><br><hr>';
}
?>
