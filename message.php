<!DOCTYPE html>
<html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>GRAD</title>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </head>

    <body>

        <br>

        <?php
        $nom = $_POST["name"];
        $surname = $_POST["surname"];
        $carctspe = "#^[a-z0-9]+$#i";
        if (preg_match("/^([-a-z0-9ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ])+$/i"  , $nom) && preg_match("/^([-a-z0-9ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ])+$/i" , $surname)) {
            echo "Bienvenue ",$surname," ",$nom,". Votre formulaire a bien été envoyé. ";
            try {
                $dbh = new PDO(            
                'mysql:host=localhost;dbname=grad;charset=utf8',
                'root',
                ''
            );
            $CP = $_POST["CP"];
            $ville = $_POST["ville"];
            $email = $_POST["email"];
            $tel = $_POST["tel"];
            $message = $_POST["message"];

            $sql = "INSERT INTO client VALUES ('$nom', '$surname', $CP, '$ville', '$email', $tel, '$message')";

                $dbh->exec($sql);

                $lesLignes = $dbh->query("SELECT * FROM client ") ; 
                echo "<table class='mytable'><caption>Formulaires</caption>";

                while ($donnees = $lesLignes->fetch())
                
                {
                
                ?>
                
                    
                <tr>
                
                    <?php            

                   echo "<td>"; echo $donnees['nom']; echo "</td>";
                   echo "<td>"; echo $donnees['prenom']; echo "</td>";
                   echo "<td>"; echo $donnees['cp']; echo "</td>";
                   echo "<td>"; echo $donnees['ville']; echo "</td>";
                   echo "<td>"; echo $donnees['email']; echo "</td>";
                   echo "<td>"; echo $donnees['tel']; echo "</td>";
                   echo "<td>"; echo $donnees['message']; echo "</td>"; ?>
                
                </tr>
                
                <?php
                
                }
                $reponse->closeCursor();
                echo "</table>" ; 
    ?>
    <?php

            }
            catch (PDOException $e){
                die("Erreur! :" . $e->getMessage());
            }

        } else {
            echo "Votre prénom et votre nom ne doivent pas contenir de caractères spéciaux. ";

        
        };
    
    ?>
        <br>

    </body>
</html>