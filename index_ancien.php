<?php

session_start();
echo "role" . $_SESSION['role']. "\n";
echo "prenom" . $_SESSION['prenom']. "\n";
echo "nom" . $_SESSION['nom']. "\n";

//if (isset($_SESSION['LAST_ACTIVITY']) && 
   //($time + $_SESSION['LAST_ACTIVITY']) > $time_session) {
    //session_unset();
    //session_destroy();
    //session_start();
//}


// ?>

<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=valid_db;charset=utf8', 'root', '');
}
catch(Exception $e)
{       
        die('Erreur : '.$e->getMessage());
}

$reponse = $bdd->query('SELECT name, description, price, img FROM products');

while ($donnees = $reponse->fetch())
{
    echo $donnees['name'] . ' description' . $donnees['description'] . $donnees['price'] . $donnees['img'].'<br />';
    
    echo '<div class="card mb-4 box-shadow">
    <img class="card-img-top" src='.$donnees['img'].' alt="Diamond image cap">
    <div class="card-body">
        <p class="card-text">'.$donnees['description'].'</br>'.$donnees['name'].'   : '.$donnees['price'].'</p>
        <div class="d-flex justify-content-between align-items-center">
            <div class="input-group">
                <span class="input-group button">
                    <button type="button" class="btn btn-success">Acheter</button>
                    <button type="button" name = "1" class="less btn btn-outline-success">-</button>
                    <div class="col-2 align-items-center">
                        <input type="text" id="quantity_1" class="form-control input-number" value="1" min="1" max="100">
                    </div>
                    <button type="button" name="1" class="more btn btn-outline-success ">+</button>
                </span>
            </div>
        </div>
    </div>
</div>
</div>';

}

$reponse->closeCursor();

?>





<html>
    <head>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <link rel="stylesheet" href ="webdb.css">
    <meta charset="UTF-8">
    </head>
    <body>
    <div class="col">
            <div class="header">
                <div class="row">
                        <nav class="col navbar navbar-expand-lg navbar-dark bg-success">
                            <a class="navbar-brand" href="...">
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
                                    <?php if($_SESSION['role'] == 1){
                                    echo '<li class="nav-item">';
                                        echo '<a class="nav-link" href="moderation.html">Modération</a>';
                                    echo '</li>';
                                        }
                                    ?>
                                </ul>
                            </div>
                        </nav>
                    </div>
        </div>
        <div class="main">
            <div class="row">
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <img class="card-img-top" src="https://cdn.pixabay.com/photo/2016/10/16/10/11/bullion-1744773_960_720.jpg" alt="Diamond image cap">
                        <div class="card-body">
                            <p class="card-text">La monnaie des dieux. Apprécié depuis l'aube de l'humanité, il aura toujours de la valeur après le déclin de celle-ci.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="input-group">
                                    <span class="input-group button">
                                        <button type="button" class="btn btn-success">Acheter</button>
                                        <button type="button" name = "1" class="less btn btn-outline-success">-</button>
                                        <div class="col-2 align-items-center">
                                            <input type="text" id="quantity_1" class="form-control input-number" value="1" min="1" max="100">
                                        </div>
                                        <button type="button" name="1" class="more btn btn-outline-success ">+</button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <img class="card-img-top" src="https://cdn.pixabay.com/photo/2016/02/14/09/45/precious-1199183_960_720.jpg" alt="Diamond image cap">
                        <div class="card-body">
                            <p class="card-text">Sans doute la plus mythique de toutes les pierres précieuses, le diamant est recherché depuis des siècles pour son éclat exceptionnel. Une gemme d'excellence qui habille les plus iconiques collections.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="input-group">
                                    <span class="input-group button">
                                        <button type="button" class="btn btn-success">Acheter</button>
                                        <button type="button" name ="2" class="less btn btn-outline-success">-</button>
                                        <div class="col-2 align-items-center">
                                            <input type="text" id="quantity_2" class="form-control input-number" value="1" min="1" max="100">
                                        </div>
                                        <button type="button" name="2" class="more btn btn-outline-success ">+</button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <img class="card-img-top" src="https://cdn.pixabay.com/photo/2015/07/17/00/37/pump-jack-848300_960_720.jpg" alt="Oil image cap">
                        <div class="card-body">
                            <p class="card-text">Le pétrole, aussi surnommé "or noir", est une substance noire, liquide, qui est une énergie fossile, que l'on trouve par forage dans le sol.</p>
                            <div class="input-group">
                                <span class="input-group button">
                                    <button type="button" class="btn btn-success">Acheter</button>
                                    <button type="button" name="3" class="less btn btn-outline-success">-</button>
                                    <div class="col-2 align-items-center">
                                        <input type="text" id="quantity_3" class="form-control input-number" value="1" min="1" max="100">
                                    </div>
                                    <button type="button" name="3" class="more btn btn-outline-success ">+</button>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <img class="card-img-top" src="https://cdn.pixabay.com/photo/2015/07/28/22/11/wheat-865152_960_720.jpg" alt="Oil image cap">
                        <div class="card-body">
                            <p class="card-text">Au cours des 60 dernières années, la consommation mondiale de blé a plus que quadruplé. Le blé dur sert essentiellement à la confection de pâtes alimentaires, tandis que le blé tendre permet la fabrication du pain et est employé pour l’alimentation animale.</p>
                            <div class="input-group">
                                <span class="input-group button">
                                    <button type="button" class="btn btn-success">Acheter</button>
                                    <button type="button" name="4" class="less btn btn-outline-success">-</button>
                                    <div class="col-2 align-items-center">
                                        <input type="text" id="quantity_4" class="form-control input-number" value="1" min="1" max="100">
                                    </div>
                                    <button type="button" name="4" class="more btn btn-outline-success ">+</button>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <img class="card-img-top" src="https://cdn.pixabay.com/photo/2017/09/24/17/19/cow-2782461_960_720.jpg" alt="Oil image cap">
                        <div class="card-body">
                            <p class="card-text">L’idée est simple : le particulier achète une ou plusieurs vaches (1 530 euros par tête actuellement) en versant des fonds à l’AFIC, qui s’occupe de tout et loue ensuite ce cheptel à un exploitant.</p>
                            <div class="input-group">
                                <span class="input-group button">
                                    <button type="button" class="btn btn-success">Acheter</button>
                                    <button type="button" name="5" class="less btn btn-outline-success">-</button>
                                    <div class="col-2 align-items-center">
                                        <input type="text" id="quantity_5" class="form-control input-number" value="1" min="1" max="100">
                                    </div>
                                    <button type="button" name="5" class="more btn btn-outline-success ">+</button>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <img class="card-img-top" src="https://cdn.pixabay.com/photo/2018/06/06/22/35/bitcoin-3458994_960_720.jpg" alt="Oil image cap">
                        <div class="card-body">
                            <p class="card-text">Une cryptomonnaie, dite aussi cryptoactif, cryptodevise, monnaie cryptographique ou encore cybermonnaie, est une monnaie émise de pair à pair, sans nécessité de banque centrale, utilisable au moyen d'un réseau informatique décentralisé</p>
                            <div class="input-group">
                                <span class="input-group button">
                                    <button type="button" class="btn btn-success">Acheter</button>
                                    <button type="button" name="6" class="less btn btn-outline-success">-</button>
                                    <div class="col-2 align-items-center">
                                        <input type="text" id="quantity_6" class="form-control input-number" value="1" min="1" max="100">
                                    </div>
                                    <button type="button" name="6" class="more btn btn-outline-success ">+</button>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <table class="table table-striped table-success bg-light">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">First</th>
                                <th scope="col">Last</th>
                                <th scope="col">Handle</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Jacob</td>
                                <td>Thornton</td>
                                <td>@fat</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>Larry</td>
                                <td>the Bird</td>
                                <td>@twitter</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
        <script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
        <script src="webdb.js"></script>     
    </body>
</html>