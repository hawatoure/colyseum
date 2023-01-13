<?php

require_once("models/client.php");
require_once("models/show.php");

// "  :: " permet d'appeler une méthode static et " -> " d'appeler une méthode non static

 // Appel de la méthode statique readAll() de notre class élève, qui nous permet de charger la list de tous les élèves
 $clients = Client::readAll(10);
 $clienstWithCard = Client::readAllWithCard();
 $shows = Show::readAllShow();


include("inc/head.php");

?>
<title>COLYSEUM</title>

<?php
include("inc/header.php");

?>
    <main>
      <h1>Colyseum </h1> 
      <div class="container">
            <h1 class="text-center">Liste des clients </h1> 

            <table class="table border text-center">
                <tr class="bg-success p-2 text-white bg-opacity-75 fs-0.5">
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Date de naissance</th>
                    <th>N° Carte de fidélité</th>
                    <th>Carte</th>
                    <th>Détails</th>
                  
                </tr>
                

            <?php

                foreach ($clients as $client){
                    $client->afficherInfos();
                }     
          

            ?>
                    
            </table>

        </div>
        <div class="container">
            <h1 class="text-center">Liste des clients ayant une carte de fidélité </h1> 

            <table class="table border text-center">
                <tr class="bg-success p-2 text-white bg-opacity-75 fs-0.5">
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Date de naissance</th>
                    <th>N° Carte de fidélité</th>
                    <th>Carte</th>
                    

                  
                </tr>
                

            <?php

                foreach ($clienstWithCard as $clientCard){
                    $clientCard->afficherInfos();
                }     
          

            ?>
                    
            </table>

        </div>
        <div class="container">
            <h1 class="text-center">Liste des spectacles </h1> 

            <table class="table border text-center">
                <tr class="bg-success p-2 text-white bg-opacity-75 fs-0.5">
                    <th>Titre</th>
                    <th>Acteurs</th>
                    <th>Date</th>
                    <th>Genre</th>
            
                </tr>
                

            <?php

                foreach ($shows as $show){
                    $show->afficherInfos();
                }     
          

            ?>
                    
            </table>

        </div>

    </main>




<?php
include("inc/footer.php");

?>