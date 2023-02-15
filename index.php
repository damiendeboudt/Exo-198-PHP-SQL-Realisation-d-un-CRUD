<?php
try {

    function insert ($nom, $prenom, $age) {

        $server = 'localhost';
        $db = "exo_198";
        $user = 'root';
        $pass = '';


        $bdd = new PDO ("mysql:host=$server;dbname=$db;charset=utf8", $user, $pass);
        $bdd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $bdd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        $sql = "INSERT INTO eleves (nom,prenom, age)
                VALUES ('$nom', '$prenom', '$age')";

        $bdd->exec($sql);
    }
    insert("Deboudt", "Damien", 32);

}
    catch (PDOException $e) {
    echo $e->getMessage();
    }


try {

    function read () {

        $server = 'localhost';
        $db = "exo_198";
        $user = 'root';
        $pass = '';


        $bdd = new PDO ("mysql:host=$server;dbname=$db;charset=utf8", $user, $pass);
        $bdd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $bdd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        $stmt = $bdd->prepare("SELECT nom, prenom, age from eleves");

        $stmt->execute();

        foreach ($stmt->fetchAll() as $eleves) {
            echo "<div>Eleves : " . "Nom: " . $eleves['nom'] . "Prenom: " . $eleves['prenom'] . 'Age: ' . $eleves['age'];
        }
    }
    read();
}
catch (PDOException $e) {
    echo $e->getMessage();
}


try {

    function update ($nom, $prenom, $age, $idEleves) {

        $server = 'localhost';
        $db = "exo_198";
        $user = 'root';
        $pass = '';


        $bdd = new PDO ("mysql:host=$server;dbname=$db;charset=utf8", $user, $pass);
        $bdd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $bdd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        $stmt = $bdd->prepare("
            UPDATE eleves SET nom = :nom, prenom = :prenom, age = :age WHERE id = :id
        
        ");

        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':prenom', $prenom);
        $stmt->bindParam(':age', $age);
        $stmt->bindParam(':id', $idEleves);

        $stmt->execute();

    }
    update("Blanc","Didier", 54,  5);
}
catch (PDOException $e) {
    echo $e->getMessage();
}

try {

    function delete ($idEleves) {

        $server = 'localhost';
        $db = "exo_198";
        $user = 'root';
        $pass = '';


        $bdd = new PDO ("mysql:host=$server;dbname=$db;charset=utf8", $user, $pass);
        $bdd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $bdd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

      $sql = "DELETE FROM eleves WHERE id = $idEleves";

        $bdd->exec($sql);
    }

    delete("10");
}
catch (PDOException $e) {
    echo $e->getMessage();
}

