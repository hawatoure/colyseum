
<?php

require_once("ticket.php");
require_once("conf.php");


class Client{

    public int $id;
    public string $lastName;
    public string $firstName;
    public string $birthDate;
    public ?int $cardNumber;
    public ?bool $card;
    public ?string $type;
    public ?int $discount;
    public ?array $tickets;
    

    public function displayBirthDate():string{
        $date = new DateTime($this->birthDate);
        $dateOutput = $date->format("d / m / Y") ;
        return $dateOutput;
    }
    function afficherInfos(){

        echo "<tr>"; 
        echo "<td>" .$this->lastName. "</td>"; 
        echo "<td>" .$this->firstName. "</td>";
        echo "<td>" .$this->displayBirthDate(). "</td>";
        echo "<td>" .$this->cardNumber. "</td>";
        echo "<td>" .$this->card. "</td>";
        echo "<td><a href=\"clientDetails.php?id=".$this->id."\"><button class='btn bg-success p-2 text-white bg-opacity-75' >Afficher</button> </a></td>"; 
        echo "</tr>"; 
    }
    // création d'une méthode statique quu concerne le concept d'élèves en général afin de récupérr la liste d'élève
    // static function readAll():array{

    //     global $pdo; //permet d'allez cherche la variable $pdo à l'extérieur de la fonction (portée global)
    //     $sql = "SELECT lastName, firstName, birthDate, card, cardNumber FROM clients LIMIT 20"; // ecriture de la requête sql dans une chaien de caractère
    //     $statement = $pdo->prepare($sql); // préparation de la requete sql par pdo
    //     $statement->execute(); // execution de la reqête
    //     $clients = $statement->fetchAll(pdo::FETCH_CLASS, "Client"); // récupération des résultat de la requête sous forme de tableau associatif
    //     // fetchAll est nécessaire que dans le SELECT car on récupère des élément de la bdd

    //     return $clients;
    //     echo "<pre>";
    //     var_dump($clients);
    //     echo "</pre>" ; 
    // }


    static function readAll(int $limite=20):array{

        global $pdo; //permet d'allez cherche la variable $pdo à l'extérieur de la fonction (portée global)
        $sql = "SELECT * FROM clients LIMIT :limite"; // ecriture de la requête sql dans une chaien de caractère
        $statement = $pdo->prepare($sql); // préparation de la requete sql par pdo
        $statement->bindParam(":limite", $limite, PDO::PARAM_INT);
        $statement->execute(); // execution de la reqête
        $clients = $statement->fetchAll(pdo::FETCH_CLASS, "Client"); // récupération des résultat de la requête sous forme de tableau associatif
        // fetchAll est nécessaire que dans le SELECT car on récupère des élément de la bdd

        return $clients;
        // echo "<pre>";
        // var_dump($clients);
        // echo "</pre>" ; 
    }

    static function readAllWithCard():array{

        global $pdo; //permet d'allez cherche la variable $pdo à l'extérieur de la fonction (portée global)
        $sql = "SELECT * FROM clients WHERE `card`= 1"; // ecriture de la requête sql dans une chaien de caractère
        $statement = $pdo->prepare($sql); // préparation de la requete sql par pdo
        $statement->execute(); // execution de la reqête
        $clienstWithCard = $statement->fetchAll(pdo::FETCH_CLASS, "Client"); // récupération des résultat de la requête sous forme de tableau associatif
        // fetchAll est nécessaire que dans le SELECT car on récupère des élément de la bdd
        return $clienstWithCard;
    } 

    static function readOneDetails(int $id):Client{

        global $pdo; 
        $sql = "SELECT clients.id, 
        clients.lastName, 
        clients.firstName, 
        clients.birthDate,
        clients.cardNumber, 
        cardtypes.type AS cardType, 
        cardtypes.discount AS cardDiscount 
        FROM clients 
        LEFT JOIN `cards` ON clients.cardNumber = cards.cardNumber
        LEFT JOIN cardtypes ON cards.cardTypesId = cardtypes.id
        WHERE clients.id = :id ";
        $statement = $pdo->prepare($sql);
        // va permettre de connecter un paramèttre donner (:id) et une variable($id) qui sont de type int
        $statement->bindParam(":id", $id, PDO::PARAM_INT);
        $statement->execute();
        //Récupération du résultat de la requête sous forme d'un objet professeur
        $statement->setFetchMode(PDO::FETCH_CLASS, "Client");
        $clientDetails = $statement->fetch();

         $clientDetails->tickets = Ticket::readAllFromClient($clientDetails->id);
        return $clientDetails;



    }

    //Récupérer les informations des tickets





}


?>