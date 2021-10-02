<?php
namespace App\src\DAO;

use PDO;
use Exception;

 abstract class DAO
{    

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
    private function getConnection()
    {
        //Tentative de connexion à la base de données
        try{//self fait référence a la classe
            $this->connection = new PDO(DB_HOST,DB_USER,DB_PASS);
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
            $result = $this->checkConnection()->prepare($sql);
            $result->setFetchMode(PDO::FETCH_CLASS,static::class);
            $result->execute($parameters);
            return $result;
        }
            $result = $this->checkConnection()->query($sql);
            $result->setFetchMode(PDO::FETCH_CLASS,static::class);
            return $result;
        }   
    }
