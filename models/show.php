
<?php

require_once("conf.php");

class Show{

    public string $title;
    public string $performer;
    public string $date;
    public string $type;

    public function displayBirthDate():string{
        $date = new DateTime($this->date);
        $dateOutput = $date->format("d / m / Y") ;
        return $dateOutput;
    }
    function afficherInfos(){

        echo "<tr>"; 
        echo "<td>" .$this->title. "</td>"; 
        echo "<td>" .$this->performer. "</td>";
        echo "<td>" .$this->displayBirthDate(). "</td>";
        echo "<td>" .$this->type. "</td>";
        echo "</tr>"; 
    }

    static function readAllShow():array{

        global $pdo; //permet d'allez cherche la variable $pdo à l'extérieur de la fonction (portée global)
        $sql = "SELECT * FROM shows INNER JOIN showtypes ON showtypes.id = shows.id"; // ecriture de la requête sql dans une chaien de caractère
        $statement = $pdo->prepare($sql); // préparation de la requete sql par pdo
        $statement->execute(); // execution de la reqête
        $shows = $statement->fetchAll(pdo::FETCH_CLASS, "Show"); // récupération des résultat de la requête sous forme de tableau associatif
        // fetchAll est nécessaire que dans le SELECT car on récupère des élément de la bdd
        return $shows;
    } 








}




















?>