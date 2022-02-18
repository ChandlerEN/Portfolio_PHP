<?php

function envoi(PDO $pdo, $sujet, $message, $email, $telephone, $entreprise, $nom, $prenom)
{
    if (verif($pdo, $email, $telephone) == true)
    {              
        echo ('<br>Ceci est un spam');
    }
    else
    {
        if(ajout_contact($pdo, $email, $telephone, $entreprise, $nom, $prenom) == true)
        {
            $message .= "\r\n\r\nEntreprise : $entreprise \r\nEmail : $email \r\nNuméro : $telephone \r\nNom : $nom \r\nPrénom : $prenom";    // . "$nom" . "$prenom"
            
            // var_dump($message);
            $message = wordwrap($message, 70, "\r\n", true);
            // var_dump($message);
            if(mail('chandler.nguyen.etudiant@gmail.com', $sujet, $message) == true)
            {
                echo('<br>Message envoyé');
            }
            else
            {
                echo('<br>Problème avec l`envoie du message');
            }
        }
    }
}

function verif(PDO $pdo, $email, $telephone){
    echo("Vérification de l`identité");
    $statement = $pdo->prepare('SELECT * FROM domaine_spam_externe');
    $statement->execute();
    // var_dump($statement);
    while($row = $statement->fetch()) {
        // echo "<pre>";
        // print_r($row);
        // echo "</pre>";
        
        if (strpos($email, $row[0]) !== false)   //str_contains($email, $row)        str_ends_with($email, $row[0]) == true
        {
            echo("<br>Domaine spam : $row[0]    =   $email");
            var_dump($row);
            var_dump($email);
            return true;
        }
    }

    $statement = $pdo->prepare('SELECT * FROM email_spam_externe');
    $statement->execute();
    // var_dump($statement);
    while($row = $statement->fetch()) {
        // echo "<pre>";
        // print_r($row);
        // echo "</pre>";

        if ($row[0] == $email)
        {
            echo("<br>Email spam : $row[0] = $email");
            var_dump($row);
            var_dump($email);
            return true;
        }
    }

    $statement = $pdo->prepare('SELECT * FROM spam_personnel');
    $statement->execute();
    // var_dump($statement);
    while($row = $statement->fetch()) {
        // echo "<pre>";
        // print_r($row);
        // echo "</pre>";

        if ($row[0] == $email || $row[1] == $telephone)
        {
            // echo("hamdoulilah email spam : <br>$row[0] = $email <br>$row[1] = $telephone");
            var_dump($row);
            var_dump($email);
            var_dump($telephone);
            return true;
        }
    }

    // $statement = $pdo->prepare('SELECT telephone FROM spam_externe');
    // $statement->execute();
    // // var_dump($statement);
    // while($row = $statement->fetch()) {
    //     echo "<pre>";
    //     print_r($row);
    //     echo "</pre>";

    //     if (array_key_exists($row, $telephone))
    //     {
    //         echo('numero spam : $row = $telephone');
    //         return true;
    //     }
    // }
}

function ajout_contact (PDO $pdo, $email, $telephone, $entreprise, $nom, $prenom)
{
    $statement = $pdo->prepare("INSERT INTO contact (email, telephone, entreprise, nom, prenom)
                                VALUES ('$email', '$telephone', '$entreprise', '$nom', '$prenom')");    // revoir
    
    if($statement->execute() == false)
    {
        $statement = $pdo->prepare("SELECT recurrence FROM contact WHERE email = '$email'");
        if($statement->execute() == true)
        {
            $temp = $statement->fetch();
            $recurrence = $temp[0];
    
            if ($recurrence < 5)
            {
                $recurrence++;
                var_dump($recurrence);
        
                $statement = $pdo->prepare("UPDATE contact SET recurrence = '$recurrence' WHERE email = '$email'");
                if($statement->execute() == false)      // revoir
                {
                    echo('<br>Echec ajout récurrence');
                }
                else
                {
                    echo('<br>Succes ajout récurrence');
                }
                return true;
            }
            else
            {
                echo ('<br>Trop de récurrence');
                
                ajout_spam ($pdo, $email, $telephone);  // revoir
    
                // $statement = $pdo->prepare("DELETE FROM contact WHERE email = '$email'");
                // if($statement->execute() == false)      // revoir
                // {
                //     echo('<br>echec suppression');
                // }
                // else
                // {
                //     echo('<br>succes suppression');
                // }
            }
        }
        else{
            echo('<br>Problème avec la table');
        }

    }
    else
    {
        echo ('<br>Ajout du visiteur au contact');

        return true;
    }
}

function ajout_spam (PDO $pdo, $email, $telephone)
{
    echo('<br>Ajout du contact au spam');

    $statement = $pdo->prepare("INSERT INTO spam_personnel (email, telephone)
                                VALUES ('$email', '$telephone')");
    if($statement->execute() == false)
    {
        echo('<br>Echec ajout spam');
    }
    else
    {
        echo('<br>Succes ajout spam');
    }

    $statement = $pdo->prepare("DELETE FROM contact WHERE email = '$email'");
    if($statement->execute() == false)      // revoir
    {
        echo('<br>Echec suppression');
    }
    else
    {
        echo('<br>Succes suppression');
    }
}