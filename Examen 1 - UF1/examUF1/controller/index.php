<?php

require_once '../model/pdo-articles.php';
require_once '../controller/session.php';

// Ex7
// S'ha de fer recharge a la página per mostrar-ho de vegades
//$postsPerPage = 10;

if (isset($_POST['postsPerPage']) && !empty($_POST['postsPerPage'])) {
    setcookie('posts', $_POST['postsPerPage']);
} else {
    setcookie('posts', 10);
}

$postsPerPage = $_COOKIE['posts'];

//$orderBy = 'date-desc';

if (isset($_POST['orderBy']) && !empty($_POST['orderBy'])) {
    setcookie('order', $_POST['orderBy']);
} else {
    setcookie('order', 'date-desc');
}

$orderBy = $_COOKIE['order'];

$searchTerm = "";
if (isset($_GET['search'])) $searchTerm = $_GET['search'];

session_start();
$userId = getSessionUserId();

$nArticles = getCountOfPosts($userId, $searchTerm); 
$nPages = ceil($nArticles / $postsPerPage); 

if (isset($_GET['page'])) {
    $currentPage = $_GET['page'];
} else {
    $currentPage = 1;
}

if ($nArticles > 0 && ($currentPage > $nPages || $currentPage < 1)) {
    header("Location: index.php");
}

$ndxArticle = $postsPerPage * ($currentPage - 1);

$articles = getPosts($userId, $ndxArticle, $postsPerPage, $orderBy, $searchTerm); 

if ($currentPage <= 3) $backScope = $currentPage - 1;
else $backScope = 3;
if ($currentPage + 3 > $nPages) $frontScope = $nPages - $currentPage;
else $frontScope = 3;


$firstPage = $currentPage == 1;
$lastPage = $currentPage == $nPages;

$firstPageClass = $firstPage ? 'disabled' : '';
$lastPageClass = $lastPage ? 'disabled' : '';

$searchQuery = !empty($searchTerm) ? "?search=$searchTerm&" : "?";
$nextPageLink = $lastPage ? "#" : $searchQuery . "page=" . ($currentPage + 1);
$previousPageLink = $firstPage ? "#" : $searchQuery . "page=" . ($currentPage - 1);
$firstPageLink = $firstPage ? "#" : $searchQuery . "page=1";
$lastPageLink = $lastPage ? "#" : $searchQuery . "page=$nPages";

require_once '../view/index.view.php';