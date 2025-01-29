<?php
        // creer les varaibles de connexion a la base de donnes 
            $USER="root";
            $HOST="localhost";
            $BD="gestrole_db";
            $PWD="dimi123";
            try
            {
                // creer la connexion a la base de donnee 
                $base= new PDO("mysql:host=$HOST;dbname=$BD;charset=utf8",$USER,$PWD);
                //definir le mode de gestion des erreurs 
                $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            catch(PDOException $ex)
            {
                // afficher un message d'erreur en cas d'exception
                echo "erreur lors de la connection a la base de donne : ".$ex->getMessage();
            }       

?>