<?php

    class Conexion
    {
        static function conectar(){

            $dsn= "mysql:host=localhost;dbname=digitalturismodb";
            $usuario = "root";
            $password= "";
            $opt =array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
            try{
                $link = new PDO($dsn,$usuario,$password,$opt);
                $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
            return $link;
            }catch(PDOException $error){
                echo "<h2> No me pude conectar con la Base de Datos...<br></h2>".$error->getMessage();
                exit;
            }
            }
            
            
            
    }
?>