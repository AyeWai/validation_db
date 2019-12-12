<?php 

    session_start();
    echo "role" . $_SESSION['role']. "\n";
    echo "prenom" . $_SESSION['prenom']. "\n";
    echo "nom" . $_SESSION['nom']. "\n";

;?>

<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="webdb2.css">
    <title>Page de connexion</title>
  </head>

  <body class="text-center">
    <form class="form-signin" method='POST'>
      <div class="smthing"><a href="index.php"><img class="mb-4" src="img/commodities_logo.png" alt="main_logo" width="150" height="150"></a></div>
      <h1 class="h3 mb-3 font-weight-normal">Connexion</h1>
      <label for="inputEmail" class="sr-only">E-mail</label>
      <input type="email" name="inputEmail" class="form-control" placeholder="E-mail" required autofocus>
      <label for="inputPassword" class="sr-only">Mot de passe</label>
      <input type="password" name="inputPassword" class="form-control" placeholder="Mot de passe" required>
      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Se souvenir de moi
        </label>
      </div>
      <button class="btn btn-lg btn-primary btn-block bg-success" type="submit">Se connecter</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2019-2020</p>
    </form>

    <?php 

// Le mot de passe n'a pas été envoyé ou n'est pas bon
if (!isset($_POST['inputEmail']) OR $_POST['inputPassword'] != "1234")
{
    echo "echec!";
    echo $_POST['inputEmail'];
    echo $_POST['inputPassword'];
}
// Le mot de passe a été envoyé et il est bon
else
{   
    echo "reussite!";
    header('Location: index.php'); // Afficher les codes secrets
    $_SESSION['role'] = 1;
    $_SESSION['prenom'] = 'Chris';
    $_SESSION['nom'] = 'SIMON';

    $time = $_SERVER['REQUEST_TIME'];
    $time_session = 300;
    $_SESSION['temps'] = $time;
    $_SESSION['temps_session'] = $time_session;

    



}

?>





  </body>
</html>

