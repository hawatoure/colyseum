<?php

require_once("models/client.php");



include("inc/head.php");


// afficher les information en fonction  de son TD. 
//Indice: $_GET
//Indice: créer une méthode readOne() dans la classe Promo
//Afficher les informations de tous les élèves de cette promotion sous forme de tableau

?>
<title>Détail du client </title>

<?php
include("inc/header.php");

?>
    <?php

       $client = Client::readOneDetails($_GET["id"]);

      
       

      ?>

        <div class="container align-center p-3 ">
            <h1 class="text-center">Détails clients</h1> 

     
            <div class="col align-center p-3 ">
              <table class="table border text-center p-3 ">
                <tr>
                  <tr class="bg-success p-2 text-white bg-opacity-75 fs-0.5">
                      <th>Nom et prénom</th>
                      <td><?= $client->lastName ." ".$client->firstName?></td>
          
                  </tr>
                  <tr class="bg-success p-2 text-white bg-opacity-75 fs-0.5">
                      <th>Date de naissance</th>
                      <td><?= $client->birthDate?></td>
                  </tr>
                 
                  <tr class="bg-success p-2 text-white bg-opacity-75 fs-0.5">
                      <th>Numéro de carte de fidélité</th>
                      <td><?= $client->cardNumber?></td>
                  </tr>
                  </tr>
                  <tr class="bg-success p-2 text-white bg-opacity-75 fs-0.5">
                      <th>Type de carte de fidélité</th>
                      <td><?= $client->cardType?></td>
                  </tr>
                  <tr class="bg-success p-2 text-white bg-opacity-75 fs-0.5">
                      <th>Réduction</th>
                      <td><?= $client->cardDiscount ?></td>
                  </tr>
                </tr>
                <tr class="bg-success p-2 text-white bg-opacity-75 fs-0.5">
                      <th>Liste des tickets</th>
                      <td><?= $client->cardDiscount ?></td>
                  </tr>
                  
              </table>

              <div class="container align-center p-3 ">
            <h1 class="text-center">Liste des tickets</h1> 

     
            <div class="col align-center p-3 ">
          
              <table class="table border text-center p-3 ">
                
           
            
            
                <tbody>
                      <?php 
                      $totalPrice = 0;
                      foreach($client->tickets as $ticket) {
                          $totalPrice += $ticket->price; 
                      }
                          ?>
                       
                        


                       <?php   var_dump($totalPrice); ?>
                          
                </tbody> 
                 <tfoot>
                    <tr class="bg-success p-2 text-white bg-opacity-75 fs-0.5">
                    <td>Prix total : <?= $ticket->price ?></td>
                    </tr>
                  </tfoot>
                  
              </table>
            </div>
   
    


            
                    
            

        </div>





<?php
include("inc/footer.php");

?>