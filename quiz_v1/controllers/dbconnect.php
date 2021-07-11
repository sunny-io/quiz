<?php
/*
* Implement connecttion to Host with constants for less hackability
*/
define ("DB_HOST", "localhost");
define ("DB_USER" , "root");
define ("DB_PASS" , "");
define("DB_DATA", "quizapp");
define ("FETCHALL", "SELECT * FROM `fragenkatalog`");

function initquiz() {
    $db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_DATA);

    if ($db->connect_error) {
        die("Verbindung fehlgeschlagen: " .$db->connect_error);

    }else {
        echo "<!--Verbindung erfolgreich-->";
    }


    $result = $db->query(FETCHALL);

    if ($result->num_rows >0){
        $fragenkatalog = $result->fetch_all();
    }



    $db->close();
    return $fragenkatalog;
}
?>