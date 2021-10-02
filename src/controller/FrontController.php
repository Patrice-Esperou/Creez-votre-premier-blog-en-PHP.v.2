<?php

namespace App\src\controller;

class FrontController
{
    public function home()//Methode home gere affichage page d'accueil
    {
        require '../templates/home.php';
    }
}