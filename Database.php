<?php

class Database
{

    //constente car sa changera pass
    const DB_HOST = 'mysql:host=localhost;dbname=blackblog2;charset=utf8';
    const DB_USER = 'root';
    const DB_PASS = '';

    private $connection;

    private function checkConnection()
    {
        //Verifie si la connection est nulle et fait appel a getconnection
        if($this->connection ===null){
            return $this->getConnection();
        }
        //Si la connection existe, elle est renvoyé, inutile de la refaire
        return$this->connection;
    }
    //Méthode de connexion à notre base de données
    public function getConnection()
    {
        //Tentative de connexion à la base de données
        try{//self fait référence a la classe
            $this->connection = new PDO(self::DB_HOST,self::DB_USER,self::DB_PASS);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $this->connection;
        }
        //On lève une erreur si la connexion échoue
        catch(Exception $errorConnection)
        {
            die ('Erreur de connection :'.$errorConnection->getMessage());
        }
    }
    //On cree méthode createQuery qui prend 1 requette sql et des parametres null par defaut pour du query
    protected function createQuery($sql, $parameters = null)
    {
        if($parameters)
        {
            $result = $this->getConnection()->prepare($sql);
            $result->execute($parameters);
            return $result;
        }
        $result = $this->getConnection()->query($sql);
        return $result;
    }
}
//l'attribut  $connection  stocke la connexion si celle-ci existe, sinon renvoie  null
//- la méthode  checkConnection()  teste si  $connection  est  null  , et appelle  getConnection()  pour créer une nouvelle connexion. Si  $connection  a une connexion existante, la méthode renvoie celle-ci ;
//- la méthode  getConnection()  fait la même chose que précédemment, mais renvoie la connexion dans la propriété  $connection
//- la méthode  createQuery()  a été modifiée, pour vérifier si la connexion existe avant d'en faire une nouvelle au besoin.