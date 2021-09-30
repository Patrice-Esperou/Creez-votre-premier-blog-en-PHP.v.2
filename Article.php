<?php

class Article
{     //Création de la methode getarticles (liste d'articles)
    public function getArticles()
    {
        $db = new Database();
        $connection = $db->getConnection();
        $result = $connection->query('SELECT id, title, content, author, createdAt FROM article ORDER BY id DESC');
        return $result;
    }


    public function getArticle($articleId)//idem methode pour 1
    {
        $db = new Database();
        $connection = $db->getConnection();
        $result = $connection->prepare('SELECT id, title, content, author, createdAt FROM article WHERE id = ?');
        $result->execute([
            $articleId //on passe ce parametre $articleId  pour appeller 1 seul article
        ]);
        return $result;
    }
}
