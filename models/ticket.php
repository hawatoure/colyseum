<?php

require_once("conf.php");


class Ticket{
    public int $id;
    public int $price;

    static function readAllFromClient(int $clientId):array{

        global $pdo; 
        $sql = "SELECT id, price FROM tickets
       WHERE clientsid = :clientsid ";
        $statement = $pdo->prepare($sql);
        // va permettre de connecter un paramèttre donner (:id) et une variable($id) qui sont de type int
        $statement->bindParam(":clientsid", $clientId, PDO::PARAM_INT);
        $statement->execute();
        //Récupération du résultat de la requête sous forme d'un objet professeur
        
        $allFromClient = $statement->fetchAll(PDO::FETCH_CLASS, "Ticket");
 
        return $allFromClient;
    }



}







?>