<?php 

session_start();
echo "role" . $_SESSION['role']. "\n";
echo "prenom" . $_SESSION['prenom']. "\n";
echo "nom" . $_SESSION['nom']. "\n";

		echo 'Grand test'.$_POST['ID'];

		//Quand il y a beaucoup de texte, il est préférable d'afficher du code html qu'un echo
		if(isset($_POST['ID']) && $_POST['Supprimer'] == true)
		{
			try
			{
				$bdd = new PDO('mysql:host=localhost;dbname=valid_db;charset=utf8', 'root', '');
			}
			catch(Exception $e)
			{       
					die('Erreur : '.$e->getMessage());
			}
			
			echo $_POST['ID'];
			echo $_POST['Supprimer'];
			$req = $bdd->prepare('DELETE FROM valid_db.users WHERE users.user_id =:u_id');
			$req->execute(array(
			'u_id' => $_POST['ID']
			));
			echo('Succès de la suppression');
		
        }
        elseif(isset($_POST['ID']) && $_POST['Supprimer'] == false)
		{
			try
			{
				$bdd = new PDO('mysql:host=localhost;dbname=valid_db;charset=utf8', 'root', '');
			}
			catch(Exception $e)
			{       
					die('Erreur : '.$e->getMessage());
			}
			
			echo $_POST['ID'];
			echo $_POST['Supprimer'];
			$req = $bdd->prepare('UPDATE valid_db.users SET users.fname =:u_fname , users.lname=:u_lname, users.capacity=:u_capacity WHERE users.user_id =:u_id');
			$req->execute(array(
            'u_id' => $_POST['ID'],
            'u_fname' => $_POST['Prenom'],
            'u_lname' => $_POST['Nom'],
            'u_capacity' => $_POST['Role'],
			));
			echo('Succès de la modification');
		
        }
        else{
            echo 'Echec modif';
        } 
        foreach ($_POST as $key => $value) {
            $_POST[$key] = NULL;
         }
?>	





<html>
    <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href ="webdb3.css">
    <meta charset="UTF-8">
    </head>
    <body>
            <div class="col">
                    <div class="header">
                        <div class="row">
                                <nav class="col navbar navbar-expand-lg navbar-dark bg-success">
                                    <a class="navbar-brand" href="index.php">
                                        <img src="img/commodities_logo.png" width="120" height="90" alt="Site logo">
                                        Commodities Market
                                    </a>
                                    <button class="navbar-toggler collapsed" type="button" data-toggle="collapse"
                                        data-target="#navbarContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                                        aria-label="Toggle navigation">
                                        <span class="navbar-toggler-icon"></span>
                                    </button>
                                    <div id="navbarContent" class="navbar-collapse collapse" style="">
                                        <ul class="navbar-nav">
                                            <li class="nav-item active">
                                                <a class="nav-link" href="index.php">Accueil</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="login.php">Se connecter</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#">Panier                                                 </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="moderation.php">Modération</a>
                                            </li>
                                        </ul>
                                    </div>
                                </nav>
                            </div>
                    </div>
                <div class="main">

<?php

 try
{
	$bdd = new PDO('mysql:host=localhost;dbname=valid_db;charset=utf8', 'root', '');
}
catch(Exception $e)
{       
        die('Erreur : '.$e->getMessage());
}

$reponse = $bdd->query('SELECT user_id, fname, lname, capacity   FROM users');

echo '<div class="row">
    <h1 class="text-center">Utilisateurs</h1>
    <table class="table table-striped table-success bg-light">
      <thead>
          <tr>
              <th scope="col">ID</th>
              <th scope="col">Prénom</th>
              <th scope="col">Nom</th>
              <th scope="col">Role</th>
          </tr>
      </thead>
      <tbody>';

while ($donnees = $reponse->fetch())
{
    
    echo '    <tr>
              <th scope="row">'.$donnees['user_id'].'</th>
              <td>'.$donnees['fname'].'</td>
              <td>'.$donnees['lname'].'</td>
              <td>'.$donnees['capacity'].'</td>
              </tr>';
}
    echo 
      '</tbody>
  </table>
</div>';


$reponse->closeCursor();

?>

<?php

    
    echo'
    <div class="row">
    <div class="col-12">
    <form action=moderation.php method="post">
    <label for="ID">ID</label>
    <input type="number" class="form-control" name="ID" placeholder="" required>
    <label for="Prenom">Prénom</label>
    <input type="text" class="form-control" name="Prenom" placeholder="">
    <label for="Nom">Nom</label>
    <input type="text" class="form-control" name="Nom" placeholder="">
    <label for="Role">Role</label>
    <input type="text" class="form-control" name="Role" placeholder="">
    </br>
    <div class="form-check form-check-inline">
    <label class="form-check-label" for="saveOrDelOption">Supprimer</label>
    <input class="form-check-input" type="radio" name="Supprimer" id="del_1" value="true">
    </div>
    </br>
    <button type="submit" class="save btn btn-success">Soumettre</button>
    </form>
    </div>
    </div>
    ';

?>








<?php

 try
{
	$bdd = new PDO('mysql:host=localhost;dbname=valid_db;charset=utf8', 'root', '');
}
catch(Exception $e)
{       
        die('Erreur : '.$e->getMessage());
}

$reponse = $bdd->query('SELECT product_id, name, description, price, img FROM products');

echo '<div class="row">
    <h1 class="text-center">Produits</h1>
    <table class="table table-striped table-success bg-light">
      <thead>
          <tr>
          <th scope="col">ID</th>
          <th scope="col">Nom</th>
          <th scope="col">Description</th>
          <th scope="col">Prix</th>
          <th scope="col">Image</th>
          </tr>
      </thead>
      <tbody>';

while ($donnees = $reponse->fetch())
{
    
    echo '    <tr>
              <th scope="row">'.$donnees['product_id'].'</th>
              <td>'.$donnees['name'].'</td>
              <td>'.$donnees['description'].'</td>
              <td>'.$donnees['price'].'</td>
              <td>'.$donnees['img'].'</td>
              </tr>';
}
    echo 
      '</tbody>
  </table>
  <span class="input-group button">
    <button type="button" class="btn btn-success">Modifier</button>
    <button type="button" class="btn btn-danger">Supprimer</button>
</span>
</div>';


$reponse->closeCursor();

?>

<?php

    
    echo'
    <div class="row">
    <div class="col-12">
    <form action=moderation.php method="post">
    <label for="ID">ID</label>
    <input type="number" class="form-control" name="ID" placeholder="" required>
    <label for="Nom">Nom</label>
    <input type="text" class="form-control" name="Nom" placeholder="">
    <label for="Description">Description</label>
    <input type="text" class="form-control" name="Description" placeholder="">
    <label for="Prix">Prix</label>
    <input type="text" class="form-control" name="Prix" placeholder="">
    <label for="Image">Image</label>
    <input type="text" class="form-control" name="Image" placeholder="">
    </br>
    <div class="form-check form-check-inline">
    <label class="form-check-label" for="saveOrDelOption">Supprimer</label>
    <input class="form-check-input" type="radio" name="Supprimer" id="del_1" value="true">
    </div>
    </br>
    <button type="submit" class="save btn btn-success">Soumettre</button>
    </form>
    </div>
    </div>
    ';

?>








<?php

 try
{
	$bdd = new PDO('mysql:host=localhost;dbname=valid_db;charset=utf8', 'root', '');
}
catch(Exception $e)
{       
        die('Erreur : '.$e->getMessage());
}

$reponse = $bdd->query('SELECT user_id, pseudo, mdp FROM users');

echo '<div class="row">
    <h1 class="text-center">Identifiants de connexion</h1>
    <table class="table table-striped table-success bg-light">
      <thead>
          <tr>
          <th scope="col">ID</th>
          <th scope="col">Identifiant</th>
          <th scope="col">Mot de passe</th>
          </tr>
      </thead>
      <tbody>';

while ($donnees = $reponse->fetch())
{
    
    echo '    <tr>
              <th scope="row">'.$donnees['user_id'].'</th>
              <td>'.$donnees['pseudo'].'</td>
              <td>'.$donnees['mdp'].'</td>
              </tr>';
}
    echo 
      '</tbody>
  </table>
  <span class="input-group button">
    <button type="button" class="btn btn-success">Modifier</button>
    <button type="button" class="btn btn-danger">Supprimer</button>
</span>
</div>';


$reponse->closeCursor();

?>

<?php

    
    echo'
    <div class="row">
    <div class="col-12">
    <form action=moderation.php method="post">
    <label for="ID">ID</label>
    <input type="number" class="form-control" name="ID" placeholder="" required>
    <label for="Prenom">Prénom</label>
    <input type="text" class="form-control" name="Prenom" placeholder="">
    <label for="Nom">Nom</label>
    <input type="text" class="form-control" name="Nom" placeholder="">
    <label for="Role">Role</label>
    <input type="text" class="form-control" name="Role" placeholder="">
    </br>
    <div class="form-check form-check-inline">
    <label class="form-check-label" for="saveOrDelOption">Supprimer</label>
    <input class="form-check-input" type="radio" name="Supprimer" id="del_1" value="true">
    </div>
    </br>
    <button type="submit" class="save btn btn-success">Soumettre</button>
    </form>
    </div>
    </div>
    ';

?>


<button type="button" class="logout btn btn-danger"><a href="logout.php">Déconnexion</a></button>

                
              </div>
            </div>
        <script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
        <script src="webdb.js"></script>      
    </body>
</html>