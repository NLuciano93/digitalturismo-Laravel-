<?php
    session_start();

        if (!isset($_SESSION["email"])) {
               
            

                if (isset($_COOKIE["email"]) && isset($_COOKIE["nombre_usuario"]) && isset($_COOKIE["facebook"]) && isset($_COOKIE["twitter"]) && isset($_COOKIE["instagram"]) && isset($_COOKIE["avatar"])) {
                    
                    $_SESSION["id_usuario"] = $_COOKIE["id_usuario"];
                
                    $_SESSION["email"] = $_COOKIE["email"];
                    $_SESSION["nombre_usuario"] = $_COOKIE["nombre_usuario"];
                    $_SESSION["facebook"] = $_COOKIE["facebook"];
                    $_SESSION["twitter"] = $_COOKIE["twitter"];
                    $_SESSION["instagram"] = $_COOKIE["instagram"];
                    $_SESSION["avatar"] = $_COOKIE["avatar"];
                    
                    

                }
            }



    function miAutocarga($nClase)
    {
        require_once 'clases/'.$nClase.'.php';

    }
    
    spl_autoload_register('miAutocarga');
    