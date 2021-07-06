<?php

$m_aFragen = array(
    array("Wieviel sind 1+2?", 3,           7, 5, 3),
    array("Welche Farbe hat eine Zitrone?", 1, "gelb", "blau", "rot", "braun", "schwarz"),
    array("Wieviel sind 2*3?", 2,           7, 6, 1, 5, 9),
    array("In der Nacht ist es ...", 2, "hell", "dunkel"),
);

$m_iFrage = 1; //Nummer der aktuellen Frage
$m_aAktuelleFrage= $m_aFragen [$m_iFrage -1];
$m_sTopic =$m_aAktuelleFrage[0];
$m_iAnzahlFragen = count($m_aFragen);

$m_aAntwortauswahl = array();

for ($i = 2; $i< count($m_aAktuelleFrage);$i++) {
$m_aAntwortauswahl [] = $m_aAktuelleFrage[$i];
}

?>