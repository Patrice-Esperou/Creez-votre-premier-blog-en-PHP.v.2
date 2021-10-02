<?php
namespace App\src\DAO;

class ArticleDAO extends DAO
{     //Création de la methode getarticles (liste d'articles)
    public function getArticles()
    {               
        $sql ='SELECT id, title, content, author, createdAt FROM article ORDER BY id DESC';
        return $this->createQuery($sql);
    }


    public function getArticle($articleId)//idem methode pour 1
    {
        
        $sql ='SELECT id, title, content, author, createdAt FROM article WHERE id = ?';
          
        return $this->createQuery($sql,[$articleId]);
    }
}
