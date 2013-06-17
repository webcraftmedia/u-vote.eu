<?php

class account {
    public static function createNewAccount($newacc){
        $con = new \SYSTEM\DB\Connection(new \DBD\uVote());

//Variablen zuweisen
$user_ID = $_POST['vorname'];
$password = $_POST['passwort'];
$email = $_POST['email'];

//Daten in DB speichern
$sql_befehl = "INSERT INTO table VALUES ($vorname,$nachname,$email)";
 if (("" == $password) OR (""== $email)) {
        echo "Fehler: Eintrag unvollständig. ";
    } else {

  echo "Ihr Eintrag wurde hinzugefügt. ";
}

    }
}