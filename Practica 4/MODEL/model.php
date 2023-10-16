<?php

// Ens connectem a la base de dades	
function conect() {
    try {
        $connexio = new PDO('mysql:host=localhost;dbname=pt03_mario_flores', 'root', '');
        return $connexio;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        die();
    }
}

// Calculem el total d'articles per a poder conèixer el número de pàgines de la paginació
function numeroPagines() {
    $connexio = conect();
    $totalArticles = $connexio->prepare('SELECT COUNT(*) as total FROM articles');
    $totalArticles->execute();
    $totalArticles = $totalArticles->fetch()['total'];

    // Calculem el numero de pagines que tindrà la paginació. Llavors hem de dividir el total d'articles entre els POSTS per pagina
    $postsPerPagina = postsPerPagina();
    return ceil($totalArticles / $postsPerPagina);
}

// definim quants post per pagina volem carregar.
function postsPerPagina() {
    // coger el valor de la variable select y que cambie al valor que se seleccione
    return isset($_GET['select']) ? (int)$_GET['select'] : 5;
}

// Revisem des de quin article anem a carregar, depenent de la pagina on es trobi l'usuari.
# Comprovem si la pagina en la que es troba es més gran d'1, sino carreguem des de l'article 0.
# Si la pagina es més gran que 1, farem un càlcul per saber des de quin post carreguem
function mostrarArticles() {
    $connexio = conect();
    $pagina = paginaActual();
    $postsPerPagina = postsPerPagina();
    $inici = ($pagina > 1 && $pagina <= numeroPagines()) ? ($pagina * $postsPerPagina - $postsPerPagina) : 0;

    
// Preparem la consulta SQL
    $articles = $connexio->prepare("SELECT * FROM articles LIMIT $inici, $postsPerPagina");

// Executem la consulta
    $articles->execute();

// Comprovem que hagui articles, en cas contrari, rediriguim
    $articles = $articles->fetchAll();
    if (!$articles) {
        header('Location: index.php');
    }
    foreach ($articles as $article) : ?>
        <li><?php echo $article['id'] . ' - ' . $article['article']; ?></li>
    <?php endforeach;
}


?>