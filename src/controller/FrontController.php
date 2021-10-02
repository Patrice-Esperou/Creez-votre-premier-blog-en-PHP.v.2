<?php

namespace App\src\controller;
use App\src\DAO\ArticleDAO;
use App\src\DAO\CommentDAO;
class FrontController
{
    public function home()//Methode home gere affichage page d'accueil
    {
        $article = new ArticleDAO();
        $articles = $article->getArticles();
        require '../templates/home.php';
    }

    public function article($articleId)
    {
        $article = new ArticleDAO();
        $articles = $article->getArticle($articleId);
        $comment = new CommentDAO();
        $comments = $comment->getCommentsFromArticle($articleId);
        require '../templates/single.php';
    }
}