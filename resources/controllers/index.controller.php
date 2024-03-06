<!-- Mario Flores Muñoz -->

<?php 
require_once '../model/model.php';
// Establim el numero de pagina en la que l'usuari es troba.
# si no troba cap valor, assignem la pagina 1.
function paginaActual() {
    return isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
}

// Mostrar els botons de la paginació
// Al assignarle a los botones el número de la página, también le assigno el número de posts pos página para que se guarde en el GET incluso
// después de cambiar de página
function mostrarPaginacio() {
    $numeroPagines = numeroPagines();
    $pagina = paginaActual();
    echo '<section class="paginacio"><ul>';

    // Botó Anterior
    if ($pagina == 1) {
        echo '<li class="disabled">&laquo;</li>';
        echo '<li class="disabled">&lt;</li>';
    } else {
        echo '<li><a href="?pagina=1&select=' . (postsPerPagina()) .'">&laquo;</a></li>';
        echo '<li><a href="?pagina=' . ($pagina - 1) . '&select=' . (postsPerPagina()) . '">&lt;</a></li>';
    }

    // Botons de paginació
    for ($i = 1; $i <= $numeroPagines; $i++) {
        if ($pagina == $i) {
            echo "<li class='active'><a href='?pagina=$i&select=" . (postsPerPagina()) ."'>$i</a></li>";
        } else {
            echo "<li><a href='?pagina=$i&select=" . (postsPerPagina()) ."'>$i</a></li>";
        }
    }

    // Botó Següent
    if ($pagina == $numeroPagines) {
        echo '<li class="disabled">&gt;</li>';
        echo '<li class="disabled">&raquo;</li>';
    } else {
        echo '<li><a href="?pagina=' . ($pagina + 1) . '&select=' . (postsPerPagina()) .'">&gt;</a></li>';
        echo '<li><a href="?pagina=' . (numeroPagines()) . '&select=' . (postsPerPagina()) . '">&raquo;</a></li>';
    }

    echo '</ul></section>';
}

require '../views/index.blade.php';
?>