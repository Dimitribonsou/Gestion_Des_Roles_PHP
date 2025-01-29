<?php
// fonction permettant de tester la connexion d'un utilisateur en prennant un nom et un mot de passe en parametre
        function Connection($nom, $password)
        {
            try
            {
                //importer le fichier de connexion dans le fichier a fin d'utiliser la variable de connexion $base
                include_once("connexion.php");
                // se rassurer que la variable $base est bien accessible
                if (isset($base))
                {
                    // Requête pour récupérer les informations de l'étudiant
                    $req = "SELECT `id_users`, `nom_users`, `email_users`, `mot_de_passe`,`role` FROM `utilisateurs` WHERE nom_users=:nom ";
                    // Préparation de la requête SQL
                    $requete = $base->prepare($req);
                    //passage des valeurs des parametres
                    $requete->bindParam(":nom", $nom);
                    // Exécution de la requête SQL
                    $requete->execute();
                    $resultat = $requete->fetch(PDO::FETCH_ASSOC); // Récupérer le resultat retourner par la requete
                    // Vérifier si l'utilisateur existe dans la base de données
                    if ($resultat && password_verify($password, $resultat['mot_de_passe']))
                    {
                        // Sauvegarde des informations de l'utilisateur connecté dans les variables de session
                        $_SESSION["id_users"] = $resultat['id_users'];
                        $_SESSION["email"] = $resultat['email_users'];
                        $_SESSION["nom"] = $resultat['nom_users'];
                        $_SESSION["role"] = $resultat['role'];
                        /* retourner un tableau association contenant deux elements result et le message 
                          si  result a comme valeur true alors l'utilisateur existe et peux se connecter
                        */
                        return [
                            "result"=>true,
                            "message"=>"Connexion bien etablie",
                            "role"=>$resultat['role']
                        ];
                    }
                    else 
                    {
                         // Mot de passe incorrect ou utilisateur non trouvé
                         return [
                            "result"=>false,
                            "message"=>"nom utilisateur ou mot de passe incorrect"
                        ];
                    }
                }
                else
                {
                      // Erreur de connexion à la base de données
                    return [
                        "result"=>false,
                        "message"=>" Echec de connexion a la base de donnee"
                    ];
                }
            }
            catch (PDOException $ex)
            {
                // Retourner false en cas d'erreur
                return [
                    "result"=>false,
                    "message"=>"Erreur lors de la connexion au système : " . $ex->getMessage()
                ];
            }
        }
        function Inscription($nom, $email, $password)
        {
            try
            {
                include_once("connexion.php");
                if (isset($base))
                {
                    // Hachage du mot de passe avant de l'enregistrer
                    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        
                    // Requête de création de compte
                    $req = "INSERT INTO `utilisateurs`( `nom_users`, `email_users`, `mot_de_passe`) VALUES (:nom,:email,:pwd)";
                    
                    // Préparation de la requête SQL
                    $requete = $base->prepare($req);
                    // passage des valeurs des parametres
                    $requete->bindParam(":nom", $nom);
                    $requete->bindParam(":email", $email);
                    $requete->bindParam(":pwd", $hashedPassword); // Utilisation du mot de passe haché
                    // Exécution de la requête SQL
                    $requete->execute();
                    // rediriger l'utilisateur sur la page de connexion
                    header("location:./index.php");
                    // retourner un message de success
                    return "Création de compte réussie avec succès !";
                }
                else
                {
                    return "Erreur de connexion à la base de données";
                }   
            }
            catch (PDOException $ex)
            {
               return "Erreur lors de l'enregistrement des informations : " . $ex->getMessage();
            }
        }
         //fonction permettant d'afficher la liste des hotels   existantes dans la base de donnee en fonction du nom et du quartier correspondant
         function Afficher_UtilisateursParRole($role)
         {
             try
                     {
                         require "connexion.php";
                         if(isset($base))
                         {
                             // requete de creation de compte
                              // Requête pour récupérer les informations de l'étudiant
                               $req = "SELECT * FROM `utilisateurs` WHERE  `role`=:role";
                               // Préparation de la requête SQL
                               $requete = $base->prepare($req);
                               // passage des valeurs des parametres
                               $requete->bindParam(":role",$role);
                               // Exécution de la requête SQL
                               $requete->execute();
                               $resultat = $requete->fetchall();
                               // retourner la liste des hotels retrouver
                             return $resultat;
                         }
                         else
                         {
                             return null;
                         }
                     }
                     catch(PDOException $ex)
                     {
                        $messages= "erreur lors de l'enregistrement des informations :".$ex->getMessage();
                        return null;
                     }
         }
       
?>