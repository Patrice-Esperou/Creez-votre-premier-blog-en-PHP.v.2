<?php

namespace App\config;
use App\src\controller\FrontController;
use Exception;

class Router
{
    public function run()
    {
        try{
            if(isset($_GET['route']))
            {
                if($_GET['route'] === 'article'){
                    require '../templates/single.php';
                }
                else{
                    echo 'page inconnue';
                }
            }
            else{//on instencie frontcontroller at appel a la methode home
                $frontController = new FrontController();
                $frontController->home();
            }
        }
        catch (Exception $e)
        {
            echo 'Erreur';
        }
    }
}