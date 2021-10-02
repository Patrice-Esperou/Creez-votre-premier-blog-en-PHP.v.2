<?php

namespace App\src\controller;
use App\src\DAO\ArticleDAO;
class FrontController
{
    public function home()//Methode home gere affichage page d'accueil
    {
        $article = new ArticleDAO();
        $articles = $article->getArticles();
        require '../templates/home.php';
    }
}