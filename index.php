<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <footer id="Contact">
        <h2 class="Side_Title">Contact</h2>
        <section class="Contact_1">
            <form action="#" method="get" class="Contact_1">
                <div class="art1">
                    <textarea name="Entreprise" id="Entreprise" cols="30" rows="1" placeholder="Entreprise"></textarea><br>
                    <textarea name="Nom" id="Nom" cols="30" rows="1" placeholder="Nom"></textarea><br>
                    <textarea name="Prenom" id="Prenom" cols="30" rows="1" placeholder="Prénom"></textarea><br>
                    <textarea name="Email" id="Email" cols="30" rows="1" placeholder="Email"></textarea><br>
                    <textarea name="Telephone" id="Telephone" cols="30" rows="1" placeholder="Téléphone"></textarea><br>
                    <!-- <input    name="Telephone" type="number"> -->
                </div>
                <div>
                    <textarea name="Sujet" id="Sujet" cols="30" rows="1" placeholder="Sujet"></textarea>
                    <textarea name="Message" id="Message" cols="30" rows="10" placeholder="Message"></textarea>
                    <!-- <input type="text" name="Message" cols="30" rows="10"><br> -->
                    <!-- <button>Envoyer</button> -->
                    <!-- <input type="submit" value="Envoyer"> -->
                    <form method="POST">
                        <input type="submit" name="Envoyer" class="button" value="Envoyer" />
                    </form>
                </div>
            </form>
        </section>
    </footer>

    <?php

    if (isset($_GET['Envoyer'])) {
        $_SESSION['sujet']      = $_GET['Sujet'];
        $_SESSION['message']    = $_GET['Message'];
        $_SESSION['email']      = $_GET['Email'];
        $_SESSION['telephone']  = $_GET['Telephone'];
        $_SESSION['entreprise'] = $_GET['Entreprise'];
        $_SESSION['nom']        = $_GET['Nom'];
        $_SESSION['prenom']     = $_GET['Prenom'];

        include_once('includes/connexion.php');
    }
    
    ?>

</body>

</html>











<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=960px, initial-scale=1.0">
    <title>Liste de chansons</title>
    <link rel="stylesheet" href="style.css">
</head>
<?php
// établir une connexion et récupérer les artistes pour remplir le formulaire
// include('./connexion.php')
// require_once ('includes/connexion.php');
?>
<body>
<footer id="Contact">
    <h2 class="Side_Title">Contact</h2>
    <section class="Contact_1">
      <div class="Contact_1">
        <div class="art1">
          <textarea name="Entreprise" id="Entreprise" cols="30" rows="1" placeholder="Entreprise"></textarea><br>
          <textarea name="Nom" id="Nom" cols="30" rows="1" placeholder="Nom"></textarea><br>
          <textarea name="Prénom" id="Prénom" cols="30" rows="1" placeholder="Prénom"></textarea><br>
          <textarea name="Email" id="Email" cols="30" rows="1" placeholder="Email"></textarea><br>
          <textarea name="Sujet" id="Sujet" cols="30" rows="1" placeholder="Sujet"></textarea>
        </div>
        <div class="art2">
          <textarea name="Message" id="Message" cols="30" rows="10" placeholder="Message"></textarea>
          <button>Envoyer</button>
        </div>
      </div>
    </section>
</footer>
</body>
</html> -->